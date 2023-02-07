<?php

namespace Oukuyun\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Oukuyun\Admin\Services\System\LockScreenService;
use Route;
use Oukuyun\Admin\Exceptions\Universal\ErrorException;

class LockScreenCheck
{
    /**
     * 初始化忽略路由
     * @access protected
     * @var IgnoreInitRoute
     * @version 1.0
     * @author Henry
     */
    protected $IgnoreInitRoute = [
        "Admin.LockScreen.index",
        "Dinj.LockScreen.store",
        "Dinj.LockScreen.destroy",
        "Dinj.Logout.index",
    ];
    protected $LockScreenService;
    
    public function __construct(LockScreenService $LockScreenService)
    {
        $this->LockScreenService = $LockScreenService;
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
        if(env('LOCK_SCREEN',false) && $this->LockScreenService->check()  && !in_array(Route::currentRouteName(),$this->IgnoreInitRoute)) {
            if(env('AUTH_MODE') == "session") {
                return redirect()->route("Admin.LockScreen.index");
            }else{
                throw new ErrorException([],"系統鎖定中");
            }
        }
        return $next($request);
    }
}
