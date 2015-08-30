@extends($layout)

@section('content')
    <h3>Edit post</h3>

    Post by: {{ $post->author->username }}
    <br>
    Post:
    <pre>{!! $post->message !!}</pre>

    <form>
        <textarea name='message'>{!! $post->message !!}</textarea>

        <br>

        <div>
                <button type='submit' class='btn btn-default btn-sm'>
                    <i class='fa fa-pencil fa-fw'></i>
                    Edit</button>
            </div>
    </form>
@endsection