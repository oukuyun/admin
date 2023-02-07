<?php

namespace Dinj\Admin\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Dinj\Admin\Services\System\SiteMapService;
use Illuminate\Http\Request;
use Dinj\Admin\Http\Responses\Universal\ApiResponse;
use Dinj\Admin\Jobs\System\SiteMapJob;

class SiteMapController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        SiteMapJob::dispatch();
        return ApiResponse::json([
            "message" => "更新成功"
        ]);
    }

}
