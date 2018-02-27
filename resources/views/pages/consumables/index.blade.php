@extends('layouts.default')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Consumables</h1>
			</div>
			<div class="title-buttons pull-right">
				<a class="btn btn-primary btn-lg" href="{{ route('consumables.create') }}">
					New
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					@include('includes.pagination', ['items' => $consumables])
					<table class="table table-bordered table-hover table-responsive-md">
						<thead class="thead-default">
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Category</th>
								<th>Quantity</th>
								<th>User</th>
								<th>Created At</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($consumables as $consumable)
							<tr>
								<td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->id }}</a></td>
								<td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->name }}</a></td>
								<td>{{ $consumable->category }}</td>
								<td>{{ $consumable->quantity }}</td>
								<td>
									{{ !empty(User::find($consumable->user_id)->name) ? User::find($consumable->user_id)->name : User::find($consumable->user_id)->netid }}
								</td>
								<td>{{ $consumable->created_at }}</td>
							</tr>
							@endforeach
						</tbody>						
					</table>
					@include('includes.pagination', ['items' => $consumables])
					</div>
				</div>
			</div>
		</div>
	</div>
@stop