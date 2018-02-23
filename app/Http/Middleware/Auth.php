<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class Auth
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
        // if environment is local, bypass authentication
        if (env('APP_ENV') == 'local') {
            return $next($request);
        }

        // get netid from server variables
        $netid = $_SERVER['HTTP_QUEENSU_NETID'];
        $netidExists = DB::table('users')->where('netid', $netid)->exists();

        // check if netid exists as an entry in the users table
        if ($netidExists === False) {
            // if it doesn't, return a forbidden message, indicating as such
            return response('Forbidden', 403)->header('Content-Type', 'text/plain');
        } else {
            // if netid exists, make sure all information is up to date
            DB::table('users')->where('netid', $netid)->update([
                'name' => $_SERVER['HTTP_COMMON_NAME'],
                'email' => $_SERVER['HTTP_QUEENSU_MAIL'],
            ]);
        }

        // if it does exist, continue
        return $next($request);
    }
}
