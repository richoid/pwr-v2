@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                @foreach($post->clients as $client)
                <h3 style="text-transform:capitalize;">
                    <strong>{{ $client->pivot->post_type }}:</strong> {{ $post->title }}
                </h3>
                @endforeach
            </div>
            <div class="card-body" style="padding:1.5rem;">
                <div class="col-md-12">
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
                                    </strong> at <strong>{{  $post->created_at->format('m/d/Y g:i a') }} </strong>
                                    @if(!empty($post->publish_date)) 
                                    | @if($post->publish_date < Carbon\Carbon::now()) 
                                        Published on: 
                                    @else 
                                        Publishes on: 
                                    @endif
                                    {{  $post->publish_date }} 
                                    @endif
                                    @if(!empty($post->archive_date)) | Archives on: {{  $post->archive_date }} @endif
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