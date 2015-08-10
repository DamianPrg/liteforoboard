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
		return view('skins.acp.dashboard');
	}]);

	Route::get('test', ['as' => 'test', 'uses' => function() {
		return view('skins.acp.test');
	}]);

});


/**
 * Test
 */
Route::get('/test/{id?}', function($id = 1) {

	/*
	$post = \App\Post::find(1);

	dd($post->author);
	*/

	$user = \App\User::find($id);

	//dd($user->group);

	if($user->hasGroup())
	{
		echo "User has group";


	}
	else
	{
		echo "User doesnt have group or group doesnt exist!!!";
	}

	if($user->can('access', 'acp'))
	{
		echo "User can access acp with this group";
	}
	else
	{
		echo "User can't access acp because group doesn't have permission or user doesn't have group.";
	}

});