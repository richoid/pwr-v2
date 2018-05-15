@extends('layouts.app')

@section('title', '| Users')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-sm-6">
                                <h3><i class="fa fa-users"></i> User Administration</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm pull-right">Roles</a>
                            <a href="{{ route('permissions.index') }}" class="btn btn-primary btn-sm pull-right mr-3">Permissions</a>
        
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date/Time Added</th>
                                <th>User Roles</th>
                                <th>Operations</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                            <tr>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                                <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-sm pull-left" style="margin-right: 3px;">Edit</a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-warning btn-sm']) !!}
                                {!! Form::close() !!}

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
            </div>
        </div>
    </div>
</div>

@endsection