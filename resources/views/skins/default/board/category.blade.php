	@extends('skins.default.layouts.default')

	@section('wrapper-top')

	@endsection

@section('tools')
			 <a href='#' class='btn btn-black'>Create Topic</a>
@endsection

	@section('content')

	<h3>{{ $category->title  }}</h3>
	
		{{-- pinned first --}}
		@foreach($category->topics()->where('pinned', true)->orderBy('updated_at', 'desc')->get() as $topic)
			@include('skins.default.board.includes.topic-row', [$topic])
		@endforeach

		@foreach($category->topics()->where('pinned', false)->orderBy('updated_at', 'desc')->get() as $topic)

			@include('skins.default.board.includes.topic-row', [$topic])
			{{--
		<div class='row topic-row'>
			<div class='row-fixed-column' style='font-size:16px;'>
					<i class="fa fa-comments-o fa-fw"></i>

					@if($topic->pinned)
					<i class="fa fa-thumb-tack fa-fw" style="color:rgb(200,200,0);"></i>
					@endif

					@if($topic->locked)
					<i class="fa fa-lock fa-fw"></i>

				@endif
				</div>

			<div class='row-dynamic-column'>
			{!! $topic->link()  !!}
				</div>

			<div class='row-fixed-column' style='max-width: 200px;'>
				{{ $topic->posts()->count()-1  }} replies
				</div>

			<div class='row-fixed-column' style='max-width:200px;'>
				{!! $topic->author->link() !!}, {!! $topic->created_at !!}
				</div>
		</div>

--}}
		@endforeach


	@endsection

	@section('wrapper-bottom-logged')
		<div style='text-align:right;margin:10px;'>
			@if(1)
				<a class='btn btn-danger btn' href='#'><i class="fa fa-lock"></i>
					<i class="fa fa-plus"></i>
 					Create topic</a>

			@else
				<a class='btn btn-black' href='#'>Create topic</a>

			@endif
			</div>
	@endsection

	@section('wrapper-top-logged')

		<div style='text-align:right;margin:10px;'>
			@if(1)
				<a class='btn btn-danger btn' href='#'><i class="fa fa-lock"></i>
					Create topic</a>

			@else
				<a class='btn btn-black' href='#'>Create topic</a>

			@endif
		</div>
	@endsection