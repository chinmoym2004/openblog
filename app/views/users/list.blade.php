<h2 class="hero">All User's List</h2>
<div class="table-responsive">
  <table class="table .table-condensed">
  	<thead>    
	  	<tr>
		  <td>Id</td>
		  <td>First Name</td>
		  <td>Last Name</td>
		  <td>Email</td>
		  <td>Operation</td>
		</tr>
	</thead>
	<tbody class=".table-hover">
		@foreach ($users as $user)
		    <tr>
			  <td>{{ $user->id }}</td>
			  <td>{{ $user->firstname }}</td>
			  <td>{{ $user->lastname }}</td>
			  <td>{{ $user->email }}</td>
			  <td>
			  	<a href="{{URL::to('password/delete/'.$user->id)}}"><button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-trash"></span></button></a>
			  	<a href="{{URL::to('password/edit/'.$user->id)}}"><button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-pencil"></span></button></a>
			  </td>
			</tr>
		@endforeach
	</tbody>
	</table>
</div>
