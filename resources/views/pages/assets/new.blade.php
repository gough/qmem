@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>New Asset</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ Form::open(array('route' => array('assets.create'))) }}
						@php ($label_classes = 'col-md-2 col-form-label')
						@php ($field_classes = 'form-control')

						<div class="form-group row">
							<?php
								$field = 'name';
								$label = 'Asset Name';
								$placeholder = 'Asset Name';
								$value = null;
								$helptext = 'Enter a unique name for the asset.';

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
								$label = 'Asset Category';
								$placeholder = 'Pick a category...';
								$value = 1;
								$helptext = 'Pick a category for the asset.';

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

						<div class="form-group row">
							<div class="col-md-10">
								<?php
								$target_dir = "uploads/";
								$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
								$uploadOk = 1;
								$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
								// Check if image file is a actual image or fake image
								if(isset($_POST["submit"])) {
								    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
								    if($check !== false) {
								        echo "File is an image - " . $check["mime"] . ".";
								        $uploadOk = 1;
								    } else {
								        echo "File is not an image.";
								        $uploadOk = 0;
								    }
								}
								?>
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
