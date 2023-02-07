<?php

namespace Oukuyun\Admin\Http\Requests\Universal;

use Illuminate\Foundation\Http\FormRequest;
use Oukuyun\Admin\Exceptions\Universal\ErrorException;
use Illuminate\Contracts\Validation\Validator;

class BasicFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator){
        $responseData = implode("<br>", $validator->messages()->all());
        throw new ErrorException(['data'=>$validator->errors()->toArray()],$responseData,422);
    }

    

    public function messages() {
        return trans('admin::validation');
    }
}
