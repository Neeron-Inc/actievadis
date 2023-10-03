<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()->is_admin()) {
            return abort(403)
                ->header('Refresh', '10;url=' . route('home'));
        }

        return $next($request);
    }
}
