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
            return ApiResponse::json(["data" => $this->UsersService->index(array_filter($request->all()['form']??[],'strlen'))]);
        }
        return view('admin::users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['method'] = "POST";
        return view('admin::users.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->UsersService->createUser($request->all());
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
        return view('admin::users.form',$data);
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
