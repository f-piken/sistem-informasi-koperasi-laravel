<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$guard): Response
    {
        // Cek apakah request memiliki data login
        if (Auth::guard($guard)->check()){
            return $next($request);
        }

        // Jika pengguna tidak terautentikasi dan tidak memiliki data login, arahkan ke halaman login
        return redirect()->route('login')->withErrors(['error'=>'login terlebih dahulu!']);

    }
}
