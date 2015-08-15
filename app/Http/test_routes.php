<?php

Route::get('/no-permission', function() {
	return view('skins.default.pages.no-permission');
});

Route::get('/debug', function(\App\Auth $auth) {

	dd(session('user_id'), $auth->getLoggedUser());

});