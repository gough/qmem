<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function preferences() {
    	return view('pages.user.preferences');
    }

    public function logout() {
		return redirect('https://idptest.queensu.ca/idp/profile/Logout');
    }
}
