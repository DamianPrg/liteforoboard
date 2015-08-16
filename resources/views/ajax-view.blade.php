@extends('skins.default.layouts.default')

@section('head.script')
$(document).ready(function() {
    setInterval( function() {
    $('#ajaxContent').load('{{route('ajax.test')}}');
    });
    }, 1000);
@endsection

@section('content')
    <h3>Ajax test.</h3>

    <div id="ajaxContent" style="border:1px solid black;padding:10px;">
        Ajax content.
    </div>
@endsection