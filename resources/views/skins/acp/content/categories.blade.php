@extends('skins.acp.layout')

@section('page_title')
Categories
    @endsection

@section('page_desc')
    Add / Edit / Remove categories
@endsection

@section('content')

    <div style='margin-top:8px;margin-bottom:8px;'>
            <a href='{{ route('acp.content.categories.create', [-1]) }}' class='btn btn-default btn-sm'>Add Category</a>
        <a href='{{ route('acp.content.categories.remove-all') }}' class='btn btn-danger btn-sm'>Remove All</a>
    </div>

    <div class='flex-table'>

        <div class='flex-head-row'>
            <div class='flex-col-id'>#</div>
            <div class='flex-col'>Title</div>
            <div class='flex-col'>Actions</div>
        </div>

    @foreach($categories as $category)

            <div class='flex-row'>
                <div class='flex-col-id'>{{$category->id}}</div>
                <div class='flex-col'>{{$category->title}}</div>
                <div class='flex-col'>
                    <a data-toggle="tooltip" title="Remove category" class='btn btn-danger btn-xs' href='{{ route('board.category.remove', [$category->id]) }}'><i class='fa fa-remove fa-fw'></i></a>
                    <a data-toggle="tooltip" title="Edit category" class='btn btn-default btn-xs' href='#'><i class='fa fa-pencil fa-fw'></i></a>
                    <a data-toggle="tooltip" title="Add new category" class='btn btn-default btn-xs' href='{{ route('acp.content.categories.create', [$category->id]) }}'><i class='fa fa-plus fa-fw'></i></a>
                </div>
            </div>

            @foreach($category->categories as $category)
                <div class='flex-row' style='background:rgba(0,0,0,0.05);'>
                    <div class='flex-col-id'></div>
                    <div class='flex-col'>{{$category->title}}</div>
                    <div class='flex-col'>
                        <a data-toggle="tooltip" title="Remove category" class='btn btn-danger btn-xs' href='{{ route('board.category.remove', [$category->id]) }}'><i class='fa fa-remove fa-fw'></i></a>
                        <a data-toggle="tooltip" title="Edit category" class='btn btn-default btn-xs' href='#'><i class='fa fa-pencil fa-fw'></i></a>
                        <a data-toggle="tooltip" title="Add new category" class='btn btn-default btn-xs' href='{{ route('acp.content.categories.create', [$category->id]) }}'><i class='fa fa-plus fa-fw'></i></a>
                    </div>
                </div>
                @endforeach

    @endforeach

    </div>

@endsection