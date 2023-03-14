<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

            <button class="btn-primary py-3" id="login"> <a href="{{url('registration')}}" class="text-center btn-primary ">Registration</a></button>
          
 <h3 class="bg-primary">Login Page</h3>
	<form action="{{url('loginCheck')}}" id='myform' method='post'>
   @csrf
    @if (session()->get('message'))
    <div class="alert alert-warning">
     {{ session()->get('message') }}
    </div>
    @endif
  <div class="form-outline mb-4">
    <input type="text" id="email" name='email' class="form-control" />
    <label class="form-label" for="form2Example1">Email</label>
    <span id='email'style='color:red'>{{ $errors->first('email') }}</span>
  </div>
  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name='password' id="password" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
    <span id='pwd' style='color:red'>{{ $errors->first('password') }}</span>
  </div>
   <div class="g-recaptcha form-outline mb-4" data-sitekey="6Lcl4NwkAAAAAOIACcwRXM40PKxoam9fnDSpekBF">
   </div>
    <span style='color:red'>{{ $errors->first('g-recaptcha-response') }}</span>
   
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary pull-right btn-block" id='submit'>Login</button>
    </button>
  </div>
</form>

<style>
  #login{
    margin-top:2%;
    width:10%;
    margin-left: 25%;
  }
  .submit{
    width:10%;
  }
  h3{
    background: blue;
    color: white;
    width:400px;
    height:40px;
    justify-content: center;
    margin-left: 25%;
    margin-top:2%;
  }
	form{
    /*color: white;*/
    /*background: gray;*/
		width:400px;
		justify-content: center;
		margin-left: 25%;
		margin-top:1%;
	}
   label.error{
            color:red;
            font-style:Serif;
            width:100%;
            margin-left:30%;
            font-size:10px;
        }
</style>
</body>
<script>
$(document).ready(function () {
$("#myform").validate({
  rules: {
    email: {
      required: true, 
      email: true
    },
    password: {
      required: true,
      minlength:8
    },
    // g-recaptcha:{
    //   required:true
    // }
  },
  messages: {
    
   username:{required:"This field is required",
    alphabetsnspace:"plase enter only letters"},
    password:{required:"This field is required",
    alphabetsnspace:"plase enter only letters"},
    // g-recaptcha:{"plase check"}
    
  },
  submitHandler: function (form) { // for demo
    alert('valid form');
    // Route::redirect("/student");
    // var form = $(form);
    // $form.submit();
    return true;
  }
});
 });
</script>
</html>