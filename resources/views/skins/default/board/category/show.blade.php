@extends('skins.default.layouts.default')

@section('tools-logged')
			 <a href='{{ route('board.topic.create', [$category]) }}' class='btn btn-core btn-sm'>Create Topic</a>
@endsection

@section('content')
	<h3>{{$category->title}}</h3>

	<div class='fbox'>

	<div class='fbox-header'>
		<a class='fbox-header-btn'>{{ $category->topics()->count() }} topics</a>
	</div>

	<div class='fbox-content'>

		<div id='pinned' class='dtable'>
		@foreach($pinned_topics as $topic)
			<div class='drow'>
				<div class='dcol-fixed' style='width:auto;'>
					<i class="fa fa-comments-o fa-fw"></i>
        @if($topic->pinned)
            <i class="fa fa-thumb-tack fa-fw" style=""></i>
        @endif

        @if($topic->locked)
            <i class="fa fa-lock fa-fw"></i>

        @endif
				</div>
				<div class='dcol' style='padding-left:10px;'>
				{!! $topic->link() !!}
				</div>
				<div class='dcol-fixed' style='width:200px;text-align:center;'>
					{!! $topic->author->link() !!} / {{ $topic->created_at }}
				</div>
			</div>
		@endforeach
		</div>

		<!-- -->
				<div id='topics' class='dtable'>
		@foreach($topics as $topic)
			<div class='drow'>
				<div class='dcol-fixed' style='width:auto;'>
					<i class="fa fa-comments-o fa-fw"></i>
        @if($topic->pinned)
            <i class="fa fa-thumb-tack fa-fw" style=""></i>
            @else 
                        <i class="fa fa-fw" style=""></i>

        @endif

        @if($topic->locked)
            <i class="fa fa-lock fa-fw"></i>
            @else
                                    <i class="fa fa-fw" style=""></i>

        @endif
				</div>
				<div class='dcol' style='padding-left:10px;'>
				{!! $topic->link() !!}
				</div>
				<div class='dcol-fixed' style='width:200px;text-align:center;'>
					{!! $topic->author->link() !!} / {{ $topic->created_at }}
				</div>
			</div>
		@endforeach
		</div>

	</div>

	</div>
@endsection