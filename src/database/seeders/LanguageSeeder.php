<?php

namespace Oukuyun\Admin\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Oukuyun\Admin\Models\System\Language;

class LanguageSeeder extends Seeder
{
    protected $data = [
        [
            'code'  =>  'zh-Hant',
            'name'  =>  '繁體中文',
            'status'=>  1,
        ],
        [
            'code'  =>  'en',
            'name'  =>  '英文',
            'status'=>  0,
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $item) {
            $check = Language::where(['code' => $item['code']])->first();
            if(!$check) {
                Language::create($item);
            }
        }
    }
}
