@extends('skins.default.layouts.default')

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
	{!! $post->message !!}
		</div>
</div>

@endforeach



@endsection

