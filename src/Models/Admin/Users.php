<?php

namespace Oukuyun\Admin\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Oukuyun\Admin\Models\Universal\UserModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yadahan\AuthenticationLog\AuthenticationLogable;
use DB;

class Users extends UserModel
{
    use HasFactory, AuthenticationLogable, SoftDeletes;
    protected $table = "admin_users";
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    public function info() {
        return $this->hasMany(UsersInfo::class,'user_id','uuid')->where("key","!=","token");
    }

    public function lastLogin() {
        return $this->hasOne('Yadahan\AuthenticationLog\AuthenticationLog','authenticatable_id')->orderBy('login_at', 'desc')->select('authenticatable_id','login_at');
    }

    public function isSuperAdmin(){
        return $this->hasOne(UsersInfo::class,'user_id','uuid')->where("key","=","type")->first()->value==1;
    }

    /** 
     * @access protected
     * @var detail
     * @version 1.0
     * @author Henry
    **/
    protected $detail = ["name","email","id","status","created_at"];

    /**
     * 取得使用者資料
     * @param string $uuid
     * @return object
     * @version 1.0
     * @author Henry
     */
    public function getDetail(string $uuid) {
        return $this->select($this->detail)->with(["info" => function($query){
            $query->select(["key","value","user_id"]);
        }])->find($uuid);
    }
    
    /**
     * 列表SQL
     * @param  array $where
     * @return $query
     * @version 1.0
     * @author Henry
     */
    public function listQuery(array $where) {
        $query = $this->where($where)->select($this->detail)->with(["info" => function($query){
            $query->select(["key","value","user_id",DB::raw('value as type_name')]);
        },"lastLogin"]);
        return $query;
    }
}
