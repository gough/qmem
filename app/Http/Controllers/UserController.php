<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET /users
        
        $users = User::orderBy('created_at', 'desc')->paginate(50);

        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET /users/new
        
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // POST /users
        
        // TODO: actually store user
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function view($netid)
    {
        // GET /users/{netid}
                
        $id = User::where('netid', $netid)->firstOrFail()->id;
        $user = User::findOrFail($id);

        return view('pages.users.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // GET /users/{id}/edit
        
        $user = ''; // TODO: actually load user

        return view('pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        // POST /users/{id}
        
        // TODO: actually update user
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        // GET /users/{id}/delete

        $user = ''; // TODO: actually load user

        return view('pages.users.delete', compact('user'));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // POST /users/{id}
        
        // TODO: actually destory user
    }
}

