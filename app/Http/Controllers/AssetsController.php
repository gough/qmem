<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Asset;

class AssetsController extends Controller
{
    public function index() {
    	$assets = Asset::paginate(50);

		return view('pages.assets.index', compact('assets'));
    }

    public function new() {
    	return view('pages.assets.new');
    }
}
