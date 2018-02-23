<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Asset;

class AssetsController extends Controller
{
    public function index() {
    	$assets = Asset::orderBy('created_at', 'desc')->paginate(50);

		return view('pages.assets.index', compact('assets'));
    }

    public function capital() {
        $assets = Asset::where('type', 'capital')->paginate(50);

        return view('pages.assets.capital', compact('assets'));
    }

    public function consumable() {
        $assets = Asset::where('type', 'consumable')->paginate(50);

        return view('pages.assets.consumable', compact('assets'));
    }

    public function new() {
    	return view('pages.assets.new');
    }
}
