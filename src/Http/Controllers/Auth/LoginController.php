<?php

namespace Oukuyun\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Oukuyun\Admin\Http\Requests\Auth\LoginRequest;
use Oukuyun\Admin\Services\Admin\UsersService;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;

class LoginController extends Controller
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
        $this->middleware("admin.guest");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin::login');
    }

    /**
     * 管理員登入
     * @param  \App\Http\Requests\Auth\Admin\LoginRequest  $request
     * @return \App\Http\Responses\Universal\ApiResponse
     */
    public function store(LoginRequest $request)
    {
        $this->UsersService->login($request->all(),$request->ip(),$request->userAgent());
        return redirect()->route('Backend.dashboard.index');
    }
}
