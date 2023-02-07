<?php

namespace Oukuyun\Admin\Http\Requests\Admin\Init;

use Oukuyun\Admin\Http\Requests\Universal\BasicFormRequest;

class InitRequest extends BasicFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'admin.email'       =>  'required|string|email|max:255|unique:admin_users,email',
            'admin.name'        =>  'required|string|between:1,20',
            'admin.password'    =>  'required|string|between:6,20|confirmed',
            'admin.password_confirmation'    =>  'required|string|between:6,20',
        ];
    }
    
    public function attributes(){
        return [
            'admin.name'    => "管理員名稱",
            'admin.email'       => "管理員帳號",
            'admin.password'    => "管理員密碼",
            'admin.password_confirmation'    => "確認密碼",
        ];
    }
}
