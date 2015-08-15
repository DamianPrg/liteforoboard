@inject('auth', 'App\Auth')

@if($auth->isUserLogged())

@if($auth->getLoggedUser()->isAdmin())

<div> Administrator links</div>

<i class="fa fa-link fa-fw"></i> <a href='{{route('acp.dashboard')}}'>
AdminCP
</a>

<i class="fa fa-link fa-fw"></i> <a href='{{route('acp.dashboard')}}'>
Site settings
</a>

<i class="fa fa-link fa-fw"></i> <a href='{{route('acp.dashboard')}}'>
Reports
</a>

@endif
@endif