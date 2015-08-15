@extends('skins.default.layouts.default')

@section('wrapper-top')

    @endsection

@section('content')

    <h3>{{ $category->title  }}</h3>

    @foreach($category->topics as $topic)

        <div>
            {!! $topic->link()  !!}
        </div>

    @endforeach

@endsection