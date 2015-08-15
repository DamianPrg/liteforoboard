@extends('skins.default.layouts.default')
@section('content')

    <h3>No permission</h3>

    <div class='box'>
        <span>You don't have permission to access that page.</span>
        <span>{{$message or ''}}</span>
    </div>

@endsection