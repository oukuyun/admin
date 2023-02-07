<?php

namespace Oukuyun\Admin\Services\Admin;

use Oukuyun\Admin\Models\Admin\AuthenticationLog;
use Illuminate\Support\Arr;
use Oukuyun\Admin\Http\Responses\ApiResponse;
use Illuminate\Support\Facades\Hash;
use Oukuyun\Admin\Models\Admin\Users;

/**
 * Class AuthenticationLogService.
 */
class AuthenticationLogService
{
    /** 
     * \App\Repositories\Admin\AuthenticationLogRepository
     * @access protected
     * @var AuthenticationLogRepository
     * @version 1.0
     * @author Henry
    **/
    protected $AuthenticationLogRepository;
    protected $auth;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct( Users $Users,AuthenticationLog $AuthenticationLog)
    {
        $this->AuthenticationLogRepository = $AuthenticationLog;
        $this->auth = $Users;
    }

    /**
     * 使用者列表
     * @param array $data
     * @version 1.0
     * @author Henry
     * @return \DataTables
     */
    public function index($data) {
        $where = Arr::only($data,['email','account']);
        return $this->AuthenticationLogRepository->where('authenticatable_type',$this->auth)->listQuery($where);
    }
    
    /**
     * 取得近期登入紀錄
     * @return array
     */
    public function getRecentRecords(){
        return $this->AuthenticationLogRepository->where('authenticatable_type',$this->auth)->listQuery([])->recentRecords()->get();
    }
}