<?php

namespace Oukuyun\Admin\Services\Admin;

use Oukuyun\Admin\Models\Admin\Audit;
use Illuminate\Support\Arr;
use Oukuyun\Admin\Http\Responses\ApiResponse;
use Illuminate\Support\Facades\Hash;

/**
 * Class AuditService.
 */
class AuditService
{
    /** 
     * \App\Repositories\Admin\AuditRepository
     * @access protected
     * @var AuditRepository
     * @version 1.0
     * @author Henry
    **/
    protected $AuditRepository;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Audit $Audit)
    {
        $this->AuditRepository = $Audit;
    }

    /**
     * 使用者列表
     * @param array $data
     * @version 1.0
     * @author Henry
     * @return \DataTables
     */
    public function index($data) {
        $where = Arr::only($data,['email']);
        return $this->AuditRepository->listQuery($where);
    }

    /**
     * 取得近期登入紀錄
     * @return array
     */
    public function getRecentRecords(){
        return $this->AuditRepository->listQuery([])->recentRecords()->get();
    }
}