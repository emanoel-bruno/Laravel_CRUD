<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    // public function handle($request, Clousure $next)
    // {  
    // //array of routes to skip
    //     $skip = array(
    //         '/uploadimage'
    //     );

    //     foreach ($skip as $key => $route) {

    //         if ($request->is($route)) {
    //             return parent::addCookieToResponse($request, $next($request));
    //         }
    //     }
    //     return parent::handle($request, $next);
    // }
}
