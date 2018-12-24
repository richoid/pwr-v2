@extends('layouts.app')

@php
    $client = clientNow();
    $options = collect();
    $options->news=false;
    $options->info=false;
    $options->calendar=true;
    $options->alerts=true;
@endphp

@section('content')
    <div class="container">
        <div class="card" id="postCreate">
            {{ Form::open(['route' => 'posts.store', 'autocomplete' => 'off']) }}

            {{ csrf_field() }}
            <div class="card-header">
                <div class="form-check form-check-inline">
                    
                <h3 class="d-inline-block pr-3 pb-0 text-capitalize">Create @{{type}}:</h3>
                    @if($options->news)
                        <div class="btn-group-toggle" data-toggle="buttons" @click="showNewsElements()">
                            <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                <label for="settype" class="btn btn-primary form-check-label">
                                    News  &nbsp;{{ Form::radio('settype', 'news', false, [
                                        'class'=>'form-check-input', 
                                        'autocomplete'=>'off',
                                        'v-model' => 'type',
                                        ]) }}
                                </label>
                            </div>
                        </div>
                    @endif
                    @if($options->info)
                        <div class="btn-group-toggle" data-toggle="buttons" @click="showInfoElements()">
                            <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                <label for="settype" class="btn btn-primary form-check-label">
                                    Info &nbsp;{{ Form::radio('settype', 'info', false, [
                                        'class'=>'form-check-input info', 
                                        'autocomplete'=>'off',
                                        'v-model' => 'type'
                                        ]) }}
                                </label>
                            </div>
                        </div>
                    @endif
                    @if($options->alerts)
                        <div class="btn-group-toggle" data-toggle="buttons" @click="showAlertElements()">
                            <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                <label for="settype" class="btn btn-primary form-check-label">
                                    Alert  &nbsp;{{ Form::radio('settype', 'alert', false, [
                                        'class'=>'form-check-input alerts', 
                                        'autocomplete'=>'off',
                                        'v-model' => 'type'
                                        ]) }}
                                </label>
                            </div>
                        </div>
                    @endif
                    @if($options->calendar)
                        <div class="btn-group-toggle" data-toggle="buttons" @click="showCalendarElements()">
                            <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                <label for="settype" class="btn btn-primary form-check-label">
                                    Calendar  &nbsp;{{ Form::radio('settype', 'calendar', false, [
                                        'class'=>'form-check-input calendar', 
                                        'autocomplete'=>'off',
                                        'v-model' => 'type'
                                        ]) }}
                                </label>
                            </div>
                        </div>
                    @endif
                </div><!-- end form-check inline -->    
            </div>
            <div class="card-body" style="padding:1.5rem;">
                    {{ Form::hidden('user_id', auth()->user()->id )}}
                    {{ Form::hidden('post_type', '', ['v-model' => 'type'])}}
                    {{ Form::hidden('status', '', ['v-model' => 'status'])}}
                    {{ Form::hidden('alert_level', '', ['v-model' => 'alertLevel'])}}
                    {{ Form::hidden('client_id', 2 )}}

                    {{ Form::hidden('start_date', '', ['v-model' => 'startDate'])}}
                    {{ Form::hidden('end_date', '', ['v-model' => 'endDate'])}}
                    {{ Form::hidden('publish_date', '', ['v-model' => 'publishDate'])}}
                    {{ Form::hidden('archive_date', '', ['v-model' => 'archiveDate'])}}
                    {{ Form::hidden('start_time', '', ['v-model' => 'startTimeCombined'])}}
                    {{ Form::hidden('end_time', '', ['v-model' => 'endTimeCombined'])}}
                    {{ Form::hidden('publish_time', '', ['v-model' => 'publishTimeCombined'])}}
                    {{ Form::hidden('archive_time', '', ['v-model' => 'archiveTimeCombined'])}}


                <div class="form-group" v-if="CalendarElements">
                    @include('post.include.calendar_elements')
                </div>
                <div class="form-group" v-if="AlertElements">
                    @include('post.include.alert_elements')
                </div>

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
                            <!-- Extra News Elements (none, now)-->
                        </div>
                        <div class="form-group" v-if="InfoElements">
                            <!-- Extra Info Elements (none, now)-->
                        </div>                       
                    </div>
                    
                </div> <!-- end row extra-fields-->
                <div class="row status-check">
                    <div class="col">
                        <div class="form-check form-check-inline">
                            <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                <label for="publishBtn" class="form-check-label pr-3 btn btn-success" @click="hideStatusElements()">
                                    Publish Immediately &nbsp;{{ Form::checkbox('publishBtn', false, false, [
                                        'class'=>'form-check-input',
                                        'v-model' => 'publishBtn',
                                    ]) }}
                                </label>
                            </div>
                            <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                <label for="laterBtn" class="form-check-label btn btn-warning" @click="showStatusElements()">
                                    Publish Later &nbsp;{{ Form::checkbox('laterBtn', true, true, [
                                        'class' => 'form-check-input',
                                        'v-model' => 'laterBtn',
                                        ]) }}
                                </label>
                            </div>    
                            <div class="btn-group-toggle">
                                <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                                    <label for="archive" class="form-check-label btn btn-warning" data-toggle="buttons" @click="showArchiveElements()">
                                        Schedule Archive &nbsp;{{ Form::checkbox('archive', '', false, [
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
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/vuejs-datepicker"></script>
    <script>
        
        var vm = new Vue({
            el: '#postCreate',
            data: {
                'CalendarElements': false,
                'InfoElements': false,
                'AlertElements': false,
                'NewsElements': false,
                'StatusElements': false,
                'status': 'publish',
                'publishBtn': true,
                'laterBtn': false,
                'ArchiveElements': false,
                'type': '',
                'alertLevel': 'none',
                'startDate': '',
                'startTime': {
                    hh: '',
                    mm: '',
                    ss: '00',
                    A: ''
                },
                'endDate': '',
                'endTime': {
                    hh: '',
                    mm: '',
                    ss: '00',
                    A: ''
                },
                'publishDate': '',
                'publishTime': {
                    hh: '',
                    mm: '',
                    ss: '00',
                    A: ''
                },

                'archiveDate': '',
                'archiveTime': {
                    hh: '',
                    mm: '',
                    ss: '00',
                    A: ''
                },
                'startTimeCombined':'',
                'endTimeCombined':'',
                'archiveTimeCombined':'',
                'publishTimeCombined':'',
            },
            methods: {
                startTimeHandler () {
                    hours=this.startTime.hh
                    minutes= this.startTime.mm
                    a=this.startTime.A
                    this.startTimeCombined = hours + ':' + minutes + ':' + '00 ' + a
                },
                endTimeHandler () {
                    hours=this.endTime.hh
                    minutes= this.endTime.mm
                    a=this.endTime.A
                    this.endTimeCombined = hours + ':' + minutes + ':' + '00 ' + a
                },
                archiveTimeHandler () {
                    hours=this.archiveTime.hh
                    minutes= this.archiveTime.mm
                    a=this.archiveTime.A
                    this.archiveTimeCombined = hours + ':' + minutes + ':' + '00 ' + a
                },
                publishTimeHandler () {
                    hours=this.publishTime.hh
                    minutes= this.publishTime.mm
                    a=this.publishTime.A
                    this.publishTimeCombined = hours + ':' + minutes + ':' + '00 ' + a
                },
                showCalendarElements: function() {
                    this.CalendarElements = true
                    this.InfoElements = false
                    this.AlertElements = false
                    this.NewsElements = false
                    this.type = 'calendar'
                },
                showInfoElements: function() {
                    this.InfoElements = true
                    this.AlertElements = false
                    this.CalendarElements = false
                    this.NewsElements = false
                    this.type = 'info'
                    
                },
                showAlertElements: function() {
                    this.AlertElements = true
                    this.InfoElements = false
                    this.CalendarElements = false
                    this.NewsElements = false
                    this.type = 'alert'
                    
                },
                showNewsElements: function() {
                    this.NewsElements = true
                    this.AlertElements = false
                    this.InfoElements = false
                    this.CalendarElements = false
                    this.type = 'news'
                    
                },
                showStatusElements: function() {
                    this.StatusElements = this.StatusElements=true
                    this.laterBtn = this.laterBtn = true
                    this.publishBtn = this.publishBtn = false
                    this.status = 'draft'
                },
                hideStatusElements: function() {
                    this.StatusElements = this.StatusElements = false
                    this.publishBtn = this.publishBtn = true
                    this.laterBtn = this.laterBtn = false
                    this.status = 'publish'
                },
                showArchiveElements: function() {
                    this.ArchiveElements = !this.ArchiveElements
                },
                setAlert: function(val) {
                    this.alertLevel = val
                },
                customFormatter(date) {
                    return moment(date).format('MM/DD/YYYY');
                },      
            },
            
            components: {
                vuejsDatepicker,
                VueTimepicker,
            }
        })
    </script>
    

@endsection