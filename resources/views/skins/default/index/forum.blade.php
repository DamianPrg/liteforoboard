@extends('skins.default.layouts.default')

@section('head.script')

	/*
	$(document).ready(function() {

	setInterval( function() {

		//$('#main_content').fadeOut();
		$('#main_content').load( '{{route('index')}} #view' );
		//$('#main_content').fadeIn();


	}, 30000);


	});
	*/
	@endsection

@section('content')

	<div id='view'>

@foreach($categories as $category)

@if($category->category_id == -1)

<div class='box-data box' style='margin-top:10px;'>

	<div class='box-data-header'>
		{{$category->title}}
	</div>

	<div class='box-data-content'>

		@foreach($category->categories as $cat)
		<div class='box-row'>
			<div class='item-icon item'>
				<i class="fa fa-comment" style="font-size:30px;"></i>

			</div>

			<div class='data-item-forum item-dynamic item'>
				<div>{!! $cat->link()  !!}</div>
				<div class='muted-text'>{{$cat->desc}}</div>
			</div>

			<div class='data-item-forum item-fixed item' style='width:100px;font-size:20px;font-weight:200;'>
				<div><b style='font-weight:bold;'>{!! $cat->numPosts()  !!}</b> posts</div>

			</div>

			<div class='data-item-forum item-fixed item' style='width:250px;'>

				@if($cat->latestTopic() != null)
					{!! $cat->latestTopic()->link() !!}, {!! $cat->latestTopic()->latestPost()->updated_at->diffForHumans() !!} <br>
					by {!! $cat->latestTopic()->latestPost()->author->link()  !!}
					@else
					No topics
				@endif

			</div>


		</div>
		@endforeach

	</div>



</div>

@endif

@endforeach

		</div>

	<br>

		<div class='fbox-alt'>
			<div class='fbox-header-alt'>
				Forum Statistics
				</div>

			<div class='fbox-content-alt' style='text-align: center; padding:10px;'>

					<span class='badge'>
						{{ \App\User::all()->count() }} users
						</span>

				<span class='badge'>
					{{ \App\Post::all()->count() }} posts
					</span>

				<span class='badge'>
					{{ \App\Topic::all()->count()  }} topics
					</span>

				<br>

				<i>Online users (15 minutes)</i>:

				@foreach(\App\User::where('online', true)->get() as $ouser)
	{!! $ouser->link() !!},
					@endforeach

				</div>

		</div>
@endsection

@section('side')


	<div class='fbox-alt'>
		<div class='fbox-header-alt'>
			Recent topics
		</div>

		<div class='fbox-content-alt' style='text-align: center; padding:10px;'>

			@foreach(\App\Topic::orderBy('created_at', 'desc')->take(5)->get() as $recent_topic)
				<div style='background: rgba(0,0,0,0.03);border:1px solid rgba(0,0,0,0.1);border-radius:2px;padding:5px;'>
					<div style='text-align:left;'>
					{!!  $recent_topic->link() !!}
						</div>
					<div style='text-align:left;'>
					by {!! $recent_topic->author->link() !!}
						</div>
					<div style='text-align:right;'>
					{{ $recent_topic->created_at->diffForHumans()  }}
						</div>
				</div>
				<br>
			@endforeach

		</div>

	</div>

	<br>

	<div class='fbox-alt'>
		<div class='fbox-header-alt'>
			Recent posts
		</div>

		<div class='fbox-content-alt' style='text-align: center; padding:10px;'>

			@foreach(\App\Post::orderBy('updated_at', 'desc')->take(10)->get() as $recent_posts)
				<div style='background: rgba(0,0,0,0.03);border:1px solid rgba(0,0,0,0.1);border-radius:2px;padding:5px;'>
					<div style='text-align:left;'>
						{!!  $recent_posts->topic->link() !!}
						</div>
					<div style='text-align:left;'>
						by {!! $recent_posts->author->link() !!}
						</div>
					<div style='text-align:right;'>
					{{ $recent_posts->updated_at->diffForHumans()  }}
						</div>
					</div>
				<br>
			@endforeach

		</div>

	</div>


@endsection

@section('links-left')
<nav>
	<a href='#'>New content</a>
</nav>
@endsection

@section('links-right')
<nav>
	<a href='#'>@</a>
</nav>
@endsection