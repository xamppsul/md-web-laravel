<?php

namespace App\Src\Domain\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthDomain
{
    /**
     * @method DomainLogErrorInsert
     *  transaction data with log error to table log_errors
     */

    public function DomainLogInsert(
        string $message,
        string $route,
        string $path,
        string $type,
    ): void {
        DB::insert('insert into logs (message,route,path,type,created_at,updated_at) values (?, ?, ?, ?, ?, ?)', [$message, $route, $path, $type, now(), now()]);
    }

    /**
     * @method DomainInsertForgotPassword
     * @return void
     */
    public function DomainInsertForgotPassword(
        string $email,
        string $url,
        string $tokenResetPassword
    ): void {
        DB::insert('INSERT INTO password_reset_tokens (email,token,url,created_at,updated_at) values (?, ?, ?, ?, ?)', [$email, $tokenResetPassword, $url, now(), now()]);
    }

    /**
     * @method DomainValidateTokenResetPassword
     * @return array
     */
    public function DomainValidateTokenResetPassword(string $token): array
    {
        return DB::select("SELECT * FROM password_reset_tokens WHERE token = ?", [$token]);
    }

    /**
     * @method DomainChangePassword
     *  transaction with change password by email from reset password 
     * @return void
     */
    public function DomainChangePassword(
        string $email,
        string $new_password
    ): void {
        DB::update('UPDATE users SET password = ? WHERE email = ?', [Hash::make($new_password), $email]);
    }

    /**
     * @method DomainDeleteTokenResetPassword
     *  transaction with delete token reset password
     * @return void
     */
    public function DomainDeleteTokenResetPassword(string $token): void
    {
        DB::delete('DELETE FROM password_reset_tokens WHERE token = ?', [$token]);
    }
}
