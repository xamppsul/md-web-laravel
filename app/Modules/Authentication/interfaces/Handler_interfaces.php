<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

interface Handler_interfaces
{
    public function viewUserLogin(): View|RedirectResponse;
    public function userLogin();
    public function userLogout();
    public function adminLogout();
    public function userForgotPassword();
    public function viewUserResetPassword(string $token): View|RedirectResponse;
    public function userResetPassword(): RedirectResponse;
    public function viewAdminLogin(): View|RedirectResponse;
    public function adminLogin();
    public function viewUserDashboard(): View;
    public function viewAdminDashboard(): View;
}
