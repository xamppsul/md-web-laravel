<?php

namespace App\Src\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class ElfinderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('user')->check()) {
            //staff
            $user = Auth::guard('user')->user();
            if ($user->roles_id == 2) {
                $basePath = $this->getBasePathStaffDosen($user);
                if (!$this->validateExistingFolder($basePath)) {
                    $this->makeFolder($basePath);
                }
                $this->configureElfinder($basePath);
            } else {
                //upps or faculty
                $basePath = $this->getBasePathFacultyOrUpps($user);
                if (!$this->validateExistingFolder($basePath)) {
                    $this->makeFolder($basePath);
                }
                $this->configureElfinder($basePath);
            }
            return $next($request);
        }

        if (Auth::guard('admin')->check()) {
            //admin
            return $next($request);
        }
        abort(401, 'Unauthorized action.');
    }

    private static function getBasePathStaffDosen($user): string
    {
        return public_path("MD_disk/StaffOrDosen-{$user->name}"); //use of prefix
    }

    private static function getBasePathFacultyOrUpps($user): string
    {
        return public_path("MD_disk/{$user->name}"); // just name of faculty or upps
    }

    private static function makeFolder($basePath): void
    {
        mkdir($basePath, 0755, true); //permission is 0755
    }

    private static function validateExistingFolder($basePath): bool
    {
        return file_exists($basePath) ? true : false;
    }

    private static function configureElfinder($basePath): void
    {
        Config::set('elfinder.roots', [
            [
                'driver'        => 'LocalFileSystem',
                'path'          => $basePath,
                'URL'           => env('APP_URL') . '/MD_disk',
                'accessControl' => 'access',
            ],
        ]);
    }
}
