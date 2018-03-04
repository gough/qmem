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
							{{ Form::label('name', 'Asset Name', array('class' => $label_classes)) }}
							<div class="col-md-10">
								@if ($errors->first('name'))
									{{ Form::text(
										'name',
										null,
										array('placeholder' => 'Asset Name', 'class' => $field_classes . ' border-danger')
									) }}
									<small class="form-text text-danger">{{ $errors->first('name') }}</small>
								@else
									{{ Form::text(
										'name',
										null,
										array('placeholder' => 'Asset Name', 'class' => $field_classes)
									) }}
									<small class="form-text text-muted">Enter a unique name for the asset.</small>
								@endif
							</div>
						</div>
						<div class="form-group row">
							{{ Form::label('category', 'Asset Category', array('class' => $label_classes)) }}
							<div class="col-md-10">
								@if ($errors->first('category'))
									{{ Form::select(
										'category',
										$categories,
										null,
										array('placeholder' => 'Pick a category...', 'class' => $field_classes . ' border-danger')
									) }}
							    	<small class="form-text text-danger">{{ $errors->first('category') }}</small>		
								@else
									{{ Form::select(
										'category',
										$categories,
										null,
										array('placeholder' => 'Pick a category...', 'class' => $field_classes)
									) }}
							    	<small class="form-text text-muted">Pick a category that best represents this asset.</small>
								@endif
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<div class="offset-md-2 col-md-10">
								{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop