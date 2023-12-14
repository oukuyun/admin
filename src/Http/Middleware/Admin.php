<?php

namespace Oukuyun\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Oukuyun\Admin\Services\Admin\AuthenticationLogService;
// use Oukuyun\Admin\Services\Admin\AuditService;
use Route;
use Oukuyun\Admin\Models\Admin\Users;
use Oukuyun\Admin\Services\System\LanguageService;

class Admin
{
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct()
    {
        // $this->AuthenticationLogService = new AuthenticationLogService(Users::class);
        // $this->AuditService = $AuditService;
        $this->LanguageService = app(LanguageService::class);
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // \View::share('loginRecords', $this->AuthenticationLogService->getRecentRecords()->getEntity());
        // \View::share('auditRecords', $this->AuditService->getRecentRecords()->getEntity());
        \View::share('routeName',Route::currentRouteName());
        \View::share('languages',$this->LanguageService->getLanguages());
        return $next($request);
    }
}
