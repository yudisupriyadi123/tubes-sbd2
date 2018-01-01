<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAdminAuthenticated
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
        // Costumer redirected to homepage
        if (Auth::guard()->check()) {
            return redirect('/');
        }

        if (Auth::guard('web_admin')->check()) {
            return redirect('/admin/dashboard');
        }

        return $next($request);
    }
}
