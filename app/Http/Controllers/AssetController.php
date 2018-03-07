<?php

namespace App\Http\Controllers;

use App\Asset, App\Category, App\User;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AssetController extends Controller
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
        // GET /assets
        
        $assets = Asset::sortable(['created_at' => 'desc'])->paginate(50);

        return view('pages.assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        // GET /assets/new
        
        $categories = Category::pluck('name', 'id')->sort();

        return view('pages.assets.new', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // POST /assets/create
        
        $rules = array(
            'name' => 'required|min:2|max:255',
            'category' => 'required',
            'image' => ''
        );
        
        $validator = $request->validate($rules);

        $asset = new Asset;

        $asset->name = $validator['name'];
        $asset->category_id = $validator['category'];
        $asset->user_id = Auth::user()->id;

        $asset->save();

        Session::flash('message', '<strong>Success!</strong> Asset #' . $asset->id . ' was created.');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('assets.view', $asset->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        // GET /assets/{id}

        try
        {
            $asset = Asset::findOrFail($id);
        }
        catch (ModelNotFoundException $e)
        {
            return redirect()->route('assets.index');
        }

        return view('pages.assets.view', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GET /assets/{id}/edit
        
        $asset = Asset::findOrFail($id);
        $categories = Category::pluck('name', 'id')->sort();

        return view('pages.assets.edit', compact('asset', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // POST /assets/{id}/update
        
        $asset = Asset::findOrFail($id);

        $rules = array(
            'name' => 'required|min:2|max:255',
            'category' => 'required',
            'image' => ''
        );
        
        $validator = $request->validate($rules);

        $asset->update([
            'name' => $validator['name'],
            'category_id' => $validator['category']
        ]);

        Session::flash('message', '<strong>Success!</strong> Asset #' . $asset->id . ' was updated.');
        Session::flash('alert-class', 'alert-success');

        return redirect()->route('assets.view', $asset->id);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // GET /assets/{id}/delete

        $asset = Asset::findOrFail($id);

        return view('pages.assets.delete', compact('asset'));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // POST /assets/{id}/destroy
        
        $asset = Asset::findOrFail($id);

        Asset::destroy($id);

        Session::flash('message', '<strong>Success!</strong> Asset #' . $asset->id . ' was destoryed.');
        Session::flash('alert-class', 'alert-success');

        return redirect($request->post('next'));
    }
}
