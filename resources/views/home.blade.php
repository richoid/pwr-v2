@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 mx-auto">
            <div class="card">
                <div class="card-body text-center">
                @if(empty($profile->avatar_url))
                    @include('/profile/includes/avatar_missing')
                @else
                    <img class="card-img-top img-circle img-responsive img-bordered-primary" src="/images/users/avatar/{{ $profile->user_id }}.jpg" alt="{{ $profile->given_name . ' ' . $profile->family_name }} profile photo">
                @endif
                    <h4 class="card-title text-capitalize mt-2">{{ $profile->given_name or '' }}&nbsp;{{ $profile->family_name or '' }}</h4>
                    <p class="text-muted text-capitalize">{{ $profile->role or 'Volunteer' }}</p>
                    @if(Auth::id() !== $profile->id)
                    <p class="mt-4">
                        <a href="/profile/{{ $profile->id }}/message">
                            <button class="btn btn-sm btn-success text-center btn-block">
                                Contact Me
                            </button>
                        </a>
                    </p>
                    @endif
                        <a href="/profile/{{$profile->id}}/edit">
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
                    <!-- social (in profile.social) -->
                    @include('profile.social', $profile)
                    <div class="clearfix"></div>
                </div><!-- /.panel-heading -->
                <div class="card-body no-padding">
                    <ul class="list-group no-margin text-left">
                        <li class="list-group-item">
                            <i class="fa fa-envelope align-middle"></i> 
                            <small>support@bootdey.com</small>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-globe align-middle"></i> 
                            <small>www.bootdey.com</small>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-phone align-middle"></i> 
                            <small>+6281 903 xxx xxx</small>
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
