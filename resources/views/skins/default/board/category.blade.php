	@extends('skins.default.layouts.default')

	@section('wrapper-top')

	@endsection

	@section('content')

	<h3>{{ $category->title  }}</h3>

	<div class='box'>
		@foreach($category->topics as $topic)

		<div>
			<i class="fa fa-comments-o"></i>
			{!! $topic->link()  !!}
		</div>

		@endforeach
	</div>

	@endsection