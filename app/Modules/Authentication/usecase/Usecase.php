<?php

namespace App\Modules\Authentication\usecase;

use Illuminate\Http\RedirectResponse;
use App\Modules\Authentication\services\Services;
use App\Modules\Authentication\interfaces\Usecase_intefaces;

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
    ): RedirectResponse {
        $authRequestLogin->loginRequest($request, $rulesLogin, $rulesLoginMessage);
        try {
            return $this->userLoginService();
        } catch (\Exception $e) {
            return redirect()->route('user.view.login')->with('error', $e->getMessage());
        }
    }

    public function userForgotPasswordCase(
        //authentication forgot password
        $authRequestForgotPassword,
        //validate request forgot password
        $request,
        array $rulesForgotPassword,
        array $rulesForgotPasswordMessage
    ): RedirectResponse {
        $authRequestForgotPassword->forgotPasswordRequest($request, $rulesForgotPassword, $rulesForgotPasswordMessage);
        try {
            return $this->userForgotPasswordService();
        } catch (\Exception $e) {
            return redirect()->route('user.view.login')->with('error', $e->getMessage());
        }
    }
    /**
     * ================================================================================================================================================================
     * feature: auth admin
     * ================================================================================================================================================================
     */

    public function adminLoginCase(
        //authentication request(admin login)
        $authRequestLogin,
        //validate request
        $request,
        array $rulesLogin,
        array $rulesLoginMessage
    ): RedirectResponse {
        $authRequestLogin->loginRequest($request, $rulesLogin, $rulesLoginMessage);
        try {
            return $this->adminloginService();
        } catch (\Exception $e) {
            return redirect()->route('admin.view.login')->with('error', $e->getMessage());
        }
    }
}
