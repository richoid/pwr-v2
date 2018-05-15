@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                All Posts
                <a href="/posts/create/" class="float-right btn btn-primary btn-sm">Create new Post</a>
            </div>
            <div class="card-body" style="padding:1.5rem;">
                    <div class="col-md-12">
                        <table class="table table-bordered" style="font-size:1em;" id="posts-table">
                            <thead style="font-size:.8em; background-color:#540202;color:#fff;">
                                <tr>
                                    <th>Id</th>
                                    <th>Type</th>
                                    <th>Created By</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Created</th>
                                    <th>Appears/Expires</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Type</th>
                                    <th>Created By</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Created</th>
                                    <th>Appears/Expires</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if(empty($posts))
                                    
                                    <tr>
                                        <td colspan="8">No Posts</td>
                                    </tr>
                                @else 
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            @if(!empty($post->alert_level))
                                                <td class="{{ 'table-' . $post->alert_level }}">
                                            @else
                                                <td>
                                            @endif
                                                {{ $post->pivot->post_type }}
                                            </td>
                                            <td>{{ $post->profiles->first_name or '' }} {{ $post->profiles->last_name or ''}}</td>
                                        
                                            <td>{{ $post->title }}</td>
                                            <td>{{ str_limit($post->body, 10) }}</td>
                                        
                                            <td class="small">{{ $post->created_at->tz('America/Los_Angeles')->format('m/d/y g:i a') }}</td>
                                        
                                            <td class="small">
                                                @if($post->start_date)
                                                    {{ $post->start_date->tz('America/Los_Angeles')->format('m/d/y g:i a') }}
                                                    <br>
                                                @endif
                                                @if($post->end_date)
                                                {{ $post->end_date->tz('America/Los_Angeles')->format('m/d/y g:i a') }}
                                                @endif
                                            </td>

                                            <td class="actions" style="width:135px">
                                                <div class="btn-group action">
                                                    <!-- view -->
                                                    <a href="/posts/{{ $post->id }}">
                                                        <button class="btn btn-outline-secondary">
                                                            <span class="glyphicon glyphicon-eye-open"></span>
                                                        </button>
                                                    </a>
                                                    <!-- edit -->
                                                    <a href="/posts/{{ $post->id }}/edit">
                                                        <button class="btn btn-outline-secondary">
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </a>
                                                    <!-- mark as deleted -->
                                                    <form action="{{ route( 'posts.destroy', ['id' => $post->id] ) }}" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-outline-secondary">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </td>

                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div><!--end col -->
            </div>    
        </div><!-- end card -->
    </div><!--end container -->
@endsection

@section('scripts')
<script>

    $(document).ready(function(){
        $(function(){
            $('#posts-table tfoot th').not(":eq(8)").each( function () {
                var title = $('#posts-table thead th').eq($(this).index()).text();
                $(this).html( '<input type="text" style="width:100%; font-size:.8em;" class="form-control-sm" placeholder="Search '+title+'" />' );
            });

            var table = $('#posts-table').DataTable(
                {
                    order: [[ 0, 'desc' ]],
        		    autoWidth: false,
        		    paging: false,
                    scrollY: 400,
                    processing: true,
                    pagingType: 'full_numbers',
                });

            table.columns().eq(0).each( function (colIdx) {

                if(colIdx == 7) return

                $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
                    table
                        .column( colIdx )
                        .search( this.value )
                        .draw();
                });
            });
            $('#posts-table_length').addClass('col');
            $('#posts-table_filter').addClass('col');
            $('#posts-table_wrapper').addClass('row');
        });
    });
    
</script>
@endsection