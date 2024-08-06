<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class cobaPosisi
{
    public function handle(Request $request, Closure $next, ...$role)
    {
        if (in_array($request->user()->role, $role)) {
            // Log::info('Login attempt:', ['login berhasil']);
            return $next($request);
        }
        return redirect('/')->withErrors(['error' => 'Akses ditolak. Anda bukan admin.']);
    }
}
