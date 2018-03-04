@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Delete: {{ !empty($consumable->name) ? $consumable->name : '#' . $consumable->id }}</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Consumable Information</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md table-no-margin">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>ID</strong></td>
								<td style="width: 75%">{{ $consumable->id }}</td>
							</tr>
							<tr>
								<td><strong>Name</strong></td>
								<td>{{ $consumable->name }}</td>
							</tr>
							<tr>
								<td><strong>Category</strong></td>
								<td><a href="{{ route('categories.view', $consumable->category_id) }}">{{ $consumable->category->name }}</a></td>
							</tr>
							<tr>
								<td><strong>Quantity</strong></td>
								<td>{{ $consumable->quantity }}</td>
							</tr>
							<tr>
								<td><strong>Created At</strong></td>
								<td>{{ $consumable->created_at }}</td>
							</tr>
							<tr>
								<td><strong>Updated At</strong></td>
								<td>{{ $consumable->updated_at }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ Form::open(array('route' => array('categories.destroy', $consumable->id))) }}
						{{ Form::hidden('next', url()->previous()) }}

						<div class="form-group row">
							<div class="col-md-12">
								<h4>Are you sure you want to delete this consumable?</h4>
								<h6>This action is permanent and cannot be undone.</h6>
							</div>
						</div>

						<hr>

						<div class="form-group row">
							<div class="col-md-12">
								{{ Form::submit('Destroy', ['class' => 'btn btn-danger']) }}
								<a class="btn btn-secondary" href="{{ url()->previous() }}">Cancel</a>
							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop