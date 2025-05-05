<?php

namespace App\Src\Request\User\Auth;

class AuthRequest
{
    public function loginRequest($request, array $rulesLogin, array $rulesLoginMessage)
    {
        return $request->validate($rulesLogin, $rulesLoginMessage);
    }
}
