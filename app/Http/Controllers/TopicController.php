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
    public function __construct()
    {
        $this->middleware('LoggedOnly', ['only' => ['create', 'store']]);
        $this->middleware('StaffOnly', ['only' => ['pin', 'lock']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($cat_id, Auth $auth)
    {
        return view('skins.default.board.topic.create', ['category' => Category::find($cat_id)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @param  \App\Auth $auth
     * @return Response
     */
    public function store(Requests\StoreTopicRequest $request, $cat_id, Auth $auth)
    {

        $title   = $request->input('title');
        $message = $request->input('message');


        // get category
        $category = Category::find($cat_id);

        $user = $auth->getLoggedUser();

        $pin_ = false;
        $lock_ = false;

        if($request->input('pin') == true && $user->isStaff())
        {
            $pin_ = true;
        }

        if($request->input('lock') == true && $user->isStaff())
        {
            $lock_ = true;
        }


        if($category)
        {
            $t = $category->addTopic($title, $message, $user, $pin_, $lock_);

            return redirect()->to(route('board.topic.show', [$t->slug]));

        }

        return redirect('/');

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

        $posts = Topic::where('slug', $slug)->first()->posts()->paginate();

       // dd($posts);

        $this->checkFor404($topic);

        return view('skins.default.board.topic', ['topic' => $topic, 'posts' => $posts]);
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
        $topic = Topic::find($id);

        $topic->delete();
    }

    public function pin($topic_id, $value = true)
    {
        $topic = Topic::find($topic_id);

        $topic->update(['pinned' => $value]);
    }

    public function lock($topic_id, $value = true)
    {
        $topic = Topic::find($topic_id);

        $topic->update(['locked' => $value]);
    }
}
