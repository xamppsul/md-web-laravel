<?php

namespace App\Modules\Authentication\repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Modules\Authentication\interfaces\Repository_interfaces;
use App\Src\Mail\verify_account\MailForgot;
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
        return redirect()->intended('/dashboard')->with('success', $messageSuccessLogin);
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
}
