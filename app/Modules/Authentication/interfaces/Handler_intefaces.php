<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Contracts\View\View;

interface Handler_intefaces
{
    public function viewUserLogin(): View;
    public function userLogin();
    public function userForgotPassword();
    public function viewAdminLogin(): View;
    public function adminLogin();
}
