@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h3 class="mt-3 mb-0">{{ !empty($consumable->name) ? $consumable->name : '#' . $consumable->id }}</h3>
			<small class="text-muted">{{ $consumable->id_hash }}</small>
		</div>
		<div class="col-md-4">
			<div class="title-buttons float-left float-md-right">
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
		<div class="col-md-8">
			<div class="card">
				<div class="card-header d-block d-md-none">
					<span class="card-title">
						Information
					</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md table-no-margin">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>Name</strong></td>
								<td style="width: 75%">{{ $consumable->name }}</td>
							</tr>
							<tr>
								<td><strong>Category</strong></td>
								<td><a href="{{ route('categories.view', $consumable->category->id) }}">{{ $consumable->category->name }}</a></td>
							</tr>
							<tr>
								<td><strong>Quantity</strong></td>
								<td>{{ $consumable->quantity }} (minimum: {{ $consumable->minimum_quantity }})</td>
							</tr>
						</tbody>
					</table>
					<table class="table table-bordered table-hover table-responsive-md table-no-margin mt-3">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>Item Number</strong></td>
								<td style="width: 75%">{{ $consumable->item_number }}</td>
							</tr>
							<tr>
								<td><strong>Catalog Number</strong></td>
								<td>{{ $consumable->catalog_number }}</td>
							</tr>
							<tr>
								<td><strong>Custom Number</strong></td>
								<td>{{ $consumable->custom_number }}</td>
							</tr>
							<tr>
								<td><strong>Location</strong></td>
								<td>{{ $consumable->location }}</td>
							</tr>
							<tr>
								<td><strong>Price</strong></td>
								<td>{{ $consumable->price }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<span class="card-title">
						Notes
					</span>
				</div>
				<div class="card-body notes">
					@if (!empty($consumable->notes))
						{!! Markdown::convertToHtml($consumable->notes) !!}
					@else
						<span class="text-muted">(empty)</span>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header d-block d-md-none">
					Image
				</div>
				<div class="card-body text-center{{ !empty($consumable->image_id) ? '' : ' my-4' }}">
					@if (!empty($consumable->image_id))
						<a data-fancybox="gallery" href="{{ config('app.url') . 'img/' . $consumable->image_id }}">
							<img class="img-fluid mx-auto d-block" src="{{ config('app.url') . 'img/' . $consumable->image_id }}">
						</a>
					@else
						<span class="text-muted">(no image)</span>
					@endif
				</div>
			</div>
			<div class="card">
				<div class="card-header d-block d-md-none">
					Barcode
				</div>
				<div class="card-body text-center">
					{!! $consumable->barcode() !!}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">History</span>
				</div>
				<div class="card-body">
					@include('includes.revisions', ['revisions' => $consumable->revisionHistory->reverse()])
					<table class="table table-bordered table-hover table-responsive-md table-no-margin mt-3">
						<tbody>
							<tr>
								<td style="width: 20%"><strong>Created At</strong></td>
								<td style="width: 30%">{{ $consumable->created_at }}</td>
								<td style="width: 20%"><strong>Updated At</strong></td>
								<td style="width: 30%">{{ $consumable->created_at }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop
