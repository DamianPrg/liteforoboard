<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	/**
	 * Display all categories with sub-categories.
	 *
	 * Also display sidebar with sides.
	 */
	public function index()
	{
		$categories = Category::all();

		//return view('skins.default.layouts.default', ['content' => 'Home page...']);
		return view('skins.default.index.forum', ['categories' => $categories]);
	}
}
