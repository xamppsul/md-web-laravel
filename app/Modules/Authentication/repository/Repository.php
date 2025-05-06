<?php

namespace App\Modules\Authentication\repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Modules\Authentication\interfaces\Repository_interfaces;

class Repository implements Repository_interfaces
{

    public function ValidateLoginByExistingEmailOrUsernameRepository($credentials): bool
    {
        return Auth::attempt($credentials) ? true : false;
    }

    public function SetRequestLoginByUsernameOrEmailAndPasswordRepository($request): array
    {
        return filter_var($request->umail, FILTER_VALIDATE_EMAIL) ?
            ['email' => $request->umail, 'password' => $request->password] :
            ['username' => $request->umail, 'password' => $request->password];
    }

    public function GenerateSessionLoginRepository($credentials)
    {
        $login = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::guard('user')->login($login);
        return Auth::guard('user')->user();
    }

    public function RedirectLoginSuccessRepository(string $messageSuccessLogin): RedirectResponse
    {
        return redirect()->intended('/dashboard')->with('success', $messageSuccessLogin);
    }
}
