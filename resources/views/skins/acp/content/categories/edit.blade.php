@extends($acpLayout)

@section('content')

    <form method='post' action='{{ route('acp.content.categories.update',[$category->id]) }}'>
        <label for='slug'>Slug</label> <input type='text' class='form-control' value='{{$category->slug}}' name='slug'><br>
        <label for='title'>Title</label> <input type='text' class='form-control' value='{{$category->title}}' name='title'><br>
        <label for='desc'>Description</label> <input type='text' class='form-control' value='{{$category->desc}}' name='desc'><br>

        <div style='text-align:center;'>
        <button type='submit' class='btn btn-primary'>Update</button>
            </div>
    </form>

@endsection