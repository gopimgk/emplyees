<!DOCTYPE html>
<html>
<head>
	<title></title>
     <link rel="stylesheet" href="{{asset('css/emplist.css')}}">
     <script src="{{ asset('js/emplist.js') }}" defer></script>

</head>
<body>
@include('admin.admindashboard');
<div class="container">
	<div id="emplist">
		@if (session()->get('message'))
          <div class="alert alert-success">
             {{ session()->get('message') }}
          </div>
        @endif
		<div class="bg-gray">
      <h3 style="color:white" >Employee List</h3>
      <form action="#" id="form1">
      	@csrf
      	<input type="text"  name="search" class="search" placeholder="Search">
      </form>
     </div>
	<table class="table table-responsive">
	
		<thead >
			<tr>
				<th>Employee-Id</th>
				<th>First-Name</th>
				<th>Last-Name</th>
				<th>Skills</th>
				<th>Start-Date</th>
				<th>CreatedBy</th>
				<th>UpdatedBy</th>
			</tr>
		</thead>
		<tbody id="tb">
		<div class="tb"	>
		 @foreach($data as $item)
			<tr>
				<td>{{$item->EmployeeId}}</td>
				<td>{{$item->FirstName}}</td>
				<td>{{$item->LastName}}</td>
				<td>{{$item->Skills}}</td>
				<td>{{$item->StartDate}}</td>
				<td>{{$item->createdBy}}</td>
				<td>{{$item->updatedBy}}</td>
			</tr>
			@endforeach
		</div>
			
		</tbody>
	</table>
	<div>
		 {!! $data->links() !!}
	</div>
</div>
</div>
</body>
</html>