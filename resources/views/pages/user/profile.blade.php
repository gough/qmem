@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>Profile</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<table class="table table-bordered table-hover table-responsive-md table-no-margin">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>NetID</strong></td>
								<td style="width: 75%">{{ Auth::user()->netid }}</td>
							</tr>
							<tr>
								<td><strong>Group</strong></td>
								<td>{{ Auth::user()->group->name }}</a></td>
							</tr>
						</tbody>
					</table>
					<table class="table table-bordered table-hover table-responsive-md table-no-margin mt-3">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>Name</strong></td>
								<td style="width: 75%">{!! isset(Auth::user()->name) ? Auth::user()->name : '<span class="text-muted">(not set)</span>' !!}</td>
							</tr>
							<tr>
								<td><strong>Email</strong></td>
								<td>{!! isset(Auth::user()->group->email) ? Auth::user()->group->email : '<span class="text-muted">(not set)</span>' !!}</td>
							</tr>
						</tbody>
					</table>
					<table class="table table-bordered table-hover table-responsive-md table-no-margin mt-3">
						<tbody>
							<tr>
								<td style="width: 25%"><strong>Created At</strong></td>
								<td style="width: 75%">{{ Carbon::createFromFormat('Y-m-d H:i:s', Auth::user()->created_at)->format('Y-m-d h:i:s A') }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop