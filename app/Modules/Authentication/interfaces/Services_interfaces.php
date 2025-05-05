<?php

namespace App\Modules\Authentication\interfaces;


interface Services_interfaces
{

    public function userLoginService(): string;
    public function userForgotPasswordService(): string;
}
