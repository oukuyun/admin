<?php

namespace Oukuyun\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Oukuyun\Admin\Services\Admin\AuditService;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;

class OperateRecordController extends Controller
{
    protected $AuditService;
    
    public function __construct(AuditService $AuditService)
    {
        $this->AuditService = $AuditService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->expectsJson()) {
            return ApiResponse::json(["data" => $this->AuditService->index(array_filter($request->all()['form']??[]))->dataTables()]);
        }
        return view('admin::users.operateRecord');
    }

}
