@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Delete: {{ !empty($user->name) ? $user->name : $user->netid }}</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">User Information</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md table-no-margin">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>NetID</strong></td>
								<td style="width: 75%"><a href="{{ route('categories.view', $user->netid) }}">{{ $user->netid }}</a></td>
							</tr>
							<tr>
								<td><strong>Group</strong></td>
								<td>{{ $user->group->name }}</td>
							</tr>
							<tr>
								<td><strong>Name</strong></td>
								<td>{!! !empty($user->name) ? $user->name : '<span class="text-muted text-small">(not set)</span>' !!}</td>
							</tr>
							<tr>
								<td><strong>Email</strong></td>
								<td>{!! !empty($user->email) ? $user->email : '<span class="text-muted text-small">(not set)</span>' !!}</td>
							</tr>
							<tr>
								<td><strong>Created At</strong></td>
								<td>{{ $user->created_at }}</td>
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
					{{ Form::open(array('route' => array('users.destroy', $user->netid))) }}
						{{ Form::hidden('next', url()->previous()) }}
						
						<div class="form-group row">
							<div class="col-md-12">
								<h4>Are you sure you want to delete this user?</h4>
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