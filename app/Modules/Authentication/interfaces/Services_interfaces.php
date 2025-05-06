<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Http\RedirectResponse;

interface Services_interfaces
{

    public function userLoginService(
        $request,
        string $messageErrorLoginUsernameOrEmail,
        string $successLoginMessage,
    ): RedirectResponse;
    public function userForgotPasswordService(): RedirectResponse;
    public function adminloginService(): RedirectResponse;
}
