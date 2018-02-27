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
                                <th><input type="checkbox"></th>
                                <th>Net ID</th>
                                <th>Group</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Added</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>{{ $user->netid }}</td>
                                <td>{{ $user->group }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
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