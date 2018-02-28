@extends('layouts.default')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Categories</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					@include('includes.pagination', ['items' => $categories])
					<table class="table table-bordered table-hover table-responsive-md">
						<thead class="thead-default">
							<tr>
								<th>@sortablelink('id', 'ID')</th>
								<th>@sortablelink('name', 'Name')</th>
								<th>@sortablelink('created_at', 'Created At')</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $category)
							<tr>
								<td><a href="{{ route('categories.view', $category->id) }}">{{ $category->id }}</a></td>
								<td><a href="{{ route('categories.view', $category->id) }}">{{ $category->name }}</a></td>
								<td>{{ $category->created_at }}</td>
							</tr>
							@endforeach
						</tbody>						
					</table>
					@include('includes.pagination', ['items' => $categories])
					</div>
				</div>
			</div>
		</div>
	</div>
@stop