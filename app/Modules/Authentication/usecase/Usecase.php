<?php

namespace App\Modules\Authentication\usecase;

use App\Modules\Authentication\interfaces\Usecase_intefaces;
use App\Modules\Authentication\services\Services;
use App\Src\Request\User\Auth\AuthRequest;
use Illuminate\Http\RedirectResponse;

class Usecase extends Services implements Usecase_intefaces
{
    public function __construct(
        private AuthRequest $auth_request
    ) {}

    public function loginCase(
        $request,
        array $rulesLogin,
        array $rulesLoginMessage
    ): RedirectResponse {

        $this->auth_request->loginRequest($request, $rulesLogin, $rulesLoginMessage);
        try {
            return $this->loginService();
        } catch (\Exception $e) {
            return redirect()->route('view.login')->with('error', $e->getMessage());
        }
    }
}
