<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\VerifyUser;
use App\Mail\VerifyMail;
use Auth;
use Session;
use Hash;
use Gate;
use Cache;

define('DESTINATION_UPLOAD_USERS_PHOTOS', 'assets/uploads/users/');


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



  
  
  
  public function create()
  {
   if ( Gate::denies(['users','create_users'])  ) { abort(404); }
   $roles = Role::get();
   
   return view('backend.pages.settings.users.create' , compact('roles'));
 }


 public function store(UserRequest $request)
 {
  if ( Gate::denies(['users','create_users'])  ) { abort(404); }
  
  $check_user = User::where('email' , $request->email )->first();
  
  if( $check_user && $check_user->role == 'admin') {
      
  Session::flash('msg', ' هذا البريد الالكتروني مسجل من قبل لادمن  اخر ' );
  Session::flash('alert', 'danger');
  return back();
  
  }
  
  $user = new User;
  $user-> name = $request->name;
  $user-> email = $request->email;
  $user-> phone = $request->phone;
  $user-> password = Hash::make($request->password);
  $user-> role = 'admin';
  $user-> save();


  foreach ($request->role_id as $new_role) {
    $role = Role::findOrFail($new_role);
    $user->assign($role);
  }


  Session::flash('msg', ' Done! ' );
  Session::flash('alert', 'success');
  return Redirect(config('settings.BackendPath').'/users');
}



public function edit($id)
{
  if ( Gate::denies(['users','update_users'])  ) { abort(404); }
  $user = User::find($id);

  $roles = Role::get();
   

  return view('backend.pages.settings.users.edit', compact('nationalities','workplaces','roles','user')  );
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