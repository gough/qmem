
@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <h1>Create Report</h1>
            </div>

            <div class="title-buttons pull-right">
                    <button class="btn btn-primary btn-lg">Export PDF</button>
            </div>
            <div class="title-buttons pull-right">
                    <button class="btn btn-primary btn-lg">Export Excel</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   @include('includes.pagination', ['items' => $consumables])
                    <table class="table table-bordered table-hover table-responsive-md">
                        <thead class="thead-default">
                            <tr>
                                <th>@sortablelink('id', 'ID')</th>
                                <th>@sortablelink('name', 'Name')</th>
                                <th>@sortablelink('category', 'Category')</th>
                                <th>@sortablelink('quantity', 'Quantity')</th>
                                <th>@sortablelink('created_at', 'Created At')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($consumables->count() > 0)
                                    @foreach ($consumables as $consumable)
                                        <tr>
                                            <td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->id }}</a></td>
                                            <td><a href="{{ route('consumables.view', $consumable->id) }}">{{ $consumable->name }}</a></td>
                                            <td><a href="{{ route('categories.view', $consumable->category->id) }}">{{ $consumable->category->name }}</a></td>
                                            <td>{{ $consumable->quantity }}</td>
                                            <td>{{ $consumable->created_at }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <td class="text-center" colspan="6">No consumables found.</td>
                                @endif
                    </tbody>                        
                    </table>
                    @include('includes.pagination', ['items' => $consumables])
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop