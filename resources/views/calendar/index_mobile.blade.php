@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="float-left">Events</h3> 
                <div class="badge badge-dark float-right">{{ count($events) }}</div>
            </div>
            <div class="card-body" style="padding:1.5rem;">
                @if(count($events)==0)
                    <p colspan="8">No Events</p>
                @else 
                    @foreach($events as $post)
                        <div class="card">
                                <div class="card-header">
                                    <h5 class="float-left">{{ $post->title }}</h5> 
                                </div><!-- end card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            {{ str_limit($post->body, 255) }}
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="list-group list-group-flush">
                                                @if(!empty($post->start_date))
                                                    <li class="list-group-item"><small>STARTS:</small><br><strong>{{ $post->start_date->format('m/d/Y g:i a')}}</strong></li>
                                                @endif
                                            
                                                @if(!empty($post->end_date))
                                                    <li class="list-group-item"><small>ENDS:</small><br><strong>{{$post->end_date->format('m/d/Y g:i a')}}</strong></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-footer">                          
                                    <div class="small text-muted">
                                        @if($post->publish_date)
                                            Published: {{ $post->publish_date->tz('America/Los_Angeles')->format('m/d/y g:i a') }}
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