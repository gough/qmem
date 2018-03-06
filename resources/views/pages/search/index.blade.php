@extends('layouts.default')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1><em>Search results</em> for '{{ Request::get('query') }}'</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
						<table class="table table-bordered table-hover table-responsive-md">
							<thead class="thead-default">
								<tr>
									<th>Type</th>
									<th>ID</th>
									<th>Name</th>
								</tr>
							</thead>
							<tbody>
								@if ($assets->count() + $consumables->count() > 0)
									@foreach ($assets as $asset)
										<tr>
											<td>Asset</td>
											<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->id }}</a></td>
											<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->name }}</a></td>  
										</tr>
									@endforeach
									@foreach ($consumables as $consumable)
										<tr>
											<td>Consumable</td>
											<td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->id }}</a></td>
											<td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->name }}</a></td>
										</tr>
									@endforeach
								@else
									<td class="text-center" colspan="5">No results found.</td>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop