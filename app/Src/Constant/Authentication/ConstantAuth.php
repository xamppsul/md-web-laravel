<?php

namespace App\Src\Constant\Authentication;

class ConstantAuth
{

    /**
     * @method rulesLogin
     * @return array
     */

    public function rulesLogin(): array
    {
        return [
            'umail' => 'required|string|min:6',
            'password' => 'required|min:6|max:20',
        ];
    }

    /**
     * @method rulesLoginMessage
     * @return array
     */
    public function rulesLoginMessage(): array
    {
        return [
            'umail.required' => 'username or email is required',
            'umail.min' => 'username or email must be at least 6 characters',
            'umail.string' => 'Would be string',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must be at most 20 characters',
        ];
    }

    /**
     * @method rulesForgotPassword
     * @return array
     */

    public function rulesForgotPassword(): array
    {
        return [
            'email' => 'required|email',
        ];
    }

    /**
     * @method rulesForgotPasswordMessage
     * @return array
     */

    public function rulesForgotPasswordMessage(): array
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
        ];
    }
}
