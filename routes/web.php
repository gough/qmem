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
		
	// Route::get('', 'AssetsController@index')->name('index');
	// Route::get('capital', 'AssetsController@capital')->name('capital');
	// Route::get('consumable', 'AssetsController@consumable')->name('consumable');
	// Route::get('new', 'AssetsController@new')->name('new');

	// Route::post('', 'AssetsController@store')->name('store');

	Route::get('', 'AssetController@index')->name('index');
	// no POST view for listing
	
	Route::get('create', 'AssetController@create')->name('create');
	Route::post('store', 'AssetController@store')->name('store');

	Route::get('{id}', 'AssetController@view')->name('view');
	
	Route::get('edit', 'AssetController@edit')->name('edit');
	Route::post('update', 'AssetController@update')->name('update');

	Route::get('delete', 'AssetController@delete')->name('delete');
	Route::post('destroy', 'AssetController@destroy')->name('destroy');

});

Route::prefix('consumables')
	->name('consumables.')
	->middleware('auth')
	->group(function () {

	Route::get('', 'ConsumableController@index')->name('index');
	// no POST view for listing

	Route::get('create', 'ConsumableController@create')->name('create');
	Route::post('store', 'ConsumableController@store')->name('store');
	
	Route::get('{id}', 'ConsumableController@view')->name('view');
	
	Route::get('edit', 'ConsumableController@edit')->name('edit');
	Route::post('update', 'ConsumableController@update')->name('update');

	Route::get('delete', 'ConsumableController@delete')->name('delete');
	Route::post('destroy', 'ConsumableController@destroy')->name('destroy');
});

Route::prefix('reports')
	->name('reports.')
	->middleware('auth')
	->group(function () {
	Route::get('', 'ReportsController@index')->name('index');
});

Route::prefix('users')
	->name('users.')
	->middleware('auth')
	->group(function () {
	Route::get('', 'UserController@index')->name('index');
	Route::get('{netid}', 'UserController@view')->name('view');
	Route::get('preferences', 'UserController@preferences')->name('preferences');
	Route::get('logout', 'UserController@logout')->name('logout');
});