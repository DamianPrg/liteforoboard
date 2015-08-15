@extends('skins.default.layouts.default')

@section('content')

<h3>{{ $topic->title  }}</h3>


{{-- posts --}}
@foreach($topic->posts as $post)

<div class='post box'>
	{!! $post->message !!}
</div>

@endforeach



@endsection