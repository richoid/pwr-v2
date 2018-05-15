@extends('layouts.app')

@section('title', '| Roles')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-sm-6">
                            <h3><i class="fa fa-key"></i> Roles</h3>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm float-right">Users</a>
                            <a href="{{ route('permissions.index') }}" class="btn btn-primary btn-sm float-right mr-3">Permissions</a></h3>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>Permissions</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>

                                        <td>{{ $role->name }}</td>

                                        <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                                        <td>
                                        <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info btn-sm pull-left" style="margin-right: 3px;">Edit</a>

                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-warning btn-sm']) !!}
                                        {!! Form::close() !!}

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>

@endsection