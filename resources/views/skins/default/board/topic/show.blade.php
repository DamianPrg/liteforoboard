@inject('auth', 'App\Auth')
@extends('skins.default.layouts.default')

@section('content')
<div class='fbox'>

	<div class='box-header'>
		My box.
	</div>

	

	<div class='table table-post'>
    @foreach($posts as $post)

    <div class='flex-container row row-post'>
    	<div class='flex-fixed-item col post-author-col col-padding'>
    		{!! $post->author->link() !!}
    	</div>
    	<div class='flex-item col message-col col-padding'>
    		{!! $post->message !!}
    	</div>
    </div>

    @endforeach
    </div>



</div>

    {{-- bottom --}}
    {!! $posts->render() !!}
    {{-- bottom --}}
@endsection