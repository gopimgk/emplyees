<?php
namespace App\Http\Controllers;
//use Request;
use Illuminate\Http\Request;
use App\Models\userdata;
use App\Models\User;
use App\Models\Employees;
use App\Http\Models\Admindata;
use App\Models\Empdata;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use Response;
use Auth;
use Hash;
class employeeController extends Controller{
 public function index(){
  return view('adminlogin');
 }

 public function registrationDataStore(Request $request){
  $validatior=$request->validate([
 'name' => 'required|alpha|max:10',
 'role' => 'required|alpha|max:10',
 'email' => 'required',
 'password' => 'required|min:8',
]);
 $data=new User;
 $data->name=$request->name;
 $data->role=$request->role;
 $data->email=$request->email;
 $data->password=Hash::make($request->password);
 $data->save();
return  redirect('loginNew');
}
//check login details from database
public function checkLogin(Request $request){
  	    // dd(123);
  	    $request->validate([
  	 	'email' => 'required',
     	'password' => 'required|min:8'
     	// 'g-recaptcha-response' => 'required'
   	]);
  	    // dd(123);
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

public function userDashboard(Request $req){
 	$data=Employees::select('*')->get();
 	$data=Employees::paginate(3);
 	return view('userDashboard')->with('data',$data);
}

//employee create form data storein databade
public function empDataStore(Request $req){
	$req->validate([
	'id' => 'required|Numeric',
	'FirstName' => 'required|alpha|max:10',
	'LastName' => 'required|alpha|max:10',
	'skill'  => 'required',
	'StartDate'  => 'required',
	]);
	$data=new Employees;
	$data->EmployeeId=$req->id;
	$data->FirstName= ucfirst($req->FirstName);
	$data->LastName=$req->LastName;
	$data->Skills=json_encode($req->skill);
	$data->StartDate=$req->StartDate;
	$data->createdBy=auth::user()->name;
	$data->updatedBy=auth::user()->name;
	$data->save();
	return redirect('empList')->with('message','Employee created successfully');
	}
//employee list display in admin dashboard
public function empList(Request $req){
 	$data=Employees::select('*')->get();
 	$data=Employees::paginate(3);
 	return view('admin.employeelist')->with('data',$data);
}
 
public function updateEmployee(){
	$data=Employees::select('FirstName')->get();
	return view('admin.updateemp')->with('data',$data);
}
//edit data form database
public function edit(Request $request){
	$data=Employees::select('*')->where('FirstName',$request->name)->get();
	return response()->json($data);
}
//update data store in database
public function empUpdateDataStore(Request $request){
	$request->validate([
	'id' => 'required|Numeric',
	'FirstName' => 'required|alpha|max:10',
	'LastName' => 'required|alpha|max:10',
	'skill'  => 'required',
	'StartDate'  => 'required',
]);
$data=Employees::where('EmployeeId',$request->id)->first();
if($data){
 	$data->EmployeeId=$request->id;
 	$data->FirstName=$request->FirstName;
 	$data->LastName=$request->LastName;
 	$data->Skills=json_encode($request->skill);
 	$data->StartDate=$request->StartDate;
	 if(Auth::user()){
  		$data->updatedBy=Auth::user()->name;
 	}
 	if(Auth::guard('weber')->user()){
  		$data->updatedBy=Auth::guard('weber')->user()->name;
 	}
	$data->update();
	return redirect('empList')->with('message','Employee updated successfully');
}
else{
	return redirect('empList');
	}
}

public function Users(Request $req){
	$data=User::select('*')->get();
	$data=User::paginate(2);
	return view('admin.Users')->with('data',$data);
}

public function searchEmp(Request $request){
	if($request->ajax()){
		// $search=Employees::paginate(3);
	$search=Employees::where('FirstName','like','%'.$request->search.'%')
	                 ->orWhere('LastName','like','%'.$request->search.'%')
	                 ->orWhere('Skills','like','%'.$request->search.'%')
	                 ->orWhere('StartDate','like','%'.$request->search.'%')
	                 ->orWhere('EmployeeId','like','%'.$request->search.'%')
	                 ->get();      
	  return  response()->json($search);
	}
}

public function searchnonAdmin(Request $request){
	if($request->ajax()){
	$search=Employees::where('FirstName','like','%'.$request->search.'%')
	                 ->orWhere('LastName','like','%'.$request->search.'%')
	                 ->orWhere('Skills','like','%'.$request->search.'%')
	                 ->orWhere('StartDate','like','%'.$request->search.'%')
	                 ->orWhere('EmployeeId','like','%'.$request->search.'%')
	                 ->get();
	               
	  return  response()->json($search);
	}
	
}

public function searchUser(Request $request){
	if($request->ajax()){
	$search=User::where('name','like','%'.$request->search.'%')
	                 ->orWhere('role','like','%'.$request->search.'%')
	                 ->orWhere('email','like','%'.$request->search.'%')
	                 ->get();
	                
	  return  response()->json($search);
	}
}
}