<!doctype html>
<html lang="en">
	<head>
		@include('includes.head')
	</head>
	<body>
		<header>
			@include('includes.header')
		</header>
		@if (Session::has('message'))
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="alert {{ Session::get('alert-class', 'alert-secondary') }}" role="alert">
							{!! Session::get('message') !!}
						</div>
					</div>
				</div>
			</div>
		@endif
		<main role="main" class="container">
			@yield('content')
		</main>
		<footer class="footer footer-dark">
			@include('includes.footer')
		</footer>
		@include('includes.foot')
	</body>
</html>