<?php

namespace App\Modules\Authentication\handler;

use Illuminate\Contracts\View\View;
use App\Modules\Authentication\usecase\Usecase;
use App\Src\Constant\Authentication\AuthConstant;
use App\Modules\Authentication\interfaces\Handler_interfaces;
use App\Src\Domain\User\AuthDomain;
use App\Src\Request\User\Auth\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class Handler extends Usecase implements Handler_interfaces
{
    public function __construct(
        private AuthConstant $constant,
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
            //log insert
            $this->constant->NamingRoute($this->request),
            $this->constant->CurrentPath($this->request),
        );
    }

    /**
     * @method userResetPassword
     * @return View|RedirectResponse
     */
    public function viewUserResetPassword(string $token): View|RedirectResponse
    {
        return $this->viewUserResetPasswordCase(
            $token,
            $this->constant->MESSAGE_RESET_PASSWORD_FAILED,
            //domain
            $this->authDomain,
            //log insert
            $this->constant->NamingRoute($this->request),
            $this->constant->CurrentPath($this->request),
        );
    }

    /**
     * @method userResetPassword
     * @return RedirectResponse
     */
    public function userResetPassword(): RedirectResponse
    {
        return $this->userResetPasswordCase(
            //auth request (reset password)
            $this->authRequest,
            //request
            $this->request,
            //rules validation
            $this->constant->rulesResetPassword(),
            $this->constant->rulesResetPasswordMessage(),
            //log insert
            $this->constant->NamingRoute($this->request),
            $this->constant->CurrentPath($this->request),
            //success message reset password
            $this->constant->SUCCESS_RESET_PASSWORD_MESSAGE,
            //domain
            $this->authDomain,
        );
    }

    /**
     * @method userLogout
     */
    public function userLogout()
    {
        return $this->userLogoutCase(
            //log insert
            $this->constant->NamingRoute($this->request),
            $this->constant->CurrentPath($this->request),
            $this->constant->MESSAGE_LOGOUT_SUCCESS,
            $this->authDomain,
            $this->constant->AuthUsersBySessions(),
        );
    }
    /**
     * @method viewUserDashboard
     * @return View|Throwable
     */
    public function viewUserDashboard(): View|Throwable
    {
        return $this->viewUserDashboardCase($this->authDomain, $this->request);
    }

    /**
     * @method updateOrCreateUserProfile
     * @return RedirectResponse|Throwable
     */
    public function updateOrCreateUserProfile(): RedirectResponse|Throwable
    {
        return $this->updateOrCreateUserProfileCase(
            $this->authRequest,
            $this->request,
            $this->constant->rulesProfile(),
            $this->constant->rulesProfileMessage(),
            $this->authDomain,
        );
    }
    /**
     * ================================================================================================================================================================
     * feature: auth admin
     * ================================================================================================================================================================
     */

    /**
     * @method viewAdminLogin
     * @return View|RedirectResponse
     */
    public function viewAdminLogin(): View|RedirectResponse
    {
        return !Auth::guard('admin')->check() ? view('Modules.Administrator.Auth.login') : redirect()->route('admin.view.dashboard')->with('error', 'Anda sudah login, silahkan logout terlebih dahulu!');
    }

    /**
     * @method adminLogin
     */
    public function adminLogin()
    {
        return $this->adminLoginCase(
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
        );
    }

    /**
     * @method adminLogout
     */
    public function adminLogout()
    {
        return $this->adminLogoutCase(
            //log insert
            $this->constant->NamingRoute($this->request),
            $this->constant->CurrentPath($this->request),
            $this->constant->MESSAGE_LOGOUT_SUCCESS,
            $this->authDomain,
            $this->constant->AuthAdminsBySessions(),
        );
    }

    /**
     * @method viewAdminDashboard
     * @return View
     */
    public function viewAdminDashboard(): View
    {
        return $this->viewAdminDashboardCase($this->authDomain, $this->request);
    }
}
