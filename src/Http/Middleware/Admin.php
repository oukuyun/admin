<?php

namespace Oukuyun\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Oukuyun\Admin\Services\System\RoutesService;
use Oukuyun\Admin\Services\Admin\AuthenticationLogService;
use Oukuyun\Admin\Services\Admin\AuditService;
use Route;
use Oukuyun\Admin\Models\Admin\Users;

class Admin
{
    protected $RoutesService;
    protected $AuthenticationLogService;
    protected $AuditService;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(RoutesService $RoutesService,AuditService $AuditService)
    {
        $this->RoutesService = $RoutesService;
        $this->AuthenticationLogService = new AuthenticationLogService(Users::class);
        $this->AuditService = $AuditService;
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
        \View::share('menu', $this->RoutesService->getMenu()->makeMenu()->getEntity());
        \View::share('loginRecords', $this->AuthenticationLogService->getRecentRecords()->getEntity());
        \View::share('auditRecords', $this->AuditService->getRecentRecords()->getEntity());
        \View::share('routeName',Route::currentRouteName());
        \View::share('routePath',$this->RoutesService->getRouteLayer());
        return $next($request);
    }
}
