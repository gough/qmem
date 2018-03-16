<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use \App\User;

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
                    $netid = $_SERVER['HTTP_QUEENSU_NETID'];

                    $id = User::where('netid', $netid)->firstOrFail()->id;
                    $user = User::findOrFail($id);

                    try
                    {
                        $id = User::where('netid', $netid)->firstOrFail()->id;
                        $user = User::findOrFail($id);

                        // user found, check that they are active
                        if ($user->active)
                        { 
                            // user is active, so authenticate to our application using this id (not netid)
                            Auth::loginUsingId($user->id);

                            // check if additional user information is present in server headers
                            if (isset($_SERVER['HTTP_COMMON_NAME']) && isset($_SERVER['HTTP_QUEENSU_MAIL']))
                            {
                                // additional information is available, so update our records
                                $user->update([
                                    'name' => $_SERVER['HTTP_COMMON_NAME'],
                                    'email' => $_SERVER['HTTP_QUEENSU_MAIL']
                                ]);                         
                            }                    
                            
                            // finally, continue to next page
                            return $next($request);
                        }
                        else {
                            // user is not active (ie. disabled)
                            return response('Forbidden (user not active)', 403)->header('Content-Type', 'text/plain');
                        }
                    }
                    catch (ModelNotFoundException $e)
                    {
                        // user id NOT found, return forbidden message saying as such
                        return response('Forbidden (user doesn\'t exist)', 403)->header('Content-Type', 'text/plain');
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
