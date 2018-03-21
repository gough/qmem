<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use \App\User;

class AuthUser
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
        if (Auth::check())
        {
            if (Auth::user()->group->name == 'user')
            {
                return $next($request);
            }
            else
            {
                return response('Not Allowed (not user)', 405)->header('Content-Type', 'text/plain');
            }
        }
        else
        {
            return response('Forbidden (not authenticated)', 403)->header('Content-Type', 'text/plain');
        }
    }
    }
}
