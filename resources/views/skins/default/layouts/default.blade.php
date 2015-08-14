<!DOCTYPE>
<html>
	<head>
		<title></title>

		<link type="text/css" rel="stylesheet" href="{{URL::asset('css/default/styles.css')}}"
	</head>

	<body>
		<div class='wrapper'>

			<div class='container'>

				<nav class='nav'>
					<a href='{{ url('/') }}'>Forums</a>
					
					@yield('nav_links', '')
				</nav>

				<section class='content'>
					@yield('content', '')

					{{ $content or '' }}
				</section>

				<footer>Powered by LiteForo</footer>

			</div>

		</div>
	</body>
</html>