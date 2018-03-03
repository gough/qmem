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
	->name('dashboard');

Route::get('search', 'SearchController@index')
	->name('search');

Route::prefix('assets')
	->name('assets.')
	->group(function () {

	Route::get('', 'AssetController@index')->name('index');
	// no POST view for listing
	
	Route::get('create', 'AssetController@create')->name('create');
	Route::post('store', 'AssetController@store')->name('store');

	Route::get('{id}', 'AssetController@view')->name('view');
	
	Route::get('{id}/edit', 'AssetController@edit')->name('edit');
	Route::post('update', 'AssetController@update')->name('update');

	Route::get('{id}/delete', 'AssetController@delete')->name('delete');
	Route::post('destroy', 'AssetController@destroy')->name('destroy');

});

Route::prefix('categories')
	->name('categories.')
	->group(function () {

	Route::get('', 'CategoryController@index')->name('index');
	// no POST view for listing
	
	Route::get('create', 'CategoryController@create')->name('create');
	Route::post('store', 'CategoryController@store')->name('store');

	Route::get('{id}', 'CategoryController@view')->name('view');
	
	Route::get('edit', 'CategoryController@edit')->name('edit');
	Route::post('update', 'CategoryController@update')->name('update');

	Route::get('delete', 'CategoryController@delete')->name('delete');
	Route::post('destroy', 'CategoryController@destroy')->name('destroy');

});

Route::prefix('consumables')
	->name('consumables.')
	->group(function () {

	Route::get('', 'ConsumableController@index')->name('index');
	// no POST view for listing

	Route::get('create', 'ConsumableController@create')->name('create');
	Route::post('store', 'ConsumableController@store')->name('store');
	
	Route::get('{id}', 'ConsumableController@view')->name('view');
	
	Route::get('{id}/edit', 'ConsumableController@edit')->name('edit');
	Route::post('update', 'ConsumableController@update')->name('update');

	Route::get('{id}/delete', 'ConsumableController@delete')->name('delete');
	Route::post('destroy', 'ConsumableController@destroy')->name('destroy');
});

Route::prefix('reports')
	->name('reports.')
	->group(function () {
	Route::get('', 'ReportsController@index')->name('index');
});

Route::prefix('user')
	->name('user.')
	->group(function () {
	Route::get('preferences', 'CurrentUserController@preferences')->name('preferences');
	Route::get('logout', 'CurrentUserController@logout')->name('logout');
});

Route::prefix('users')
	->name('users.')
	->group(function () {
	Route::get('', 'UserController@index')->name('index');
	Route::get('{netid}', 'UserController@view')->name('view');
});