<?php

namespace App\Modules\Authentication\repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Modules\Authentication\interfaces\Repository_interfaces;
use App\Src\Mail\forgot_password\MailForgot;
use Illuminate\Support\Facades\Mail;

class Repository implements Repository_interfaces
{

    /**
     * ================================================================================================================================================================
     * feature: auth user
     * ================================================================================================================================================================
     */
    /**
     * @method UserValidateLoginByExistingEmailOrUsernameRepository
     * @return bool
     */
    public function UserValidateLoginByExistingEmailOrUsernameRepository($credentials): bool
    {
        return Auth::guard('user')->attempt($credentials) ? true : false;
    }

    /**
     * @method UserSetRequestLoginByUsernameOrEmailAndPasswordRepository
     * @return array
     */
    public function UserSetRequestLoginByUsernameOrEmailAndPasswordRepository($request): array
    {
        return filter_var($request->umail, FILTER_VALIDATE_EMAIL) ?
            ['email' => $request->umail, 'password' => $request->password] :
            ['username' => $request->umail, 'password' => $request->password];
    }

    /**
     * @method UserGenerateSessionLoginRepository
     * @return mixed
     */
    public function UserGenerateSessionLoginRepository($credentials)
    {
        $login = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::guard('user')->login($login);
        return Auth::guard('user')->user();
    }
    /**
     * @method UserRedirectLoginSuccessRepository
     * @return RedirectResponse
     */
    public function UserRedirectLoginSuccessRepository(string $messageSuccessLogin): RedirectResponse
    {
        return redirect()->intended('/user/dashboard')->with('success', $messageSuccessLogin);
    }

    /**
     * @method UserLoggoutSessionRepository
     * @return void
     */
    public function UserLoggoutSessionRepository(): void
    {
        Auth::guard('user')->logout();
    }

    /**
     * @method UserRedirectLogoutSuccessRepository
     * @return RedirectResponse
     * //balik ke halaman login user after success logout
     */
    public function UserRedirectLogoutSuccessRepository(string $messageSuccessLogout): RedirectResponse
    {
        return redirect()->intended('/')->with('success', $messageSuccessLogout);
    }

    /**
     * @method UrlTokenResetPasswordRepository
     * @return string
     */
    public function UrlTokenResetPasswordRepository(string $tokenResetPassword): string
    {
        return config('app.url') . '/reset/' . $tokenResetPassword;
    }

    /**
     * @method InsertForgotPasswordRepository
     * @return void
     */
    public function InsertForgotPasswordRepository(
        string $email,
        string $url,
        string $tokenResetPassword,
        //domain
        $authDomain,
    ): void {
        $authDomain->DomainInsertForgotPassword($email, $url, $tokenResetPassword);
    }

    /**
     * @method SendEmailForgotPasswordRepository
     * @return void
     */
    public function SendEmailForgotPasswordRepository(
        string $email,
        string $url
    ): void {
        Mail::to($email)->send(new MailForgot($email, $url));
    }

    /**
     * @method ValidateTokensResetPasswordRepository
     * @return array
     */
    public function ValidateTokensResetPasswordRepository(
        string $token,
        //domain
        $authDomain,
    ): array {
        return $authDomain->DomainValidateTokenResetPassword($token);
    }

    /**
     * @method ChangePasswordRepository
     * @return void
     */
    public function ChangePasswordRepository(
        string $email,
        string $new_password,
        //domain
        $authDomain
    ): void {
        $authDomain->DomainChangePassword($email, $new_password);
    }

    /**
     * @method DeleteTokenResetPasswordRepository
     * @return void
     */
    public function DeleteTokenResetPasswordRepository(
        string $token_reset_password,
        //domain
        $authDomain
    ): void {
        $authDomain->DomainDeleteTokenResetPassword($token_reset_password);
    }


