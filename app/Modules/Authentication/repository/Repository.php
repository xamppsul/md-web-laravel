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
     * @method ValidateLoginByExistingEmailOrUsernameRepository
     * @return bool
     */
    public function ValidateLoginByExistingEmailOrUsernameRepository($credentials): bool
    {
        return Auth::guard('user')->attempt($credentials) ? true : false;
    }

    /**
     * @method SetRequestLoginByUsernameOrEmailAndPasswordRepository
     * @return array
     */
    public function SetRequestLoginByUsernameOrEmailAndPasswordRepository($request): array
    {
        return filter_var($request->umail, FILTER_VALIDATE_EMAIL) ?
            ['email' => $request->umail, 'password' => $request->password] :
            ['username' => $request->umail, 'password' => $request->password];
    }

    /**
     * @method GenerateSessionLoginRepository
     */
    public function GenerateSessionLoginRepository($credentials)
    {
        $login = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::guard('user')->login($login);
        return Auth::guard('user')->user();
    }
    /**
     * @method RedirectLoginSuccessRepository
     * @return RedirectResponse
     */
    public function RedirectLoginSuccessRepository(string $messageSuccessLogin): RedirectResponse
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
     * @method RedirectLogoutSuccessRepository
     * @return RedirectResponse
     * //balik ke halaman login user after success logout
     */
    public function RedirectLogoutSuccessRepository(string $messageSuccessLogout): RedirectResponse
    {
        return redirect()->intended('/')->with('success', $messageSuccessLogout);
    }

    /**
     * @method UrlTokenResetPasswordRepository
     * @return string
     */
    public function UrlTokenResetPasswordRepository(string $tokenResetPassword): string
    {
        return config('app.url') . '/reset/' . $tokenResetPassword . '/password';
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
     * ================================================================================================================================================================
     * feature: auth admin
     * ================================================================================================================================================================
     */
}
