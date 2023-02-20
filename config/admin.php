<?php

return [

    'verifyKey' => env('VERIFY_KEY', false),

    'lockScreen' => env('LOCK_SCREEN', false),

    'multipleLogin' => env('ADMIN_MULTIPLE_LOGIN', false),

    'locale'    =>  'zh-TW',

    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admin_users',
        ],
    ],

    'providers' => [
        'admin_users' => [
            'driver' => 'eloquent',
            'model' => Oukuyun\Admin\Models\Admin\Users::class,
        ],
    ],

    'passwords' => [
        'admin_users' => [
            "provider" => "admin_users",
            "table" => "password_resets",
            "expire" => 60,
            "throttle" => 60,
        ],
    ],

    'route' =>  [
        //系統管理
        'Backend.system'  =>  [
            'name'  =>  '系統管理',
            'icon'  =>  'fa fa-wrench',
            'children'  =>  [
                //系統設定
                'Backend.admin'  =>  [
                    'name'  =>  '管理員管理',
                    'permission'    =>  [
                        'index',
                        'update',
                    ]
                ],
            ]
        ]
    ],
];
