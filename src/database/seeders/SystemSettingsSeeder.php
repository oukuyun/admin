<?php

namespace Oukuyun\Admin\database\seeders;

use Illuminate\Database\Seeder;
use DB;
use Oukuyun\Admin\Models\System\Language;

class SystemSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$languages = Language::all();
		foreach ($languages as $language) {
			DB::table('system_settings')->insert(
				[
					[
						'lang'				=>	$language->code,
						'name'				=>	'ico',
						'type'				=>	'file',
						'value' 			=>	NULL,
						'created_at'		=>	date("Y-m-d H:i:s"),
						'updated_at'		=>	date("Y-m-d H:i:s"),
					],
					[
						'lang'				=>	$language->code,
						'name'				=>	'app',
						'type'				=>	'file',
						'value' 			=>	NULL,
						'created_at'		=>	date("Y-m-d H:i:s"),
						'updated_at'		=>	date("Y-m-d H:i:s"),
					],
					[
						'lang'				=>	$language->code,
						'name'				=>	'logo',
						'type'				=>	'file',
						'value' 			=>	NULL,
						'created_at'		=>	date("Y-m-d H:i:s"),
						'updated_at'		=>	date("Y-m-d H:i:s"),
					],
					[
						'lang'				=>	$language->code,
						'name'				=>	'title',
						'type'				=>	'text',
						'value' 			=>	NULL,
						'created_at'		=>	date("Y-m-d H:i:s"),
						'updated_at'		=>	date("Y-m-d H:i:s"),
					],
					[
						'lang'				=>	$language->code,
						'name'				=>	'address',
						'type'				=>	'text',
						'value' 			=>	NULL,
						'created_at'		=>	date("Y-m-d H:i:s"),
						'updated_at'		=>	date("Y-m-d H:i:s"),
					],
					[
						'lang'				=>	$language->code,
						'name'				=>	'service_time',
						'type'				=>	'text',
						'value' 			=>	NULL,
						'created_at'		=>	date("Y-m-d H:i:s"),
						'updated_at'		=>	date("Y-m-d H:i:s"),
					],
					[
						'lang'				=>	$language->code,
						'name'				=>	'fax',
						'type'				=>	'text',
						'value' 			=>	NULL,
						'created_at'		=>	date("Y-m-d H:i:s"),
						'updated_at'		=>	date("Y-m-d H:i:s"),
					],
					[
						'lang'				=>	$language->code,
						'name'				=>	'phone',
						'type'				=>	'text',
						'value' 			=>	NULL,
						'created_at'		=>	date("Y-m-d H:i:s"),
						'updated_at'		=>	date("Y-m-d H:i:s"),
					],
					[
						'lang'				=>	$language->code,
						'name'				=>	'email',
						'type'				=>	'text',
						'value' 			=>	NULL,
						'created_at'		=>	date("Y-m-d H:i:s"),
						'updated_at'		=>	date("Y-m-d H:i:s"),
					],
					[
						'lang'				=>	$language->code,
						'name'				=>	'keyword',
						'type'				=>	'tagsinput',
						'value' 			=>	NULL,
						'created_at'		=>	date("Y-m-d H:i:s"),
						'updated_at'		=>	date("Y-m-d H:i:s"),
					],
					[
						'lang'				=>	$language->code,
						'name'				=>	'description',
						'type'				=>	'textarea',
						'value' 			=>	NULL,
						'created_at'		=>	date("Y-m-d H:i:s"),
						'updated_at'		=>	date("Y-m-d H:i:s"),
					],
				]
			);
		}

		DB::table('system_settings')->insert(
			[
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
