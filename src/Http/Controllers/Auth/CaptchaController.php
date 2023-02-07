<?php

namespace Oukuyun\Admin\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Oukuyun\Admin\Http\Responses\Universal\ApiResponse;

class CaptchaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(config('admin.authMode') == "session") {
            return app('captcha')->create('default');
        }
        return ApiResponse::json(["data" => app('captcha')->create('default', true)]);
    }
}
