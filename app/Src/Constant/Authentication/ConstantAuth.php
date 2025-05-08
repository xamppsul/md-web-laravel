<?php

namespace App\Src\Constant\Authentication;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
            'password' => 'required|min:6',
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
        ];
    }

    /**
     * @method rulesForgotPassword
     * @return array
     */

    public function rulesForgotPassword(): array
    {
        return [
            'email' => 'required|email|min:6|exists:users,email',
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
            'email.min' => 'Email must be at least 6 characters',
            'email.exists' => 'Email not registered',
        ];
    }

    /**
     * @method NamingRoute
     * @return string
     */

    public function NamingRoute($request): string
    {
        return $request->route()->getName();
    }

    /**
     * @method CurrentPath
     * @return string
     */

    public function CurrentPath($request): string
    {
        return $request->path();
    }

    /**
     * @var string $SUCCESS_LOGIN_MESSAGE
     * @return string
     */
    public string $SUCCESS_LOGIN_MESSAGE = 'Berhasil Login, Selamat datang di halaman dashboard';

    /**
     * @var string $MESSAGE_ERROR_LOGIN_USERNAME_OR_EMAIL
     * @return string
     */

    public string $MESSAGE_ERROR_LOGIN_USERNAME_OR_EMAIL_AND_PASSWORD = 'Gagal login, email atau username dan password salah';

    /**
     * @var string $MESSAGE_LOGOUT_SUCCESS
     * @return string
     */
    public string $MESSAGE_LOGOUT_SUCCESS = 'Berhasil Logout, silahkan login kembali jika ingin masuk';


    /**
     * @method AuthUsersBySessions
     */
    public function AuthUsersBySessions()
    {
        return Auth::guard('user')->user();
    }

    /**
     * @method TokenResetPassword
     * @return string
     */

    public function TokenResetPassword(): string
    {
        return Str::random(30);
    }


    /**
     * @var string $MESSAGE_RESET_PASSWORD_FAILED
     * @return string
     */

    public string $MESSAGE_RESET_PASSWORD_FAILED = 'Gagal Reset Password, token tidak valid atau sudah kadaluarsa';
}
