@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Edit: {{ !empty($consumable->name) ? $consumable->name : '#' . $consumable->id }}</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ Form::open(array('route' => array('consumables.update', $consumable->id), 'enctype' => 'multipart/form-data')) }}
						@include('includes.forms.consumables', ['button' => 'Update'])
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop