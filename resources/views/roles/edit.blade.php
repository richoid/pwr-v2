@extends('layouts.app')

@section('title', '| Edit Role')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                            <h3><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h3>
                            <hr>
                    </div>
                    <div class="card-body">
                        {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Role Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>

                        <h5><b>Assign Permissions</b></h5>
                        @foreach ($permissions as $permission)

                            {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                            {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                        @endforeach
                    </div>
                    <div class="card-footer">
                        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
                        {{ Form::close() }}    
                    </div>
                </div>
            </div>
        </div>
    </div>
                        
</div>

@endsection