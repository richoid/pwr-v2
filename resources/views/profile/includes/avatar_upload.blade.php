<div class="modal fade" id="avatarUpload" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Profile Image Upload</h2>
            </div>
            <div class="modal-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                    <img src="images/{{ Session::get('image') }}">
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open(array('route' => 'avatar.upload.post','files'=>true)) !!}
                    <div class="row">
                        <div class="col-md-6">
                                {!! Form::file('avatar_url', array('class' => 'form-control')) !!}
                            </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
        
                    </div>
                    <div>
                        <small id="avatarHelp" class="form-text text-muted">We recommend 400px x 400px or larger JPEG file</small>

                    </div>

        
                {!! Form::close() !!}
            </div> <!-- end modal-body -->       
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div><!-- end modal -->
