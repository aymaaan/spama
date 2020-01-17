<?php

namespace App\Http\Controllers\backend;
use App\CustodyTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Gate;


class CustodyTypesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['custody_types'])  ) { abort(404); }
  
    $data = CustodyTypes::get();
  
    return view('backend.pages.custody_types.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_custody_types'])  ) { abort(404); }

   return view('backend.pages.custody_types.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_custody_types'])  ) { abort(404); }


  $data = new CustodyTypes;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->save();



    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/custody_types');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_custody_types'])  ) { abort(404); }
    $data  = CustodyTypes::find($id);

    return view('backend.pages.custody_types.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_custody_types'])  ) { abort(404); }


    $data = CustodyTypes::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    $data->save();

 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/custody_types');

  }


  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_custody_types'])  ) { abort(404); }

    CustodyTypes::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  

}
