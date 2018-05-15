@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 mx-auto">
            <div class="card">
                <div class="card-body text-center">
                    @php
                        $user = App\User::with('profiles')->find(Auth::id())
                    @endphp
                @if(empty($user->profiles->avatar_url))
                    @include('/profile/includes/avatar_missing')
                @else
                    <img class="card-img-top img-circle img-responsive img-bordered-primary" src="/images/users/avatar/{{ $user->profiles->user_id }}.jpg" alt="{{ $user->profiles->first_name . ' ' . $user->profiles->last_name }} profile photo">
                @endif
                    <h4 class="card-title text-capitalize mt-2">{{ $user->profiles->first_name or '' }}&nbsp;{{ $user->profiles->last_name or '' }}</h4>
                    
                    <p class="text-muted text-capitalize">{{ $user->getRoleNames()[0] or 'Volunteer' }}</p>
                    
                        <a href="/profile/{{ $user->id }}/edit">
                            <button class="btn btn-sm btn-info">
                                Edit Account&nbsp;&nbsp;
                                <i class="fa fa-cog align-middle"></i>
                            </button>
                                
                        </a>
                        @include('/profile/includes/logout_btn')
                
                </div>
            </div><!-- /.card -->
            
            <div class="card text-center">
                <div class="card-heading">
                    <div>
                        <h6 class="card-title text-uppercase mt-4">Contact Details</h6>
                    </div>
                    <!-- TODO: social (in profile.social) -->
                    <div class="clearfix"></div>
                </div><!-- /.panel-heading -->
                <div class="card-body no-padding">
                    <ul class="list-group no-margin text-left">
                        <li class="list-group-item">
                            <i class="fa fa-envelope align-middle"></i> 
                        <small>{{ $user->profiles->email or '' }}</small>
                        </li>
                    
                        <li class="list-group-item">
                            <i class="fa fa-phone align-middle"></i> 
                            @if($user->profiles->phone_m)
                            @if($user->profiles->phone_prefs === 'mobile')
                            <small>Mobile: <strong>{{ $user->profiles->phone_m }}</strong></small><br>
                            @else
                            <small>Mobile: {{ $user->profiles->phone_m }}</small><br>
                            @endif
                            @endif
                            @if($user->profiles->phone_h)	
                                @if($user->profiles->phone_prefs === 'home')
                                <small>Home: <strong>{{ $user->profiles->phone_h }}</small></strong><br>
                                @else
                                <small>Home: <strong>{{ $user->profiles->phone_h }}</strong></small><br>
                                @endif
                            @endif
                            @if($user->profiles->phone_w)	
                                @if($user->profiles->phone_prefs === 'work')
                                <small>Work: <strong>{{ $user->profiles->phone_w }}</strong></small><br>
                                @else
                                <small>Work: {{ $user->profiles->phone_w }}</small><br>
                                @endif
                            @endif                        
                        </li>
                    </ul>
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-md-4 -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
