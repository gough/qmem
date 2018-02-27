@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Asset: {{ !empty($asset->name) ? $asset->name : '#' . $asset->id }}</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ $asset }}
				</div>
			</div>
		</div>
	</div>
@stop