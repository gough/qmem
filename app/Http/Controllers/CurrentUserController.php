<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CurrentUserController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth')->except('logout');
    }

    public function profile(Request $request)
    {
        return view('pages.user.profile');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('https://idptest.queensu.ca/idp/profile/Logout');
    }
}
