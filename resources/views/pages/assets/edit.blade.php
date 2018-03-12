@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Edit: {{ !empty($asset->name) ? $asset->name : '#' . $asset->id }}</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ Form::open(array('route' => array('assets.update', $asset->id), 'enctype' => 'multipart/form-data')) }}
						@include('includes.forms.assets', ['button' => 'Update'])
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop