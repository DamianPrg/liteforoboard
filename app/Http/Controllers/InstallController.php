<?php

namespace App\Http\Controllers;

/**
 *
 */
class InstallController
{
	/**
	 * Development setup
	 */
	public function dev_setup()
	{
		Artisan::call('migrate');
		Artisan::call('db:seed');
	}
	
	public function index()
	{
		$this->dev_setup();
	}
}
