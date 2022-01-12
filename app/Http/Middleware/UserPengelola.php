<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserPengelola
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'root') {
            return redirect()->route('root');
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin');
        }

        if (Auth::user()->role == 'pengelola') {
            return redirect()->route('pengelola');
        }

        if (Auth::user()->role == 'user') {
            return redirect()->route('user');
        }
    }
}
