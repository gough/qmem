@extends('layouts.default')
@section('content')
	<h1>Dashboard</h1>
	<div class="row">
		<div class="col-lg-3 col-sm-6">
			<div class="card border-primary">
				<div class="card-info-top bg-primary">
					<div class="pull-left">
						<i class="fa fa-cube fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">{{ number_format($total_items) }}</span>
						<span class="card-desc">Total Items</span>
					</div>
				</div>
				<a class="card-button-bottom text-primary" href="#">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card border-info">
				<div class="card-info-top bg-info">
					<div class="pull-left">
						<i class="fa fa-cube fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">{{ number_format($total_asset) }}</span>
						<span class="card-desc">Total Assets</span>
					</div>
				</div>
				<a class="card-button-bottom text-info" href="{{ route('assets.index') }}">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card border-success">
				<div class="card-info-top bg-success">
					<div class="pull-left">
						<i class="fa fa-tint fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">{{ number_format($total_consumable) }}</span>
						<span class="card-desc">Total Consumables</span>
					</div>
				</div>
				<a class="card-button-bottom text-success" href="{{ route('consumables.index') }}">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card border-danger">
				<div class="card-info-top bg-danger">
					<div class="pull-left">
						<i class="fa fa-user-circle-o fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">{{ number_format($total_users) }}</span>
						<span class="card-desc">Total Users</span>
					</div>
				</div>
				<a class="card-button-bottom text-danger" href="{{ route('users.index') }}">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Recent Activity</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md">
						<thead class="thead-default">
							<tr>
								<th>Created/Updated At</th>
								<th>User</th>
								<th>Action</th>
								<th>Item</th>
								<th>Old Value</th>
								<th>New Value</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($recent_activity as $revision)
							<tr>
								<td>{{ $revision->created_at->format('Y-m-d h:i:s A') }}</td>

								@if (!empty($revision->user_id))
									<td><a href="{{ route('users.view', $revision->userResponsible()->netid) }}">{{ $revision->userResponsible()->name }}</a></td>
								@else
									<td>SYSTEM</td>
								@endif

								@if ($revision->key == 'created_at')
									<td>Create</td>
								@else
									<td>Update '{{ $revision->key }}'</td>
								@endif

								@if ($revision->revisionable_type == 'App\Asset') 
									<td><a href="{{ route('assets.view', $revision->revisionable_id) }}">Asset #{{ $revision->revisionable_id }}</a></td>
								@elseif ($revision->revisionable_type == 'App\Consumable')
									<td><a href="{{ route('consumables.view', $revision->revisionable_id) }}">Consumable #{{ $revision->revisionable_id }}</a></td>
								@elseif ($revision->revisionable_type == 'App\Category')
									<td><a href="{{ route('categories.view', $revision->revisionable_id) }}">Category #{{ $revision->revisionable_id }}</a></td>
								@endif

								@if ($revision->key == 'created_at')
									<td class="text-muted">(not applicable)</td>
									<td class="text-muted">(not applicable)</td>
								@else
									<td>{{ $revision->new_value }}</td>
									<td>{{ $revision->old_value }}</td>
								@endif
							</tr>
							@endforeach
						</tbody>						
					</table>
				</div>
			</div>
		</div>
	</div>
@stop