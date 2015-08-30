@inject('auth', 'App\Auth')
@extends('skins.default.layouts.default')

@section('head.title') {!! $topic->title !!} - {{ $topic->category->title }} @endsection

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
                <hr>
                <div>
                    @if($auth->isStaff())

                            <!-- Single button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Post Actions <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('board.post.remove', [$post->id]) }}"><i class="fa fa-trash-o fa-fw"></i>
                                     Remove</a></li>
                            <li><a href='{{ route('board.post.edit', [$post->id]) }}'><i class="fa fa-pencil fa-fw"></i>
                                    Edit</a></li>
                        </ul>
                    </div>

                        @endif
                    </div>
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
    <br>
    <button type='submit' class='btn btn-black btn-sm'>Reply</button>

</div>
    @elseif($auth->isAdmin() && $topic->locked == true)
        <div style='margin-top:10px;'>
        <textarea name='message'></textarea>

            <br>
    <button type='submit' class='btn btn-black btn-sm'>Add Reply</button>
    </div>
@endif
</form>

    {{-- bottom --}}
    {!! $posts->render() !!}
    {{-- bottom --}}
@endsection