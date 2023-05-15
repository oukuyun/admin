<?php

namespace Oukuyun\Admin\Services\System;

use Oukuyun\Admin\Models\System\Settings;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

/**
 * Class SettingsService.
 */
class SettingsService
{
    /** 
     * \App\Repositories\System\SettingsRepository
     * @access protected
     * @var SettingsRepository
     * @version 1.0
     * @author Henry
    **/
    protected $SettingsRepository;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Settings $Settings)
    {
        $this->SettingsRepository = $Settings;
    }
    
    /**
     * 更新設定檔
     * @param string $lang
     * @param string $name
     * @param array|object|string|int $value
     * @return boolean
     * @author Henry
    **/
    public function updateSetting(String $lang, String $name, $value) {

        $type = $this->SettingsRepository->getSettingType($lang,$name);
        if(in_array($type,['file']) && $name == 'ico') {
            $value = $value->storeAs('ico','favicon.ico');
        }
        if(is_array($value) || is_object($value)) {
            $value = json_encode($value);
        }
        $this->SettingsRepository->where([
            'lang' => $lang,
            'name' => $name,
        ])->first()->update(['value' => $value]);
    }

    /**
     * 初始化設定
     * @version 1.0
     * @param array $data
     * @author Henry
    **/
    public function Init(Array $data) {
        foreach($data as $type => $value) {
            $this->updateSetting("zh-Hant",$type,$value);
        }
    }
    
    /**
     * 初始化檢查
     * @version 1.0
     * @author Henry
     * @return Boolean
     */
    public function CheckInit() {
        $setting =  $this->SettingsRepository->getSetting("*","init");
        return (bool)$setting;
    }
    
    /**
     * 檢查key是否允許
     *
     * @param  string $key
     * @return boolean
     */
    public function CheckKey($key) {
        return $this->SettingsRepository->getSetting("system","key") == $key;
    }
    
    /**
     * 取得分類設定
     * @param  mixed $lang
     * @return array
     */
    public function getSettings(string $lang) {
        return $this->SettingsRepository->getAllSettings($lang);
    }

}