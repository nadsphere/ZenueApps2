<?php

namespace App\Http\Middleware;

use Closure;

class AuthUser
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
        $_check = Auth::guard('users')->check();

        if ($_check){
            return redirect()->back();
        }

        return $next($request);
    }
}
