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
Route::get('/reset', ['uses' => 'InstallController@reset', 'middleware' => 'AdminOnly']);

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
	Route::get('/profile/{slug}', ['as' => 'profile', 'uses' => 'UserController@show']);
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

	Route::get('form', function(\App\Form $form) {

		$form->route = 'index';

		$form->text('Site title', "Site's title", 'LiteForo Community', "Title");

		$form->space();
		$form->submit('Update');

		return $form->getACPForm();

	});

});

/**
 *
 */
Route::get('/404', function() {
	return view('skins.default.pages.404');
});

/**
 * Ajax routes
 */

Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function() {

	/**
	 * returns true is username exists.
	 */
	Route::get('username_taken', ['as' => 'usernameTaken', 'uses' => function(\Illuminate\Http\Request $request) {

		$u = \App\User::where('username', $request->input('username'))->first();

		if($u == null)
		{
			return response()->json(['result' => false]);
		}

		return response()->json(['result' => true]);

	}]);

});

