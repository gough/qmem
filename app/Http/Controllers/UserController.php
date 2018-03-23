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
        'group' => 'required',
        'active' => 'required|boolean'
    ];

    private $actives = array(
        1 => 'True',
        0 => 'False'
    );

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
        $actives = $this->actives;

        return view('pages.users.new', compact('groups', 'actives'));
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
        $user->active = $validator['active'];
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
                
        $user = User::where('netid', $netid)->firstOrFail();

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

        $user = User::where('netid', $netid)->firstOrFail();

        if ($user->netid == Auth::user()->netid)
        {
            return response('Not Allowed', 405)->header('Content-Type', 'text/plain');
        }

        $groups = UserGroup::pluck('name', 'id');
        $actives = $this->actives;

        return view('pages.users.edit', compact('user', 'groups', 'actives'));
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
        
        $user = User::where('netid', $netid)->firstOrFail();
        
        if ($user->netid == Auth::user()->netid)
        {
            return response('Not Allowed', 405)->header('Content-Type', 'text/plain');
        }

        $validator = $request->validate($this->rules);

        $netidChanged = ($user->netid != $validator['netid']) ? true : false;

        $user->update([
            'netid' => $validator['netid'],
            'group_id' => $validator['group'],
            'active' => $validator['active']
        ]);

        Session::flash('message', '<strong>Success!</strong> User (' . $user->netid . ') was updated.');
        Session::flash('alert-class', 'alert-success');

        if ($netidChanged)
        {
            return redirect()->route('users.view', $user->netid);
        }
        else
        {
            return redirect($request->post('next'));
        }
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

        $user = User::where('netid', $netid)->firstOrFail();
        
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
        
        $user = User::where('netid', $netid)->firstOrFail();
        
        if ($user->netid == Auth::user()->netid)
        {
            return response('Not Allowed', 405)->header('Content-Type', 'text/plain');
        }

        User::destroy($user->id);

        Session::flash('message', '<strong>Success!</strong> User (' . $user->netid . ') was destoryed.');
        Session::flash('alert-class', 'alert-success');

        return redirect(route('users.index'));
    }
}

