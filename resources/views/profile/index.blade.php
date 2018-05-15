@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <table class="table table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Since</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>User</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Since</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($client_users as $user)
                                @if($user->clients->contains('id', 2))
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->profiles->first_name or '' }} {{ $user->profiles->last_name or ''}}</td>
                                    @if($user->roles->first()->name !== 'superuser')
                                        <td>{{ $user->roles->first()->name or '' }}</td>
                                    @else
                                        <td>admin</td>
                                    @endif
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('m/d/Y') }}</td>
                                    
                                    <td class="actions" style="width:135px">
                                        <div class="btn-group action">
                                            <!-- view -->
                                            <a href="show/user/profile/{{ $user->id }}">
                                                <button class="btn btn-outline-secondary">
                                                    <span class="glyphicon glyphicon-eye-open"></span>
                                                </button>
                                            </a>
                                            <!-- edit -->
                                            <a href="/profile/{{ $user->id }}/edit">
                                                <button class="btn btn-outline-secondary">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                            </a>
                                            <!-- mark as deleted -->
                                            <a href="/profile/{{ $user->id }}/delete">
                                                <button class="btn btn-outline-secondary">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </button>
                                            </a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(function(){
        $('#users-list tfoot th').not(":eq(4),:eq(5)").each( function () {
			var title = $('#pets-list thead th').eq($(this).index()).text();
		    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		});

        var table = $('#users-list').DataTable(
        	{
        		"order": [[ 0, 'desc' ]],
        		"autoWidth": false,
        		"iDisplayLength": 10,
        		"bPaginate": true,
        		"sPaginationType": "full_numbers",
        		"bProcessing": true,
        	});
 
        table.columns().eq(0).each( function (colIdx) {

        	if(colIdx == 4 || colIdx == 5) return

     
            $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
	            table
	                .column( colIdx )
	                .search( this.value )
	                .draw();
	        });
        });
    });
    
</script>
@endsection
