<?php

namespace Oukuyun\Admin\Http\Requests\Media;

use Oukuyun\Admin\Http\Requests\Universal\BasicFormRequest;

class UploadRequest extends BasicFormRequest
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
            'file'      =>  'required|mimes:jpg,bmp,png,pdf,csv,xlsx,jpeg,gif',
        ];
    }

    public function attributes(){
        return [
            'file'      =>  __('admin::Admin.tempUpload.file'),
        ];
    }
}
