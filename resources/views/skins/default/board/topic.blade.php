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
		<div class='post-info' style='font-size:11px;color:rgba(0,0,0,0.35);' class='text-muted'>
			{{ $post->created_at  }} / updated {{ $post->updated_at->diffForHumans() }}
			</div>

	{!! $post->message !!}
		</div>
</div>

@endforeach



@endsection

