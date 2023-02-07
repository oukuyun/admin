<?php

namespace Oukuyun\Admin\Services\System;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Oukuyun\Admin\Exceptions\Universal\ErrorException;

/**
 * Class LockScreenService.
 */
class LockScreenService
{
    protected $Request;

    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct(Request $Request)
    {
        $this->Request = $Request;
    }

    public function lock() {
        return $this->Request->session()->put('lockScreen', 1);
    }

    public function unlock(string $password) {
        if(Hash::check($password,Auth::user()->password)) {
            $this->removeLock();
            return true;
        }
        throw new ErrorException([],"密碼錯誤",422);
    }

    public function check() {
        return ($this->Request->session()->has('lockScreen') && $this->Request->session()->get('lockScreen'));
    }

    public function removeLock() {
        $this->Request->session()->pull('lockScreen', 0);
    }

}