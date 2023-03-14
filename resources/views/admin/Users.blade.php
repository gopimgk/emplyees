<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{asset('css/user.css')}}">
     <script src="{{ asset('js/user.js') }}" defer></script>
</head>
<body>
@include('admin.admindashboard');
<div class='container'>
	<div id="emplist">
		<div class="bg-gray">
      <h3 style="color:white" >UsersList</h3>
      <form action="#" id="form1">
      	@csrf
      	<input type="text"  name="search" class="search" placeholder="Search">
      	<!-- <input type="submit" class="btn btn-primary" value="Search"> -->
      </form>
  </div>
	<table class="table table-hover table-striped table-responsive" >
		<thead >
			<tr>
				<th>Name</th>
				<th>Email_id</th>
				<th>Role</th>
			</tr>
		</thead>
		<tbody id='tb'>
			
		 @foreach($data as $item)
			<tr>
				<td>{{$item->name}}</td>
				<td>{{$item->email}}</td>
				<td>{{$item->role}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div>
		 {!! $data->links() !!}
	</div>
	</div>
</div>
</body>
</html>