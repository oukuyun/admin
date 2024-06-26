<?php

namespace Oukuyun\Admin\Services\Admin;

use Oukuyun\Admin\Models\Admin\Users;
use Oukuyun\Admin\Models\Admin\UsersInfo;
use Illuminate\Support\Arr;
use Oukuyun\Admin\Exceptions\Universal\ErrorException;
use Illuminate\Support\Facades\Hash;
use Yadahan\AuthenticationLog\AuthenticationLog;
use Illuminate\Support\Carbon;
use Auth;
use DataTables;
use Oukuyun\Admin\Events\Auth\Login;

/**
 * Class UsersService.
 */
class UsersService
{
    /** 
     * \App\Repositories\Admin\UsersRepository
     * @access protected
     * @var UsersRepository
     * @version 1.0
     * @author Henry
    **/
    protected $UsersRepository;

    /** 
     * \App\Repositories\Admin\UsersInfoRepository
     * @access protected
     * @var UsersInfoRepository
     * @version 1.0
     * @author Henry
    **/
    protected $UsersInfoRepository;
    
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Users $Users, UsersInfo $UsersInfo) {
        $this->UsersRepository = $Users;
        $this->UsersInfoRepository = $UsersInfo;
    }

    /**
     * 使用者列表
     * @param array $data
     * @version 1.0
     * @author Henry
     * @return \DataTables
     */
    public function index($data) {
        $where = Arr::only($data,["name","email","status"]);
        return DataTables::of($this->UsersRepository->listQuery($where))->make();
    }

    /**
     * 使用者登入记录列表
     * @param array $data
     * @version 1.0
     * @author Henry
     * @return \DataTables
     */
    public function loginRecordList($id) {
        $user = $this->getUser($id);
        return DataTables::of($user->authentications())->make();
    }

    /**
     * 取得單一使用者資料
     * @param string $uuid
     * @return object
     * @version 1.0
     * @author Henry
     */
    public function getUser(string $uuid) {
        return $this->UsersRepository->getDetail($uuid);
    }

    /**
     * 建立使用者
     * @param array $data
     * @return object $user
     * @throws \App\Exceptions\Universal\ErrorException
     * @version 1.0
     * @author Henry
     */
    public function store(array $data) {
        $createData = Arr::only($data,["name",'email','password']);
        $createData['password'] = $this->MakePassword($createData['password']);
        $createData['status'] = 1;
        $user     =   $this->UsersRepository->create($createData);
        if(!$user){
            throw new ErrorException(['data' => ['error' => __('admin::Admin.error.insertFail')]],__('admin::Admin.error.insertFail'),500);
        }
        $result = $this->updateInfo($user, $data);
        if(!$result){
            throw new ErrorException(['data' => ['error' => __('admin::Admin.error.insertFail')]],__('admin::Admin.error.insertFail'),500);
        }
        return $user;
    }

    /**
     * 更新使用者資料
     * @param array $data
     * @param string $uuid
     * @return object $user
     * @throws \App\Exceptions\Universal\ErrorException
     * @version 1.0
     * @author Henry
     */
    public function update(array $data, string $uuid) {
        $updateData = array_filter(Arr::only($data,["name",'password','status']),'strlen');
        if(isset($data['password']) && $data['password']){
            $updateData['password'] =   $this->MakePassword($data['password']);
        }
        $model =  $this->UsersRepository->find($uuid);
        $user = $model->update($updateData);
        if(!$user){
            throw new ErrorException(['data' => ['error' => __('admin::Admin.error.updateFail')]],__('admin::Admin.error.updateFail'),500);
        }
        $result = $this->updateInfo($model, $data);
        if(!$result){
            throw new ErrorException(['data' => ['error' => __('admin::Admin.error.updateFail')]],__('admin::Admin.error.updateFail'),500);
        }
        return $user;
    }

    /**
     * 刪除使用者
     * @param string $uuid
     * @return object $user
     * @throws \App\Exceptions\Universal\ErrorException
     * @version 1.0
     * @author Henry
     */
    public function delete(string $uuid) {
        $user = $this->UsersRepository->find($uuid)->delete();
        if(!$user){
            throw new ErrorException(['data' => ['error' => __('admin::Admin.error.deleteFail')]],__('admin::Admin.error.deleteFail'),500);
        }
        return $user;
    }

    /**
     * 密碼加密
     * @param string $password
     * @return string 
     * @version 1.0
     * @author Henry
     */    
    public function MakePassword(String $password) {
        return Hash::make($password);
    }
    
    /**
     * 使用者登入
     * @param  array $request
     * @param  string $ip
     * @param  string $userAgent
     * @return array
     */
    public function login(array $request,string $ip,string $userAgent) {
        $credentials = Arr::only($request,["email","password"]);
        if (! $token = auth()->attempt(array_merge($credentials,['status' => 1]))) {
            throw new ErrorException(['data'=>['error'=>__('admin::Admin.error.accountOrPasswordError')]],__('admin::Admin.error.accountOrPasswordError'),401);
        }
        if(env("ADMIN_MUTIPLE_LOGIN",false)) {
            Auth::logoutOtherDevices($credentials['password']);
        }
        
        return [
            'user' => [
                'id' => Auth::user()->id,
                'email' => Auth::user()->email,
                'name' =>  Auth::user()->name
            ]
        ];
    }
    
    /**
     * 使用者登出
     *
     * @param  string $ip
     * @param  string $userAgent
     * @return void
     */
    public function logout(string $ip,string $userAgent) {
        $user_id    =   auth()->user()->id;
        auth()->logout();
        // if(!$result){
        //     throw new ErrorException(['data'=>['error'=>__('admin::Admin.error.serverError')]],__('admin::Admin.error.serverError'),500);
        // }
    }
    
    /**
     * 建立更新使用者資訊
     * @param  mixed $user
     * @param  mixed $data
     * @return boolean
     */
    public function updateInfo($user, array $data) {
        $info = ["type"];
        foreach(Arr::only($data,$info) as $key => $value){
            $result = $user->info()->updateOrCreate(["key" => $key],["value" => $value]);
            if(!$result) {
                return false;
            }
        }
        return true;
    }
    
    /**
     * 變更密碼
     *
     * @param  mixed $data
     * @param  mixed $id
     * @return void
     */
    public function updatePassword(array $data, string $id) {
        $updateData = Arr::only($data,['password']);
        $user = $this->UsersRepository->find($id);
        if(!Hash::check($data['old_password'],$user->password)) {
            throw new ErrorException(['data'=>['error'=>__('admin::Admin.error.oldPasswordError')]],__('admin::Admin.error.oldPasswordError'),422);
        }
        if(isset($data['password']) && $data['password']){
            $updateData['password'] =   $this->MakePassword($data['password']);
        }
        $result =  $user->update($updateData);
        if(!$result){
            throw new ErrorException(['data' => ['error' => __('admin::Admin.error.updateFail')]],__('admin::Admin.error.updateFail'),500);
        }
    }

}