<?php

namespace App\Http\Controllers;
use App\Models\userdata;
use Illuminate\Http\Request;
use auth;
use Hash;
class adminController extends Controller
{
	public function index()
{
//
}
public function check(Request $request)
{
	if (Auth::guard('weber')->attempt($request->only(['email','password']), $request->get('remember'))){
		
            return redirect('emplist');
}else{
            return view('adminlogin');
}
}
  protected function create(Request $request)
    {
    	
        $data=new userdata;
            $data->name=$request->name;
            $data->Roll=$request->role;
            $data->email=$request->email;
            $data->password=Hash::make($request->password);
            $data->save();
       return view('adminlogin')->with('success','successfuly register');
    }
}