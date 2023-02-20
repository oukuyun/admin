<?php

namespace Oukuyun\Admin\Http\Requests\Admin\Users;

use Oukuyun\Admin\Http\Requests\Universal\BasicFormRequest;

class UpdateRequest extends BasicFormRequest
{
    protected $updateData = [
        'name'      =>  'required|string|between:1,20',
        'password'  =>  'nullable|string|between:6,20|confirmed',
    ];

    protected $updateStatus = [
        'status'    =>  'required|in:1,0',
    ];
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
        return (Request("action")=="status")?$this->updateStatus:$this->updateData;
    }

    public function attributes(){
        return [
            'name'      =>  __('admin::Admin.admin.name'),
            'email'     =>  __('admin::Admin.admin.email'),
            'password'  =>  __('admin::Admin.admin.password'),
        ];
    }
}
