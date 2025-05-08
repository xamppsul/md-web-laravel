<?php

namespace App\Modules\Authentication\services;

use App\Modules\Authentication\interfaces\Services_interfaces;
use App\Modules\Authentication\repository\Repository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class Services extends Repository implements Services_interfaces
{
    /**
     * ================================================================================================================================================================
     * feature: auth user
     * ================================================================================================================================================================
     */

    /**
     * @method userLoginService
     * @return RedirectResponse
     */
    public function userLoginService(
        $request,
        string $messageErrorLoginUsernameOrEmail,
        string $successLoginMessage,
        //auth domain
        $authDomain,
        //log insert
        string $route,
        string $path,
    ): RedirectResponse {
        if (!$this->ValidateLoginByExistingEmailOrUsernameRepository($this->SetRequestLoginByUsernameOrEmailAndPasswordRepository($request))) {
            return redirect()->route('user.view.login')->with('error', $messageErrorLoginUsernameOrEmail);
        }

        $userSession = $this->GenerateSessionLoginRepository($this->SetRequestLoginByUsernameOrEmailAndPasswordRepository($request));
        $authDomain->DomainLogInsert($successLoginMessage . " ID: {$userSession->id}, Username {$userSession->username}", $route, $path, 'success');
        return $this->RedirectLoginSuccessRepository($successLoginMessage);
    }
    /**
     * @method userForgotPasswordService
     * @return RedirectResponse
     */

    public function userForgotPasswordService(
        string  $email,
        string  $tokenResetPassword,
        //auth domain
        $authDomain,
    ): void {
        $url = $this->UrlTokenResetPasswordRepository($tokenResetPassword);
        $this->InsertForgotPasswordRepository($email, $url, $tokenResetPassword, $authDomain);
        $this->SendEmailForgotPasswordRepository($email, $url);
    }

    public function viewUserResetPasswordService(
        string $token,
        string $errorMessageResetPassword,
        //domain
        $authDomain,
    ): View|RedirectResponse {
        $token = $this->ValidateTokensResetPasswordRepository($token, $authDomain);
        if (empty($token)) {
            return redirect()->route('user.view.login')->with('error', $errorMessageResetPassword);
        }

        return view('Modules.Users.Auth.reset_password', [
            'email' => $token[0]->email,
            'token' => $token[0]->token,
        ]);
    }

    /**
     * @method LogoutService
     * @return RedirectResponse
     */
    public function LogoutService(string $messageSuccessLogout): RedirectResponse
    {
        $this->UserLoggoutSessionRepository();
        return $this->RedirectLogoutSuccessRepository($messageSuccessLogout);
    }

    /**
     * ================================================================================================================================================================
     * feature: auth admin
     * ================================================================================================================================================================
     */
    /**
     * @method adminLoginService
     * @return RedirectResponse
     */
    public function adminloginService(): RedirectResponse
    {
        return redirect()->route('admin.view.login')->with('success', 'login success');
    }
}
