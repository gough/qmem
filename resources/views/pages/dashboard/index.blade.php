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
				<a class="card-button-bottom text-danger" href="{{ route('user.index') }}">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Recent Asset Activity</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md">
						<thead class="thead-default">
							<tr>
								<th>Date</th>
								<th>Item</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($recent_assets as $asset)
							<tr>
								<td>{{ $asset->updated_at }}</td>
								<td><a href="{{ route('assets.view', $asset->id) }}">{{ $asset->name }}</a></td>
							</tr>
							@endforeach
						</tbody>						
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Recent Consumable Activity</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md">
						<thead class="thead-default">
							<tr>
								<th>Date</th>
								<th>Item</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($recent_consumables as $consumable)
							<tr>
								<td>{{ $consumable->updated_at }}</td>
								<td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->name }}</a></td>
							</tr>
							@endforeach
						</tbody>						
					</table>
				</div>
			</div>
		</div>
	</div>
@stop