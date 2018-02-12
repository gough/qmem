<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AssetsController extends Controller
{
    public function index() {
    	$assets = DB::table('assets')->get();

		return view('pages.assets.index', compact('assets'));
    }

    public function new() {
    	return view('pages.assets.new');
    }
}
