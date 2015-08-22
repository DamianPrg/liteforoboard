@inject('auth', 'App\Auth')

@extends('skins.default.layouts.default')

@section('content')

    <h3>Create topic in {{ $category->title  }}</h3>

    <div class='box'>
        <div class='flex-container'>
        <div class='flex-item-3'>
        <form method='post' action="{{route('board.topic.store', [$category->id])}}">
            <div>Title</div>
            <div>
                <input placeholder='Topic title' type='text' name='title'>
                </div>
            <br>
            <div>Message</div>
            <textarea id='ck' name='message'>Your message here...</textarea>

            <br>
            <br>








            </div>

            @if($auth->getLoggedUser()->isStaff())
        <div class='flex-item-1' style='padding-left:10px;'>


                <div class='fbox'>
                    <div class='box-header'>Moderation options</div>
                    <div class='box-content style='padding:10px;>
                    <input type='checkbox' name='pin' value='topic_pinned'> <label for='pin'>Pin</label> <br>
                    <input type='checkbox' name='lock' value='topic_locked'> <label for='lock'>Lock</label> <br>
                        </div>
                </div>
            </div>
                @endif

            </div>


        <div style='text-align:center;'>
            <button type='submit' class='btn btn-core btn-sm'>Create Topic</button>
        </div>

        </form>
    </div>



@endsection