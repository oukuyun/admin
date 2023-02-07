<?php

namespace Oukuyun\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\AuthenticateSession as Session;
use Illuminate\Auth\AuthenticationException;

class AuthenticateSession extends Session
{

    public function handle($request, Closure $next)
    {
        if(env("AUTH_MODE") == "session") {
            if (! $request->hasSession() || ! $request->user()) {
                return $next($request);
            }
    
            if ($this->guard()->viaRemember()) {
                $passwordHash = explode('|', $request->cookies->get($this->auth->getRecallerName()))[2] ?? null;
    
                if (! $passwordHash || $passwordHash != $request->user()->getAuthPassword()) {
                    $this->logout($request);
                }
            }
    
            if (! $request->session()->has('password_hash_'.$this->auth->getDefaultDriver())) {
                $this->storePasswordHashInSession($request);
            }
    
            if ($request->session()->get('password_hash_'.$this->auth->getDefaultDriver()) !== $request->user()->getAuthPassword()) {
                $this->logout($request);
            }
    
            return tap($next($request), function () use ($request) {
                if (! is_null($this->guard()->user())) {
                    $this->storePasswordHashInSession($request);
                }
            });
        }
        return $next($request);
    }

    protected function logout($request)
    {
        $this->guard()->logoutCurrentDevice();

        $request->session()->flush();

        throw new AuthenticationException('Unauthenticated.', [$this->auth->getDefaultDriver()],route('Admin.login',[],false));
    }
}
