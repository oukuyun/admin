<?php

namespace Oukuyun\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;
use Oukuyun\Admin\Services\Admin\UsersService;
use Illuminate\Http\Request;

class LogoutController extends Controller
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
    public function __construct(UsersService $UsersService){
        $this->UsersService = $UsersService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Responses\Universal\ApiResponse
     */
    public function index(Request $request)
    {
        return ApiResponse::json([
            "message" => "登出成功",
            "data" => $this->UsersService->logout($request->ip(),$request->userAgent())
        ]);
    }
}
