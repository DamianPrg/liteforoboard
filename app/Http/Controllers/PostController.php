<?php

namespace App\Http\Controllers;

use App\Auth;
use App\Post;
use App\Topic;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('LoggedOnly', ['only' => 'store']);
        $this->middleware('StaffOnly', ['only' => ['remove', 'edit']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\StorePostRequest $request, $topic_id, Auth $auth)
    {
        //
        $t = Topic::find($topic_id);

        $t->addPost($request->input('message'), $auth->getLoggedUser());

        return redirect(route('board.topic.show', [$t->slug]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
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


    /**
     * @param $post_id
     */
    public function remove($post_id)
    {
        Post::destroy($post_id);

    }

    /**
     * @param $post_id
     * @return \Illuminate\View\View
     */
    public function edit($post_id)
    {
        return view('skins.default.board.post.edit', ['post' => Post::find($post_id)]);
    }

    /**
     *
     */
    public function edit_store(Request $request)
    {

    }
}
