<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Http\RedirectResponse;

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
        //user session
        $userSession,

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
        string $route,
        string $path,
    ): RedirectResponse;

    public function adminLoginCase(
        //authentication request(admin login)
        $authRequestLogin,
        //validate request
        $request,
        array    $rulesLogin,
        array    $rulesLoginMessage,
    ): RedirectResponse;

    public function logoutCase(
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
}
