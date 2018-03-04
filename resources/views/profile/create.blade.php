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
            <form action="/profile/" method="POST" class="form-horizontal">
                {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="card outer-card">
                    <div class="card-header">
                        <h4 class="card-title">
                        Create Profile
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
                                                <input name="given_name" id="given_name" type="text" class="form-control" placeholder="First Name" tabindex=1 autofocus>
                                            </div>
                                            <div class="col">
                                                <input name="family_name" id="family_name" type="text" class="form-control" placeholder="Last Name" tabindex=2>
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card "name" -->
                            
                                <div class="card card-default">
                                    <div class="card-header">
                                        <label for="email" class="control-label">Email: </label>
                                    </div>	
                                    <div class="card-body">
                                        <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control" tabindex=3>
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
                                                    <input type="text" name="phone_m" id="phone_m" placeholder="" class="form-control" tabindex=4>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone_h" class="col-md-2 col-form-label">
                                                    <i class="glyphicon glyphicon-earphone"></i> home: 
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="phone_h" id="phone_h" placeholder="" class="form-control" tabindex=5>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone_w" class="col-md-2 col-form-label">
                                                    <i class="glyphicon glyphicon-earphone"></i> work: 
                                                </label>
                                                <div class="col-md-8">
                                                    <input type="text" name="phone_w" id="phone_w" placeholder="" class="form-control" tabindex=6>
                                                </div>
                                            </div>	
                                            
                                            <div class="form-group" style="display:block; padding: 12px 12px 0px 12px">
    
                                                <label for="phone_prefs" class="control-label" style="margin-right:1em">Preferred Phone: </label>
                                                <label class="radio-inline"><input type="radio" name="phone_prefs" value="mobile" tabindex=7 checked>&nbsp;&nbsp;Mobile&nbsp;</label>
                                                <label class="radio-inline"><input type="radio" name="phone_prefs" value="home" tabindex=8 >&nbsp;&nbsp;Home&nbsp;</label>
                                                <label class="radio-inline"><input type="radio" name="phone_prefs" value="work" tabindex=9 >&nbsp;&nbsp;Work&nbsp;</label>
                                                
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
                                                
                                                <input type="text" name="street_address" id="street_address" placeholder="Mailing Address" class="form-control" tabindex=10>
                                            </p>
                                        
                                            <p>
                                                <input type="text" name="address_locality" id="address_locality" placeholder="City" class="form-control" tabindex=11>
                                            </p>
                                            <p>
                                                <input type="text" name="address_region" id="address_region" placeholder="State" class="form-control" tabindex=12>
                                            </p>
                                            <p>
                                                <input type="text" name="postal_code" id="postal_code" value="" placeholder="Zip" class="form-control" tabindex=13>
                                            </p>
                                        </div>	
                                    </div> <!-- end card-body -->
                                </div> <!-- end card "address" -->
                        </div> <!-- main row -->
                    
                        <div class="card-footer">
                            <button type="submit" value="client" name="add_profile" class="btn btn-primary"  tabindex=14>
                                <i class="fa fa-user"></i> Add Profile
                            </button>
                        </div> <!-- card-footer -->
                    </div> <!--card body-->
                </div> <!-- card -->
            </form>
        </div> <!-- col-md-12 -->    
    </div> <!-- row -->
</div> <!-- container -->

    <div class="alert alert-info">  
        @if(Auth::user()->email == 'rich@richoid.com')	
            <p class="small">profile > create uses ProfileController@create then @store on submit</p>
            <p>route:web resource:profile url: profile/create</p>
        @endif      
    </div>

@stop