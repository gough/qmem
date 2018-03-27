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
			<div class="card border-info">
				<div class="card-info-top bg-info">
					<div class="pull-left">
						<i class="fa fa-tint fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">{{ number_format($total_consumables) }}</span>
						<span class="card-desc">Total Consumables</span>
					</div>
				</div>
				<a class="card-button-bottom text-info" href="{{ route('consumables.index') }}">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card border-success">
				<div class="card-info-top bg-success">
					<div class="pull-left">
						<i class="fa fa-cubes fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">{{ number_format($total_categories) }}</span>
						<span class="card-desc">Total Categories</span>
					</div>
				</div>
				<a class="card-button-bottom text-success" href="{{ route('categories.index') }}">
					<span>View details</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-sm-6">
			<div class="card border-dark">
				<div class="card-info-top bg-dark">
					<div class="pull-left">
						<i class="fa fa-archive fa-4x align-middle"></i>
					</div>
					<div class="pull-right">
						<span class="card-title">{{ number_format($total_items) }}</span>
						<span class="card-desc">Total Items</span>
					</div>
				</div>
				<a class="card-button-bottom text-dark" href="{{ route('reports.index') }}">
					<span>Run a report</i></span><i class="pull-right fa fa-arrow-circle-right"></i>
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
					@include('includes.revisions', ['revisions' => $recent_activity, 'show_item' => True, 'no_found_error' => 'No recent activity found.'])
				</div>
			</div>
		</div>
	</div>
@stop