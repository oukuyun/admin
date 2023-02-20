<?php

namespace Oukuyun\Admin\Http\Requests\Auth;

use Oukuyun\Admin\Http\Requests\Universal\BasicFormRequest;
use Illuminate\Http\Request;

class LoginRequest extends BasicFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     =>  ['required','string','email','max:50','exists:admin_users,email'],
            'password'  =>  ['required','string','between:6,12'],
            'captcha'   =>  ['required','captcha'],
        ];
    }

    public function attributes(){
        return [
            'email'     =>  __('admin::Admin.admin.email'),
            'password'  =>  __('admin::Admin.admin.password'),
            'captcha'   =>  __('admin::Admin.admin.captcha'),
        ];
    }
}
