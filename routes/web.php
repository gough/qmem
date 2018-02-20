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

Route::get('/', function() {
	return redirect('dashboard');
})->name('buffer')->middleware('auth');

Route::get('dashboard', 'DashboardController@index')
	->name('dashboard')
	->middleware('auth');

Route::get('search', 'SearchController@index')
	->name('search')
	->middleware('auth');

Route::prefix('assets')
	->name('assets.')
	->middleware('auth')
	->group(function () {
	Route::get('', 'AssetsController@index')->name('index');
	Route::get('capital', 'AssetsController@capital')->name('capital');
	Route::get('consumable', 'AssetsController@consumable')->name('consumable');
	Route::get('new', 'AssetsController@new')->name('new');
});

Route::prefix('reports')
	->name('reports.')
	->middleware('auth')
	->group(function () {
	Route::get('', 'ReportsController@index')->name('index');
});

Route::prefix('user')
	->name('user.')
	->middleware('auth')
	->group(function () {
	Route::get('', 'UserController@index')->name('index');
	Route::get('preferences', 'UserController@preferences')->name('preferences');
	Route::get('logout', 'UserController@logout')->name('logout');
});