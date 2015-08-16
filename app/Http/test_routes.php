<?php

Route::get('/no-permission', function() {
	return view('skins.default.pages.no-permission');
});

Route::get('/debug', function(\App\Auth $auth) {

	dd(session('user_id'), $auth->getLoggedUser());

});

Route::get('/ajaxTest', ['as' => 'ajax.test', 'uses' => function() {
	return "This is ajax demo in laravel. <b>It works</b>";
}]);

Route::get('/ajax', function() {
	return view('ajax-view');
});

Route::get('/form', function(\App\Form $form) {
	$form->route = 'index';
	$form->title = 'Test form';
	$form->desc  = 'This is test form';

	$form->text('Name', 'Your name', '', 'Name');
	$form->text('Email', 'Your email address<br>Use valid email.', 'email@email.com');
	$form->space();
	$form->text('Key', 'Your private key', '', '0000-0000');

	$form->space();
	$form->submit('Wyslij!');

	//dd($form);

	return $form->getForm();
});