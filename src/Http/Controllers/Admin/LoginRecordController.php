<?php

namespace Oukuyun\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Oukuyun\Admin\Services\Admin\AuthenticationLogService;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;
use Oukuyun\Admin\Models\Admin\Users;

class LoginRecordController extends Controller
{
    protected $AuthenticationLogService;
    
    public function __construct()
    {
        $this->AuthenticationLogService = new AuthenticationLogService(Users::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->expectsJson()) {
            return ApiResponse::json(["data" => $this->AuthenticationLogService->index(array_filter($request->all()['form']??[]))->dataTables()]);
        }
        return view('admin::users.loginRecord');
    }
}
