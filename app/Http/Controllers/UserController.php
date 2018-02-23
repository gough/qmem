<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
        $users = User::paginate(20);
        return view ('pages.user.index', compact('users'));
    }
    public function preferences(Request $request) {
        dd($request->user());
    	return view('pages.user.preferences');
    }

    public function logout() {
        Auth::logout();
		return redirect('https://idptest.queensu.ca/idp/profile/Logout');
    }
}
