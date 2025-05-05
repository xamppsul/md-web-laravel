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
        array $rulesLogin,
        array $rulesLoginMessage,
    ): string;

    public function userForgotPasswordCase(
        //authentication request(forgot password)
        $authRequestForgotPassword,
        //validate request
        $request,
        array $rulesForgotPassword,
        array $rulesForgotPasswordMessage,
    ): string;

    public function adminLoginCase(
        //authentication request(admin login)
        $authRequestLogin,
        //validate request
        $request,
        array $rulesLogin,
        array $rulesLoginMessage,
    ): string;
}
