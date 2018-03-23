@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Category: {{ !empty($category->name) ? $category->name : '#' . $category->id }}</h1>
			</div>
			<div class="title-buttons pull-right">
				<a class="btn btn-warning btn-lg{{ ($category->id == 1) ? ' disabled' : null }}" href="{{ route('categories.edit', $category->id) }}">
					Edit
				</a>
				<a class="btn btn-danger btn-lg{{ ($category->id == 1) ? ' disabled' : null }}" href="{{ route('categories.delete', $category->id) }}">
					Delete
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Category Information</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md table-no-margin">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>Name</strong></td>
								<td style="width: 75%">{{ $category->name }}</td>
							</tr>
						</tbody>
					</table>
					<table class="table table-bordered table-hover table-responsive-md table-no-margin mt-3">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>Assets</strong></td>
								<td style="width: 75%">{{ $assets->count() }}</td>
							</tr>
							<tr>
								<td><strong>Consumables</strong></td>
								<td>{{ $consumables->count() }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<span class="card-title">Assets</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md table-no-margin">
						<thead class="thead-default">
							<tr>
								<th>@sortablelink('name', 'Name')</th>
								<th>@sortablelink('serial_number', 'Serial Number')</th>
								<th>@sortablelink('status', 'Status')</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@if ($assets->count() > 0)
								@foreach ($assets as $asset)
								<tr>
									<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->name }}</a></td>
									<td>{{ $asset->serial_number }}</td>
									<td>{{ $asset->status->name }}</td>
									<td>
										<a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('assets.delete', $asset->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							@else
								<td class="text-center" colspan="5">This category contains no assets.</td>
							@endif
						</tbody>						
					</table>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<span class="card-title">Consumables</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md table-no-margin">
						<thead class="thead-default">
							<tr>
								<th>@sortablelink('name', 'Name')</th>
								<th>@sortablelink('item_number', 'Item Number')</th>
								<th>@sortablelink('quantity', 'Quantity')</th>
								<th>@sortablelink('minimum_quantity', 'Min. Qty.')</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@if ($consumables->count() > 0)
								@foreach ($consumables as $consumable)
								<tr>
									<td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->name }}</a></td>
									<td>{{ $consumable->item_number }}</td>
									<td>{{ $consumable->quantity }}</td>
									<td>{{ $consumable->minimum_quantity }}</td>
									<td>
										<a href="{{ route('consumables.edit', $consumable->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('consumables.delete', $consumable->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							@else
								<td class="text-center" colspan="5">This category contains no consumables.</td>
							@endif
						</tbody>						
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Category History</span>
				</div>
				<div class="card-body">
					@include('includes.revisions', ['revisions' => $category->revisionHistory->reverse()])
					<table class="table table-bordered table-hover table-responsive-md table-no-margin mt-3">
						<tbody>
							<tr>
								<td style="width: 20%"><strong>Created At</strong></td>
								<td style="width: 30%">{{ $category->created_at }}</td>
								<td style="width: 20%"><strong>Updated At</strong></td>
								<td style="width: 30%">{{ $category->created_at }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop