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
								<th>Type</th>
								<th>Action</th>
								<th>Item</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($recent_activity as $activity)
							<tr>
								<td>{{ $activity->updated_at->format('Y-m-d h:i:s A') }}</td>
								@if ($activity instanceof App\Asset)
									<td>Asset</td>
									<td>Update</td>
									<td><a href="{{ route('assets.view', $activity->id) }}">{{ $activity->name }}</a></td>
								@elseif ($activity instanceof App\Consumable)
									<td>Consumable</td>
									<td>Create</td>
									<td><a href="{{ route('consumables.view', $activity->id) }}">{{ $activity->name }}</a></td>
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