<?php

namespace App\Src\Domain\User;

use Illuminate\Support\Facades\DB;

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
}
