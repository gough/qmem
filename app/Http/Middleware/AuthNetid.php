<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;

//use Illuminate\Support\Facades\Auth;

class AuthNetid
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
        if (env('APP_ENV') == 'local')
        {
            // if environment is local, manually login because we can't use netid system
            Auth::loginUsingId(1);
            return $next($request);
        }
        else
        {
            // check if user is already authenticated
            if (Auth::check())
            {
                // user is already authenticated, so continue to next page
                return $next($request);
            }
            else
            {
                // user is NOT already authenticated, continue with authentication process
                
                // check if netid header is present
                if (isset($_SERVER['HTTP_QUEENSU_NETID']))
                {
                    // header is present, lookup user id by searching for netid
                    $user_id = DB::table('users')->where('netid', $_SERVER['HTTP_QUEENSU_NETID'])->select('id')->get();

                    // if user id has been found from netid and user isn't disabled
                    if ($user_id->count() == 1)
                    {
                        // user found, check that they are active
                        if (User::find($user_id)->active)
                        { 
                            // user is active, so authenticate to our application using this id (not netid)
                            Auth::loginUsingId($user_id->first()->id);
                            $user = Auth::user();

                            // check if additional user information is present in server headers
                            if (isset($_SERVER['HTTP_COMMON_NAME']) && isset($_SERVER['HTTP_QUEENSU_MAIL']))
                            {
                                // additional information is available, so check if we need to update our records
                                // by default we assume nothing has changed
                                $changed = False;

                                if ($user->name != $_SERVER['HTTP_COMMON_NAME'])
                                {
                                    $user->name = $_SERVER['HTTP_COMMON_NAME'];
                                    $changed = True;
                                }

                                if ($user->email != $_SERVER['HTTP_QUEENSU_MAIL'])
                                {
                                    $user->email = $_SERVER['HTTP_QUEENSU_MAIL'];   
                                    $changed = True;
                                }

                                // if we've changed any information, save it back to the database
                                if ($changed)
                                {
                                    $user->save();
                                }                          
                            }                    
                            
                            // finally, continue to next page
                            return $next($request);
                        }
                        else {
                            // user is not active (ie. disabled)
                            return response('Forbidden (user not found)', 403)->header('Content-Type', 'text/plain');
                        }
                    }
                    else
                    {
                        // user id NOT found, return forbidden message saying as such
                        return response('Forbidden (user not found)', 403)->header('Content-Type', 'text/plain');
                    }
                }
                else {
                    // header is NOT present, return forbidden message saying as such
                    return response('Forbidden (header not set)', 403)->header('Content-Type', 'text/plain');
                }
            }
        }
    }
}
