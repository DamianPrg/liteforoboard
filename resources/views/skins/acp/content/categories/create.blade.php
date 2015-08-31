@extends('skins.acp.layout')

@section('page_title') Creating category @endsection
@section('page_desc') @endsection

@section('content')

    <form method='post' action='{{ route('acp.content.categories.store', [$category_id]) }}'>
        @if($category_id != -1)
        <div class='text-muted'>
            Creating category in category {{$category->title}}
            </div>
        <br>
            @else
            <div class='text-muted'>
                Creating new category
                </div>
        @endif

        <label for='title'>Title</label><br><input class='form-control' type='text' name='title'>
        <br>
        <label for='desc'>Description</label><br><input class='form-control' type='text' name='desc'>

        <div style='text-align: center;margin-bottom:8px;margin-top:8px;'>
            <button type='submit' class='btn btn-primary btn'>Create</button>
            </div>
    </form>

@endsection