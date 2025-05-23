<?php

namespace App\Modules\Authentication\usecase;

use Illuminate\Http\RedirectResponse;
use App\Modules\Authentication\services\Services;
use App\Modules\Authentication\interfaces\Usecase_intefaces;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

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
            $authDomain->DomainLogInsert("email: {$request->email} Telah Berhasil forgot password", $route, $path, 'success');
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

    /**
     * @method viewUserResetPasswordCase
     * @return View|RedirectResponse
     */
    public function viewUserResetPasswordCase(
        string $token,
        string $errorMessageResetPassword,
        //domain
        $authDomain,
        //log insert
        string   $route,
        string   $path,
    ): View|RedirectResponse {
        try {
            return $this->viewUserResetPasswordService(
                $token,
                $errorMessageResetPassword,
                $authDomain,
            );
        } catch (\Exception $error) {
            $authDomain->DomainLogInsert($error->getMessage(), $route, $path, 'error');
            return redirect()->route('user.view.login')->with('error', 'Maaf ada kesalahan sistem, silahkan coba lagi!');
        }
    }

    public function userResetPasswordCase(
        //authentication request(user login)
        $authRequestLogin,
        //request
        $request,
        array $rulesResetPassword,
        array $rulesResetPasswordMessage,
        //log insert
        string    $route,
        string    $path,
        //message reset password success
        string    $successResetPasswordMessage,
        //domain
        $authDomain,
    ): RedirectResponse {
        $authRequestLogin->resetPasswordRequest($request, $rulesResetPassword, $rulesResetPasswordMessage);

        DB::beginTransaction();
        try {
            $this->userResetPasswordService(
                $request,
                $authDomain,
            );
            $authDomain->DomainLogInsert("email: $request->email,$successResetPasswordMessage", $route, $path, 'success');
            DB::commit();
            return redirect()->route('user.view.login')->with('success', $successResetPasswordMessage);
        } catch (\Exception $errors) {
            DB::rollback();
            $authDomain->DomainLogInsert($errors->getMessage(), $route, $path, 'error');
            return redirect()->route('user.view.login')->with('error', 'Maaf ada kesalahan sistem, silahkan coba lagi!');
        }
    }

    /**
     * @method logoutCase
     * @return RedirectResponse
     */
    public function userLogoutCase(
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
            return $this->userLogoutService($logoutMessageSuccess);
        } catch (\Exception $e) {
            DB::rollBack();
            $authDomain->DomainLogInsert($e->getMessage(), $route, $path, 'error');
            return redirect()->route('user.view.dashboard')->with('error', $e->getMessage());
        }
    }

    /**
     * @method viewUserDashboardCase
     * @param $authDomain
     * @return View|Throwable
     */
    public function viewUserDashboardCase($authDomain): View|Throwable
    {
        try {
            $data = $this->viewUserDashboardServices($authDomain, Auth::guard('user')->user()->id);
            return view('Modules.Users.dashboard', compact('data'));
        } catch (\Throwable $t) {
            return $t;
        }
    }

    /**
     * @method storeUserProfileCase
     * @param $authRequestLogin
     * @param $request
     * @param array rulesProfile
     * @param array rulesProfileMessage
     * @param $authDomain
     */
    public function updateOrCreateUserProfileCase(
        //auth request profile
        $authRequestProfile,
        //validate request profile
        $request,
        array $rulesProfile,
        array $rulesProfileMessage,
        //domain
        $authDomain
    ): RedirectResponse|Throwable {
        $authRequestProfile->profileRequest($request, $rulesProfile, $rulesProfileMessage);

        DB::beginTransaction();
        try {
            $this->updateOrCreateUserProfileServices($authDomain, $request, Auth::guard('user')->user()->id);
            DB::commit();
            return redirect()->route('user.view.dashboard')->with('success', 'Berhasil Update Profile');
        } catch (\Throwable $t) {
            DB::rollBack();
            return $t;
        }
    }
    /**
     * ================================================================================================================================================================
     * feature: auth admin
     * ================================================================================================================================================================
     */

    public function adminLoginCase(
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
    ): RedirectResponse {
        $authRequestLogin->loginRequest($request, $rulesLogin, $rulesLoginMessage);

        try {
            return $this->adminloginService(
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
            return redirect()->route('admin.view.login')->with('error', $e->getMessage());
        }
    }

    public function adminLogoutCase(
        //log insert
        string    $route,
        string    $path,
        //do logout
        string    $logoutMessageSuccess,
        //domain
        $authDomain,
        //user session
        $adminSession,
    ): RedirectResponse {
        DB::beginTransaction();
        try {
            $authDomain->DomainLogInsert($logoutMessageSuccess . " ID: {$adminSession->id}, Username {$adminSession->username}", $route, $path, 'success');
            DB::commit();
            return $this->adminLogoutService($logoutMessageSuccess);
        } catch (\Exception $e) {
            DB::rollBack();
            $authDomain->DomainLogInsert($e->getMessage(), $route, $path, 'error');
            return redirect()->route('admin.view.dashboard')->with('error', $e->getMessage());
        }
    }
}
