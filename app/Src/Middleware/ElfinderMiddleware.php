<?php

namespace App\Src\Middleware;

use Closure;
use Illuminate\Http\Request;
use Barryvdh\Elfinder\Elfinder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class ElfinderMiddleware
{
    /**
     * Handle an incoming request.
     * @method handle
     * @param $next
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('user')->check()) {
            //staff or faculty
            $user = Auth::guard('user')->user();
            if ($user->roles_id == 2 || $user->roles_id == 3) {
                $basePath = $this->getBasePath($user);
                if (!$this->validateExistingFolder($basePath)) {
                    $this->makeFolder($basePath);
                }
                $this->configureElfinder($basePath, $user);
            }
            return $next($request);
        }

        if (Auth::guard('admin')->check()) {
            //admin
            $admin = Auth::guard('admin')->user();
            if ($admin->roles_id == 1) {
                $this->configureElfinder(public_path('/MD_disk'), $admin); //get all files from folder base session user in MD_disk
            }
            return $next($request);
        }
        abort(401, 'Unauthorized action.');
    }

    /**
     * @method getBasePath
     * @param mixed $user
     * @return string
     */
    private static function getBasePath(mixed $user): string
    {
        return public_path("MD_disk/{$user->id}-{$user->name}"); //use of prefix is ID
    }

    /**
     * @method makeFolder
     * @param string $basePath
     * @return string
     */
    private static function makeFolder(string $basePath): void
    {
        mkdir($basePath, 0755, true); //permission is 0755
    }

    /**
     * @method validateExistingFolder
     * @param string $basePath
     * @return bool
     */
    private static function validateExistingFolder(string $basePath): bool
    {
        return file_exists($basePath) ? true : false;
    }

    /**
     * @method configureElfinder
     * @param string $basePath
     * @return void
     */
    private static function configureElfinder(string $basePath, mixed $session): void
    {
        if ($session->roles_id == 2 || $session->roles_id == 3) {
            //user: staff or faculty
            Config::set('elfinder.roots', [
                [
                    'driver'        => 'LocalFileSystem',
                    'path'          => $basePath,
                    'URL'           => env('APP_URL') . "/MD_disk/{$session->id}-{$session->name}",
                    'accessControl' => Elfinder::class . '@checkAccess',
                    'uploadDeny'  => ['all'],
                    'uploadAllow' => [
                        'image',
                        'application/pdf',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                    ],
                    'uploadOrder' => ['deny', 'allow'],
                ],
            ]);
        } else {
            //admin: super admin
            Config::set('elfinder.roots', [
                [
                    'driver'        => 'LocalFileSystem',
                    'path'          => $basePath,
                    'URL'           => env('APP_URL') . "/MD_disk",
                    'accessControl' => Elfinder::class . '@checkAccess',
                    'uploadDeny'  => ['all'],
                    'uploadAllow' => [
                        'image',
                        'application/pdf',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                    ],
                    'uploadOrder' => ['deny', 'allow'],
                ],
            ]);
        }
    }
}
