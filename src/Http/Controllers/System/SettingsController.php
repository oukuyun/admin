<?php

namespace Oukuyun\Admin\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;
use Oukuyun\Admin\Services\System\SettingsService;
use Oukuyun\Admin\Http\Requests\System\SettingsRequest;
use Oukuyun\Admin\Helpers\Universal\Universal;

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
        if(Universal::permissionEnable()) {
            $this->PermissionService = app(\Oukuyun\Permission\Services\Admin\PermissionService::class);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Universal::permissionEnable()) {
            $this->PermissionService->checkPermission('Backend.SystemSettings.index');
        }
        $lang = \App::currentLocale();
        if($request->lang) {
            $lang = $request->lang;
            
        }
        foreach ($this->SettingsService->getSettings($lang) as $key => $value) {
            foreach (config('admin.settings') as $type => $item) {
                if(isset($item['fields'][$key]) && $value) {
                    config(["admin.settings.{$type}.fields.{$key}.value" => $value]);
                }
            }
        }
        foreach (config('admin.settings') as $type => $item) {
            config(["admin.settings.{$type}.fields.lang.value" => $lang]);
        }
        \View::share('fields', config('admin.settings.general.fields'));
        return view('admin::system.settings');
    }

    public function store(SettingsRequest $request)
    {
        if(Universal::permissionEnable()) {
            $this->PermissionService->checkPermission('Backend.SystemSettings.insert');
        }
        foreach ($request->all() as $key => $value) {
            if(!in_array($key, ['_method', '_token', 'lang'])) {
                $this->SettingsService->updateSetting($request->lang, $key, $value);
            }
        }
        return back();
    }
}
