<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Asset;

class DashboardController extends Controller
{
    public function index() {
    	$recent_assets = Asset::orderBy('updated_at', 'desc')->take(10)->get();
    	$total_assets = Asset::all()->count();

    	return view('pages.dashboard.index', compact('recent_assets', 'total_assets'));
    }
}
