<?php

namespace Oukuyun\Admin\Rules\Auth;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class OldPasswordRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Hash::check($value,auth()->user()->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('admin::Admin.error.oldPasswordError');
    }
}
