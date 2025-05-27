<?php

namespace App\Src\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            Auth::guard('admin')->check() &&
            Auth::guard('admin')->user()->roles_id == 1
        ) {
            return $next($request);
        }
        return redirect()->route('admin.view.dashboard')->with('error', 'Izin di tolak');
    }
}
