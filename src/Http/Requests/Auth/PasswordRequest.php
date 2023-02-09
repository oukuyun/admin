<?php

namespace Oukuyun\Admin\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'old_password'  =>  ['required','string','between:6,20',new \Oukuyun\Admin\Rules\Auth\OldPasswordRule],
            'password'  =>  'required|string|between:6,20|confirmed',
        ];
    }

    public function attributes(){
        return [
            'old_password'  => "旧密码",
            'password' => "新密码",
            'password_confirmation'  => "确认密码"
        ];
    }
}
