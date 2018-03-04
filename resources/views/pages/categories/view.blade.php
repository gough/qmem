@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Category: {{ !empty($category->name) ? $category->name : '#' . $category->id }}</h1>
			</div>
			<div class="title-buttons pull-right">
				<a class="btn btn-warning btn-lg" href="{{ route('categories.edit', $category->id) }}">
					Edit
				</a>
				<a class="btn btn-danger btn-lg" href="{{ route('categories.delete', $category->id) }}">
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
								<td style="width: 25%"><strong>ID</strong></td>
								<td style="width: 75%">{{ $category->id }}</td>
							</tr>
							<tr>
								<td><strong>Name</strong></td>
								<td>{{ $category->name }}</td>
							</tr>
							<tr>
								<td><strong>Created At</strong></td>
								<td>{{ $category->created_at }}</td>
							</tr>
							<tr>
								<td><strong>Updated At</strong></td>
								<td>{{ $category->updated_at }}</td>
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
								<th>@sortablelink('id', 'ID')</th>
								<th>@sortablelink('name', 'Name')</th>
								<th>@sortablelink('user', 'User')</th>
								<th>@sortablelink('created_at', 'Created At')</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@if ($assets->count() > 0)
								@foreach ($assets as $asset)
								<tr>
									<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->id }}</a></td>
									<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->name }}</a></td>
									<td><a href="{{ route('users.view', $asset->user->netid) }}">{{ $asset->user->name }}</a></td>
									<td>{{ $asset->created_at }}</td>
									<td>
										<a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('assets.delete', $asset->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							@else
								<td colspan="5">This category contains no assets.</td>
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
								<th>@sortablelink('id', 'ID')</th>
								<th>@sortablelink('name', 'Name')</th>
								<th>@sortablelink('user', 'User')</th>
								<th>@sortablelink('created_at', 'Created At')</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@if ($consumables->count() > 0)
								@foreach ($consumables as $consumable)
								<tr>
									<td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->id }}</a></td>
									<td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->name }}</a></td>
									<td><a href="{{ route('users.view', $consumable->user->netid) }}">{{ $consumable->user->name }}</a></td>
									<td>{{ $consumable->created_at }}</td>
									<td>
										<a href="{{ route('consumables.edit', $consumable->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
										<a href="{{ route('consumables.delete', $consumable->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach
							@else
								<td colspan="5">This category contains no consumables.</td>
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
				</div>
			</div>
		</div>
	</div>
@stop