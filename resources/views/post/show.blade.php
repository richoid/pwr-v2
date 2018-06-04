@extends('layouts.app')

@php
    $client = clientNow();
    $tz = $client->places->first()->time_zone;
    $post_type = $post->clients()->first()->pivot->post_type;
    switch ($post->alert_level) {
        case 'info':
            $alert_class = 'info text-light';
            break;
        case 'warning':
            $alert_class = 'warning text-light';
            break;
        case 'danger':
            $alert_class = 'danger text-light';
            break;
        case 'resolved':
            $alert_class = 'success text-light';
            break;
    }
@endphp


@section('content')
    <div class="container">
        <div class="card">
            @if($post_type=="alert")
                <div class="card-header bg-{{$alert_class}}">
                    <h3 class="float-left text-capitalize">
                        {{ $post->title }}
                    </h3>
                    <i class="fa fa-bell float-right" style="font-size:28px; padding-top:.15em;"></i>
                </div>
            @endif
            @if($post_type=="calendar")
                <div class="card-header">
                    <h3 class="pull-left text-capitalize">
                        {{ $post->title }}
                    </h3>
                    <i class="fa fa-calendar-alt pull-right" style="font-size:28px; padding-top:.15em;"></i>
                </div>
            @endif

            <div class="card-body" style="padding:1.5rem;">
                <div class="col-md-12">
                    @if($post_type=='calendar')
                    <p style="color:#540202">
                        {{ $post->start_date->copy()->toDayDateTimeString($tz) }} 
                        &mdash; 
                        {{ $post->end_date->copy()->toDayDateTimeString($tz) }}

                    </p>
                    @endif

                        <small>SHORT:</small> <br>
                            <div class="card">
                                <div class="card-body">
                                    {{ $post->short }}  
                                </div>
                            </div>
                        <hr>
                        <small>BODY:</small> <br>
                            <div class="card">
                                <div class="card-body">
                                    {{ $post->body }} 
                                </div>
                            </div>
                        <small>META</small><br>
                        <div class="card">
                            <div class="card-body">
                                <small>
                                    Created by: <strong>{{  $post->users->first_name }} {{  $post->users->last_name }} 
                                    </strong> at <strong>{{  $post->created_at->copy()->timezone($tz)->format('m/d/Y g:i a') }} </strong>
                                    @if(!empty($post->publish_date)) 
                                    | @if($post->publish_date->copy()->timezone($tz) < Carbon\Carbon::now()) 
                                        Published on: 
                                    @else 
                                        Publishes on: 
                                    @endif
                                    {{  $post->publish_date->copy()->timezone($tz)->format('m/d/Y g:i a') }} 
                                    @endif
                                    @if(!empty($post->archive_date))
                                        | Archives on: 
                                        {{  $post->archive_date->copy()->timezone($tz)->format('m/d/Y g:i a') }} 
                                    @endif
                                </small>
                            </div>
                        </div>
                        
                </div>
                
            </div>
            <div class="card-footer">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
                    <a href="/posts/" class="btn btn-primary">All Posts</a>
                    @can('Edit Post')
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info" role="button">Edit</a>
                    @endcan
                    @can('Delete Post')
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    @endcan
                    {!! Form::close() !!}
                    </div>
        </div>
    </div>
@endsection