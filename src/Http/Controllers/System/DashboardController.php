<?php

namespace Oukuyun\Admin\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;
use Oukuyun\Admin\Services\System\RoutesService;
use Oukuyun\Admin\Services\Admin\AuthenticationLogService;
use Oukuyun\Admin\Services\Admin\AuditService;

class DashboardController extends Controller
{
    protected $RoutesService;
    protected $AuthenticationLogService;
    protected $AuditService;
    
    public function __construct(RoutesService $RoutesService,AuthenticationLogService $AuthenticationLogService,AuditService $AuditService)
    {
        $this->RoutesService = $RoutesService;
        $this->AuthenticationLogService = $AuthenticationLogService;
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
            return ApiResponse::json(["data" => [
                "routes" => $this->RoutesService->getMenu()->makeMenu(),
                "loginRecords" => $this->AuthenticationLogService->getRecentRecords(),
                "auditRecords" => $this->AuditService->getRecentRecords(),
            ]]);
        }
        return view("admin::system.dashboard");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
