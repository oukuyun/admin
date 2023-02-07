<?php

namespace Dinj\Admin\Http\Requests\System;

use Dinj\Admin\Http\Requests\Universal\BasicFormRequest;

class SettingsRequest extends BasicFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $lang = \App::currentLocale();
        return [
            'type'  =>  ['required',"in:{$lang},system,service,social,seo"],
            'name'  =>  ['required'],
            'value' =>  ['required'],
        ];
    }

    public function attributes(){
        return [
            'type' => "系統分類",
            'name' => "設定名稱",
            'value'=> "設定值",
        ];
    }
}
