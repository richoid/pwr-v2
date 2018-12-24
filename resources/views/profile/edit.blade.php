@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
        
    <div class="row">
        <div class="col-md-12">
                {!! Form::model($profile, array('route' => array('profile.update', $profile), 'method' => 'PUT', 'class' => 'form-horizontal')) !!}
                {{ csrf_field() }}
                <div class="card outer-card">
                    <div class="card-header">
                        <h4 class="card-title">
                        Edit User Profile
                        </h4>
                    </div>
                    <div class="card-body">    
                        <div class="card card-default">
                                    <div class="card-header">
                                        <strong>Name: </strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">                                                
				                		        {{ Form::text('first_name', null,['class'=>'form-control', 'placeholder' => 'First Name']) }}
                                            </div>
                                            <div class="col">
                                                {{ Form::text('last_name', null,['class'=>'form-control', 'placeholder' => 'Last Name']) }}
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card "name" -->
                            
                                <div class="card card-default">
                                    <div class="card-header">
                                        <label for="email" class="control-label">Email: </label>
                                    </div>	
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                {{ Form::text('email', null,['class'=>'form-control', 'placeholder' => 'someone@somewhere.com']) }}
                                            </div>
                                            <div class="col">
                                                <input type="hidden" name="avatar_url">
                                                <button type="button" data-toggle="modal" data-target="#avatarUpload">Upload a Profile Photo</button>
                                            </div>
                                        </div>
                                    </div>	
                                </div><!-- end card "email" -->
                            
                                <div class="card card-default">
                                    <div class="card-header">
                                        <strong>Phone: </strong>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <div class="form-group row">
                                                <label for="phone_m" class="col-md-2 col-form-label">
                                                    <i class="glyphicon glyphicon-phone"></i> mobile: 
                                                </label>
                                                <div class="col-md-8">
                                                    {{ Form::text('phone_m', null,['class'=>'form-control']) }}
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone_h" class="col-md-2 col-form-label">
                                                    <i class="glyphicon glyphicon-earphone"></i> home: 
                                                </label>
                                                <div class="col-md-8">
                                                    {{ Form::text('phone_h', null,['class'=>'form-control']) }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone_w" class="col-md-2 col-form-label">
                                                    <i class="glyphicon glyphicon-earphone"></i> work: 
                                                </label>
                                                <div class="col-md-8">
                                                    {{ Form::text('phone_w', null,['class'=>'form-control']) }}
                                                </div>
                                            </div>	
                                            
                                            <div class="form-group" style="display:block; padding: 12px 12px 0px 12px">
    
                                                <label for="phone_prefs" class="control-label" style="margin-right:1em">Preferred Phone: </label>
                                                <label class="radio-inline">{{ Form::radio ('phone_prefs', 'mobile') }}&nbsp;&nbsp;Mobile&nbsp;</label>
                                                <label class="radio-inline">{{ Form::radio ('phone_prefs', 'home') }}&nbsp;&nbsp;Home&nbsp;</label>
                                                <label class="radio-inline">{{ Form::radio ('phone_prefs', 'work') }}&nbsp;&nbsp;Work&nbsp;</label>
                                                
                                            </div>
                                        </div><!-- end card-body -->
                                    </div><!-- end card "phone" -->
                            </div><!-- end col-md-6 -->
                                
                                
                                <div class="card card-default">
                                    <div class="card-header">
                                        <strong>Address: </strong>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="form-group" style="padding: 0 12px">
                                            <p>
                                                {{ Form::text('street_address', null,['class'=>'form-control']) }}
                                            </p>
                                        
                                            <p>
                                                {{ Form::text('address_locality', null,['class'=>'form-control']) }}
                                            </p>
                                            <p>
                                                {{ Form::text('address_region', null,['class'=>'form-control']) }}
                                            </p>
                                            <p>
                                                {{ Form::text('postal_code', null,['class'=>'form-control']) }}
                                            </p>
                                        </div>	
                                    </div> <!-- end card-body -->
                                </div> <!-- end card "address" -->
                        </div> <!-- main row -->
                    
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-user"></i> Save Profile
                            </button>
                        </div> <!-- card-footer -->
                    </div> <!--card body-->
                </div> <!-- card -->
            </form>
        </div> <!-- col-md-12 -->    
    </div> <!-- row -->
</div> <!-- container -->
@include('profile.includes.avatar_upload')


    <div class="alert alert-info">  
        @if(Auth::user()->email == 'rich@richoid.com')	
            <p class="small">profile > create uses ProfileController@create then @store on submit</p>
            <p>route:web resource:profile url: profile/create</p>
        @endif      
    </div>

@stop