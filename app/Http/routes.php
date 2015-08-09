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
 * Index routes.
 */
Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

/**
 * Auth routes
 */ 
Route::group(['as' => 'auth.'], function () {
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
});

/**
 * ACP routes
 */ 
Route::group(['prefix' => 'acp', 'as' => 'acp.'], function () {

	Route::get('index', ['as' => 'index', 'uses' => function() {
		return view('skins.acp.layout');
	}]);

});
