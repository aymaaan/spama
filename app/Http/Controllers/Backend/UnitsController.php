<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Units;
use Session;
use Gate;


class UnitsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['units'])  ) { abort(404); }
  
    $data = Units::get();
  
    return view('backend.pages.units.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_units'])  ) { abort(404); }

   return view('backend.pages.units.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_units'])  ) { abort(404); }


  $data = new Units;
  $data->title =  $request->title;
  $data->serial = generate_serial('units');
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/units');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_units'])  ) { abort(404); }
    $data  = Units::find($id);

    return view('backend.pages.units.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_units'])  ) { abort(404); }


    $data = Units::find($id);
    $data->title =  $request->title;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/units');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_units'])  ) { abort(404); }
    $data = Units::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_units'])  ) { abort(404); }
    
    Units::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
