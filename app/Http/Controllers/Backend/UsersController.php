<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\VerifyUser;
use App\Nationality;
use App\Employee;
use App\Department;
use App\EmployeesClosePersons;
use App\EmployeesFiles;
use App\Mail\VerifyMail;
use Auth;
use Session;
use \Carbon\Carbon;
use Hash;
use Gate;
use Cache;


class UsersController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

  }


  public function update_settings(Request $request)
  {
  
   $user = User::find(Auth::user()->id);
   $user->display_content_ar = $request->display_content_ar ;
   $user->display_content_en = $request->display_content_en ;
   $user->save();
   return back();
   
   }


  public function index(Request $request)
  {
    if ( Gate::denies(['users'])  ) { abort(404); }
    $users = User::orderby('id','desc')->where('role' , 'admin')->paginate(30);
    return view('backend.pages.settings.users.index' , compact('users') );
  }



  public function details($id)
  {
    if ( Gate::denies(['users'])  ) { abort(404); }
    $user = User::find($id);
    return view('backend.pages.settings.users.details' , compact('user') );
  }

  
  
  
  public function create()
  {
  
   if ( Gate::denies(['users','create_users'])  ) { abort(404); }
   $roles = Role::get();
   $nationaliies = Nationality::pluck('title' , 'id');
   $departments = Department::pluck('title' , 'id');
   $managers = User::pluck('name' , 'id');
   return view('backend.pages.settings.users.create' , compact('roles','nationaliies','managers','departments'));
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['users','create_users'])  ) { abort(404); }
  
  $check_user = User::where('email' , $request->email )->first();
  
  if( $check_user && $check_user->role == 'admin') {
      
  Session::flash('msg', 'هذا البريد الالكتروني مسجل من قبل' );
  Session::flash('alert', 'danger');
  return back();
  
  }


  //Save New User
  $user = new User;
  $user->name = $request->name;
  $user->email = $request->email;
  $user->phone = $request->phone;
  $user->password = Hash::make($request->password);
  if($request->role_id) {
    $user->role = 'admin';
  } else {
    $user->role = 'employee';
  }
  
  $user-> save();
  //ENd Save New User


  //Save ROles
 if($request->role_id) {
 foreach ($request->role_id as $new_role) {
    $role = Role::findOrFail($new_role);
    $user->assign($role);
  }
}
  //End Save ROles

  $LastEmployeeNumber = User::whereMonth('created_at', Carbon::now()->month)->latest()
  ->whereYear('created_at', Carbon::now()->year)
  ->count();

  $LastEmployeeNumber = date('ym').sprintf("%02d", $LastEmployeeNumber) ;
  
   //Save Personal informations

  $data = new Employee;

  if ($request->file('personal_photo') ) {
    
    $personal_photo= $request->file('personal_photo');
    $extension = $personal_photo->getClientOriginalExtension();
    $destinationPath = "uploads/employees/files/". $LastEmployeeNumber;
    $filename = "personal_photo.".$extension;
    $personal_photo->move($destinationPath , $filename);
    $data->photo = $filename;
    
  }
  
  $data->employee_id = $user->id;
  $data->serial = $LastEmployeeNumber;
  $data->first_name = $request->name;
  $data->last_name = $request->last_name;
  $data->father_name = $request->father_name;
  $data->name_english = $request->name_english;
  $data->education = $request->education;
  $data->gender = $request->gender;
  $data->social_status = $request->social_status;
  $data->number_childrens = $request->number_childrens;
  $data->number_escorts = $request->number_escorts;
  $data->nationality = $request->nationality;
  $data->mobile = $request->phone;
  $data->mobile_work = $request->mobile_work;
  $data->shunt_work = $request->shunt_work;
  $data->personal_email = $request->personal_email;
  $data->work_email = $request->work_email;
  $data->birth_date = $request->birth_date;
  $data->birth_place = $request->birth_place;
  $data->national_address = $request->national_address;
  $data->identification_number = $request->identification_number;
  $data->identification_expiry = $request->identification_expiry;
  $data->passport_number = $request->passport_number;
  $data->passport_expiry = $request->passport_expiry;
  $data->private_situation = $request->private_situation;
  $data->work_place = $request->work_place;
  $data->work_start_at = $request->work_start_at;
  $data->job = $request->job;
  $data->job_type = $request->job_type;
  $data->work_days = json_encode($request->work_days);
  $data->work_times = json_encode( 
    array( 'from_1'=>$request->work_time_from_1 , 'to_1'=>$request->work_time_to_1 , 'from_2'=>$request->work_time_from_2 , 'to_2'=>$request->work_time_to_2 )
  );
  $data->department_id = $request->department_id;
  $data->manager_id = $request->manager_id;
  $data->total_salary = $request->total_salary;
  $data->basic_salary = $request->basic_salary;
  $data->housing_allowance = $request->housing_allowance;
  $data->transportation_allowance = $request->transportation_allowance;
  $data->other_allowance = $request->other_allowance;
  $data-> save();

  //ENd Save Personal informations



  //Save close persons

if( $request->close_names ) {
foreach( $request->close_names  as $k=>$name) {
  $close_data = new EmployeesClosePersons;
  $close_data->employee_id = $user->id;
  $close_data->name = $name;
  $close_data->mobile = $request->close_phones[$k];
  $close_data->save();
}
}

 //ENd close persons

//Save Files

 if( $request->personal_files ) {
  foreach( $request->personal_files  as $k=>$file) {

    $files_data = new EmployeesFiles;
    $extension = $file->getClientOriginalExtension();
    $destinationPath = 'uploads/employees/files/'.$LastEmployeeNumber ;
    $filename = $k."_".date('Y')."_".date('m')."_".date('d'). ".".$extension;
    $file->move($destinationPath , $filename);

    $files_data->employee_id = $user->id;
    $files_data->file_title = $request->file_name[$k];
    $files_data->file_name = $filename;
    $files_data->save();
  }
  }
  

 //ENd Files

  Session::flash('msg', ' Done! ' );
  Session::flash('alert', 'success');
  return Redirect(config('settings.BackendPath').'/users');





}



public function edit($id)
{
  if ( Gate::denies(['users','update_users'])  ) { abort(404); }
  $user = User::find($id);
  $roles = Role::get();
  $nationaliies = Nationality::pluck('title' , 'id');
  $departments = Department::pluck('title' , 'id');
  $managers = User::pluck('name' , 'id');
  return view('backend.pages.settings.users.edit', compact('nationaliies','managers','roles','user','departments')  );
}



public function update(UserRequest $request, $id)
{
  if ( Gate::denies(['users','update_users'])  ) { abort(404); }
  $user= User::find($id);
  $user-> name = $request->name;
  $user-> email = $request->email;
  $user-> phone = $request->phone;
  $user-> role = 'admin';
  
 

  $user->save();


if($request->role_id){
  $user->roles()->detach();
  foreach ($request->role_id as $new_role) {
    $role = Role::findOrFail($new_role);
    $user->assign($role);
  }
}

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/users');

  }




  public function block($id , $action)
{

  if ( Gate::denies(['users','block_user'])  ) { abort(404); }
  $user= User::find($id);
  $user->status = $action;
  $user->save();

  Session::flash('msg', ' Done! ');
  Session::flash('alert', 'success');
  return redirect()->back();

}



   public function destroy($id)
  {

    if ( Gate::denies(['delete_users'])  ) { abort(404); }
    
    
    $user = User::find($id);
    $user->delete();
    Session::flash('msg', 'Done!' );
    Session::flash('alert', 'success');
    return back();

  }




}