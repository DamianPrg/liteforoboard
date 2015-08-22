@extends('skins.default.layouts.default')

@section('content')

  <h3>{{ $user->username }}</h3>

    <div class='flex-container' style='width:100%;'>


        <div class='flex-fixed-item' style='width: 200px;'>

            <div class='fbox'>

                <div class='box-header'>
                    {!! $user->link()  !!}
                </div>

                <div class='box-content'>
                    <div class='box'>
                        Posts: {{ $user->posts()->count()  }}
                    </div>

                    <div class='box'>
                        {!! $user->group->badge() !!}
                    </div>
                </div>

            </div>
            </div>

        <div class='flex-item' style='padding-left:10px;'>

            <div class='fbox'>

                <div class='box-header'>
                    Last activity
                </div>

                <div class='box-content'>

                    @foreach($latest_posts as $post)

                        <div class='box'>
                            <div>
                                {!! $post->topic->link() !!}
                            </div>
                            <div class='sm-text'>
                                {!! $post->message !!}
                            </div>
                            <div style='text-align: right;'>
                                {{ $post->updated_at->diffForHumans() }}
                            </div>
                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

    @endsection