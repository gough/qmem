<?php

namespace App\Http\Controllers;

use Session;
use App\User, App\UserGroup;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    private $rules = [
        'netid' => 'required|min:3',
        'group' => 'required'
    ];

    public function __construct()
    {
        $this->middleware(['auth', 'auth.admin']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET /users
        
        $users = User::sortable(['created_at' => 'desc'])->paginate(50);

        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        // GET /users/new
        
        $groups = UserGroup::pluck('name', 'id');

        return view('pages.users.new', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // POST /users/create
        
        $validator = $request->validate($this->rules);

        $user = new User;

        $user->netid = $validator['netid'];
        $user->group_id = $validator['group'];
        $user->save();

        Session::flash('message', '<strong>Success!</strong> User (' . $user->netid . ') was created.');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('users.view', $user->netid);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($netid)
    {
        // GET /users/{netid}/edit

        $id = User::where('netid', $netid)->firstOrFail()->id;
        $user = User::findOrFail($id);

        if ($user->netid == Auth::user()->netid)
        {
            return response('Not Allowed', 405)->header('Content-Type', 'text/plain');
        }

        $groups = UserGroup::pluck('name', 'id');

        return view('pages.users.edit', compact('user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $netid)
    {
        // POST /users/{netid}/update
        
        $id = User::where('netid', $netid)->firstOrFail()->id;
        $user = User::findOrFail($id);
        
        if ($user->netid == Auth::user()->netid)
        {
            return response('Not Allowed', 405)->header('Content-Type', 'text/plain');
        }

        $validator = $request->validate($this->rules);

        $user->update([
            'netid' => $validator['netid'],
            'group_id' => $validator['group']
        ]);

        Session::flash('message', '<strong>Success!</strong> User (' . $user->netid . ') was updated.');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('users.view', $user->netid);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete($netid)
    {
        // GET /users/{netid}/delete

        $id = User::where('netid', $netid)->firstOrFail()->id;
        $user = User::findOrFail($id);
        
        if ($user->netid == Auth::user()->netid)
        {
            return response('Not Allowed', 405)->header('Content-Type', 'text/plain');
        }

        return view('pages.users.delete', compact('user'));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $netid)
    {
        // POST /users/{netid}/destroy
        
        $id = User::where('netid', $netid)->firstOrFail()->id;
        $user = User::findOrFail($id);
        
        if ($user->netid == Auth::user()->netid)
        {
            return response('Not Allowed', 405)->header('Content-Type', 'text/plain');
        }

        User::destroy($id);

        Session::flash('message', '<strong>Success!</strong> User (' . $user->netid . ') was destoryed.');
        Session::flash('alert-class', 'alert-success');

        return redirect($request->post('next'));
    }
}

