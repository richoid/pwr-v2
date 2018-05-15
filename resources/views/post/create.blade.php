@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card" id="postCreate">
            {{ Form::open(array('route' => 'posts.store')) }}
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
                    {{ Form::hidden('user_id', auth()->user()->id )}}
                    {{ Form::hidden('type', '', ['v-model' => 'type'])}}
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
                    
                <div class="row extra-fields">
                    <div class="col-md-12">
                        <div class="form-row" v-if="NewsElements">
                            News
                        </div>

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
                    
                </div> <!-- end row extra-fields-->
                <div class="row status-check">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                <label for="status" class="form-check-label pr-3 btn btn-success" @click="hideStatusElements()">
                                    Publish Immediately &nbsp;{{ Form::radio('status', 'published', true, [
                                        'class'=>'form-check-input',
                                        'v-model' => 'status'
                                    ]) }}
                                </label>
                            </div>
                            <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                <label for="status" class="form-check-label btn btn-warning" @click="showStatusElements()">
                                    Publish Later &nbsp;{{ Form::radio('status', 'draft', false, [
                                        'class' => 'form-check-input',
                                        'v-model' => 'status'
                                        ]) }}
                                </label>
                            </div>    
                            <div class="btn-group-toggle">
                                <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                    <label for="archive" class="form-check-label btn btn-warning" data-toggle="buttons" @click="showArchiveElements()">
                                        Schedule Archive &nbsp;{{ Form::checkbox('archive', '', true, [
                                            'class'=>'form-check-input',
                                            'autocomplete'=>'off',
                                            'v-model' => 'ArchiveElements',
                                            
                                            ]) }}
                                    </label>
                                </div>
                            </div>    
                        </div> <!-- end form-check -->
                    </div> <!-- end col -->
                </div> <!-- end row status-check -->

                @include('post.include.publish_elements')

                <div class="card-footer">
                    <div class="col">
                        {{ Form::submit('Create Post', array('class' => 'btn btn-primary btn-lg btn-block')) }}

                    </div>
                </div>  
            </div>
            {{ Form::close() }}

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var vm = new Vue({
            el: '#postCreate',
            data: {
                'CalendarElements': false,
                'InfoElements': false,
                'AlertElements': false,
                'NewsElements': false,
                'StatusElements': true,
                'status': 'draft',
                'ArchiveElements': false,
                'type': ''
            },
            methods: {
                showCalendarElements: function() {
                    this.CalendarElements = !this.CalendarElements
                },
                showInfoElements: function() {
                    this.InfoElements = !this.InfoElements
                },
                showAlertElements: function() {
                    this.AlertElements = !this.AlertElements
                },
                showNewsElements: function() {
                    this.NewsElements = !this.NewsElements
                },
                showStatusElements: function() {
                    this.StatusElements = this.StatusElements = true
                    this.status = 'draft'
                },
                hideStatusElements: function() {
                    this.StatusElements = this.StatusElements = false
                    this.status = 'published'
                },
                showArchiveElements: function() {
                    this.ArchiveElements = !this.ArchiveElements
                }
            }
        })
    </script>

@endsection