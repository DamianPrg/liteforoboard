@extends('skins.default.layouts.default')

@section('content')

    <form action="{{ route('auth.do.login') }}" method="POST">

<!--
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
        -->

<div class='box'>
        <div class='form'>
        	<div class='form-element'>
        		<div class='detail'>
        			<label class='normal-text' for="username">Username</label>
        			<br>
        			<span class='muted-text small-text'>Your username</span>
        		</div>
        		<div class='input'>
        		 	 <input type="text" name="username">
        		</div>
        	</div>
        	<div class='form-element'>
        		<div class='detail'>
        			<label class='normal-text' for="password">Password</label>
        			<br>
        			<span class='muted-text small-text'>Your password</span>
        		</div>
        		<div class='input'>
        		 	 <input type="password" name="password">
        		</div>
        	</div>
        	        	<div class='form-element'>
        		<div class='detail'>
        			
        		</div>
        		<div class='input'>
        		 	<button type="submit">Login</button>
        		</div>
        	</div>

        	
        </div>

        </div>

    </form>

@endsection