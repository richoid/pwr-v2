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
                            <th>Client(s)</th>
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
                                <th>Client(s)</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($client_users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->profiles->first_name or '' }} {{ $user->profiles->last_name or ''}}</td>
                                <td>{{ $user->roles->name or '' }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('m/d/Y') }}</td>
                                <td>
                                    @foreach($user->clients as $client)
                                        <div class="badge badge-info">{{ $client->client_short }}</div>
                                    @endforeach
                                </td>
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
        $('#users-list tfoot th').not(":eq(5),:eq(6)").each( function () {
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

        	if(colIdx == 5 || colIdx == 6) return

     
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
