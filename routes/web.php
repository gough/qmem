<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('inventory', function () {
    return view('pages.inventory');
})->name('inventory');

Route::get('reports', function () {
    return view('pages.reports');
})->name('reports');

Route::get('search', function () {
	return view('pages.search');
})->name('search');

Route::get('logout', function() {
	// TODO: close session
	return redirect('https://idptest.queensu.ca/idp/profile/Logout');
})->name('logout');

