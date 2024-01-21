<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class iniAdminOrPemilik
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'admin' && auth()->user()->role !== 'pemilik') {
            # code...
            abort(403);
        }
        // pindah ke karnel untuk mendaftarkan midleware 
        return $next($request);
    }
}
