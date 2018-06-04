@extends('layouts.app')

@php
    $client = clientNow();
@endphp

@section('content')
    <div class="container">
        <div class="card" id="postEdit">
            {{ Form::model($post, ['route' => ['posts.update', $post->id], 'autocomplete' => 'off']) }}
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @php
                $post_type = $post->clients()->first()->pivot->post_type
            @endphp
            @if($post_type=='alert')
            <div class="card-header bg-{{ $post->alert_level }} text-light">
                    <h3 class="d-inline-block pr-3 pb-0 text-capitalize float-left">Edit 
                        {{ $post_type }}: {{ $post->title }}
                    </h3>
                    <i class="fa fa-bell float-right" style="font-size:28px; padding-top:.15em;"></i>
                    <div class="clearfix"></div>
                </div>
            @endif
            @if($post_type=="calendar")
            <div class="card-header">
                <h3 class="d-inline-block pr-3 pb-0 text-capitalize float-left">Edit 
                    {{ $post_type }}: {{ $post->title }}
                </h3>
                <i class="fa fa-calendar-alt float-right" style="font-size:28px; padding-top:.15em;"></i>
                <div class="clearfix"></div>
            </div>
            @endif
            <div class="card-body" style="padding:1.5rem;">
                    {{ Form::hidden('user_id', auth()->user()->id )}}
                    {{ Form::hidden('post_type', '', ['v-model' => 'type'])}}
                    {{ Form::hidden('status', '', ['v-model' => 'status'])}}
                    {{ Form::hidden('alert_level', '', ['v-model' => 'alertLevel'])}}
                    {{ Form::hidden('client_id', 2 )}}
                    {{ Form::hidden('start_date', '', ['v-model' => 'startDateCombined._i'])}}
                    {{ Form::hidden('end_date', '', ['v-model' => 'endDateCombined._i'])}}
                    {{ Form::hidden('publish_date', '', ['v-model' => 'publishDateCombined._i'])}}
                    {{ Form::hidden('archive_date', '', ['v-model' => 'archiveDateCombined._i'])}}
                
                @if($post_type=='calendar')
                    <div class="form-group">
                        @include('post.include.calendar_elements')
                    </div>
                @endif

                @if($post_type='alert')
                    <div class="form-group">
                        @include('post.include.alert_elements')
                    </div>
                @endif

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
            el: '#postEdit',
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
                'alertLevel': '{{ $post->alert_level }}',
                'startDate': '',
                'startTime': {
                    HH: "",
                    mm: ""
                },
                'endDate': '',
                'endTime': {
                    HH: "",
                    mm: ""
                },
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
                }
            },
            computed: {
                startDateCombine: function () {
                    if(this.CalendarElements==true) {
                        startCombined = moment(this.startDate).format('YYYY-MM-DD')
                        +' '+this.startTime.HH
                        +':'+this.startTime.mm
                        +':00'
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