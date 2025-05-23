<?php

namespace App\Src\Constant\Authentication;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AuthConstant
{
    /**
     * ===================================================================== RULES:validation and message ==================================================================================================
     */

    /**
     * @method rulesLogin
     * @return array
     */

    public function rulesLogin(): array
    {
        return [
            'umail' => 'required|string|min:6',
            'password' => 'required|min:6',
        ];
    }

    /**
     * @method rulesLoginMessage
     * @return array
     */
    public function rulesLoginMessage(): array
    {
        return [
            'umail.required' => 'username or email is required',
            'umail.min' => 'username or email must be at least 6 characters',
            'umail.string' => 'Would be string',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
        ];
    }

    /**
     * @method rulesForgotPassword
     * @return array
     */

    public function rulesForgotPassword(): array
    {
        return [
            'email' => 'required|email|min:6|exists:users,email',
        ];
    }

    /**
     * @method rulesForgotPasswordMessage
     * @return array
     */

    public function rulesForgotPasswordMessage(): array
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email is not valid',
            'email.min' => 'Email must be at least 6 characters',
            'email.exists' => 'Email not registered',
        ];
    }

    /**
     * @method rulesChangePassword
     * @return array
     */

    public function rulesResetPassword(): array
    {
        return [
            'new_password' => 'required|string|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'retype_password' => 'required|string|min:6|same:new_password|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        ];
    }

    /**
     * @method rulesChangePasswordMessage
     * @return array
     */

    public function rulesResetPasswordMessage(): array
    {
        return [
            'new_password.required' => 'new password is required',
            'regex' => ':attribute include Uppercase,lowercase,number and special character',
            'retype_password.required' => 'retype password is required',
            'new_password.string' => ':attribute should string',
        ];
    }


    /**
     * ===================================================================== Constanta  ==================================================================================================
     */

    /**
     * @method NamingRoute
     * @return string
     */

    public function NamingRoute($request): string
    {
        return $request->route()->getName();
    }

    /**
     * @method CurrentPath
     * @return string
     */

    public function CurrentPath($request): string
    {
        return $request->path();
    }

    /**
     * @var string $SUCCESS_LOGIN_MESSAGE
     * @return string
     */
    public string $SUCCESS_LOGIN_MESSAGE = 'Berhasil Login, Selamat datang di halaman dashboard';

    /**
     * @var string $MESSAGE_ERROR_LOGIN_USERNAME_OR_EMAIL
     * @return string
     */

    public string $MESSAGE_ERROR_LOGIN_USERNAME_OR_EMAIL_AND_PASSWORD = 'Gagal login, email atau username dan password salah';

    /**
     * @var string $MESSAGE_LOGOUT_SUCCESS
     * @return string
     */
    public string $MESSAGE_LOGOUT_SUCCESS = 'Berhasil Logout, silahkan login kembali jika ingin masuk';


    /**
     * @var string $SUCCESS_RESET_PASSWORD_MESSAGE
     * @return string
     */
    public string $SUCCESS_RESET_PASSWORD_MESSAGE = 'Berhasil Reset Password, silahkan untuk login kembali';


    /**
     * @method AuthUsersBySessions
     */
    public function AuthUsersBySessions()
    {
        return Auth::guard('user')->user();
    }

    /**
     * @method AuthUsersBySessions
     */
    public function AuthAdminsBySessions()
    {
        return Auth::guard('admin')->user();
    }

    /**
     * @method TokenResetPassword
     * @return string
     */

    public function TokenResetPassword(): string
    {
        return Str::random(30);
    }


    /**
     * @var string $MESSAGE_RESET_PASSWORD_FAILED
     * @return string
     */

    public string $MESSAGE_RESET_PASSWORD_FAILED = 'Gagal Reset Password, token tidak valid atau sudah kadaluarsa';

    /**
     * @method rulesProfile
     * @return array
     */

    public function rulesProfile(): array
    {
        return [
            'nidn' => 'numeric|min:10',
            'nip' => 'numeric|min:18',
            'nama_lengkap' => 'string|min:4',
            'gelar_depan' => 'string',
            'gelar_belakang' => 'string',
            'jenis_kelamin' => 'in:L,P',
            'tempat_lahir' => 'string',
            'tanggal_lahir' => 'date',
            'agama' => 'string',
            'profile_status_perkawinan' => 'exists:profile_status_perkawinan,id',
            'alamat' => 'string',
            'no_hp' => 'numeric',
            'pendidikan_terakhir' => 'string',
            'program_studi' => 'string',
            'fakultas' => 'string',
            'jabatan_akademik' => 'string',
            'jabatan_golongan' => 'string',
            'profile_status_ikatan_kerja' => 'exists:profile_status_ikatan_kerja,id',
            'profile_status_mengajar' => 'exists:profile_status_mengajar,id',
            'photo' => 'file|image|mimes:jpg,png,jpeg',
            'photo_banner' => 'file|image|mimes:jpg,png,jpeg',
        ];
    }

    /**
     * @method rulesProfileMessage
     * @return array
     */
    public function rulesProfileMessage(): array
    {
        return [
            'jenis_kelamin.in' => 'Jenis kelamin hanya ada dua: L,P',
            'profile_status_mengajar.exists' => 'status mengajar tidak di temukan di database',
            'profile_status_ikatan_kerja.exists' => 'status ikatan kerja tidak di temukan di database',
            'profile_status_perkawinan.exists' => 'status perkawinan tidak di temukan di database',
        ];
    }
}
