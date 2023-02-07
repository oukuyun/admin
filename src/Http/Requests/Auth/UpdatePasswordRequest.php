<?php

namespace Dinj\Admin\Http\Requests\Auth;

use Dinj\Admin\Http\Requests\Universal\BasicFormRequest;

class UpdatePasswordRequest extends BasicFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password'  =>  'required|string|between:6,20',
            'password'  =>  'required|string|between:6,20|confirmed',
        ];
    }

    public function attributes(){
        return [
            'old_password'  => "舊密碼",
            'password' => "新密碼",
            'password_confirmation'  => "確認密碼"
        ];
    }
}
