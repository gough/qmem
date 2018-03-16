@extends('layouts.no-fluid')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="pull-left">
				<h1>User: {{ !empty($user->name) ? $user->name : $user->netid }}</h1>
			</div>
			<div class="title-buttons pull-right">
				<a class="btn btn-warning btn-lg {{ ($user->netid == Auth::user()->netid) ? ' disabled' : null }}" href="{{ route('users.edit', $user->netid) }}">
					Edit
				</a>
				<a class="btn btn-danger btn-lg {{ ($user->netid == Auth::user()->netid) ? ' disabled' : null }}" href="{{ route('users.delete', $user->netid) }}">
					Delete
				</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					{{ $user }}
				</div>
			</div>
		</div>
	</div>
@stop