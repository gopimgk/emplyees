<!DOCTYPE html>
<html>
   <head>
      <title></title>
       <!-- <link rel="stylesheet" type="text/css" href="css/empcreate.css"> -->
     <link rel="stylesheet" href="{{asset('css/empcreate.css')}}">
     <script src="{{ asset('js/empcreate.js') }}" defer></script>
   </head>
   <body>
      @include("admin.admindashboard");
      <div class="container">
         <div id="empcreate">
            <h3 style="color:white">Create Employee</h3>
            <form action="{{url('empDataSubmit')}}" class="form-group " id="myform" method='post'>
               {!!csrf_field()!!}
               <div class="form-list">
                  <label for="id"class="label1">Employee-Id:</label>
                  <input type="text" class="form-control" name='id' id='id'>
                  <span>{{ $errors->first('id') }}</span>
               </div>
               <div class="form-list">
                  <label for="FirstName" class="label1"> First-Name:</label>
                  <input type="text" class="form-control " name='FirstName'id='FirstName'>
                  <span>{{ $errors->first('FirstName') }}</span>
               </div>
               <div class="form-list">
                  <label for="LastName" class="label1"> Last-Name:</label> 
                  <input type="text" class="form-control" name='LastName' id='LastName'>
                  <span>{{ $errors->first('LastName') }}</span>
               </div>
               <div class="form-list">
                  <label for="skill[]" class="label1"> Skills:</label> 
                  <input type="checkbox" class="skill" name='skill[]' id='skill'value="Clanguage"> C-Language<br>
                  <input type="checkbox" class="skill1" name='skill[]' id='skill1' value='java'> Java<br>
                  <input type="checkbox" class="skill1" name='skill[]' id='skill2' value='php'> Php<br>
                  <span>{{ $errors->first('skill') }}</span>
               </div>
               <!-- </div> -->
               <div class="form-list">
                  <label for="StartDate" class="label1">Start-Date:</label>
                  <input type="text" class="form-control" name='StartDate' id='StartDate'>
                  <span>{{ $errors->first('StartDate') }}</span>
               </div>
               <div class=form-list>
                  <input type="submit" class="btn btn-primary pull-left" value="Save" id="submit">
               </div>
            </form>
         </div>
      </div>
    </body>
</html>