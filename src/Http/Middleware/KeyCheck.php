<?php

namespace Oukuyun\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Oukuyun\Admin\Services\System\SettingsService;
use Oukuyun\Admin\Exceptions\Universal\ErrorException;

class KeyCheck
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
        $response = $next($request);
        if(env("VERIFY_KEY",false)) {
            $key = $request->cookie("key")??$request->key;
            if( !$this->SettingsService->CheckKey($key) && $this->SettingsService->CheckInit()) {
                if(env("AUTH_MODE",false) == "session") {
                    abort(403,"後台驗證碼錯誤");
                }else{
                    throw new ErrorException([],"不允許進入",403);
                }
            }else{
                return $response->cookie("key",$key);
            }
        }
        
        return $response;
    }
}
