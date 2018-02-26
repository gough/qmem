<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET /assets
        
        $assets = Asset::orderBy('created_at', 'desc')->paginate(50);

        return view('pages.assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET /assets/new
        
        return view('pages.assets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // POST /assets
        
        // TODO: actually store asset
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
                
        $asset = Asset::findOrFail($id); // TODO: actually load asset

        return view('pages.assets.view', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        // GET /assets/{id}/edit
        
        $asset = ''; // TODO: actually load asset

        return view('pages.assets.edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        // POST /assets/{id}
        
        // TODO: actually update asset
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function delete(Asset $asset)
    {
        // GET /assets/{id}/delete

        $asset = ''; // TODO: actually load asset

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
