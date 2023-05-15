<?php

namespace Oukuyun\Admin\database\seeders;

use Illuminate\Database\Seeder;
use DB;
use Ramsey\Uuid\Uuid;

class SystemSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_settings')->insert(
        	[
	        	[
                    'lang'				=>	'zh-Hant',
		        	'name'				=>	'ico',
		        	'type'				=>	'file',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
				[
                    'lang'				=>	'zh-Hant',
		        	'name'				=>	'app',
		        	'type'				=>	'file',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
				[
                    'lang'				=>	'zh-Hant',
		        	'name'				=>	'logo',
		        	'type'				=>	'file',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
                    'lang'				=>	'zh-Hant',
		        	'name'				=>	'title',
		        	'type'				=>	'text',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'lang'				=>	'zh-Hant',
                    'name'				=>	'address',
		        	'type'				=>	'text',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'lang'				=>	'zh-Hant',
                    'name'				=>	'service_time',
		        	'type'				=>	'text',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'lang'				=>	'zh-Hant',
                    'name'				=>	'fax',
		        	'type'				=>	'text',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'lang'				=>	'zh-Hant',
                    'name'				=>	'phone',
		        	'type'				=>	'text',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'lang'				=>	'zh-Hant',
                    'name'				=>	'email',
		        	'type'				=>	'text',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'lang'				=>	'zh-Hant',
                    'name'				=>	'keyword',
		        	'type'				=>	'tagsinput',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
	        	[
		        	'lang'				=>	'zh-Hant',
                    'name'				=>	'description',
		        	'type'				=>	'textarea',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
				[
		        	'lang'				=>	'*',
                    'name'				=>	'init',
		        	'type'				=>	'number',
		            'value' 			=>	0,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
				[
		        	'lang'				=>	'system',
                    'name'				=>	'key',
		        	'type'				=>	'text',
		            'value' 			=>	NULL,
		            'created_at'		=>	date("Y-m-d H:i:s"),
		            'updated_at'		=>	date("Y-m-d H:i:s"),
	        	],
        	]
    	);
    }
}
