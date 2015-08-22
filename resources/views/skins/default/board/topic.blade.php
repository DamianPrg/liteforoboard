@inject('auth', 'App\Auth')
@extends('skins.default.layouts.default')

@section('head.script')

	$(document).ready(function() {
	$('#replyFormBox').hide();

	$('.show-reply-form').click( function() {

		$('#replyFormBox').fadeIn(1500);

	});

	$('#pin').click(function() {

		$.ajax({
  url: "{{ route('board.topic.pin', [true, $topic->id]) }}",
  context: document.body
}).done(function() {
 // $( this ).addClass( "done" );
 alert('Pinned!');
});

	});

	});

	@endsection

@section('tools')
			 <a href='#replyFormBox' class='btn btn-black show-reply-form'>Add reply</a>
@endsection

@section('tools-staff')
<div class='dropdown'>
			 <button data-toggle="dropdown" class='btn btn-primary dropdown-toggle'>Moderation <span class='caret'></span></button>

			 <ul class='dropdown-menu dropdown-menu right'>
			 <li><a id='pin' href='#'>Pin</a></li>
			 <li><a href='#'>Lock</a></li>
			 </ul>

			 </div>
@endsection

@section('content')

<h3>{{ $topic->title  }}</h3>


{{-- posts --}}
@foreach($topic->posts as $post)

<div class='post box'>

	<div class='post-author'>
		<div>
			<div>{!!$post->author->link() !!}</div>
			<div class='profile-pic'>
				<img src='http://icons.iconarchive.com/icons/mahm0udwally/all-flat/128/User-icon.png'>
			</div>
			<div>{!!$post->author->group->badge() !!}</div>

			<br>
			<div>{{ $post->author->posts->count()  }} posts</div>
			</div>
		</div>

	<div class='post-content'>
		<div class='post-info' style='font-size:11px;color:rgba(0,0,0,0.35);' class='text-muted'>
			{{ $post->created_at  }} / updated {{ $post->updated_at->diffForHumans() }}
			</div>

	{!! $post->message !!}
		</div>
</div>



@endforeach

<br>
@if($auth->isUserLogged())
<form id='replyForm' method='post' action="{{ route('board.post.store', [$topic->id]) }}">
<div class="box post" id="replyFormBox" style="border: 1px solid rgba(150,0,0,0.35);">

	<div class='post-author'>
		<div>
			<div>{!! $auth->getLoggedUser()->link() !!}</div>
			<div class='profile-pic'>
				<img src='http://icons.iconarchive.com/icons/mahm0udwally/all-flat/128/User-icon.png'>
			</div>
			<div>{!!$auth->getLoggedUser()->group->badge() !!}</div>

			<br>
			<div>{{ $auth->getLoggedUser()->posts->count() }} posts</div>
		</div>
	</div>

	<div class='post-content'>
		<div class='post-info' style='font-size:11px;color:rgba(0,0,0,0.35);' class='text-muted'>

		</div>

		<br>
		<textarea name='message'></textarea>
<br>
		<button type='submit' class='btn btn-primary btn-sm'>Reply</button>
	</div>

	</div>

</form>
	@endif
@endsection

