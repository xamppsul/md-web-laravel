<?php

namespace App\Modules\Authentication\handler;

use Illuminate\Contracts\View\View;
use App\Modules\Authentication\usecase\Usecase;
use App\Src\Constant\Authentication\ConstantAuth;
use App\Modules\Authentication\interfaces\Handler_intefaces;
use App\Src\Request\User\Auth\AuthRequest;
use Illuminate\Http\Request;

class Handler extends Usecase implements Handler_intefaces
{
    public function __construct(
        private ConstantAuth $constant,
        private Request $request,
        private AuthRequest $authRequest,
    ) {}

    /**
     * ================================================================================================================================================================
     * feature: auth user
     * ================================================================================================================================================================
     */
    /**
     * @method viewUserLogin
     * @return View
     */
    public function viewUserLogin(): View
    {
        return view('Modules.Users.Auth.login');
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
        return view('');
    }

    /**
     * @method adminLogin
     */
    public function adminLogin() {}
}
