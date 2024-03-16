<?php

namespace App\Http\Controllers;
use App\Http\Requests\regRequest;
use App\Http\Requests\loginRequset;
use App\Models\userdata;
use App\Models\User;
use Validator;
use Response;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
     public function registrationDataStore(regRequest $request){
 $data=new User;
 $data->name=$request->name;
 $data->role=$request->role;
 $data->email=$request->email;
 $data->password=Hash::make($request->password);
 $data->save();
return  redirect('loginNew');
}
//check login details from database
public function checkLogin(loginRequset $request){
 	if(Auth::attempt($request->only(['email','password']), $request->get('remember'))){
		if(Auth::user()->role=='admin'){ 
		    return redirect('empList')->with('message','admin login successfully');
		}
		else{
		  	return redirect('userdashboard')->with('message','user login successfully');
		}
	}
	elseif (Auth::guard('weber')->attempt($request->only(['email','password']), $request->get('remember'))){
		if(Auth::guard('weber')->user()->role=='admin'){
		    return redirect('empList');
		}else{
		    return redirect('userdashboard');
		}
		}
	else{
		return back()->with('message', 'please enter currect details.');
		}
}
}
