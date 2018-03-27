@extends('layouts.no-fluid')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <h1>Create Report</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(array('route' => array('reports.download'))) }}
                        @include('includes.forms.reports', ['button' => 'Download'])
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop