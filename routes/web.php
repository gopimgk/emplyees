<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\adminController;
use App\Http\Middleware\employeeMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('registration',function(){
  return view('registration');
});
Route::post('registartionSubmit',[AuthenticateController::class,'registrationDataStore']);

Route::get('loginNew',function(){
  return view('adminlogin');
});
Route::post('loginCheck',[AuthenticateController::class,'checkLogin']);


// add middleware 
 Route::group(['middleware'=>'empmiddleware'],function(){
    Route::get('userdashboard',[employeeController::class,'userDashboard'])->name('userdashboard');
 //update routes   
    Route::get('updateEmployee', [employeeController::class,'updateEmployee'])->name('updateEmployee');
    Route::post('edit', [employeeController::class,'edit'])->name('edit');
    Route::post('empUpdateDataSubmit', [employeeController::class,'empUpdateDataStore'])->name('empUpdateDataStore');
  //emp create routes
    Route::get('empCreate', function () {return view('admin.employeecreate');});
    Route::post('empDataSubmit',[employeeController::class,'empDataStore']);
 
    Route::get('empList',[employeeController::class,'empList']);
    Route::get('Users',[employeeController::class,'Users']);
     });
 //search button
Route::post('search',[employeeController::class,'searchEmp']);
Route::post('searchUser',[employeeController::class,'searchUser']);
Route::post('searchnonAdmin',[employeeController::class,'searchnonAdmin']);
  
  Auth::routes();
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');