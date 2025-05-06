<?php

namespace App\Modules\Authentication\services;

use App\Modules\Authentication\interfaces\Services_interfaces;
use App\Modules\Authentication\repository\Repository;
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
    ): RedirectResponse {
        if (!$this->ValidateLoginByExistingEmailOrUsernameRepository($this->SetRequestLoginByUsernameOrEmailAndPasswordRepository($request))) {
            return redirect()->route('user.view.login')->with('error', $messageErrorLoginUsernameOrEmail);
        }

        $this->GenerateSessionLoginRepository($this->SetRequestLoginByUsernameOrEmailAndPasswordRepository($request));
        return $this->RedirectLoginSuccessRepository($successLoginMessage);
    }
    /**
     * @method userForgotPasswordService
     * @return RedirectResponse
     */

    public function userForgotPasswordService(): RedirectResponse
    {
        return redirect()->route('user.view.login')->with('success', 'forgot password success');
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
