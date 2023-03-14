<!DOCTYPE html>
<html>
   <head>
      <title>AdminDashboard</title>


      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- jquery validaton -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <!-- bootstrap css cdn  -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <!-- jquery datepiker cdns -->

      <link href=
         'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
         rel='stylesheet'>

      <script src=
         "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>
     <link rel="stylesheet" href="{{asset('css/adminDashboard.css')}}">
         
   </head>
   <body>
      <li id="head">
         <h2 class='text-center'>Admin-Dashboard</h2>
      </li>
      <ul id="right-side-bar">
         @if(Auth::user())
         <li class="list-group-item py-1" >{{ ucfirst(Auth::user()->name) }}</li>
         @endif
           @if(Auth::guard('weber')->user())
         <li class="list-group-item py-1" >{{ ucfirst(Auth::guard('weber')->user()->name) }}</li>
         @endif
         <li class="list-group-item py-1"><a  href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
         </form>
      </ul>
      <div id="left-side-bar">
         <ul  class="list-group">
             <li class="list-group-item py-1 {{ (request()->is('empList')) ? 'active' : '' }}">
               <a href="{{url('empList')}}" class="text-reset">EmployeeList</a>
            </li>
            <li id='act' class="list-group-item py-1 {{ (request()->is('empCreate')) ? 'active' : '' }}">
               <a href="{{url('empCreate')}}" class="text-reset">EmployeeCreate</a>
            </li>
            <li class="list-group-item py-1 {{ (request()->is('updateEmployee')) ? 'active' : '' }}">
               <a href="{{url('updateEmployee')}}" class="text-reset">Update</a>
            </li>
            <li class="list-group-item py-1 {{ (request()->is('Users')) ? 'active' : '' }}">
               <a href="{{url('Users')}}" class="text-reset">Users</a>
            </li>
         </ul>
      </div>
   </body>
</html>