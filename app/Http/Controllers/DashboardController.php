<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Venturecraft\Revisionable\Revision;

use \App\Asset, \App\Consumable, \App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $recent_activity = Revision::latest()->limit(10)->get();

    	$total_items = Asset::all()->toBase()->merge(Consumable::all())->count();
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
