@inject('auth', 'App\Auth')

@extends('skins.default.layouts.default')

@section('content')

    <h3>Create topic in {{ $category->title  }}</h3>

    <div class='box'>
        <form method='post' action="{{route('board.topic.store', [$category->id])}}">
            <div>Title</div>
            <div>
                <input type='text' name='title'>
                </div>
            <br>
            <div>Message</div>
            <textarea name='message'></textarea>

            <br>
            <br>

                @if($auth->getLoggedUser()->isStaff())
                <div>
                    <div><i>Moderation options</i></div>
                        <input type='checkbox' name='pin' value='topic_pinned'> Pin <br>
                        <input type='checkbox' name='lock' value='topic_locked'> Lock <br>
                    </div>
                @endif

            <div style='text-align:center;'>
                    <button type='submit' class='btn btn-black'>Create Topic</button>
                </div>



        </form>
    </div>
@endsection