<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface Handler_intefaces
{
    public function viewUserLogin(): View|RedirectResponse;
    public function userLogin();
    public function userLogout();
    public function userForgotPassword();
    public function viewUserResetPassword(string $token): View|RedirectResponse;
    public function userResetPassword(): RedirectResponse;
    public function viewAdminLogin(): View;
    public function adminLogin();
    public function viewUserDashboard(): View;
}
