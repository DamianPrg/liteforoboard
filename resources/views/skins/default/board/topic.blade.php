@extends('skins.default.layouts.default')

@section('content')

<h3>{{ $topic->title  }}</h3>


{{-- posts --}}
@foreach($topic->posts as $post)

<div class='post box'>

	<div class='post-author'>
		<div>
			<div>{!!$post->author->link() !!}</div>
			<div>{!!$post->author->group->badge() !!}</div>
			</div>
		</div>

	<div class='post-content'>
	{!! $post->message !!}
		</div>
</div>

@endforeach



@endsection