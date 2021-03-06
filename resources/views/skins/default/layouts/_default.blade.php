@inject('auth', 'App\Auth')
	<!DOCTYPE>
	<html>
	<head>
		<title>@yield('head.title', '')</title>

		<!-- css -->

		<!-- Bootstrap 3.3.4 -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

		<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">

		<!-- Font Awesome Icons -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
		<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

		<link type="text/css" rel="stylesheet" href="{{URL::asset('css/default/styles.css')}}">

		<!-- css -->

		<!-- js -->
		<script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
		<!-- js -->

		<script>
			@yield('head.script')
			</script>
	</head>

	<body>
		<div class='wrapper'>

			<header class='header'>
				LiteForo
			</header>

			

		</div>
		<!-- wrapper -->
		<div class='wrapper wrapper-styled'>


			<nav class='nav nice-link-color'>
				<a href='{{route('index')}}'>Forums</a>




			</nav>






			@if($auth->isUserLogged())
				@yield('wrapper-top-logged')
				@else
				@yield('wrapper-top')
				@endif



			<div class='content'>
				<div class='main' id='main_content'>
					@yield('content')
				</div>

				<aside class='side'>
					@yield('side')
				</aside>
			</div>

			<div clas='clearfix'></div>

			@if($auth->isUserLogged())
				@yield('wrapper-bottom-logged')
			@else
			@yield('wrapper-bottom')
				@endif



			

			

		</div>
		<!-- wrapper -->	
		<div class='wrapper wrapper-footer '>
			<footer class='footer'>
				<div class='left'>
					<div><i class="fa fa-link fa-fw"></i> Quick links</div>
					<nav class='footer-nav'>
						<div>
							<i class='fa fa-fw'></i>
							<a href='{{route('index')}}'>Forums</a></div>
							<div>
								<i class='fa fa-fw'></i>
								<a href='#'>Staff</a></div>
								<div>
									<i class='fa fa-fw'></i>
									<a href='#'>Contact</a></div>
								</nav>
							</div>

							<div class='mid'>
								@include('skins.default.layouts.includes.footer-user-links')
							</div>

							<div class='right'>
								Powered by LiteForo
							</div>
						</footer>
					</div>

					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
					<script src="{{URL::asset('js/scripts.js')}}"></script>
				</body>
				</html>