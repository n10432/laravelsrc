<?php

namespace App\Http\Middleware;

use Closure;
use App\Project;

class CheckProjectMiddleware
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
        $projectname = $request->route()->parameter('projectname');
        $projectmodel = Project::where('projectname',$projectname)->first();
        if (! $projectmodel) {
            abort(404);
        }
        return $next($request);
    }
}
