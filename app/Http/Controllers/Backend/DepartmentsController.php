<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use App\User;
use Session;
use Gate;


class DepartmentsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['departments'])  ) { abort(404); }
  
    $data = Department::get();
  
    return view('backend.pages.departments.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_departments'])  ) { abort(404); }

   $sections = Department::pluck('title' , 'id');
   $managers = User::pluck('name' , 'id');

   return view('backend.pages.departments.create' , compact('sections','managers') );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_departments'])  ) { abort(404); }


  $data = new Department;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->parent_id =  $request->parent_id ? : 0;
  $data->direct_manager =  $request->direct_manager;
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/departments');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_departments'])  ) { abort(404); }
    $data  = Department::find($id);
    $sections = Department::pluck('title' , 'id');
    $managers = User::pluck('name' , 'id');
    return view('backend.pages.departments.edit', compact('data','sections','managers')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_departments'])  ) { abort(404); }

    $data = Department::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    $data->parent_id =  $request->parent_id ? : 0;
    $data->direct_manager =  $request->direct_manager;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/departments');

  }

  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_departments'])  ) { abort(404); }
    $data = Department::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_departments'])  ) { abort(404); }
    
    Department::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
