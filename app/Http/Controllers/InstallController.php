<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 *
 */
class InstallController extends Controller
{
	/**
	 * Development setup
	 */
	public function devSetup()
	{
		\Artisan::call('key:generate');
		\Artisan::call('migrate');
		\Artisan::call('db:seed');
	}
	
	public function install()
	{
		$this->devSetup();
		
		echo "Installed...";

		return redirect('/');
	}

	public function reset()
	{
		\Artisan::call('migrate:reset');
		\Artisan::call('migrate');
		\Artisan::call('db:seed');

		return redirect('/');
	}
}
