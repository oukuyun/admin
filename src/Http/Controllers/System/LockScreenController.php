<?php

namespace Dinj\Admin\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dinj\Admin\Services\System\LockScreenService;
use Dinj\Admin\Http\Responses\Universal\ApiResponse;
use Dinj\Admin\Http\Requests\System\LockScreenRequest;
use Dinj\Admin\Services\Admin\UsersService;

class LockScreenController extends Controller
{
    protected $LockScreenService;
    /**
     * \App\Services\Admin\UsersService
     * @access protected
     * @var UsersService
     * @version 1.0
     * @author Henry
     */
    protected $UsersService;
    
    public function __construct(LockScreenService $LockScreenService, UsersService $UsersService)
    {
        $this->LockScreenService = $LockScreenService;
        $this->UsersService = $UsersService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->expectsJson()) {
            $this->LockScreenService->lock();
            return ApiResponse::json(["message" => "鎖定成功"]);
        }
        return view('admin::system.lockScreen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LockScreenRequest $request)
    {
        $this->LockScreenService->unlock($request->password);
        return ApiResponse::json(["message"=>"驗證成功"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $this->LockScreenService->removeLock();
        $this->UsersService->logout($request->ip(),$request->userAgent());
        return ApiResponse::json([]);
    }
}
