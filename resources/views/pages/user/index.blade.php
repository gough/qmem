@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <h1>All Users</h1>
            </div>
            <div class="title-buttons pull-right">
                <!--<div class="dropdown">
                    <button class="btn btn-primary btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        New
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Capital Asset</a>
                        <a class="dropdown-item" href="#">Consumable Asset </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('includes.pagination', ['items' => $users])
                    <table class="table table-bordered table-hover table-responsive-md">
                        <thead class="thead-default">
                            <tr>
                                <th style="width: 2%"><input type="checkbox"></th>
                                <th style="width: 10%">Net ID</th>
                                <th style="width: 20%">Name</th>
                                <th style="width: 15%">Group</th>
                                <th style="width: 20%">Added</th>
                                <th style="width: 33%">Actions</th>
                                <!--<th class="hidden-xs" style="width: 1%" colspan="2">Item</th>
                                <th style="width: 44%">Item</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>{{ $user->netid }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->group }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                    @include('includes.pagination', ['items' => $users]) 
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop