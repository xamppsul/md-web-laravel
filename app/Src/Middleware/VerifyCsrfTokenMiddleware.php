<?php

namespace App\Src\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfTokenMiddleware extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/*',
        'elfinder/connector',
        'elfinder/connector/*',
        // Add other routes to exclude from CSRF here
    ];
}
