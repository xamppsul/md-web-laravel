<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Http\RedirectResponse;

interface Services_interfaces
{

    public function userLoginService(): RedirectResponse;
    public function userForgotPasswordService(): RedirectResponse;
    public function adminloginService(): RedirectResponse;
}
