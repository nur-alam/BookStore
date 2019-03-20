@extends('layouts.admin-app')

@section('content')

	<div class="col-md-12">
		<h2>User list</h2>
		<p></p>
		<table class="table table-striped" id="table_id">
			<thead>
			  <tr>
			  	<th>No.</th>
			    <th>Name</th>
			    <th>Email</th>
			    <th>Role</th>
			    <th>Created_at</th>
			    <th>Modify</th>
			  </tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				@forelse ($users as $user)					
					<tr>
						<td><?php echo ++$i; ?></td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->role}}</td>
						<td>{{$user->created_at->diffForHumans()}}</td>
						<td class="text-center">							
							<a href="{{route('admin.deleteUser',$user->id)}}" 
								onclick="return confirm('Are you sure?');">
								<i class="fas fa-trash-alt" style="color: #d9534f;"></i>
							</a>
						</td>
					</tr>
				@empty
					<p>No users</p>
				@endforelse		

			</tbody>

		</table>
	</div>

@endsection