<?php

namespace Oukuyun\Admin\Http\Requests\Media;

use Oukuyun\Admin\Http\Requests\Universal\BasicFormRequest;

class CkeditorUploadRequest extends BasicFormRequest
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
            'upload'      =>  'required|mimes:jpg,bmp,png,jpeg,gif,svg',
        ];
    }

    public function attributes(){
        return [
            'upload'      =>  __('admin::Admin.tempUpload.file'),
        ];
    }
}
