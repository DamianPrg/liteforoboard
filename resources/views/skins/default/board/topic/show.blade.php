@inject('auth', 'App\Auth')
@extends('skins.default.layouts.default')

@section('head.title') {!! $topic->title !!} @endsection

{? $last_post_author = -1 ?}
@section('content')

<h3>{{$topic->title}}</h3>

<div class='fbox'>

	<div class='fbox-header'>
		<a class='fbox-header-btn'>
		20 replies
		</a>
	</div>

	

	<div class='table table-post'>
    @foreach($posts as $post)


    <div id='post-{{ $post->id }}' class='flex-container table-row row-post'>
    	<div id='col-author-{{ $post->id }}' class='flex-fixed-item row-col post-author-col col-padding'>


            <div class='post-author'>
                @if($last_post_author != $post->author->id)
                <div>
                    <div>{!!$post->author->link() !!}</div>
                    <div class='profile-pic'>
                        <img src='http://icons.iconarchive.com/icons/mahm0udwally/all-flat/128/User-icon.png'>
                    </div>
                    <div>{!!$post->author->group->badge() !!}</div>

                    <br>
                    <div>{{ $post->author->posts->count()  }} posts</div>
                </div>
                    @else

                    <i style='text-align: right;' class="fa fa-arrow-right"></i>

                @endif
            </div>


    	</div>
    	<div id='col-author-{{$post->author->id}}' class='flex-item rowcol message-col col-padding'>

            <div class='flex-container'>
                    <div class='flex-item sm-text'>
                        {{ $post->updated_at->diffForHumans() }}
                        </div>
                <div class='flex-item flex-item-right sm-text'>
                    <a href='#post-{{$post->id}}'>#{{$post->id}}</a>
                    </div>
                </div>

            <div>
    		{!! $post->message !!}
                </div>
    	</div>
    </div>

            {? $last_post_author = $post->author->id ?}

        @endforeach
    </div>



</div>

<form id='replyForm' method='post' action="{{ route('board.post.store', [$topic->id]) }}">
@if($auth->isUserLogged() && $topic->locked == false)
<div style='margin-top:10px;'>
    <textarea name='message'></textarea>
    <button type='submit' class='btn btn-primary'>Reply</button>

</div>
    @elseif($auth->isAdmin() && $topic->locked == true)
        <textarea name='message'></textarea>
        </div>
    <button type='submit' class='btn btn-primary'>Add Reply</button>
@endif
</form>

    {{-- bottom --}}
    {!! $posts->render() !!}
    {{-- bottom --}}
@endsection