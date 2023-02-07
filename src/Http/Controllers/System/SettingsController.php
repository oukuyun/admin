<?php

namespace Dinj\Admin\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dinj\Admin\Http\Responses\Universal\ApiResponse;
use Dinj\Admin\Services\System\SettingsService;
use Dinj\Admin\Http\Requests\System\SettingsRequest;

class SettingsController extends Controller
{
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
    public function __construct(SettingsService $SettingsService)
    {
        $this->SettingsService = $SettingsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->expectsJson()) {
            return ApiResponse::json(["data" => [
                'general'   =>  $this->SettingsService->getSettings(\App::currentLocale()),
                'security'  =>  $this->SettingsService->getSettings("system"),
                'service'  =>  $this->SettingsService->getSettings("service"),
                'social'  =>  $this->SettingsService->getSettings("social"),
                'seo'  =>  $this->SettingsService->getSettings("seo"),
            ]]);
        }
        return view('admin::system.settings');
    }

    public function update(SettingsRequest $request, $id)
    {
        $this->SettingsService->updateSetting($request->type,$request->name,$request->value);
        return ApiResponse::json([
            "message" => "更新成功"
        ]);
    }
}
