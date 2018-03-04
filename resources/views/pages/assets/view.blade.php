@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Asset: {{ !empty($asset->name) ? $asset->name : '#' . $asset->id }}</h1>
			</div>
			<div class="title-buttons pull-right">
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
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Asset Information</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md table-no-margin">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>ID</strong></td>
								<td style="width: 75%">{{ $asset->id }}</td>
							</tr>
							<tr>
								<td><strong>Name</strong></td>
								<td>{{ $asset->name }}</td>
							</tr>
							<tr>
								<td><strong>Category</strong></td>
								<td><a href="{{ route('categories.view', $asset->category_id) }}">{{ $asset->category->name }}</a></td>
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
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<span class="card-title">Asset History</span>
				</div>
				<div class="card-body">
					@include('includes.revisions', ['revisions' => $asset->revisionHistory->reverse()])
				</div>
			</div>
		</div>
	</div>
@stop