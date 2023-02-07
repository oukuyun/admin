<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['admin.init','admin'])->prefix('backend')->name('Backend.')->namespace('Oukuyun\Admin\Http\Controllers')->group(function(){
    /* 初始化設定 */
    Route::resource('Init', 'System\InitController');
	/*管理員登入*/
    Route::resource('Login', 'Auth\LoginController');

    // Route::middleware(['admin.auth','admin.admin','admin.lockScreen'])->group(function () {
    //     /* 儀錶板 */
    //     Route::get('/', ['as' => 'dashboard', 'uses' => 'System\DashboardController@index']);
    //     Route::resource('Dashboard', 'System\DashboardController');
    //     Route::middleware(['admin.permission'])->group(function() {
    //         /* 管理人員列表 */
    //         Route::resource('Users', 'Admin\UsersController');
    //         /* 管理人員登入紀錄 */
    //         Route::resource('LoginRecord', 'Admin\LoginRecordController', ['only' => ['show', 'index']]);
    //         /* 管理人員操作紀錄 */
    //         Route::resource('OperateRecord', 'Admin\OperateRecordController', ['only' => ['show', 'index']]);
    //         /* 管理人員螢幕鎖定 */
    //         Route::resource('LockScreen', 'System\LockScreenController', ['only' => ['index']]);
    //         /* 管理人員螢幕鎖定 */
    //         Route::resource('SystemSettings', 'System\SettingsController', ['only' => ['index']]);
    //     });
    // });
});