    //user dashboard
    /**
     * @method UserDashboardGetCountTotalBahanAjarRepository
     * @param $authDomain
     * @return int
     */
    public function UserDashboardGetCountTotalBahanAjarRepository($authDomain): int
    {
        return $authDomain->UserDashboardGetCountTotalBahanAjarDomain()[0]->total ?? 0;
    }
    /**
     * @method UserDashboardGetCountTotalPenelitianRepository
     * @param $authDomain
     * @return int
     */
    public function UserDashboardGetCountTotalPenelitianRepository($authDomain): int
    {
        return $authDomain->UserDashboardGetCountTotalPenelitianDomain()[0]->total ?? 0;
    }
    /**
     * @method UserDashboardGetCountTotalPengabdianRepository
     * @param $authDomain
     * @return int
     */
    public function UserDashboardGetCountTotalPengabdianRepository($authDomain): int
    {
        return $authDomain->UserDashboardGetCountTotalPengabdianDomain()[0]->total ?? 0;
    }
    /**
     * @method UserDashboardGetUserProfileStatusMengajarRepository
     * @param $authDomain
     * @return array
     */
    public function UserDashboardGetUserProfileStatusMengajarRepository($authDomain): array
    {
        return $authDomain->GetUserProfileStatusMengajar();
    }
    /**
     * @method UserDashboardGetUserProfileStatusPerkawinanRepository
     * @param $authDomain
     * @return array
     */
    public function UserDashboardGetUserProfileStatusPerkawinanRepository($authDomain): array
    {
        return $authDomain->GetUserProfileStatusPerkawinan();
    }
    /**
     * @method UserDashboardGetUserProfileStatusIkatanKerjaRepository
     * @param $authDomain
     * @return array
     */
    public function UserDashboardGetUserProfileStatusIkatanKerjaRepository($authDomain): array
    {
        return $authDomain->GetUserProfileStatusIkatanKerja();
    }
    /**
     * @method UserDashboardGetProfileBySessionRepository
     * @param int $users_id
     * @return array
     */
    public function UserDashboardGetProfileBySessionRepository($authDomain, int $users_id): array
    {
        return $authDomain->GetUserProfileBySessionID($users_id);
    }

    /**
     * @method updateUserProfileRepository
     * @param $authDomain
     * @param $request
     * @param int $users_id
     * @param string|bool $profile_photo
     * @param string|bool $profile_banner
     * @return void
     */
    public function updateUserProfileRepository(
        $authDomain,
        $request,
        int $users_id,
        string|bool $profile_photo,
        string|bool $profile_banner
    ): void {
        $authDomain->updateDataProfileDomain($request, $users_id, $profile_photo, $profile_banner);
    }

    /**
     * @method createUserProfileRepository
     * @param $authDomain
     * @param $request
     * @param int $users_id
     * @param string|bool $profile_photo
     * @param string|bool $profile_banner
     * @return void
     */
    public function createUserProfileRepository(
        $authDomain,
        $request,
        int $users_id,
        string|bool $profile_photo,
        string|bool $profile_banner
    ): void {
        $authDomain->postDataProfileDomain($request, $users_id, $profile_photo, $profile_banner);
    }

    //file_upload_profile
    /**
     * @method doUploadPhotoProfile
     * @param $request
     * @return string|bool
     */
    public function doUploadPhotoProfile($request): string|bool
    {
        $file = $request->file('photo');
        if (isset($file)) {
            $namaFile = time() . "_" . $file->getClientOriginalName();
            //move upload file
            $dirUploadFile = 'profile_photo';
            $file->move($dirUploadFile, $namaFile);
            return $namaFile;
        }
        return false;
    }
    /**
     * @method doUploadPhotoProfileBanner
     * @param $request
     * @return string|bool
     */
    public function doUploadPhotoProfileBanner($request): string|bool
    {
        $file = $request->file('photo_banner');
        if (isset($file)) {
            $namaFile = time() . "_" . $file->getClientOriginalName();
            //move upload file
            $dirUploadFile = 'profile_banner';
            $file->move($dirUploadFile, $namaFile);
            return $namaFile;
        }
        return false;
    }

    /**
     * @method UserDashboardGetBahanAjarRepository
     * @param $authDomain
     * @return array
     */
    public function UserDashboardGetBahanAjarRepository($authDomain): array
    {
        return $authDomain->getAllBahanAjarDomain();
    }
    /**
     * @method UserDashboardGetRiwayatJabatanRepository
     * @param $authDomain
     * @return array
     */
    public function UserDashboardGetRiwayatJabatanRepository($authDomain): array
    {
        return $authDomain->getAllRiwayatJabatanDomain();
    }

    /**
     * @method UserDashboardGetListPublikasiRepository
     * @param $authDomain
     * @return array
     */
    public function UserDashboardGetListPublikasiRepository($authDomain): array
    {
        return $authDomain->getAllListPublikasiDomain();
    }

    //faculty

