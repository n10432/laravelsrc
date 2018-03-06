<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckUserMiddleware
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
        $userid = $request->route()->parameter('userid');
        $usermodel = User::where('userid',$userid)->first();
        if (! $usermodel) {
            abort(404);
        }
        return $next($request);
    }
}
