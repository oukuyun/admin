<?php

namespace Oukuyun\Admin\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Oukuyun\Admin\Services\Admin\UsersService;
use Oukuyun\Admin\Services\System\SettingsService;
use Oukuyun\Admin\Http\Requests\Admin\Init\InitRequest;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;
use DB;

class InitController extends Controller
{
    /** 
     * \App\Services\Admin\UsersService
     * @access protected
     * @var UsersService
     * 
     * @version 1.0
     * @author Henry
    **/
    protected $UsersService;
    /** 
     * \App\Services\System\SettingsService
     * @access protected
     * @var SettingsService
     * 
     * @version 1.0
     * @author Henry
    **/
    protected $SettingsService;
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(UsersService $UsersService,SettingsService $SettingsService)
    {
        $this->UsersService = $UsersService;
        $this->SettingsService = $SettingsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin::system.init');
    }

    /**
     * 初始化設定
     * @param  \App\Http\Requests\Admin\Init\InitRequest  $request
     * @return \App\Http\Responses\Universal\ApiResponse
     */
    public function store(InitRequest $request)
    {
        if(!$this->SettingsService->CheckInit()) {
            DB::transaction(function() use ($request) {
                $adminData = $request->admin;
                $this->UsersService->store($adminData);
                $this->SettingsService->updateSetting('*','init',1);
            });
        }
        return redirect()->route('Backend.Login.index');
    }

}
