<?php

namespace Oukuyun\Admin\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;
    protected $table = "routes";

    /**
     * 取得後台路由選單
     * @return array $data
     * @author Henry
    **/
    public function getRoutes() {
        return $this->where(['status' => 1])->select($this->detail)->orderby('parent_id')->orderby('seq')->get();
    }

    /** 
     * @access protected
     * @var detail
     * @version 1.0
     * @author Henry
    **/
    protected $detail = ["apilink","link","icon","parent_id","id",'name'];

    /**
     * 取得所有路由名稱
     * @return array
     */
    public function getAllRoutesName() {
        return collect(\Route::getRoutes()->getRoutesByName())->mapToGroups(function($item,$key){
            $route  =   explode(".", $key);
                return [$route[0]=>$key];    
        })->toArray();;
    }
}
