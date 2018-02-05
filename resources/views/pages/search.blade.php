@extends('layouts.default')
@section('content')
	<h1>Search results for '{{ Request::get('query') }}'</h1>
	<p>{{ Request::get('query') }}</p>
@stop