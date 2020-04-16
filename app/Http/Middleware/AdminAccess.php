<?php

namespace App\Http\Middleware;

use Closure;

class AdminAccess
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
        if ($request->user()->hasRole('admin') || $request->user()->hasRole('editor') || $request->user()->hasRole('stats_admin')) {
            return $next($request);
        }

        return redirect()->route('homepage');
    }
}
