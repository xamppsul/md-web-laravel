<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Http\RedirectResponse;

interface Usecase_intefaces
{
    public function loginCase(
        $request,
        array $rulesLogin,
        array $rulesLoginMessage,
    ): RedirectResponse;
}
