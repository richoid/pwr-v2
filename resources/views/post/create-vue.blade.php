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
                    {{ Form::hidden('start_date', '', ['v-model' => 'startDateCombined'])}}
                    {{ Form::hidden('end_date', '', ['v-model' => 'endDateCombined'])}}
                    {{ Form::hidden('publish_date', '', ['v-model' => 'publishDateCombined'])}}
                    {{ Form::hidden('archive_date', '', ['v-model' => 'archiveDateCombined'])}}

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
                    HH: "",
                    mm: ""
                },
                'startTimeCombined': '',
                'endDate': '',
                'endTime': {
                    HH: "",
                    mm: ""
                },
                'endTimeCombined': '',
                'publishDate': '',
                'publishTime': {
                    HH: "",
                    mm: ""
                },

                'archiveDate': '',
                'archiveTime': {
                    HH: "",
                    mm: ""
                },
                'startDateCombined': '',
                'endDateCombined': '',
                'publishDateCombined': '',
                'archiveDateCombined': '',
            },
            methods: {
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
                    this.endDate = ''
                    this.startTime = ''
                    this.endTime = ''
                },
                showAlertElements: function() {
                    this.AlertElements = true
                    this.InfoElements = false
                    this.CalendarElements = false
                    this.NewsElements = false
                    this.type = 'alert'
                    this.start = ''
                    this.endDate = ''
                    this.startTime = ''
                    this.endTime = ''
                },
                showNewsElements: function() {
                    this.NewsElements = true
                    this.AlertElements = false
                    this.InfoElements = false
                    this.CalendarElements = false
                    this.type = 'news'
                    this.startDateCombined = ''
                    this.endDateCombined = ''
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
            watch: {
                startTime: function (val) {
                    hours=val.hh
                    minutes=val.mm
                    a=val.A
                    timeCombined = hours + ':' + minutes + ':' + '00 ' + a
                    this.startTimeCombined = moment('hh:mm:ss A', timeCombined)
                },
                endTime: function (val) {
                    hours=val.HH
                    minutes= val.mm
                    a=val.A
                    timeCombined = hours + ':' + minutes + ':' + '00 ' + a
                    this.endTimeCombined = moment('hh:mm:ss A', timeCombined)
                }
            },
            computed: {
                startDateCombine: function () {
                    if(this.CalendarElements==true) {
                        startCombined = moment(this.startDate).format('YYYY-MM-DD')
                        + this.startTimeCombined
                        console.log(startCombined)
                        this.startDateCombined = moment(startCombined, 'YYYY-MM-DD HH:mm:ss')
                    } else {
                        this.startDateCombined = ''
                    }
                },
                endDateCombine: function () {
                    if(this.CalendarElements==true) {
                        endCombined = moment(this.endDate).format('YYYY-MM-DD')
                        +' '+this.endTime.HH
                        +':'+this.endTime.mm
                        +':00'
                        this.endDateCombined = moment(endCombined, 'YYYY-MM-DD HH:mm:ss')
                    } else {
                        this.endDateCombined = ''
                    }
                    
                },
                publishDateCombine: function () {
                    if(this.publishBtn) {
                        this.publishDateCombined = moment()
                    } else {
                        pubCombined = moment(this.publishDate).format('YYYY-MM-DD')
                        +' '+this.publishTime.HH
                        +':'+this.publishTime.mm
                        +':00'

                        this.publishDateCombined = moment(pubCombined, 'YYYY-MM-DD HH:mm:ss')
                    }
                },
                archiveDateCombine: function () {
                    if(this.ArchiveElements) {
                        archCombined = moment(this.archiveDate).format('YYYY-MM-DD')
                        +' '+this.archiveTime.HH
                        +':'+this.archiveTime.mm
                        +':00'
                        this.archiveDateCombined = moment(archCombined, 'YYYY-MM-DD HH:mm:ss')
                    } else {
                        this.archiveDateCombined = ''
                    }
                }
            },
            components: {
                vuejsDatepicker,
                VueTimepicker,
            }
        })
    </script>
    

@endsection