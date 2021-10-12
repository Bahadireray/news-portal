<?php

namespace App\Http\Middleware;


class CheckAdminPage
{
    public function handle($request, \Closure $next)
    {
        if (auth()->guest() || auth()->user() && !in_array(auth()->user()->type, ['ADMIN', 'MODERATOR'])) {
            return redirect(route('login'));
        }

        return $next($request);
    }
}
