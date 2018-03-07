@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Consumable: {{ !empty($consumable->name) ? $consumable->name : '#' . $consumable->id }}</h1>
			</div>
			<div class="title-buttons pull-right">
				<a class="btn btn-warning btn-lg" href="{{ route('consumables.edit', $consumable->id) }}">
					Edit
				</a>
				<a class="btn btn-danger btn-lg" href="{{ route('consumables.delete', $consumable->id) }}">
					Delete
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Consumable Information</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md table-no-margin">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>ID</strong></td>
								<td style="width: 75%">{{ $consumable->id }}</td>
							</tr>
							<tr>
								<td><strong>Name</strong></td>
								<td>{{ $consumable->name }}</td>
							</tr>
							<tr>
								<td><strong>Category</strong></td>
								<td><a href="{{ route('categories.view', $consumable->category_id) }}">{{ $consumable->category->name }}</a></td>
							</tr>
							<tr>
								<td><strong>Barcode</strong></td>
								<td>{!! $consumable->barcode() !!}</td>
							</tr>
							<tr>
								<td><strong>Quantity</strong></td>
								<td>{{ $consumable->quantity }}</td>
							</tr>
							<tr>
								<td><strong>Created At</strong></td>
								<td>{{ $consumable->created_at }}</td>
							</tr>
							<tr>
								<td><strong>Updated At</strong></td>
								<td>{{ $consumable->updated_at }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Consumable History</span>
				</div>
				<div class="card-body">
					@include('includes.revisions', ['revisions' => $consumable->revisionHistory->reverse()])
				</div>
			</div>
		</div>
	</div>
@stop