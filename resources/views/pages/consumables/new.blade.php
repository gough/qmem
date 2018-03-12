@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>New Consumable</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ Form::open(array('route' => array('consumables.create'), 'enctype' => 'multipart/form-data')) }}
						@include('includes.forms.consumables', ['button' => 'Create'])
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop