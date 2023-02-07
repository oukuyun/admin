<?php

namespace Oukuyun\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Oukuyun\Admin\Http\Requests\Auth\Admin\UpdatePasswordRequest;
use Oukuyun\Admin\Services\Admin\UsersService;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;
use Auth;

class UpdatePasswordController extends Controller
{
    protected $UsersService;
    
    public function __construct(UsersService $UsersService)
    {
        $this->UsersService = $UsersService;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(UpdatePasswordRequest $request)
    {
        $this->UsersService->updateUserPassword($request->all(),Auth::user()->uuid);
        return ApiResponse::json(["message"=>"更新成功"]);
    }
}
