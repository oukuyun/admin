<?php
    return [
        'route' =>  [
            //系統管理
            'Backend.system'  =>  [
                'name'  =>  '系統管理',
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
        ]
    ];