@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Post</div>
            <div class="card-body" style="padding:1.5rem;">
                <div class="col-md-12">
                    {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
                        <div class="card-header">
                                <div class="form-check form-check-inline">
                                    
                                    <h3 class="d-inline-block pr-3 pb-0">Create Post:</h3>
                                
                                    <div class="btn-group-toggle" data-toggle="buttons" @click="showNewsElements()">
                                        <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                            <label for="type-news" class="btn btn-primary form-check-label">
                                                News  &nbsp;{{ Form::checkbox('type-news', 'news', false, [
                                                    'class'=>'form-check-input', 
                                                    'autocomplete'=>'off',
                                                    'v-model' => 'NewsElements',
                                                    'true-value' => 'true',
                                                    'false-value' => 'false'
                                                    ]) }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="btn-group-toggle" data-toggle="buttons" @click="showAlertElements()">
                                        <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                            <label for="type-alert" class="btn btn-primary form-check-label">
                                                Alert  &nbsp;{{ Form::checkbox('type-alert', 'alert', false, [
                                                    'class'=>'form-check-input', 
                                                    'autocomplete'=>'off',
                                                    'v-model' => 'AlertElements',
                                                    'true-value' => 'true',
                                                    'false-value' => 'false'
                                                    ]) }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="btn-group-toggle" data-toggle="buttons" @click="showCalendarElements()">
                                        <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                            <label for="type-calendar" class="btn btn-primary form-check-label">
                                                Calendar  &nbsp;{{ Form::checkbox('type-calendar', '', false, [
                                                    'class'=>'form-check-input', 
                                                    'autocomplete'=>'off',
                                                    'v-model' => 'CalendarElements',
                                                    'true-value' => 'true',
                                                    'false-value' => 'false'
                                                    ]) }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="btn-group-toggle" data-toggle="buttons" @click="showInfoElements()">
                                        <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                            <label for="type-info" class="btn btn-primary form-check-label">
                                                Info &nbsp;{{ Form::checkbox('type-info', '', false, [
                                                    'class'=>'form-check-input', 
                                                    'autocomplete'=>'off',
                                                    'v-model' => 'InfoElements',
                                                    'true-value' => 'true',
                                                    'false-value' => 'false'
                                                    ]) }}
                                            </label>
                                        </div>
                                    </div>
                                </div><!-- end form-check inline -->    
                            </div>
                            <div class="card-body" style="padding:1.5rem;">
                            
                                <div class="form-group">
                                    {{ Form::label('title', 'Title') }}
                                    {{ Form::text('title', null, array('class' => 'form-control')) }}
                                    <br>
                        
                                    {{ Form::label('body', 'Content') }}
                                    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
                
                                    <br>
                        
                                    {{ Form::label('short', 'Short (for notifications, will appear with "click for more..")') }}
                                    {{ Form::textarea('short', null, ['class' => 'form-control', 'rows'=>'3']) }}
                                </div>
                                <div class="form-row" v-if="NewsElements">
                                    <hr>
                                    <div class="form-group col">
                                        
                                        {{ Form::label('start_date', 'Publish Date') }}
                                        <div class="input-group">
                                        <i class="input-group-text fas fa-calendar"></i> 
                                            {{ Form::text('start_date', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        
                                        {{ Form::label('start_time', 'Publish Time') }}
                                        <div class="input-group">
                                            <i class="input-group-text fas fa-clock"></i>
                                            {{ Form::text('start_time', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        
                                        {{ Form::label('end_date', 'Archive Date') }}
                                        <div class="input-group">
                                            <i class="input-group-text fas fa-calendar">
                                            </i> 
                                            {{ Form::text('end_date', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="form-group col">
                                        {{ Form::label('end_time', 'Archive Time') }}
                                        <div class="input-group">
                                                <i class="input-group-text fas fa-clock">
                                                </i>        
                                            {{ Form::text('end_time', null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row extra-fields">
                                    <div class="col-md-12">
                                        <div class="form-group" v-if="AlertElements">
                                                <p>alerts</p>
                                        </div>
                                        <div class="form-group" v-if="CalendarElements">
                                            <p>calendar</p>
                                        </div>
                                        <div class="form-group" v-if="InfoElements">
                                            <p>Info</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row status">
                                    <div class="col">
                                        <div class="form-check form-check-inline">
                                            <label for="type-info" class="form-check-label pr-3">
                                                Publish Immediately &nbsp;{{ Form::radio('status', '', false, [
                                                    'class'=>'form-check-input', 
                                                    ]) }}
                                            </label>
                                            <label for="type-info" class="form-check-label">
                                                Publish Later &nbsp;{{ Form::radio('status', '', true, [
                                                    'class'=>'form-check-input', 
                                                    ]) }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                
                                
                
                                <div class="card-footer">
                                    <div class="col">
                                        {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
                
                                    </div>
                                </div>  
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection