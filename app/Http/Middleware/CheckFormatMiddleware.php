<?php

namespace App\Http\Middleware;

use Closure;
use App\Format;

class CheckFormatMiddleware
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
        $formatname = $request->route()->parameter('formatname');
        $formatmodel = User::where('formatname',$formatname)->first();
        if (! $formatmodel) {
            abort(404);
        }
        return $next($request);
    }
}
