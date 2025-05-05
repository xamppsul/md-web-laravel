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

    public function viewUserLogin(): View
    {
        return view('Modules.Users.Auth.login');
    }

    public function userLogin()
    {
        return $this->loginCase(
            //authentication request(login)
            $this->authRequest,
            //validate request login
            $this->request,
            $this->constant->rulesLogin(),
            $this->constant->rulesLoginMessage(),
        );
    }
}
