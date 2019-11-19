<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Diseases;
use Session;
use Gate;

class DiseasesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['diseases'])  ) { abort(404); }
  
    $data = Diseases::get();
  
    return view('backend.pages.diseases.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_diseases'])  ) { abort(404); }

   return view('backend.pages.diseases.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_diseases'])  ) { abort(404); }


  $data = new Diseases;
  $data->title =  $request->title;
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/diseases');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_diseases'])  ) { abort(404); }
    $data  = Diseases::find($id);

    return view('backend.pages.diseases.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['diseases'])  ) { abort(404); }


    $data = Diseases::find($id);
    $data->title =  $request->title;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/diseases');

  }


  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_diseases'])  ) { abort(404); }
    
    Diseases::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
