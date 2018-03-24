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

    	$assets = Asset::search($query)->raw();
    	$consumables = Consumable::search($query)->raw();

    	if ($assets['nbHits'] + $consumables['nbHits'] == 1)
    	{
            if ($assets['nbHits'] == 1)
            {
                return redirect()->route('assets.view', $assets['hits'][0]['id']);
            }
            elseif ($consumables['nbHits'] == 1)
            {
                return redirect()->route('consumables.view', $consumables['hits'][0]['id']);
            }    		
    	}

    	return view('pages.search.index', compact('assets', 'consumables'));
    }
}
