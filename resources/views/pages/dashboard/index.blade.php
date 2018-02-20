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
						<span class="card-title">{{ number_format($total_assets) }}</span>
						<span class="card-desc">Total Assets</span>
					</div>
				</div>
				<a class="card-button-bottom text-primary" href="{{ route('assets.index') }}">
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
						<span class="card-title">{{ number_format($total_consumables) }}</span>
						<span class="card-desc">Total Consumables</span>
					</div>
				</div>
				<a class="card-button-bottom text-success" href="{{ route('assets.index') }}">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card border-warning">
				<div class="card-info-top bg-warning">
					<div class="pull-left">
						<i class="fa fa-bell-o fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">{{ number_format($total_alerts) }}</span>
						<span class="card-desc">Total Alerts</span>
					</div>
				</div>
				<a class="card-button-bottom text-warning" href="">
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
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Recent Activity</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md">
						<thead class="thead-default">
							<tr>
								<th style="width: 25%">Date</th>
								<th style="width: 20%">User</th>
								<th style="width: 15%">Action</th>
								<th style="width: 40%">Item</th>
								<!--<th class="hidden-xs" style="width: 1%" colspan="2">Item</th>
								<th style="width: 44%">Item</th>-->
							</tr>
						</thead>
						<tbody>
							@foreach ($recent_assets as $asset)
							<tr>
								<td>{{ $asset->updated_at }}</td>
								<td><a href="#">{{ $asset->user }}</a></td>
								<td>Update</td>
								<td>
									<i class="fa {{ $asset->type == 'consumable' ? 'fa-tint' : 'fa-cube' }}"></i>
									<a href="#">{{ $asset->name }}</a>
								</td>
							</tr>
							@endforeach
						</tbody>						
					</table>
				</div>
			</div>
		</div>
	</div>
@stop