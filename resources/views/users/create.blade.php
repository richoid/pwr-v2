@extends('layouts.app')

@section('title', '| Create New User')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{ Form::open(['url' => 'users']) }}

                <div class="card-header">
                    <h3><i class='fa fa-user-plus'></i> Create New User</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', '', array('class' => 'form-control')) }}
                    </div>

                    <div class='form-group'>
                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                        @endforeach
                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}<br>
                        {{ Form::password('password', array('class' => 'form-control')) }}

                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Confirm Password') }}<br>
                        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

                    </div>
                </div>
                <div class="card-footer">
                    {{ Form::submit('Create New User', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@endsection