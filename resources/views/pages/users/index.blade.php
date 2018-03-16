@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <h1>Users</h1>
            </div>
            <div class="title-buttons pull-right">
                <a class="btn btn-primary btn-lg" href="{{ route('users.new') }}">
                    New
                </a>
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
                                <th>@sortablelink('netid', 'NetID')</th>
                                <th>@sortablelink('group', 'Group')</th>
                                <th>@sortablelink('active', 'Active')</th>
                                <th>@sortablelink('name', 'Name')</th>
                                <th>@sortablelink('email', 'Email')</th>
                                <th>@sortablelink('created_at', 'Created At')</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count() > 0)
                                @foreach ($users as $user)
                                <tr>
                                    <td><a href="{{ route('users.view', $user->netid) }}">{{ $user->netid }}</a></td>
                                    <td>{{ $user->group->name }}</td>
                                    <td>{{ ($user->active) ? 'True' : 'False' }}</td>
                                    <td>{!! !empty($user->name) ? $user->name : '<span class="text-muted text-small">(not set)</span>' !!}</td>
                                    <td>{!! !empty($user->email) ? $user->email : '<span class="text-muted text-small">(not set)</span>' !!}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->netid) }}" class="btn btn-warning btn-sm {{ ($user->netid == Auth::user()->netid) ? ' disabled' : null }}"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('users.delete', $user->netid) }}" class="btn btn-danger btn-sm {{ ($user->netid == Auth::user()->netid) ? ' disabled' : null }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <td class="text-center" colspan="5">No users found.</td>
                            @endif
                        </tbody>                        
                    </table>
                    @include('includes.pagination', ['items' => $users]) 
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop