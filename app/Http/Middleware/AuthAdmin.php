<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class AuthAdmin
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
        $netid = $_SERVER['HTTP_QUEENSU_NETID'];
        $netidGroup = DB::table('users')->where('netid', $netid)->value('group');

        if ($netidGroup != 'admin') {
            return response('Forbidden (not admin)', 403)->header('Content-Type', 'text/plain');
        }

        return $next($request);
    }
}
