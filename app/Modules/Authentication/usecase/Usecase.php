<?php

namespace App\Modules\Authentication\usecase;

use App\Modules\Authentication\interfaces\Usecase_intefaces;
use App\Modules\Authentication\services\Services;
use App\Src\Constant\Authentication\ConstantAuth;
use Illuminate\Http\RedirectResponse;

class Usecase extends Services implements Usecase_intefaces
{
    public function loginCase(
        //authentication request(login)
        $authRequestLogin,
        //validate request login
        $request,
        array $rulesLogin,
        array $rulesLoginMessage,
    ): string {
        $authRequestLogin->loginRequest($request, $rulesLogin, $rulesLoginMessage);
        try {
            return $this->loginService();
        } catch (\Exception $e) {
            return redirect()->route('view.login')->with('error', $e->getMessage());
        }
    }
}
