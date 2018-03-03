<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Asset, \App\Consumable, \App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $recent_activity = Asset::all()->toBase()->merge(Consumable::all())->sortByDesc('updated_at')->take(10);

    	$total_items = 9999;
        $total_asset = Asset::count();
    	$total_consumable = Consumable::count();
    	$total_users = User::count();

    	return view('pages.dashboard.index', compact(
    		'recent_activity',
    		'total_items', 
            'total_asset',
    		'total_consumable',
    		'total_users'
    	));
    }
}
