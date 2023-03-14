<!DOCTYPE html>
<html>
   <head>
      <title>update</title>
      <link rel="stylesheet" href="{{asset('css/updateemp.css')}}">
     <script src="{{ asset('js/updateemp.js') }}" defer></script>
      <meta charset="utf-8">
     
   </head>
   <body>
      @include("admin.admindashboard");
      <div class="container">
         <div  id='update'>
            <h3 style="color:white">Update Employee</h3>
            <select id='name'>
               <option>Select Employee</option>
               @foreach($data as $item)
               <option>{{ ucfirst($item->FirstName)}}</option>
               @endforeach
            </select>
            <br><br>
            <!-- Button to Open the Modal -->
            <button type="button" id='edit' class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Edit
            </button>
            <!-- The Modal -->
            <div class="modal" id="myModal">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <!-- Modal Header -->
                     <div class="modal-header">
                        <h4 class="modal-title">Update Employee</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                     </div>
                     <!-- Modal body -->
                     <div class="modal-body">
                        <form action="{{url('empUpdateDataSubmit')}}" class="form-group " id="myform" method='post'>
                           {!!csrf_field()!!}
                           <div class="form">
                              <label for="id"class="label1">Employee-Id:</label>
                              <input type="text" class="form-control" name='id' id='id' value="">
                              <span>{{ $errors->first('id') }}</span>
                           </div>
                           <div class="form">
                              <label for="FirstName" class="label1"> First-Name:</label>
                              <input type="text" class="form-control " name='FirstName'id='FirstName' value="">
                              <span>{{ $errors->first('FirstName') }}</span>
                           </div>
                           <div class="form">
                              <label for="LastName" class="label1"> Last-Name:</label> 
                              <input type="text" class="form-control" name='LastName' id='LastName' value="">
                              <span>{{ $errors->first('LastName') }}</span>
                           </div>
                           <div class="form">
                              <label for="skill" class="label1">Skill:</label>
                              <input type="checkbox" class="#l" name='skill[]'  id='c'value="Clanguage">C-Language<br>
                              <input type="checkbox" class="skill1"  name='skill[]' id='java' value='java'>Java<br>
                             <input type="checkbox" class="skill1" name='skill[]' id='php'  value='php'>Php
                              <span>{{ $errors->first('skill') }}</span>
                           </div>
                           <div class="form">
                              <label for="StartDate" class="label1">Start-Date:</label>
                              <input type="text" class="form-control" name='StartDate' id='StartDate' value=""><br>
                              <span>{{ $errors->first('StartDate') }}</span>
                           </div>
                         
                     <!-- Modal footer -->
                     <div class="modal-footer">
                      <div class=form1>
                              <input type="submit" class="btn btn-info pull-left" value="Save" id="submit">
                           </div>
                        <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
                     </div>

                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>