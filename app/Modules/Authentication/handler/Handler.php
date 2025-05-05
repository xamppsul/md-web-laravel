<?php

namespace App\Modules\Authentication\handler;

use Illuminate\Contracts\View\View;
use App\Modules\Authentication\usecase\Usecase;
use App\Src\Constant\Authentication\ConstantAuth;
use App\Modules\Authentication\interfaces\Handler_intefaces;
use Illuminate\Http\Request;

class Handler extends Usecase implements Handler_intefaces
{
    public function __construct(
        private ConstantAuth $constant,
        private Request $request
    ) {}

    public function viewLogin(): View
    {
        return view('Modules.Users.Auth.login');
    }

    public function login()
    {
        return $this->loginCase(
            $this->request,
            $this->constant->rulesLogin(),
            $this->constant->rulesLoginMessage(),
        );
    }
}
