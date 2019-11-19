<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Types;
use Session;
use Gate;


class TypesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['types'])  ) { abort(404); }
  
    $data = Types::get();
  
    return view('backend.pages.types.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_types'])  ) { abort(404); }

   return view('backend.pages.types.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_types'])  ) { abort(404); }


  $data = new Types;
  $data->title =  $request->title;
  $data->serial = generate_serial('types');
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/types');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_types'])  ) { abort(404); }
    $data  = Types::find($id);

    return view('backend.pages.types.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_types'])  ) { abort(404); }


    $data = Types::find($id);
    $data->title =  $request->title;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/types');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_types'])  ) { abort(404); }
    $data = Types::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_types'])  ) { abort(404); }
    
    Types::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
