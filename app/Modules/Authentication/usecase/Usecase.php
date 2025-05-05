<?php

namespace App\Modules\Authentication\usecase;

use App\Modules\Authentication\interfaces\Usecase_intefaces;
use App\Modules\Authentication\services\Services;

class Usecase extends Services implements Usecase_intefaces
{
    /**
     * ================================================================================================================================================================
     * feature: auth user
     * ================================================================================================================================================================
     */
    public function userLoginCase(
        //authentication request(login)
        $authRequestLogin,
        //validate request login
        $request,
        array $rulesLogin,
        array $rulesLoginMessage,
    ): string {
        $authRequestLogin->loginRequest($request, $rulesLogin, $rulesLoginMessage);
        try {
            return $this->userLoginService();
        } catch (\Exception $e) {
            return redirect()->route('view.login')->with('error', $e->getMessage());
        }
    }

    public function userForgotPasswordCase(
        $authRequestForgotPassword,
        $request,
        array $rulesForgotPassword,
        array $rulesForgotPasswordMessage
    ): string {
        try {
            $authRequestForgotPassword->forgotPasswordRequest($request, $rulesForgotPassword, $rulesForgotPasswordMessage);
            return $this->userForgotPasswordService();
        } catch (\Exception $e) {
            return redirect()->route('view.forgot.password')->with('error', $e->getMessage());
        }
    }
    /**
     * ================================================================================================================================================================
     * feature: auth admin
     * ================================================================================================================================================================
     */
}
