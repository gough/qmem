@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Export Data</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<span>
						<strong>Note:</strong> Data export may take a long time, especially if there are a large amount of items. Please be patient.
					</span>

					<hr>

					{{ Form::open(array('route' => array('export.download'))) }}
						@include('includes.forms.export', ['button' => 'Download'])
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop