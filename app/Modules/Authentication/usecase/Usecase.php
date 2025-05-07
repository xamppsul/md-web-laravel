<?php

namespace App\Modules\Authentication\usecase;

use Illuminate\Http\RedirectResponse;
use App\Modules\Authentication\services\Services;
use App\Modules\Authentication\interfaces\Usecase_intefaces;
use Illuminate\Support\Facades\DB;

class Usecase extends Services implements Usecase_intefaces
{
    /**
     * ================================================================================================================================================================
     * feature: auth user
     * ================================================================================================================================================================
     */
    /**
     * @method userLoginCase
     * @return RedirectResponse
     */
    public function userLoginCase(
        //authentication request(login)
        $authRequestLogin,
        //validate request login
        $request,
        array $rulesLogin,
        array $rulesLoginMessage,
        //domain
        $authDomain,
        //log insert
        string $route,
        string $path,
        //validate login attempt
        string $messageErrorLoginUsernameOrEmail,
        string $successLoginMessage,
        //user session
        $userSession,
    ): RedirectResponse {
        $authRequestLogin->loginRequest($request, $rulesLogin, $rulesLoginMessage);

        try {
            return $this->userLoginService(
                $request,
                $messageErrorLoginUsernameOrEmail,
                $successLoginMessage,
                $authDomain,
                $route,
                $path,
            );
        } catch (\Exception $e) {
            //insert log error event error
            $authDomain->DomainLogInsert($e->getMessage(), $route, $path, 'error');
            return redirect()->route('user.view.login')->with('error', 'kesalahan sistem login, silahkan coba lagi!');
        }
    }

    /**
     * @method userForgotPasswordCase
     * @return RedirectResponse
     */
    public function userForgotPasswordCase(
        //authentication forgot password
        $authRequestForgotPassword,
        //validate request forgot password
        $request,
        array   $rulesForgotPassword,
        array   $rulesForgotPasswordMessage,
        //token reset password
        string  $tokenResetPassword,
        //auth domain
        $authDomain,
        //log insert
        string $route,
        string $path,
    ): RedirectResponse {
        $authRequestForgotPassword->forgotPasswordRequest($request, $rulesForgotPassword, $rulesForgotPasswordMessage);
        DB::beginTransaction();
        try {
            $authDomain->DomainLogInsert('Berhasil forgot password', $route, $path, 'success');
            $this->userForgotPasswordService(
                $request->email,
                $tokenResetPassword,
                $authDomain,
            );
            DB::commit();
            return redirect()->route('user.view.login')->with('success', 'forgot password success');
        } catch (\Exception $e) {
            DB::rollBack();
            $authDomain->DomainLogInsert($e->getMessage(), $route, $path, 'error');
            return redirect()->route('user.view.login')->with('error', 'Maaf ada kesalahan sistem, silahkan coba lagi!');
        }
    }

    public function logoutCase(
        //log insert
        string    $route,
        string    $path,
        //do logout
        string    $logoutMessageSuccess,
        //domain
        $authDomain,
        //user session
        $userSession,
    ): RedirectResponse {
        DB::beginTransaction();
        try {
            $authDomain->DomainLogInsert($logoutMessageSuccess . " ID: {$userSession->id}, Username {$userSession->username}", $route, $path, 'success');
            DB::commit();
            return $this->LogoutService($logoutMessageSuccess);
        } catch (\Exception $e) {
            DB::rollBack();
            $authDomain->DomainLogInsert($e->getMessage(), $route, $path, 'error');
            return redirect()->route('user.view.dashboard')->with('error', $e->getMessage());
        }
    }
    /**
     * ================================================================================================================================================================
     * feature: auth admin
     * ================================================================================================================================================================
     */

    public function adminLoginCase(
        //authentication request(admin login)
        $authRequestLogin,
        //validate request
        $request,
        array $rulesLogin,
        array $rulesLoginMessage
    ): RedirectResponse {
        $authRequestLogin->loginRequest($request, $rulesLogin, $rulesLoginMessage);

        try {
            return $this->adminloginService();
        } catch (\Exception $e) {
            return redirect()->route('admin.view.login')->with('error', $e->getMessage());
        }
    }
}
