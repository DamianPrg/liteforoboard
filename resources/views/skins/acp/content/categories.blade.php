@extends('skins.acp.layout')

@section('page_title')
Categories
    @endsection

@section('page_desc')
    Add / Edit / Remove categories
@endsection

@section('content')

    <a class='btn btn-primary'><i class='fa fa-plus'></i> Add Category</a>

    <br>
    <br>

    @foreach($categories as $category)

        <div>
            {{ $category->title }} ({{$category->categories()->count()}}) <a class='btn btn-danger btn-xs' href='#'><i class='fa fa-remove'></i></a>


            {{-- sub categories --}}
            @foreach($category->categories as $subcat)
                <div style='color:rgba(0,0,0,0.5);padding-left:20px;'>{{$subcat->title}}</div>
            @endforeach
        </div>
        <hr>

    @endforeach

@endsection