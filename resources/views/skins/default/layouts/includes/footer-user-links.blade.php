@inject('auth', 'App\Auth')

@if($auth->isUserLogged())

@if($auth->getLoggedUser()->isAdmin())

<div> Administrator links</div>

<i class="fa fa-link fa-fw"></i> <a href='{{route('acp.dashboard')}}'>
AdminCP
</a>




@endif


    <div>
        <div> <a href='{{url('/logout')}}'>Logout</a> </div>
        </div>

    @else

   <div> <a href='{{url('/login')}}'>Sign In</a></div>
   <div> <a href='#'>Sign Up</a> </div>

@endif