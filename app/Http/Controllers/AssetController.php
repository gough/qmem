<?php

namespace App\Http\Controllers;

use App\Asset, App\Category, App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // POST /assets
        
        $rules = array(
            'name' => 'required|min:2|max:255',
            'category' => 'required'
        );

        $messages = array(
            'name.required' => 'name.required',
            'name.min' => 'name.min',
            'name.max' => 'name.max',
            'category.required' => 'category.required',
        );
        
        $validator = $request->validate($rules, $messages);

        $asset = new Asset;

        $asset->name = $validator['name'];
        $asset->category_id = $validator['category'];
        $asset->user_id = Auth::user()->id;

        $asset->save();

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

        $asset = Asset::findOrFail($id);

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
            'category' => 'required'
        );

        $messages = array(
            'name.required' => 'name.required',
            'name.min' => 'name.min',
            'name.max' => 'name.max',
            'category.required' => 'category.required',
        );
        
        $validator = $request->validate($rules, $messages);

        $asset->update([
            'name' => $validator['name'],
            'category_id' => $validator['category']
        ]);

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
    public function destroy(Asset $asset)
    {
        // POST /assets/{id}
        
        // TODO: actually destory asset
    }
}
