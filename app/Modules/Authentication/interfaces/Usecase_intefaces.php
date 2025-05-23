<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Throwable;

interface Usecase_intefaces
{
    public function userLoginCase(
        //authentication request(user login)
        $authRequestLogin,
        //validate request
        $request,
        array   $rulesLogin,
        array   $rulesLoginMessage,
        //domain
        $authDomain,
        //log insert
        string  $route,
        string  $path,
        //validate login attempt
        string  $messageErrorLoginUsernameOrEmail,
        string  $successLoginMessage,

    ): RedirectResponse;

    public function userForgotPasswordCase(
        //authentication request(forgot password)
        $authRequestForgotPassword,
        //validate request
        $request,
        array    $rulesForgotPassword,
        array    $rulesForgotPasswordMessage,
        //token reset password
        string   $tokenResetPassword,
        //auth domain
        $authDomain,
        //log insert
        string   $route,
        string   $path,
    ): RedirectResponse;

    public function adminLoginCase(
        //authentication request(login)
        $authRequestLogin,
        //validate request login
        $request,
        array $rulesLogin,
        array $rulesLoginMessage,
        //domain
        $authDomain,
        //log insert
        string $route,
        string $path,
        //validate login attempt
        string $messageErrorLoginUsernameOrEmail,
        string $successLoginMessage,
    ): RedirectResponse;

    public function userLogoutCase(
        //log insert
        string    $route,
        string    $path,
        //do logout
        string    $logoutMessageSuccess,
        //domain
        $authDomain,
        //user session
        $userSession,
    ): RedirectResponse;

    public function adminLogoutCase(
        //log insert
        string    $route,
        string    $path,
        //do logout
        string    $logoutMessageSuccess,
        //domain
        $authDomain,
        //user session
        $adminSession,
    ): RedirectResponse;

    public function viewUserResetPasswordCase(
        string    $token,
        string    $errorMessageResetPassword,
        //domain
        $authDomain,
        //log insert
        string   $route,
        string   $path,
    ): View|RedirectResponse;

    public function userResetPasswordCase(
        //authentication request(user login)
        $authRequestLogin,
        //request
        $request,
        array $rulesResetPassword,
        array $rulesResetPasswordMessage,
        //log insert
        string    $route,
        string    $path,
        //message reset password success
        string    $successResetPasswordMessage,
        //domain
        $authDomain,
    ): RedirectResponse;

    //dashboard view
    public function viewUserDashboardCase($authDomain): View|Throwable;

    public function updateOrCreateUserProfileCase(
        //auth request profile
        $authRequestLogin,
        //validate request profile
        $request,
        array $rulesProfile,
        array $rulesProfileMessage,
        //domain
        $authDomain
    ): RedirectResponse|Throwable;
}
