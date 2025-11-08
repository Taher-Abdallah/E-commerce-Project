<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (empty($guards)) {
            $guards = ['web']; // الافتراضي web
        }

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::shouldUse($guard);
                return $next($request); // كمل عادي
            }

            // لو مش متسجل في الجارد ده
            if ($guard == 'admin') {
                return redirect()->route('admin.login');
            }

            if ($guard == 'web') {
                return redirect()->route('user.login');
            }
        }

        // fallback لو مفيش أي جارد
        return redirect()->route('login');
    }
    
}
