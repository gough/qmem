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
					{{ Form::open(array('route' => array('assets.update', $asset->id))) }}
						@php ($label_options = array('class' => 'col-md-2 col-form-label'))
						@php ($field_options = array('class' => 'form-control'))
						<div class="form-group row">
							{{ Form::label('name', 'Asset Name', $label_options) }}
							<div class="col-md-10">
								{{ Form::text(
									'name',
									$asset->name,
									array_merge(['placeholder' => 'Asset Name'], $field_options)
								) }}
							</div>
						</div>
						<div class="form-group row">
							{{ Form::label('category', 'Asset Category', $label_options) }}
							<div class="col-md-10">
								{{ Form::select(
									'category',
									$categories,
									$asset->category_id,
									array_merge(['placeholder' => 'Pick a category...'], $field_options)
								) }}
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<div class="offset-md-2 col-md-10">
								{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop