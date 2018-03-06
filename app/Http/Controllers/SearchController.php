<?php

namespace App\Http\Controllers;

use \App\Asset, \App\Consumable;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth');
    }
	
    public function index(Request $request)
    {
    	$query = $request->get('query');

    	$assets = Asset::search($query)->get();
    	$consumables = Consumable::search($query)->get();

    	if ($assets->count() + $consumables->count() == 1)
    	{
            if ($assets->count() == 1)
            {
                return redirect()->route('assets.view', $assets->first()->id);
            }
            elseif ($consumables->count() == 1)
            {
                return redirect()->route('consumables.view', $consumables->first()->id);
            }    		
    	}

    	return view('pages.search.index', compact('assets', 'consumables'));
    }
}
