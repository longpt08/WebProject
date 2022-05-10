<?php

namespace App\Http\Middleware;

use App\Http\Enums\UserRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsOfficer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  (Auth::user()->roles == UserRole::ADMIN || Auth::user()->roles == UserRole::STAFF)) {
            return $next($request);
        }

        return redirect('/login');
    }
}
