<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Asset, \App\User;

class DashboardController extends Controller
{
    public function index() {
    	$recent_assets = Asset::orderBy('updated_at', 'desc')->limit(10)->get();

    	$total_assets = Asset::all()->count();
        $total_capital = Asset::where('type', 'capital')->count();
    	$total_consumable = Asset::where('type', 'consumable')->count();
    	$total_users = User::all()->count();

    	return view('pages.dashboard.index', compact(
    		'recent_assets', 
    		'total_assets', 
            'total_capital',
    		'total_consumable',
    		'total_users'
    	));
    }
}
