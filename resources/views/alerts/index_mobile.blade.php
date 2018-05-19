@extends('layouts.mobile')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="float-left">Alerts</h3> <div class="badge badge-dark float-right">{{$alerts->count()}}</div>
            </div>
            <div class="card-body" style="padding:1.5rem;">
                @if(empty($alerts))
                    <p colspan="8">No Alerts</p>
                @else 
                    @foreach($alerts as $post)
                        <div class="card">
                            @if(!empty($post->alert_level))
                                <div class="card-header {{ 'bg-' . $post->alert_level }}">
                            @else
                                <div class="card-header">
                            @endif 
                                    <strong>{{ $post->title }} </strong> 
                                </div><!-- end card-header -->
                                <div class="card-body">
                                    <div class="post-body">
                                        {{ str_limit($post->body, 255) }}
                                    </div>
                                </div>
                                <div class="card-footer">                          
                                    <div class="small">
                                        @if($post->start_date)
                                            {{ $post->start_date->tz('America/Los_Angeles')->format('m/d/y g:i a') }}
                                        @endif
                                    </div> 
                                </div> <!-- end card-footer -->
                        </div> <!-- end card (inner) -->
                    @endforeach
                @endif   
            </div> <!--end card-body (outer) -->                                    
        </div><!-- end card -->
    </div><!--end container -->
@endsection

@section('scripts')
<script>

    $(document).ready(function(){
        
    });
    
</script>
@endsection