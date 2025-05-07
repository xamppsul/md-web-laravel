<?php

namespace App\Modules\Authentication\handler;

use Illuminate\Contracts\View\View;
use App\Modules\Authentication\usecase\Usecase;
use App\Src\Constant\Authentication\ConstantAuth;
use App\Modules\Authentication\interfaces\Handler_intefaces;
use App\Src\Domain\User\AuthDomain;
use App\Src\Request\User\Auth\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Handler extends Usecase implements Handler_intefaces
{
    public function __construct(
        private ConstantAuth $constant,
        private Request $request,
        private AuthRequest $authRequest,
        private AuthDomain $authDomain,
    ) {}

    /**
     * ================================================================================================================================================================
     * feature: auth user
     * ================================================================================================================================================================
     */
    /**
     * @method viewUserLogin
     * @return View|RedirectResponse
     */
    public function viewUserLogin(): View|RedirectResponse
    {
        return !Auth::guard('user')->check() ? view('Modules.Users.Auth.login') : redirect()->route('user.view.dashboard')->with('error', 'Anda sudah login, silahkan logout terlebih dahulu!');
    }

    /**
     * @method userLogin
     */
    public function userLogin()
    {
        return $this->userLoginCase(
            //authentication request(login)
            $this->authRequest,
            //validate request login
            $this->request,
            $this->constant->rulesLogin(),
            $this->constant->rulesLoginMessage(),
            //domain auth
            $this->authDomain,
            //log insert
            $this->constant->NamingRoute($this->request),
            $this->constant->CurrentPath($this->request),
            //validate login attempt
            $this->constant->MESSAGE_ERROR_LOGIN_USERNAME_OR_EMAIL_AND_PASSWORD,
            $this->constant->SUCCESS_LOGIN_MESSAGE,
            //user session
            $this->constant->AuthUsersBySessions(),
        );
    }

    /**
     * @method userForgotPassword
     */
    public function userForgotPassword()
    {
        return $this->userForgotPasswordCase(
            //forgot password request
            $this->authRequest,
            //validate request forgot password
            $this->request,
            $this->constant->rulesForgotPassword(),
            $this->constant->rulesForgotPasswordMessage(),
            //token reset password
            $this->constant->TokenResetPassword(),
            //auth domain
            $this->authDomain,
        );
    }

    /**
     * @method userLogout
     */
    public function userLogout()
    {
        return $this->logoutCase(
            //log insert
            $this->constant->NamingRoute($this->request),
            $this->constant->CurrentPath($this->request),
            $this->constant->MESSAGE_LOGOUT_SUCCESS,
            $this->authDomain,
            $this->constant->AuthUsersBySessions(),
        );
    }
    /**
     * ================================================================================================================================================================
     * feature: auth admin
     * ================================================================================================================================================================
     */

    /**
     * @method viewAdminLogin
     * @return View
     */
    public function viewAdminLogin(): View
    {
        return view('Modules.Administrator.Auth.login');
    }

    /**
     * @method adminLogin
     */
    public function adminLogin()
    {
        return $this->adminLoginCase(
            //authentication request(admin login)
            $this->authRequest,
            //validate request
            $this->request,
            $this->constant->rulesLogin(),
            $this->constant->rulesLoginMessage(),
        );
    }
    /**
     * @method viewUserDashboard
     * @return View
     */
    public function viewUserDashboard(): View
    {
        return view('Modules.dashboard');
    }
}
