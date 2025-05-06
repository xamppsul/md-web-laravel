<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Http\RedirectResponse;

interface Repository_interfaces
{
    public function ValidateLoginByExistingEmailOrUsernameRepository($credentials): bool;
    public function SetRequestLoginByUsernameOrEmailAndPasswordRepository($request): array;
    public function GenerateSessionLoginRepository($credentials);
    public function RedirectLoginSuccessRepository(string $messageSuccessLogin): RedirectResponse;
    public function RedirectLogoutSuccessRepository(string $messageSuccessLogout): RedirectResponse;
    public function UserLoggoutSessionRepository(): void;
}
