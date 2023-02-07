<?php

namespace Dinj\Admin\Http\Requests\Admin\Users;

use Dinj\Admin\Http\Requests\Universal\BasicFormRequest;

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
            'type'      =>  'required|in:1,2,3',
            // 'permissions' => 'nullable|array'
        ];
    }

    public function attributes(){
        return [
            'name'  => "管理員名稱",
            'email' => "帳號",
            'type'  => "管理權限"
        ];
    }
}
