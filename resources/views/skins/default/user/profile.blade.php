@extends('skins.default.layouts.default')

@section('content')

    {{ $user->username or 'Null profile'  }}

    @endsection