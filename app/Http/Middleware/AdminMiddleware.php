<?php

namespace App\Http\Middleware;

use Closure;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $group) {
        if (!$request->user()->hasGroup($group)) {
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }
}
