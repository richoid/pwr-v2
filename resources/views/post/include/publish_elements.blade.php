<!-- publish-elements -->
<hr>
<div class="row publish-elements">
    <div class="col-md-6 col-sm-12" v-if="StatusElements">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group" >
                    {{ Form::label('publish_date', 'Publish Date') }}
                    <div class="input-group">
                        <i class="input-group-text fas fa-calendar"></i> 
                        <vuejs-datepicker 
                            name="publishDate" 
                            :format="customFormatter" 
                            :bootstrap-styling="true" 
                            v-model="publishDate"
                        >
                        </vuejs-datepicker>
                    </div>
                </div>
            </div>    
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('publish_time', 'Publish Time') }}
                    <div class="input-group">
                        <i class="input-group-text fas fa-clock"></i>
                        <vue-timepicker 
                        :minute-interval="5" 
                        format="hh:mm A" 
                        v-model="publishTime" 
                        @blur="publishTimeHandler($event)">

                        </vue-timepicker>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-sm-12" v-if="ArchiveElements">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('archive_date', 'Archive Date') }}
                    <div class="input-group">
                        <i class="input-group-text fas fa-calendar">
                        </i> 
                        <vuejs-datepicker 
                            name="archiveDate" 
                            :format="customFormatter" 
                            :bootstrap-styling="true" 
                            v-model="archiveDate"
                        >
                        </vuejs-datepicker>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('archive_time', 'Archive Time') }}
                    <div class="input-group">
                        <i class="input-group-text fas fa-clock">
                        </i>        
                        <vue-timepicker 
                            :minute-interval="5" 
                            format="hh:mm A" 
                            v-model="archiveTime"
                            @blur="archiveTimeHandler($event)"
                        >
                        </vue-timepicker>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div><!-- end row publish-elements -->