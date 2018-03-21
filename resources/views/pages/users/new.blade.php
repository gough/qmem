@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>New User</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ Form::open(array('route' => array('users.create'), 'enctype' => 'multipart/form-data')) }}
						@include('includes.forms.users', ['button' => 'Create'])
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop
