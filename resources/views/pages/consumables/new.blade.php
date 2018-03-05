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
					{{ Form::open(array('route' => array('consumables.create'))) }}
						@php ($label_classes = 'col-md-2 col-form-label')
						@php ($field_classes = 'form-control')

						<div class="form-group row">
							<?php
								$field = 'name';
								$label = 'Consumable Name';
								$placeholder = 'Consumable Name';
								$value = null;
								$helptext = 'Enter a unique name for the consumable.';

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

						<div class="form-group row">
							<?php
								$field = 'category';
								$label = 'Consumable Category';
								$placeholder = 'Pick a category...';
								$value = 1;
								$helptext = 'Pick a category for the consumable.';

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
								{{ Form::select($field, $categories, $value, array('placeholder' => $placeholder, 'class' => $class)) }}
								{!! $message !!}
							</div>
						</div>

						<hr>

						<div class="form-group row">
							<?php
								$field = 'quantity';
								$label = 'Quantity';
								$placeholder = '1';
								$value = null;
								$helptext = 'Enter the initial amount of this consumable. This can be changed after creation.';

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
								{{ Form::number($field, $value, array('placeholder' => $placeholder, 'class' => $class)) }}
								{!! $message !!}
							</div>
						</div>
						
						<hr>

						<div class="form-group row">
							<div class="offset-md-2 col-md-10">
								{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
								<a class="btn btn-secondary" href="{{ url()->previous() }}">Cancel</a>
							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop