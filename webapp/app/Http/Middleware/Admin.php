<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        $isAdmin = false;

        // Get the current user
        $user = Auth::user();
        if ($user) {
            // Determine if they are an app admin
            $isAdmin = $user->hasRole('app_admin');
        }

        // Perform Auth Guard check
        if (Auth::guard($guard)->guest() || !$isAdmin) {
            if ($request->ajax() || $request->wantsJson()) {
                return response(trans('backpack::base.unauthorized'), 401);
            } else {
                return redirect()->guest(config('backpack.base.route_prefix', 'admin') . '/login');
            }
        }

        return $next($request);
    }
}
