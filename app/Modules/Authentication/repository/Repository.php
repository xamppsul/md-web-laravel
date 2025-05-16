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
}
