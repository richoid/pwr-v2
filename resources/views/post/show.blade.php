@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Show Post</div>
            <div class="card-body" style="padding:1.5rem;">
                <div class="col-md-12">
                        <h1>{{ $post->title }}</h1>
                        <hr>
                        <p class="short">{{ $post->short }} </p>
                        <hr>
                        <p class="lead">{{ $post->body }} </p>
                        <hr>
                        <p class="meta">
                            Created by: {{  $post->user_id }}  |  Created {{  $post->created_at }}  |  Published on: {{  $post->publish_date }}  | Archives on: {{  $post->archive_date }}  
                        </p>
                        <hr>
                        <hr>
                        <hr>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
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
    </div>
@endsection