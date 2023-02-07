<?php

namespace Oukuyun\Admin\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Models\Audit as Log;
use Illuminate\Support\Facades\Lang;
use DataTables;
use Illuminate\Support\Arr;

class Audit extends Log
{
    use HasFactory;

    public function user() {
        return $this->hasOne('Dinj\Admin\Models\Admin\Users','uuid','user_id')->select('uuid','name','email');
    }
    
    public function getEventAttribute($value) {
        $name = "admin::audit.$value";
        return Lang::has($name)?trans($name):$value;
    }

    public function getAuditableTypeAttribute($value) {
        $name = "admin::audit.$value";
        return Lang::has($name)?trans($name):$value;
    }

    /** 
     * @access protected
     * @var detail
     * @version 1.0
     * @author Henry
    **/
    protected $detail = ['user_id','event','created_at','auditable_id','auditable_type','ip_address'];

    /** 
     * @access protected
     * @var user_type
     * @version 1.0
     * @author Henry
    **/
    protected $user_type = "Dinj\Admin\Models\Admin\Users";

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Audit $Audit) {
        
    }

    /**
     * 列表SQL
     * @param  array $where
     * @return $query
     * @version 1.0
     * @author Henry
     */
    public function listQuery(array $where) {
        $userWhere = Arr::only($where,['email']);
        $where = Arr::only($where,[]);
        $query = $this->where(['user_type' => $this->user_type])->where($where)->select($this->detail)->with(['user']);
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
        return DataTables::of($this->getEntity())->make();
    }

    /**
     * 最新10筆資料
     * @return object
     */
    public function recentRecords() {
        return $this->orderby("created_at","desc")->limit(10);
    }
}
