<?php

namespace App\Http\Controllers\ACP;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function showCategories()
    {
        $c = Category::where('category_id', -1)->get();

        echo view('skins.acp.content.categories', ['categories' => $c]);
    }
}
