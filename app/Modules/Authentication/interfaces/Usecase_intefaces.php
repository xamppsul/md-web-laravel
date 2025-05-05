<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Http\RedirectResponse;

interface Usecase_intefaces
{
    public function userLoginCase(
        //authentication request(login)
        $authRequestLogin,
        //validate request
        $request,
        array $rulesLogin,
        array $rulesLoginMessage,
    ): string;
}
