<?php

namespace Oukuyun\Admin\Helpers\Universal;

use Oukuyun\Admin\Models\System\Settings as SystemSettings;
use Cache;
use Illuminate\Support\Facades\App;
use Oukuyun\Admin\Repositories\System\SettingsRepository;
/**
 * 
 */
class Settings 
{
	static function get($key=null){
        $locale = App::currentLocale();
        $SettingsRepository = new SettingsRepository(new SystemSettings);
		$settings 	=	$SettingsRepository->getAllSettings($locale);
		return ($key)?$settings[$key]:$settings;
	}
}