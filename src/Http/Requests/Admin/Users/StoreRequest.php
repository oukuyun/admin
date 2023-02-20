<?php

namespace Oukuyun\Admin\Http\Requests\Admin\Users;

use Oukuyun\Admin\Http\Requests\Universal\BasicFormRequest;

class StoreRequest extends BasicFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     =>  'required|string|email|max:255|unique:admin_users,email',
            'name'      =>  'required|string|between:1,20',
            'password'  =>  'required|string|between:6,20|confirmed',
        ];
    }

    public function attributes(){
        return [
            'name'      =>  __('admin::Admin.admin.name'),
            'email'     =>  __('admin::Admin.admin.email'),
            'password'  =>  __('admin::Admin.admin.password'),
        ];
    }
}
