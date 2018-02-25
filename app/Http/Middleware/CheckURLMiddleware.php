<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckURLMiddleware
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
        $userId = $request->route()->parameter('userid');
        $user = User::where('name',$userId)->first();
        if (! $user) {
            abort(404);
        }
        return $next($request);
    }
}
