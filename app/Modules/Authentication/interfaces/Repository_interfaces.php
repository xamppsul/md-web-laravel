<?php

namespace App\Modules\Authentication\interfaces;

use Illuminate\Http\RedirectResponse;

interface Repository_interfaces
{
    //user login repo
    public function UserValidateLoginByExistingEmailOrUsernameRepository($credentials): bool;
    public function UserSetRequestLoginByUsernameOrEmailAndPasswordRepository($request): array;
    public function UserGenerateSessionLoginRepository($credentials);
    public function UserRedirectLoginSuccessRepository(string $messageSuccessLogin): RedirectResponse;
    public function UserRedirectLogoutSuccessRepository(string $messageSuccessLogout): RedirectResponse;
    public function UserLoggoutSessionRepository(): void;
    //dashboard user
    //staff
    public function UserDashboardGetCountTotalBahanAjarRepository($authDomain): int;
    public function UserDashboardGetCountTotalPenelitianRepository($authDomain): int;
    public function UserDashboardGetCountTotalPengabdianRepository($authDomain): int;
    public function UserDashboardGetProfileBySessionRepository($authDomain, int $users_id): array;
    public function UserDashboardGetUserProfileStatusMengajarRepository($authDomain): array;
    public function UserDashboardGetUserProfileStatusPerkawinanRepository($authDomain): array;
    public function UserDashboardGetUserProfileStatusIkatanKerjaRepository($authDomain): array;
    public function updateUserProfileRepository($authDomain, $request, int $users_id, string $profile_photo, string $profile_banner): void;
    public function createUserProfileRepository($authDomain, $request, int $users_id, string $profile_photo, string $profile_banner): void;
    public function doUploadPhotoProfile($request): string|bool;
    public function doUploadPhotoProfileBanner($request): string|bool;
    public function UserDashboardGetBahanAjarRepository($authDomain): array;
    public function UserDashboardGetRiwayatJabatanRepository($authDomain): array;
    public function UserDashboardGetListPublikasiRepository($authDomain): array;
    //faculty
    public function UserDashboardGetCountAsetRepository($authDomain): array;

    //admin login repo
    public function AdminValidateLoginByExistingEmailOrUsernameRepository($credentials): bool;
    public function AdminSetRequestLoginByUsernameOrEmailAndPasswordRepository($request): array;
    public function AdminGenerateSessionLoginRepository($credentials);
    public function AdminRedirectLoginSuccessRepository(string $messageSuccessLogin): RedirectResponse;
    public function AdminRedirectLogoutSuccessRepository(string $messageSuccessLogout): RedirectResponse;
    public function AdminLoggoutSessionRepository(): void;
    //reset password
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
