<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Contracts\View\View;
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
    public function viewUserResetPasswordService(
        string  $token,
        string  $errorMessageResetPassword,
        //domain
        $authDomain,
    ): View|RedirectResponse;
    public function userResetPasswordService(
        $request,
        //domain
        $authDomain,
    ): void;
}
