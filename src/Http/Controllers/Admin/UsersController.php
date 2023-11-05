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
use Oukuyun\Admin\Helpers\Universal\Universal;

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
            'text'          =>  'admin::Admin.admin.email',
            'placeholder'   =>  'admin::Admin.admin.email',
            'required'      =>  true,
            'rules'         =>  [
                'required'  =>  true,
            ],
        ],
        'name'   =>  [
            'tag'           =>  'input',
            'type'          =>  'text',
            'name'          =>  'name',
            'text'          =>  'admin::Admin.admin.name',
            'placeholder'   =>  'admin::Admin.admin.name',
            'required'      =>  true,
            'rules'         =>  [
                'required'  =>  true,
            ],
        ],
        'password'   =>  [
            'tag'           =>  'input',
            'type'          =>  'password',
            'name'          =>  'password',
            'text'          =>  'admin::Admin.admin.password',
            'placeholder'   =>  'admin::Admin.admin.password',
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
            'text'          =>  'admin::Admin.admin.confirmPassword',
            'placeholder'   =>  'admin::Admin.admin.confirmPassword',
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
        $this->form['back'] =   route('Backend.admin.index');
        $this->UsersService = $UsersService;
        if(Universal::permissionEnable()) {
            $this->PermissionService = app(\Oukuyun\Permission\Services\Admin\PermissionService::class);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Universal::permissionEnable()) {
            $this->PermissionService->checkPermission('Backend.admin.index');
        }
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
        if(Universal::permissionEnable()) {
            $this->PermissionService->checkPermission('Backend.admin.insert');
        }
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
        if(Universal::permissionEnable()) {
            $this->PermissionService->checkPermission('Backend.admin.insert');
        }
        $this->UsersService->store($request->all());
        if($request->ajax()) {
            return ApiResponse::json(["message"=>__('admin::Admin.success.insertSuccess')]);
        }else{
            return redirect()->route('Backend.admin.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Universal::permissionEnable()) {
            $this->PermissionService->checkPermission('Backend.admin.index');
        }
        if(request()->ajax()) {
            switch (request()->type) {
                case 'login_records':
                    return ApiResponse::json(["data"=>$this->UsersService->loginRecordList($id)]);
                    break;
            }
            return ApiResponse::json(["data"=>$this->UsersService->getUser($id) ]);
        }
        $user = $this->UsersService->getUser($id);
        $data['user']   =   $user;
        return view('admin::admin.detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Universal::permissionEnable()) {
            $this->PermissionService->checkPermission('Backend.admin.edit');
        }
        $data['detail'] = $this->UsersService->getUser($id);
        $this->form['action']   =   route('Backend.admin.update',['admin'=>$id]);
        $this->form['method']   =   "PUT";
        foreach($data['detail']->toArray() as $field => $detail) {
            if(isset($this->fields[$field])) {
                $this->fields[$field]['value']  =   $detail;
            }
        }
        $this->fields['email']['disabled'] = true;
        $this->fields['password']['required'] = false;
        unset($this->fields['password']['rules']['required']);
        $this->fields['password_confirmation']['required'] = false;
        unset($this->fields['password_confirmation']['rules']['required']);
        $data['form']   =   $this->form;
        \View::share('fields',$this->fields);
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
        if(Universal::permissionEnable()) {
            $this->PermissionService->checkPermission('Backend.admin.edit');
        }
        DB::beginTransaction();
        $this->UsersService->update($request->all(),$id);
        DB::commit();
        if($request->ajax()) {
            return ApiResponse::json(["message"=>__('admin::Admin.success.updateSuccess')]);
        }else{
            return redirect()->route('Backend.admin.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Universal::permissionEnable()) {
            $this->PermissionService->checkPermission('Backend.admin.delete');
        }
        $this->UsersService->delete($id);
        return ApiResponse::json(["message"=>__('admin::Admin.success.deleteSuccess')]);
    }
}
