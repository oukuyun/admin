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
            'admin.name'                    =>  __('admin::Admin.admin.name'),
            'admin.email'                   =>  __('admin::Admin.admin.email'),
            'admin.password'                =>  __('admin::Admin.admin.password'),
            'admin.password_confirmation'   =>  __('admin::Admin.admin.confirmPassword'),
        ];
    }
}