    /**
     * @method UserDashboardGetCountAsetBaseFacultyRepository
     * @param mixed $authDomain
     * @return array
     */
    public function UserDashboardGetCountAsetBaseFacultyRepository(mixed $authdomain): array
    {
        return $authdomain->getCountAsetDomainBaseFaculty();
    }

    /**
     * @method UserDashboardGetCountKerjasamaBaseFacultyRepository
     * @param mixed $authDomain
     * @return array
     */
    public function UserDashboardGetCountKerjasamaBaseFacultyRepository(mixed $authdomain): array
    {
        return $authdomain->getCountKerjasamaDomainBaseFaculty();
    }

    /**
     * @method UserDashboardListMouBaseFacultyAndYearRepository
     * @param mixed $authDomain
     * @param $request
     * @return array
     */
    public function UserDashboardListMouBaseFacultyAndYearRepository(mixed $authdomain, $request): array
    {
        return $authdomain->getListMouDomainBaseFacultyAndYear($request);
    }

    /**
     * @method UserDashboardGetCountTotalKegiatanInYearRepository
     * @param mixed $authDomain
     * @return array
     */
    public function UserDashboardGetCountTotalKegiatanInYearRepository(mixed $authdomain): array
    {
        return $authdomain->getCountTotalKegiatanInYearDomainBaseFaculty();
    }

    /**
     * ================================================================================================================================================================
     * feature: auth admin
     * ================================================================================================================================================================
     */

    /**
     * @method AdminValidateLoginByExistingEmailOrUsernameRepository
     * @return bool
     */
    public function AdminValidateLoginByExistingEmailOrUsernameRepository($credentials): bool
    {
        return Auth::guard('admin')->attempt($credentials) ? true : false;
    }

    /**
     * @method AdminSetRequestLoginByUsernameOrEmailAndPasswordRepository
     * @return array
     */
    public function AdminSetRequestLoginByUsernameOrEmailAndPasswordRepository($request): array
    {
        return filter_var($request->umail, FILTER_VALIDATE_EMAIL) ?
            ['email' => $request->umail, 'password' => $request->password] :
            ['username' => $request->umail, 'password' => $request->password];
    }

    /**
     * @method AdminGenerateSessionLoginRepository
     * @return mixed
     */
    public function AdminGenerateSessionLoginRepository($credentials)
    {
        return Auth::guard('admin')->user();
    }

    /**
     * @method AdminRedirectLoginSuccessRepository
     * @return RedirectResponse
     */
    public function AdminRedirectLoginSuccessRepository(string $messageSuccessLogin): RedirectResponse
    {
        return redirect()->intended('/admin/dashboard')->with('success', $messageSuccessLogin);
    }

    /**
     * @method AdminRedirectLogoutSuccessRepository
     * @return RedirectResponse
     */
    public function AdminRedirectLogoutSuccessRepository(string $messageSuccessLogout): RedirectResponse
    {
        return redirect()->intended('/md-admin')->with('success', $messageSuccessLogout);
    }

    /**
     * @method AdminLoggoutSessionRepository
     * @return void
     */
    public function AdminLoggoutSessionRepository(): void
    {
        Auth::guard('admin')->logout();
    }

    //dashboard admin

    /**
     * @method CountTotalKegiatanInYearRepository
     * @return array
     */
    public function CountTotalKegiatanInYearRepository($authDomain): array
    {
        return $authDomain->getCountTotalKegiatanInYearDomain();
    }
    /**
     * @method CountTotalKegiatanInYearRepository
     * @return array
     */

    public function CountTotalDosenRepository($authDomain): array
    {
        return $authDomain->getCountTotalDosenDomain();
    }
    /**
     * @method CountTotalKegiatanInYearRepository
     * @return array
     */

    public function CountTotalBadAsetRepository($authDomain): array
    {
        return $authDomain->getCountTotalBadAsetDomain();
    }
    /**
     * @method CountTotalKegiatanInYearRepository
     * @return array
     */

    public function CountTotalGoodAsetRepository($authDomain): array
    {
        return $authDomain->getCountTotalGoodAsetDomain();
    }
    /**
     * @method CountTotalKegiatanInYearRepository
     * @return array
     */

    public function CountTotalActivityUserRepository($authDomain): array
    {
        return $authDomain->getCountTotalActivityUserDomain();
    }
    /**
     * @method CountTotalKegiatanInYearRepository
     * @return array
     */

    public function CountTotalKerjasamaRepository($authDomain): array
    {
        return $authDomain->getCountTotalKerjasamaDomain();
    }
}
