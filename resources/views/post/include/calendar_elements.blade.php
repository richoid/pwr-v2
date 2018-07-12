<!-- schedule-elements -->
<div class="row schedule-elements">
    {{ Form::hidden('start_date', '', ['v-model' => 'startDate']) }}
    {{ Form::hidden('end_date', '', ['v-model' => 'endDate']) }}
    {{ Form::hidden('start_time', '', ['v-model' => 'startTime']) }}
    {{ Form::hidden('end_time', '', ['v-model' => 'endTime']) }}
        <hr>
        <div class="form-group col">
            
            {{ Form::label('start_date', 'Event Start Date') }}
            <div class="input-group">
            <i class="input-group-text fas fa-calendar"></i> 
                <vuejs-datepicker 
                    name="startDate" 
                    :format="customFormatter" 
                    :bootstrap-styling="true"
                    v-model="startDate"
                    > 
                </vuejs-datepicker>
            </div>
        </div>
        <div class="form-group col">
            
            {{ Form::label('start_time', 'Event Start Time') }}
            <div class="input-group">
                <i class="input-group-text fas fa-clock"></i>
                <vue-timepicker  
                    @blur="startTimeHandler($event)"
                    v-model="startTime"
                    :minute-interval="5" 
                    format="hh:mm A" 
                >
                </vue-timepicker>

            </div>
        </div>
        <div class="form-group col">
            
            {{ Form::label('end_date', 'Event End Date') }}
            <div class="input-group">
                <i class="input-group-text fas fa-calendar">
                </i> 
                <vuejs-datepicker 
                    name="endDate" 
                    :bootstrap-styling="true"
                    :format="customFormatter" 
                    v-model="endDate"
                >
                </vuejs-datepicker>

            </div>
        </div>
        <div class="form-group col">
            {{ Form::label('end_time', 'Event End Time') }}
            <div class="input-group">
                <i class="input-group-text fas fa-clock">
                </i>        
                <vue-timepicker  
                    @blur="endTimeHandler($event)"
                    v-model="endTime"
                    :minute-interval="5" 
                    format="hh:mm A" 
                    >
                </vue-timepicker>

            </div>
        </div>
    </div><!-- end row schedule-elements -->