@extends('layouts.default')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Assets</h1>
			</div>
			<div class="title-buttons pull-right">
				<a class="btn btn-primary btn-lg" href="{{ route('assets.create') }}">
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
								<th>ID</th>
								<th>Name</th>
								<th>Category</th>
								<th>User</th>
								<th>Created At</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($assets as $asset)
							<tr>
								<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->id }}</a></td>
								<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->name }}</a></td>
								<td>{{ $asset->category }}</td>
								<td>
									{{ !empty(User::find($asset->user_id)->name) ? User::find($asset->user_id)->name : User::find($asset->user_id)->netid }}
								</td>
								<td>{{ $asset->created_at }}</td>
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