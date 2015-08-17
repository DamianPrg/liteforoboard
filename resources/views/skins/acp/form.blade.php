@extends('skins.acp.layout')

@section('content')

    <form action="{{ $route }}" method="post">

        <h3>{{ $name or 'Form'  }}</h3>
        <h4 class='text-muted small-text'>{{ $desc or '' }}</h4>

        <div class='box'>

            <div class='form'>

                {!! $form_source or '' !!}

            </div>

        </div>

    </form>

@endsection