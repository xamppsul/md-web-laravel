<?php

namespace App\Src\Request\User\Auth;

use Illuminate\Http\Request;

class AuthRequest
{
    /**
     * @method loginRequest
     * @param $request
     * @param $rulesLogin
     * @param $rulesLoginMessage
     * @return array
     */
    public function loginRequest(
        Request $request,
        array $rulesLogin,
        array $rulesLoginMessage
    ): array {
        return $request->validate($rulesLogin, $rulesLoginMessage);
    }

    /**
     * @method forgotPasswordRequest
     * @param $request
     * @param $rulesForgotPassword
     * @param $rulesForgotPasswordMessage
     * @return array
     */

    public function forgotPasswordRequest(
        Request $request,
        array $rulesForgotPassword,
        array $rulesForgotPasswordMessage
    ): array {
        return $request->validate($rulesForgotPassword, $rulesForgotPasswordMessage);
    }

    /**
     * @method resetPasswordRequest
     * @param $request
     * @param $rulesResetPassword
     * @param $rulesResetPasswordMessage
     * @return array
     */

    public function resetPasswordRequest(
        Request $request,
        array $rulesResetPassword,
        array $rulesResetPasswordMessage,
    ): array {
        return $request->validate($rulesResetPassword, $rulesResetPasswordMessage);
    }

    /**
     * @method profileRequest
     * @param $request
     * @param $rulesProfile
     * @param $rulesProfileMessage
     * @return array
     */

    public function profileRequest(
        Request $request,
        array $rulesProfile,
        array $rulesProfileMessage,
    ): array {
        return $request->validate($rulesProfile, $rulesProfileMessage);
    }
}
