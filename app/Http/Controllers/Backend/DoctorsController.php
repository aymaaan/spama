<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctors;
use Session;
use Gate;


class DoctorsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['doctors'])  ) { abort(404); }
  
    $data = Doctors::get();
  
    return view('backend.pages.doctors.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_doctors'])  ) { abort(404); }

   return view('backend.pages.doctors.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_doctors'])  ) { abort(404); }


  $data = new Doctors;
  $data->name =  $request->name;
  $data->phone =  $request->phone;
  $data->email =  $request->email;
  $data->job =  $request->job;
  $data->address =  $request->address;
  
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/doctors');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_doctors'])  ) { abort(404); }
    $data  = Doctors::find($id);

    return view('backend.pages.doctors.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_doctors'])  ) { abort(404); }


    $data = Doctors::find($id);
    $data->name =  $request->name;
    $data->phone =  $request->phone;
    $data->email =  $request->email;
    $data->job =  $request->job;
    $data->address =  $request->address;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/doctors');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_doctors'])  ) { abort(404); }
    $data = Doctors::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_doctors'])  ) { abort(404); }
    
    Doctors::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
