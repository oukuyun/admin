<?php

namespace Oukuyun\Admin\Helpers\Universal;
/**
 * 
 */
class Universal
{
	static function version($file){
		if(file_exists(public_path($file))){
			return $file.'?v='.filemtime(public_path($file));
		}else{
			return $file;
		}
	}
}
	