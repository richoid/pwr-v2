@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{ Form::model($user, array('route' => ['users.update', $user->id], 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

                <div class="card-header">
                    <h3><i class='fa fa-user-plus'></i> Edit {{$user->profile->first_name}} {{$user->profile->last_name}}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <strong>{{ Form::label('email', 'User&rsquo;s Email:') }}</strong>
                        {{ Form::email('email', null, array('class' => 'form-control')) }}
                    </div>

                    <p><strong>Assign Role:</strong></p>

                    <div class='form-group'>
                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <strong>{{ Form::label('password', 'Change User&rsquo;s Password:') }}</strong><br>
                        {{ Form::password('password', ['class' => 'form-control']) }}

                    </div>

                    <div class="form-group">
                        {{ Form::label('password', 'Confirm Password') }}<br>
                        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

                    </div>
                </div>
                <div class="card-footer">
                    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>    
</div>

@endsection