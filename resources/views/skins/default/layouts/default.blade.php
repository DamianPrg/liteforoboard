<!DOCTYPE>
<html>
	<head>
		<title></title> 
	</head>

	<body>
		<div class='wrapper'>

			<div class='container'>

				<nav class='nav'>
					<a href='#'>Forums</a>
					
					@yield('nav_links', '')
				</nav>

				<section class='content'>
					@yield('content', '')
				</section>

				<footer>Powered by LiteForo</footer>

			</div>

		</div>
	</body>
</html>