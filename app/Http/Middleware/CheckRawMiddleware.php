<?php

namespace App\Http\Middleware;

use Closure;
use App\Raw;

class CheckRawMiddleware
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
        $user = Raw::where('rawname',$userId)->first();
        if (! $user) {
            abort(404);
        }
        return $next($request);
    }
}
