<?php

namespace App\Http\Controllers;

use App\Auth;
use App\Category;
use App\Topic;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $this->middleware('LoggedOnly', ['only' => 'store']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($slug)
    {
        //
        dd($slug);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @param  \App\Auth $auth
     * @return Response
     */
    public function store(Request $request, Auth $auth)
    {
        //
        $title   = $request->input('title');
        $message = $request->input('message');
        $cat_id  = $request->input('cat_id');

        // get category
        $category = Category::find($cat_id);

        $user = $auth->getLoggedUser();

        if($category)
        {
            $t = $category->addTopic($title, $message, $user, false, false);
        }

        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $topic = Topic::where('slug', $slug)->first();

        $this->checkFor404($topic);

        return view('skins.default.board.topic', ['topic' => $topic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
