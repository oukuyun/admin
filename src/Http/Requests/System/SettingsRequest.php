<?php

namespace Oukuyun\Admin\Http\Requests\System;

use Oukuyun\Admin\Http\Requests\Universal\BasicFormRequest;

class SettingsRequest extends BasicFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lang'  =>  ['required',"exists:languages,code"],
        ];
    }

    public function attributes(){
        return [
            'lang' => __('admin::Admin.settings.lang'),
        ];
    }
}
