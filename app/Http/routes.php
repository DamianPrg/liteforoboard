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
	Route::get('/category/remove/{id}', ['as' => 'category.remove', 'uses' => 'CategoryController@destroy']);

	Route::get('/topic/{slug}', ['as' => 'topic.show', 'uses' => 'TopicController@show']);
	Route::get('/topic/create/{cat_id}', ['as' => 'topic.create', 'uses' => 'TopicController@create']);
	Route::post('/topic/store/{cat_id}', ['as' => 'topic.store', 'uses' => 'TopicController@store']);

	Route::get('/topic/pin/{topic_id}/{value}', ['as' => 'topic.pin', 'uses' => 'TopicController@pin']);
	Route::get('/topic/lock/{topic_id}/{value}', ['as' => 'topic.lock', 'uses' => 'TopicController@lock']);

	Route::post('/post/store/{topic_id}', ['as' => 'post.store', 'uses' => 'PostController@store']);
	Route::get('/post/remove/{post_id}', ['as' => 'post.remove', 'uses' => 'PostController@remove']);
	Route::get('/post/edit/{post_id}', ['as' => 'post.edit', 'uses' => 'PostController@edit']);
	Route::post('/post/edit-store/{id}', ['as' => 'post.edit-store', 'uses' => 'PostController@edit_store']);
});

/**
 * ACP routes
 */ 
Route::group(['prefix' => 'acp', 'as' => 'acp.', 'namespace' => 'ACP', 'middleware' => 'AdminOnly'], function () {

	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

	// Content
	Route::get('content/categories', ['as' => 'content.categories', 'uses' => 'ContentController@showCategories']);
	Route::get('content/create-category/{id}', ['as' => 'content.categories.create', 'uses' => 'ContentController@createCategory']);
	Route::get('content/category/remove-all',['as' => 'content.categories.remove-all', 'uses' => 'ContentController@removeAllCategories']);
	Route::post('content/store-category/{id}', ['as' => 'content.categories.store', 'uses' => 'ContentController@storeCategory']);
	Route::get('content/edit-category/{id}', ['as' => 'content.categories.edit', 'uses' => 'ContentController@editCategory']);
	Route::post('content/update-category/{id}', ['as' => 'content.categories.update', 'uses' => 'ContentController@updateCategory']);

	// Groups
	Route::get('groups/index', ['as' => 'groups.index', 'uses' => 'GroupController@index']);
	Route::get('groups/create', ['as' => 'groups.create', 'uses' => 'GroupController@create']);
	Route::get('groups/edit/{id}', ['as' => 'groups.edit', 'uses' => 'GroupController@edit']);
	Route::post('groups/store', ['as' => 'groups.store', 'uses' => 'GroupController@store']);
	Route::post('groups/update/{id}', ['as' => 'groups.update', 'uses' => 'GroupController@update']);
	Route::post('groups/destroy/{id}', ['as' => 'groups.destroy', 'uses' => 'GroupController@destroy']);



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

/**
 * API
 */
Route::group(['prefix' => 'api'], function() {

	Route::get('user_{id}.json', 'APIController@user');
	Route::get('user_auth.{username}.{password}.json', 'APIController@auth');

});