<!DOCTYPE html>
<html>
<head>
	<title>userdashbord</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="{{asset('css/userDashboard.css')}}">
     <script src="{{ asset('js/userDashboard.js') }}" defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<h3 class="text-center" style="color:white">UserDashbord</h3>
	<div id='left-align'>
	@if(auth::user())
		<h3><div class="text-center">{{ucfirst(auth::user()->name)}}</div></h3>
	@endif
	@if(auth::guard('weber')->user())
		<h3><div class="text-center">{{ucfirst(auth::guard('weber')->user()->name)}}</div></h3>
		@endif
		<a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
        </form>
    </div>
	<div class="container" id="emplist">
		@if (session()->get('message'))
         <div class="alert alert-success">
            {{ session()->get('message') }}
         </div>
        @endif
	<table class="table">
    <div class="bg-gray">
      <h3 style="color:white" >Employeest List</h3>
      <form action="#" id="form1">
      	@csrf
      	<input type="text"  name="search" class="search" placeholder="Search">
      	<!-- <input type="submit" class="btn btn-primary" value="Search"> -->
      </form>
  </div>
		<thead >
			<tr>
				<th>Employee-Id</th>
				<th>First-Name</th>
				<th>Last-Name</th>
				<th>Skill</th>
				<th>Start-Date</th>
				<th>CreatedBy</th>
				<th>UpdatedBy</th>
			</tr>
		</thead>
		<tbody id='tb'>
			@if($data)	
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
			@endif
		</tbody>
	</table>
	<div>
		 {!! $data->links() !!}
	</div>
	</div>
</body>
</html>
