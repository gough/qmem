@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-8">
			<h3 class="mt-3 mb-0">{{ !empty($asset->name) ? $asset->name : '#' . $asset->id }}</h3>
			<small class="text-muted">{{ $asset->id_hash }}</small>
		</div>
		<div class="col-md-4">
			<div class="title-buttons float-left float-md-right">
				<a class="btn btn-warning btn-lg" href="{{ route('assets.edit', $asset->id) }}">
					Edit
				</a>
				<a class="btn btn-danger btn-lg" href="{{ route('assets.delete', $asset->id) }}">
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
								<td style="width: 75%">{{ $asset->name }}</td>
							</tr>
							<tr>
								<td><strong>Category</strong></td>
								<td><a href="{{ route('categories.view', $asset->category_id) }}">{{ $asset->category->name }}</a></td>
							</tr>
							<tr>
								<td><strong>Maintenance Status</strong></td>
								<td>{{ $asset->status }}</td>
							</tr>
							<tr>
								<td><strong>Created At</strong></td>
								<td>{{ $asset->created_at }}</td>
							</tr>
							<tr>
								<td><strong>Updated At</strong></td>
								<td>{{ $asset->updated_at }}</td>
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
				<div class="card-body">
					@if (!empty($asset->notes))
						{!! Markdown::convertToHtml($asset->notes) !!}
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
				<div class="card-body text-center{{ !empty($asset->image_id) ? '' : ' my-4' }}">
					@if (!empty($asset->image_id))
						<img class="img-fluid mx-auto d-block" src="{{ env('APP_URL') . 'img/' . $asset->image_id }}">
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
					{!! $asset->barcode() !!}
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
					@include('includes.revisions', ['revisions' => $asset->revisionHistory->reverse()])
				</div>
			</div>
		</div>
	</div>
@stop
