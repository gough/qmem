@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Generate Barcodes</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<span>
						<strong>Note:</strong> Barcode generation may take a long time, especially if many or all barcodes are requested.
					</span>

					<hr>
					
					{{ Form::open(array('route' => array('barcodes.generate'))) }}
						@include('includes.forms.barcodes', ['button' => 'Generate'])
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop