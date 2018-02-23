@extends('layouts.default')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>All Assets</h1>
			</div>
			<div class="title-buttons pull-right">
				<div class="dropdown">
					<button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						New
					</button>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="#">Capital Asset</a>
						<a class="dropdown-item" href="#">Consumable Asset </a>
					</div>
				</div>
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
								<th style="width: 40%">Item</th>
								<th style="width: 25%">Created At</th>
								<th style="width: 20%">User</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($assets as $asset)
							<tr>
								<td>{{ $asset->id }}</td>
								<td>
									<i class="fa {{ $asset->type == 'consumable' ? 'fa-tint' : 'fa-cube' }}"></i>
									<a href="#">{{ $asset->name }}</a>
								</td>
								<td>{{ $asset->created_at }}</td>
								<td><a href="#">{{ $asset->user }}</a></td>
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