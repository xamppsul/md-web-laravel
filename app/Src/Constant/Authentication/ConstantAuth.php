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
            'email' => 'required|email',
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
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must be at most 20 characters',
        ];
    }
}
