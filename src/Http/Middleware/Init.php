<?php

namespace Oukuyun\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Oukuyun\Admin\Services\System\SettingsService;
use Route;

class Init
{    
    /**
     * \App\Services\System\SettingsService
     * @access protected
     * @var SettingsService
     * @version 1.0
     * @author Henry
     */
    protected $SettingsService;

    /**
     * 初始化忽略路由
     * @access protected
     * @var IgnoreInitRoute
     * @version 1.0
     * @author Henry
     */
    protected $IgnoreInitRoute = [
        "Backend.Init.store",
        "Backend.Init.index",
    ];

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(SettingsService $SettingsService)
    {
        $this->SettingsService = $SettingsService;
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
        config(['auth.defaults.guard'=>'admin']);
        config(['auth.defaults.passwords'=>'admin_users']);
        if(!$this->SettingsService->CheckInit() && !in_array(Route::currentRouteName(),$this->IgnoreInitRoute)) {
            return redirect()->route("Backend.Init.index");
        }
        return $next($request);
    }
}
