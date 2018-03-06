<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Venturecraft\Revisionable\Revision;

use \App\Asset, \App\Consumable, \App\Category, \App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $recent_activity = Revision::latest()->limit(10)->get();

        $total_assets = Asset::count();
    	$total_consumables = Consumable::count();
        $total_categories = Category::count();
    	$total_users = User::count();

    	return view('pages.dashboard.index', compact(
    		'recent_activity',
            'total_assets',
    		'total_consumables',
            'total_categories',
    		'total_users'
    	));
    }
}
