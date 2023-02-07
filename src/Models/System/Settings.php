<?php

namespace Oukuyun\Admin\Models\System;

use Oukuyun\Admin\Models\Universal\Model;
use Cache;

class Settings extends Model
{
    protected $table = "system_settings";
    public $cache = "systemSettings";
    protected $fillable = [
        'lang',
        'value',
    ];

    public function getValueAttribute($value) {
        $array = json_decode($value);
        if(is_array($array) || is_object($array)){
            return $array;
        }
        return $value;
    }

    /**
     * 取得設定檔
     * @param string $lang
     * @param string $type
     * @return $data
     * @author Henry
    **/
    public function getSetting(String $lang, String $type) {
        return $this->getAllSettings($lang)[$type]??false;
    }

    /**
     * 取得全部設定檔
     * @param string $lang
     * @return array $data
     * @author Henry
    **/
    public function getAllSettings(string $lang) {
        return (Cache::get($this->cache)??$this->CacheSettings())->where('lang',$lang)->pluck("value","name");
    }

    /**
     * 取得設定檔類型
     * @param string $lang
     * @param string $name
     * @return string $type
     * @author Henry
    **/
    public function getSettingType(String $lang, String $name) {
        $data = $this->where([
            'name'  =>  $name,
            'lang'  =>  $lang,
        ])->first();
        return $data->type??false;
    }
    
    /**
     * 設定檔快取
     * @return object
     */
    public function CacheSettings() {
        return Cache::rememberForever($this->cache, function () {
            return $this->all();
        });
    }
}
