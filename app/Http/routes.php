<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Install routes.
 */
Route::get('/install', 'InstallController@install');

/**
 * Index routes.
 */
Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

/**
 * Auth routes
 */ 
Route::group(['as' => 'auth.'], function () {
	Route::get('/login', 'AuthController@loginPage');
	Route::post('/do_login', ['as' => 'do.login', 'uses' => 'AuthController@login']);
	Route::get('/logout', 'AuthController@logout');
});

/**
 * User routes
 */ 
Route::group(['as' => 'user.'], function () {
});

/**
 * Forum/Board routes
 */ 
Route::group(['as' => 'board.'], function () {
	Route::get('/category/{slug}', ['as' => 'category.show', 'uses' => 'CategoryController@show']);

	Route::get('/topic/{slug}', ['as' => 'topic.show', 'uses' => 'TopicController@show']);
});

/**
 * ACP routes
 */ 
Route::group(['prefix' => 'acp', 'as' => 'acp.', 'namespace' => 'ACP', 'middleware' => 'AdminOnly'], function () {

	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

});

/**
 *
 */
Route::get('/404', function() {
	return view('skins.default.pages.404');
});

