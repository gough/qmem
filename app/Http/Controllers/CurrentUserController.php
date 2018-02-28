<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CurrentUserController extends Controller
{
    public function preferences(Request $request)
    {
        return view('pages.user.preferences');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('https://idptest.queensu.ca/idp/profile/Logout');
    }
}
