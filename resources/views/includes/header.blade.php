<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<a href="{{ route('dashboard') }}" class="navbar-brand mb-0 h1">QMEM</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternal" aria-controls="navbarToggleExternal" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarToggleExternal">
		<div class="d-md-inline-flex justify-content-between" style="width: 100%">
			<div>
				<ul class="navbar-nav justify-content-start">
					<li class="nav-item {{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item {{ Route::currentRouteNamed('inventory') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('inventory') }}">Inventory</a>
					</li>
					<li class="nav-item {{ Route::currentRouteNamed('reports') ? 'active' : '' }}">
						<a class="nav-link" href="{{ route('reports') }}">Reports</a>
					</li>
				</ul>
			</div>
			<div>
				<form method="GET" action="{{ route('search') }}" class="form-inline my-2 my-md-0">
					<input id="query" class="form-control mr-0 mr-sm-2 mb-2 mb-sm-0" type="text" name="query" placeholder="Search" aria-label="Search" autofocus="autofocus">
					<button class="btn btn-outline-secondary form-control my-md-0" type="submit">Search</button>
				</form>
			</div>
			<div>
				<ul class="navbar-nav justify-content-end">
					<li class="nav-item dropdown">
						<span class="user nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						{{ $_SERVER['HTTP_COMMON_NAME'] or 'Firstname Lastname' }}
						</span>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('user.preferences') }}">Preferences</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</div>		
	</div>
</nav>