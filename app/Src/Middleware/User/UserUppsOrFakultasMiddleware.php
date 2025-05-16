<?php

namespace App\Src\Middleware\User;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserUppsOrFakultasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            Auth::guard('user')->check() &&
            Auth::guard('user')->user()->roles_id == 3
        ) {
            return $next($request);
        }
        return redirect()->route('user.view.dashboard')->with('error', 'Izin di tolak');
    }
}
