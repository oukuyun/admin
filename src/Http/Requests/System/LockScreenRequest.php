<?php

namespace Dinj\Admin\Http\Requests\System;

use Dinj\Admin\Http\Requests\Universal\BasicFormRequest;

class LockScreenRequest extends BasicFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password'  =>  ['required','string','between:6,20'],
        ];
    }

    public function attributes(){
        return [
            'email' => "帳號",
        ];
    }
}
