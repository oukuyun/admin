<?php

namespace Oukuyun\Admin\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yadahan\AuthenticationLog\AuthenticationLog as Log;
use DataTables;
use Illuminate\Support\Arr;

class AuthenticationLog extends Log
{
    use HasFactory;

    public function user() {
        return $this->hasOne('Dinj\Admin\Models\Admin\Users','uuid','authenticatable_id')->select('uuid','name','email');
    }

    /** 
     * @access protected
     * @var detail
     * @version 1.0
     * @author Henry
    **/
    protected $detail = ["ip_address","user_agent","login_at","authenticatable_id"];

    /**
     * 列表SQL
     * @param  array $where
     * @return $query
     * @version 1.0
     * @author Henry
     */
    public function listQuery(array $where) {
        $userWhere = Arr::only($where,['email','account']);
        $where = Arr::only($where,[]);
        $query = $this->where($where)->select($this->detail)->with(['user']);
        if($userWhere) {
            $query->whereHas('user', function ($query) use ($userWhere) {
                $query->where($userWhere);
            });
        }
        return $query;
    }
    
    /**
     * datatable 分頁
     * @return array
     */
    public function dataTables() {
        return DataTables::of($this)->make();
    }
    
    /**
     * 最新10筆資料
     * @return object
     */
    public function recentRecords() {
        return $this->orderby("id","desc")->limit(10);
    }
}
