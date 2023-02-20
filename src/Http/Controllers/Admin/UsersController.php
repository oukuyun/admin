<?php

namespace Oukuyun\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Oukuyun\Admin\Models\Admin\Users;
use Illuminate\Http\Request;
use Oukuyun\Admin\Services\Admin\UsersService;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;
use Oukuyun\Admin\Http\Requests\Admin\Users\StoreRequest;
use Oukuyun\Admin\Http\Requests\Admin\Users\UpdateRequest;
use DB;

class UsersController extends Controller
{
    protected $UsersService;

    protected $form = [
        'name'  =>  'admin',
        'action'=>  '',
        'back'  =>  '',
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
                                        'class' =>  'col-xl-6',
                                        'col'   =>  [
                                            [
                                                'class' =>  'fields',
                                                'field' =>  'email'
                                            ]
                                        ]
                                    ],
                                    [
                                        'class' =>  'col-xl-6',
                                        'col'   =>  [
                                            [
                                                'class' =>  'fields',
                                                'field' =>  'name'
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
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
                                        'class' =>  'col-xl-6',
                                        'col'   =>  [
                                            [
                                                'class' =>  'fields',
                                                'field' =>  'password'
                                            ]
                                        ]
                                    ],
                                    [
                                        'class' =>  'col-xl-6',
                                        'col'   =>  [
                                            [
                                                'class' =>  'fields',
                                                'field' =>  'password_confirmation'
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
    ];

    protected $fields = [
        'email'   =>  [
            'tag'           =>  'input',
            'type'          =>  'email',
            'name'          =>  'email',
            'text'          =>  '账号',
            'placeholder'   =>  '账号',
            'required'      =>  true,
            'rules'         =>  [
                'required'  =>  true,
            ],
        ],
        'name'   =>  [
            'tag'           =>  'input',
            'type'          =>  'text',
            'name'          =>  'name',
            'text'          =>  '昵称',
            'placeholder'   =>  '昵称',
            'required'      =>  true,
            'rules'         =>  [
                'required'  =>  true,
            ],
        ],
        'password'   =>  [
            'tag'           =>  'input',
            'type'          =>  'password',
            'name'          =>  'password',
            'text'          =>  '密码',
            'placeholder'   =>  '密码',
            'required'      =>  true,
            'rules'         =>  [
                'required'  =>  true,
                'minlength' =>  '6',
            ],
        ],
        'password_confirmation'   =>  [
            'tag'           =>  'input',
            'type'          =>  'password',
            'name'          =>  'password_confirmation',
            'text'          =>  '确认密码',
            'placeholder'   =>  '确认密码',
            'required'      =>  true,
            'rules'         =>  [
                'required'  =>  true,
                'minlength' =>  '6',
                'equalTo'   =>  '#password',
            ],
        ],
    ];
    
    public function __construct(UsersService $UsersService)
    {
        $this->UsersService = $UsersService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->expectsJson()) {
            return ApiResponse::json(["data" => $this->UsersService->index(['word'=>$request->search])]);
        }
        return view('admin::admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->form['action']   =   route('Backend.admin.store');
        $data['form']   =   $this->form;
        \View::share('fields',$this->fields);
        return view('admin::admin.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->UsersService->store($request->all());
        return ApiResponse::json(["message"=>"新增成功"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ApiResponse::json(["data"=>$this->UsersService->getUser($id) ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        $data['method'] = "PUT";
        return view('admin::admin.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        DB::beginTransaction();
        $this->UsersService->updateUser($request->all(),$id);
        DB::commit();
        return ApiResponse::json(["message"=>"更新成功"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->UsersService->deleteUser($id);
        return ApiResponse::json(["message"=>"刪除成功"]);
    }
}
