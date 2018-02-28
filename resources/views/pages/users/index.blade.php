@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <h1>Users</h1>
            </div>
            <div class="title-buttons pull-right">
                
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
                                <td><a href="{{ route('users.view', $user->netid) }}">{{ $user->netid }}</a></td>
                                <td>{{ $user->group }}</td>
                                <td>{!! !empty($user->name) ? $user->name : '<span class="text-muted text-small">(not set)</span>' !!}</td>
                                <td>{!! !empty($user->email) ? $user->email : '<span class="text-muted text-small">(not set)</span>' !!}</td>
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