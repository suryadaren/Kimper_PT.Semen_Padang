<?php

namespace App\Http\Middleware;

use Closure;

class IsKepalaUnit
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
        if (!auth()->guard('kepala_unit')->check()) {
            return redirect(url('/login_user'));
        }
        return $next($request);
    }
}
