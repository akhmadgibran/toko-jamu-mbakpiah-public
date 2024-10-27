<?php

namespace App\Http\Middleware;

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
        // ! identifikasi apakah user ber usertype admin, apabila iya melanjutkan request
        // ! apabila tidak, mengembalikan ke halaman sebelumnya
        if (Auth::user()->usertype == "admin") {
            return $next($request);
        }
        return redirect()->back();
    }
}
