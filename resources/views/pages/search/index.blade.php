@extends('layouts.default')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Search results for '{{ Request::get('query') }}'</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ Form::open(array('method' => 'get', 'route' => array('search.index'), 'id' => 'search')) }}
						<div class="search input-group">
							{{ Form::text(
								'query', Request::get('query'),
								['placeholder' => 'Search',
								'class' => 'my-2 my-md-0 form-control',
								'id' => 'search-input',
								'autofocus' => 'autofocus',
								'onFocus' => 'this.select()']
							) }}
							<div class="input-group-append">
								{!! Form::button(
									'<i class="fa fa-search"></i>',
									['type' => 'submit',
									'class' => 'btn btn-lg btn-outline-secondary my-2 my-md-0 form-control']
								) !!}
							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
			@if ($assets->count() > 0)
				<div class="card">
					<div class="card-header">
						<span class="card-title">
							Assets
						</span>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover table-responsive-md">
							<thead class="thead-default">
								<tr>
									<th width="13%">Type</th>
									<th width="7%">Thumbnail</th>
									<th>Name</th>
									<th width="15%">Barcode</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($assets as $asset)
									<tr>
										<td>Asset</td>
										<td class="text-center">
											@if (!empty($asset->image_id))
												<img class="img-fluid mx-auto d-block" src="{{ env('APP_URL') . 'img/' . $asset->image_id }}">
											@else
												<small class="text-muted">(no image)</small>
											@endif
										</td>
										<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->name }}</a></td> 
										<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->id_hash }}</a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
			@if ($consumables->count() > 0)
				<div class="card">
					<div class="card-header">
						<span class="card-title">
							Consumables
						</span>
					</div>
					<div class="card-body">
						<table class="table table-bordered table-hover table-responsive-md">
							<thead class="thead-default">
								<tr>
									<th width="13%">Type</th>
									<th width="7%">Thumbnail</th>
									<th>Name</th>
									<th width="15%">Barcode</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($consumables as $consumable)
									<tr>
										<td>Consumable</td>
										<td>
											@if (!empty($consumable->image_id))
												<img class="img-fluid mx-auto d-block" src="{{ env('APP_URL') . 'img/' . $consumable->image_id }}">
											@else
												<small class="text-muted">(no image)</small>
											@endif
										</td>
										<td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->name }}</a></td>
										<td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->id_hash }}</a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
			@if ($assets->count() + $consumables->count() == 0)
			<div class="card">
				<div class="card-body">
					<h4>No results for '{{ Request::get('query') }}'.</h4>
				</div>
			</div>
			@endif
		</div>
	</div>
@stop