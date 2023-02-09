<?php

namespace Oukuyun\Admin\Helpers\Universal;

use Oukuyun\Admin\Models\System\Settings as SystemSettings;
use Cache;
use Illuminate\Support\Facades\App;
/**
 * 
 */
class Settings 
{
	static function get($key=null){
        $locale = App::currentLocale();
        $SettingsRepository = new SystemSettings();
		$settings 	=	$SettingsRepository->getAllSettings($locale);
		return ($key)?$settings[$key]??'':$settings;
	}
}