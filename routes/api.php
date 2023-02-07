<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('DinjApi/v1')->middleware('dinjApi')->namespace('Dinj\Admin\Http\Controllers')->name('Dinj.')->group(function(){
    /* 初始化設定 */
    Route::apiResource('Init', 'System\InitController', ['only' => ['index','store']]);
    /*管理員登入驗證碼*/
    Route::apiResource('Captcha', 'Auth\CaptchaController', ['only' => ['index']]);
    /*管理員登入*/
    Route::apiResource('Login', 'Auth\LoginController', ['only' => ['store']]);

    Route::middleware(['admin.auth','admin.admin','admin.lockScreen'])->group(function () {
        
        /*後臺系統資料*/
        Route::apiResource('Dashboard', 'System\DashboardController', ['only' => ['index']]);
        /*管理員登出*/
        Route::apiResource('Logout', 'Auth\LogoutController', ['only' => ['index']]);
        /*畫面鎖定*/
        Route::apiResource('LockScreen', 'System\LockScreenController', ['only' => ['index','store','destroy']]);
        /*管理員修改密碼*/
        Route::apiResource('UpdatePassword', 'Auth\UpdatePasswordController', ['only' => ['store']]);

        Route::middleware(['admin.permission'])->group(function() {
            /*管理員列表*/
            Route::apiResource('Admin', 'Admin\UsersController', ['only' => ['index',"store","show","update","destroy"]]);
            /*登入記錄列表*/
            Route::apiResource('LoginRecord', 'Admin\LoginRecordController', ['only' => ['index']]);
            /*操作記錄列表*/
            Route::apiResource('OperateRecord', 'Admin\OperateRecordController', ['only' => ['index']]);
            /*管理員權限*/
            Route::apiResource('Permission', 'Permission\PermissionController', ['only' => ['index','show',"update"]]);
            /*系統設定*/
            Route::apiResource('SystemSettings', 'System\SettingsController', ['only' => ['index',"update"]]);
            /*SiteMap*/
            Route::apiResource('SiteMap', 'System\SiteMapController', ['only' => ['index',"update"]]);
        });
    });
});
