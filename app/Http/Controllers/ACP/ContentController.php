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

    public function createCategory($category_id = -1)
    {
        $cat = Category::find($category_id);

        return view('skins.acp.content.categories.create', ['category_id' => $category_id, 'category' => $cat]);
    }

    public function storeCategory(Request $request, $category_id)
    {

        if($category_id != -1)
        {
            $c = Category::find($category_id);

            $c->addCategory($request->input('title'),
                            $request->input('desc'));
        }
        else
        {
            $c = Category::create([
                'title' => $request->input('title'),
                'desc' => $request->input('desc'),
                'category_id' => -1,
            ]);
        }

        return back();
    }

    public function removeAllCategories()
    {
        return back();
    }
}
