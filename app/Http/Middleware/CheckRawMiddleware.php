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
        $rawname = $request->route()->parameter('rawname');
        $rawmodel = Raw::where('rawname',$rawname)->first();
        if (! $rawmodel) {
            abort(404);
        }
        return $next($request);
    }
}
