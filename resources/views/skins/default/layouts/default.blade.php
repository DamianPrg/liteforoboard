<!DOCTYPE>
<html>
	<head>
		<title>@yield('head.title', '')</title>

		<!-- css -->
				<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">

		<link type="text/css" rel="stylesheet" href="{{URL::asset('css/default/styles.css')}}">


		<!-- css -->
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
					<a href='#'>Forums</a>

				</nav>
		

			<div class='links'>
				@yield('links')
			</div>

			<div class='content'>
				<div class='main'>
					@yield('content')
				</div>

				<aside class='side'>
								<div class='side-element'>
						<div class='side-element-header'>
						Side
						</div>
						This is side element.
					</div>
				</aside>
			</div>

			<div class='links'>
				@yield('links')
			</div>


		

			

		</div>
		<!-- wrapper -->	
		<div class='wrapper wrapper-footer wrapper-ns-without-border'>
		<footer class='footer'>
			<div class='left'>
				<div>Quick links</div>
				<nav class='footer-nav'>
					<div><a href='#'>Forums</a></div>
					<div><a href='#'>Staff</a></div>
					<div><a href='#'>Contact</a></div>
				</nav>
			</div>

			<div class='mid'>
				<!-- middle -->
			</div>

			<div class='right'>
			Powered by LiteForo
			</div>
		</footer>
		</div>
	</body>
</html>