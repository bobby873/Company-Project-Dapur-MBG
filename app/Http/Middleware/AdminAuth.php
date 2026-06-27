<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('admin_id')) {
            return redirect('/login')->withErrors(['login_error' => 'Silakan login terlebih dahulu untuk mengakses halaman ini!']);
        }

        return $next($request);
    }
}
