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

Route::get('/', function(App\SettingsRepository $settingsRepository) {

	echo $settingsRepository->getGroupSettings()->default_admin_group;

});

Route::get('/update', function(App\SettingsRepository $settingsRepository) {
	//$settingsRepository->getGroupSettings()->update(['default_admin_group' => 100]);
		$group = App\Group::find(1);

$group->addPermission('edit', 'thread', 30);
});

Route::get('/cos', function() {

	$group = App\Group::find(1);

	if($group->hasPermission('access', 'acp'))
	{
		echo "Masz dostep!";
	}
	else 
	{
		echo "Brak dostepu.";

		if($group->hasPermission('access', 'modcp'))
		{
			echo "brak dostepu do modcp takze...";
		}
	}

});

Route::get('/set_new_color/{color}', function($color) {
	config(['test.fav_color' => $color]);

	config(['test.fav_color' => 'green']);

	config(['app.debug' => false]);
});

Route::get('/myroute', function() {

	echo config('test.fav_color');

});