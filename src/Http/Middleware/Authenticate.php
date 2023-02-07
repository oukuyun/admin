<?php

namespace Oukuyun\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Oukuyun\Admin\Services\Admin\UsersService;
use Oukuyun\Admin\Exceptions\Universal\ErrorException;

class Authenticate
{
    
    /**
     * \App\Services\Admin\UsersService
     * @access protected
     * @var UsersService
     * @version 1.0
     * @author Henry
     */
    protected $UsersService;
    
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(UsersService $UsersService)
    {
        $this->UsersService = $UsersService;
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
        if (!Auth::check()) {
            return redirect()->route('Backend.Login.index');
        }
        return $next($request);
    }
}
