<div class="row publish-elements">
    <div class="col">
        <div class="form-check-inline">
            <div class="btn-group-toggle" data-toggle="buttons" @click="setAlert('light')">
                <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                    <label for="alertLevel" class="btn btn-light form-check-label">
                        None:  &nbsp;{{ Form::radio('alertLevel', 'none', false, [
                            'class'=>'form-check-input', 
                            'autocomplete'=>'off',
                            'v-model' => 'alertLevel',
                            ]) }}
                    </label>
                </div>
            </div>
            <div class="btn-group-toggle" data-toggle="buttons" @click="setAlert('info')">
                <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                    <label for="alertLevel" class="btn btn-info form-check-label">
                        Info:  &nbsp;{{ Form::radio('alertLevel', 'info', false, [
                            'class'=>'form-check-input', 
                            'autocomplete'=>'off',
                            'v-model' => 'alertLevel',
                            ]) }}
                    </label>
                </div>
            </div>
            <div class="btn-group-toggle" data-toggle="buttons" @click="setAlert('warning')">
                <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                    <label for="alertLevel" class="btn btn-warning form-check-label">
                        Warning:  &nbsp;{{ Form::radio('alertLevel', 'warning', false, [
                            'class'=>'form-check-input', 
                            'autocomplete'=>'off',
                            'v-model' => 'alertLevel',
                            ]) }}
                    </label>
                </div>
            </div>
            <div class="btn-group-toggle" data-toggle="buttons" @click="setAlert('danger')">
                <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                    <label for="alertLevel" class="btn btn-danger form-check-label">
                        Danger:  &nbsp;{{ Form::radio('alertLevel', 'danger', false, [
                            'class'=>'form-check-input', 
                            'autocomplete'=>'off',
                            'v-model' => 'alertLevel',
                            ]) }}
                    </label>
                </div>
            </div>
            <div class="btn-group-toggle" data-toggle="buttons" @click="setAlert('resolved')">
                <div class="form-group d-inline-block pr-3 pb-0 mb-0">
                    <label for="alertLevel" class="btn btn-success form-check-label">
                        Resolved:  &nbsp;{{ Form::radio('alertLevel', 'resolved', false, [
                            'class'=>'form-check-input', 
                            'autocomplete'=>'off',
                            'v-model' => 'alertLevel',
                            ]) }}
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>