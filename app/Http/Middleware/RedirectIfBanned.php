<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfBanned
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        if (Auth::check() && !Auth::user()?->tester()) {
            abort(403, 'Sorry you can\'t use this app now');
        }

        if (Auth::check() && Auth::user()->isBanned()) {
            abort(403, __('errors.banned'));
        }

        return $next($request);
    }
}
