@extends('layouts.default')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Assets</h1>
			</div>
			<div class="title-buttons pull-right">
				<a class="btn btn-primary btn-lg" href="{{ route('assets.new') }}">
					New
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					@include('includes.pagination', ['items' => $assets])
					<table class="table table-bordered table-hover table-responsive-md">
						<thead class="thead-default">
							<tr>
								<th>@sortablelink('id', 'ID')</th>
								<th>@sortablelink('name', 'Name')</th>
								<th>@sortablelink('category', 'Category')</th>
								<th>@sortablelink('user', 'User')</th>
								<th>@sortablelink('created_at', 'Created At')</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($assets as $asset)
							<tr>
								<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->id }}</a></td>
								<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->name }}</a></td>
								<td><a href="{{ route('categories.view', $asset->category->id) }}">{{ $asset->category->name }}</a></td>
								<td><a href="{{ route('users.view', $asset->user->netid) }}">{{ $asset->user->name }}</a></td>
								<td>{{ $asset->created_at }}</td>
								<td>
									<a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
									<a href="{{ route('assets.delete', $asset->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>						
					</table>
					@include('includes.pagination', ['items' => $assets])
					</div>
				</div>
			</div>
		</div>
	</div>
@stop