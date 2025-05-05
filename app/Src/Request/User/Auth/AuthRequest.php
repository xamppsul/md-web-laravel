<?php

namespace App\Src\Request\User\Auth;

use Illuminate\Http\Request;

class AuthRequest
{
    /**
     * @method loginRequest
     * @return array
     */
    public function loginRequest(
        Request $request,
        array $rulesLogin,
        array $rulesLoginMessage
    ): array {
        return $request->validate($rulesLogin, $rulesLoginMessage);
    }
}
