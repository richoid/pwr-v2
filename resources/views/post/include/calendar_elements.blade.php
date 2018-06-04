<!-- schedule-elements -->
<div class="row schedule-elements">
    {{ Form::hidden('start_date', '', ['v-model' => 'startDateCombined']) }}
    {{ Form::hidden('end_date', '', ['v-model' => 'endDateCombined']) }}
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
                <vue-timepicker  :minute-interval="5" format="hh:mm A" v-model="startTime"></vue-timepicker>

            </div>
        </div>
        <div class="form-group col">
            
            {{ Form::label('end_date', 'Event End Date') }}
            <div class="input-group">
                <i class="input-group-text fas fa-calendar">
                </i> 
                <vuejs-datepicker 
                    name="endDate" 
                    :format="customFormatter" 
                    :bootstrap-styling="true" 
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
                <vue-timepicker  :minute-interval="5" format="hh:mm A" v-model="endTime"></vue-timepicker>

            </div>
        </div>
    </div><!-- end row schedule-elements -->