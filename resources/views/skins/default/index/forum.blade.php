@extends('skins.default.layouts.default')

@section('head.script')

	$(document).ready(function() {
	// refresh content every 30 seconds.
	setInterval( function() {

		$('#main_content').fadeOut();
		$('#main_content').load( '{{route('index')}} #view' );
		$('#main_content').fadeIn();


	}, 30000);


	});
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
@endsection

@section('side')
This is side.
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