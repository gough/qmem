<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<a href="{{ route('dashboard') }}" class="navbar-brand mb-0 h1">QMEM</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternal" aria-controls="navbarToggleExternal" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarToggleExternal">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item {{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item {{ Route::currentRouteNamed('assets.index') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('assets.index') }}">Assets</a>
			</li>
			<li class="nav-item {{ Route::currentRouteNamed('reports.index') ? 'active' : '' }}">
				<a class="nav-link" href="{{ route('reports.index') }}">Reports</a>
			</li>
		</ul>
		<form action="{{ url('search') }}" id="search" class="form-inline">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
				<div class="input-group-append">
					<button class="btn btn-outline-secondary my-2 my-sm-0 form-control" type="submit">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
		</form>
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{ $_SERVER['HTTP_COMMON_NAME'] or 'First Last'}}
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{ route('user.preferences') }}">Preferences</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
				</div>
			</li>
		</ul>
	</div>
</nav>