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
    public function adminloginService(
        $request,
        string $messageErrorLoginUsernameOrEmail,
        string $successLoginMessage,
        //auth domain
        $authDomain,
        //log insert
        string $route,
        string $path,
    ): RedirectResponse;
    public function userLogoutService(string $messageSuccessLogout): RedirectResponse;
    public function adminLogoutService(string $messageSuccessLogout): RedirectResponse;
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

    public function viewUserDashboardServices($authDomain, int $users_id): array;
    public function updateOrCreateUserProfileServices($authDomain, $request, int $users_id): mixed;
}
