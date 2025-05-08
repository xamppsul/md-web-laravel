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
    public function UrlTokenResetPasswordRepository(string $token): string;
    public function InsertForgotPasswordRepository(
        string $email,
        string $url,
        string $tokenResetPassword,
        //domain
        $authDomain,
    ): void;
    public function SendEmailForgotPasswordRepository(
        string $email,
        string $url,
    ): void;
    public function ValidateTokensResetPasswordRepository(
        string $token,
        //domain
        $authDomain,
    ): array;
    public function ChangePasswordRepository(
        string $email,
        string $new_password,
        //domain
        $authDomain,
    ): void;
    public function DeleteTokenResetPasswordRepository(
        string $token_reset_password,
        //domain
        $authDomain,
    ): void;
}
