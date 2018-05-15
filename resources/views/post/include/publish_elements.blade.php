<!-- publish-elements -->
<div class="row publish-elements">
        <hr>
        <div class="form-group col" v-if="StatusElements">
            
            {{ Form::label('publish_date', 'Publish Date') }}
            <div class="input-group">
            <i class="input-group-text fas fa-calendar"></i> 
                {{ Form::text('publish_date', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group col" v-if="StatusElements">
            
            {{ Form::label('publish_time', 'Publish Time') }}
            <div class="input-group">
                <i class="input-group-text fas fa-clock"></i>
                {{ Form::text('publish_time', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group col" v-if="ArchiveElements">
            
            {{ Form::label('end_date', 'Archive Date') }}
            <div class="input-group">
                <i class="input-group-text fas fa-calendar">
                </i> 
                {{ Form::text('end_date', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="form-group col" v-if="ArchiveElements">
            {{ Form::label('end_time', 'Archive Time') }}
            <div class="input-group">
                <i class="input-group-text fas fa-clock">
                </i>        
                {{ Form::text('end_time', null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div><!-- end row publish-elements -->