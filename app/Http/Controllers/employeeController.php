<?php
namespace App\Http\Controllers;
//use Request;
use App\Http\Requests\empRequest;
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

public function userDashboard(Request $req){
 	$data=Employees::select('*')->get();
 	$data=Employees::paginate(3);
 	return view('userDashboard')->with('data',$data);
}

//employee create form data storein databade
public function empDataStore(empRequest $req){
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
public function empUpdateDataStore(empRequest $request){
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

//search buttons functions

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