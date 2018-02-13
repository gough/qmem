<!doctype html>
<html lang="en">
	<head>
		@include('includes.head')
	</head>
	<body>
		<header>
			@include('includes.header')
		</header>
		<main role="main" class="container">
			@yield('content')
		</main>
		<footer class="footer footer-dark">
			@include('includes.footer')
		</footer>
		@include('includes.foot')
	</body>
</html>