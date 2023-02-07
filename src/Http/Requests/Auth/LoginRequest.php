<?php

namespace Dinj\Admin\Http\Requests\Auth;

use Dinj\Admin\Http\Requests\Universal\BasicFormRequest;
use Illuminate\Http\Request;

class LoginRequest extends BasicFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $form = [
            'email'  =>  ['required','string','email','max:50','exists:admin_users,email'],
            'password'  =>  ['required','string','between:6,12'],
            
        ];
        if(env("AUTH_MODE") == "jwt") {
            if(!Request::input('a')){
                $form['captcha'] = ['required','captcha_api:'.Request::input('captcha_key')];
                $form['captcha_key'] = ['required','string'];
            }
        }else{
            $form['captcha']    =   ['required','captcha'];
        }
        
        return $form;
    }

    public function attributes(){
        return [
            'email' => "帳號",
            'captcha'   =>  "驗證碼",
        ];
    }
}
