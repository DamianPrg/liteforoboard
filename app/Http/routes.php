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
});

/**
 * ACP routes
 */ 
Route::group(['prefix' => 'acp', 'as' => 'acp.', 'namespace' => 'ACP', 'middleware' => 'AdminOnly'], function () {

	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

});


/**
 * Test
 */
Route::get('/auth/{username}/{password}', function($username, $password, \App\Auth $auth) {

	if($auth->auth($username, $password))
	{
		echo "ok";
	}
	else {
		echo "bad!";
	}

});


Route::get('/profile', function(\App\Auth $auth) {

	if($auth->isUserLogged())
	{
		echo "You are logged as: " . $auth->getLoggedUser()->username . "!";
	}
	else {
		echo "You are not logged.";
	}

});

Route::get('/test/{id?}', function($id = 1) {

	/*
	$post = \App\Post::find(1);

	dd($post->author);
	*/

	$user = \App\User::findOrFail($id);

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

Route::get('/slug', function() {



	echo strtolower(str_slug('Jak sie macie?'));

});
