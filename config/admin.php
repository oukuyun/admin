<?php

return [

    'verifyKey' => env('VERIFY_KEY', false),

    'lockScreen' => env('LOCK_SCREEN', false),

    'multipleLogin' => env('ADMIN_MULTIPLE_LOGIN', false),

    'locale'    =>  'zh-Hant',

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
            'name'  =>  'admin::Admin.systemManager',
            'icon'  =>  'fa fa-wrench',
            'children'  =>  [
                //系統設定
                'Backend.admin'  =>  [
                    'name'  =>  'admin::Admin.adminManger',
                    'permission'    =>  [
                        'index',
                        'update',
                    ]
                ],
                'Backend.SystemSettings'  =>  [
                    'name'  =>  'admin::Admin.SystemSettings',
                    'permission'    =>  [
                        'index',
                        'store',
                    ]
                ],
            ]
        ]
    ],

    'settings'  =>  [
        'general'   =>  [
            'form'  =>  [
                'name'  =>  'settings',
                'action'=>  '',
                'back'  =>  false,
                'method'=>  "POST",
                'form'  =>  [
                    [
                        'class'  =>  'row',
                        'col'   =>  [
                            [
                                'class' =>  'col-xl-8 col-md-12',
                                'col'   =>  [
                                    [
                                        'class' =>  'row',
                                        'col'   =>  [
                                            [
                                                'class' =>  'col-xl-6 d-none',
                                                'col'   =>  [
                                                    [
                                                        'class' =>  'fields',
                                                        'field' =>  'lang'
                                                    ]
                                                ]
                                            ],
                                            [
                                                'class' =>  'col-xl-6',
                                                'col'   =>  [
                                                    [
                                                        'class' =>  'fields',
                                                        'field' =>  'title'
                                                    ]
                                                ]
                                            ],
                                            [
                                                'class' =>  'col-xl-6',
                                                'col'   =>  [
                                                    [
                                                        'class' =>  'fields',
                                                        'field' =>  'address'
                                                    ],
                                                ],
                                            ],
                                            [
                                                'class' =>  'col-xl-6',
                                                'col'   =>  [
                                                    [
                                                        'class' =>  'fields',
                                                        'field' =>  'service_time'
                                                    ],
                                                ],
                                            ],
                                            [
                                                'class' =>  'col-xl-6',
                                                'col'   =>  [
                                                    [
                                                        'class' =>  'fields',
                                                        'field' =>  'fax'
                                                    ],
                                                ],
                                            ],
                                            [
                                                'class' =>  'col-xl-6',
                                                'col'   =>  [
                                                    [
                                                        'class' =>  'fields',
                                                        'field' =>  'phone'
                                                    ],
                                                ],
                                            ],
                                            [
                                                'class' =>  'col-xl-6',
                                                'col'   =>  [
                                                    [
                                                        'class' =>  'fields',
                                                        'field' =>  'email'
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ]
            ],
            'fields'    =>  [
                'lang'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'hidden',
                    'name'          =>  'lang',
                    'text'          =>  '',
                    'placeholder'   =>  '',
                    'rules'         =>  [],
                ],
                'title'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'text',
                    'name'          =>  'title',
                    'text'          =>  'admin::Admin.settings.title',
                    'placeholder'   =>  'admin::Admin.settings.title',
                    'rules'         =>  [],
                ],
                'address'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'text',
                    'name'          =>  'address',
                    'text'          =>  'admin::Admin.settings.address',
                    'placeholder'   =>  'admin::Admin.settings.address',
                    'rules'         =>  [],
                ],
                'service_time'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'text',
                    'name'          =>  'service_time',
                    'text'          =>  'admin::Admin.settings.service_time',
                    'placeholder'   =>  'admin::Admin.settings.service_time',
                    'rules'         =>  [],
                ],
                'fax'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'text',
                    'name'          =>  'fax',
                    'text'          =>  'admin::Admin.settings.fax',
                    'placeholder'   =>  'admin::Admin.settings.fax',
                    'rules'         =>  [],
                ],
                'phone'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'text',
                    'name'          =>  'phone',
                    'text'          =>  'admin::Admin.settings.phone',
                    'placeholder'   =>  'admin::Admin.settings.phone',
                    'rules'         =>  [],
                ],
                'email'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'email',
                    'name'          =>  'email',
                    'text'          =>  'admin::Admin.settings.email',
                    'placeholder'   =>  'admin::Admin.settings.email',
                    'rules'         =>  [],
                ],
            ]
        ]
    ]
];
