@extends('skins.default.layouts.default')

@section('content')

    <form action="{{ route('auth.do.login') }}" method="POST">

        <div>
        <label for="username">Username</label>
        <input type="text" name="username">

            </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password">

        </div>

        <div>
            <button type="submit">Login</button>
        </div>

    </form>

@endsection