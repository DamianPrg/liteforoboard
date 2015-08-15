@extends('skins.default.layouts.default')

@section('content')

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

                                <div class='data-item-forum item-dynamic item'>
                                    <div>{!! $cat->numPosts()  !!}</div>

                                </div>



                                </div>
                            @endforeach

                    </div>

                </div>

        @endif

    @endforeach

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