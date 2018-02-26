<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Asset, \App\Consumable, \App\User;

class DashboardController extends Controller
{
    public function index() {
    	$recent_assets = Asset::orderBy('updated_at', 'desc')->limit(10)->get();
        $recent_consumables = Consumable::orderBy('updated_at', 'desc')->limit(10)->get();

    	$total_items = 9999;
        $total_asset = Asset::count();
    	$total_consumable = Consumable::count();
    	$total_users = User::all()->count();

    	return view('pages.dashboard.index', compact(
    		'recent_assets',
            'recent_consumables',
    		'total_items', 
            'total_asset',
    		'total_consumable',
    		'total_users'
    	));
    }
}
