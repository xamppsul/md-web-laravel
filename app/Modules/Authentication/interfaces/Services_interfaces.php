<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Http\RedirectResponse;

interface Services_interfaces
{

    public function userLoginService(
        $request,
        string  $messageErrorLoginUsernameOrEmail,
        string  $successLoginMessage,
        //auth domain
        $authDomain,
        //log insert
        string  $route,
        string  $path,
    ): RedirectResponse;
    public function userForgotPasswordService(
        string  $email,
        string  $tokenResetPassword,
        //auth domain
        $authDomain,
    ): void;
    public function adminloginService(): RedirectResponse;
    public function LogoutService(string $messageSuccessLogout): RedirectResponse;
}
