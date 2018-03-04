@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Edit: {{ !empty($category->name) ? $category->name : '#' . $category->id }}</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ Form::open(array('route' => array('categories.update', $category->id))) }}
						@php ($label_classes = 'col-md-2 col-form-label')
						@php ($field_classes = 'form-control')

						<div class="form-group row">
							<?php
								$field = 'name';
								$label = 'Category Name';
								$placeholder = 'Category Name';
								$value = $category->name;
								$helptext = 'Enter a unique name for the category.';

								if ($errors->first($field))
								{
									$class = $field_classes . ' border-danger';
									$message = '<small class="form-text text-danger">' . $errors->first($field) . '</small>';
								}
								else
								{
									$class = $field_classes;
									$message = '<small class="form-text text-muted">' . $helptext . '</small>';
								}
							?>

							{{ Form::label($field, $label, array('class' => $label_classes)) }}
							<div class="col-md-10">
								{{ Form::text($field, $value, array('placeholder' => $placeholder, 'class' => $class)) }}
								{!! $message !!}
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