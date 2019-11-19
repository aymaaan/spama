<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Nationality;

use Session;
use Gate;


class NationalityController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['nationalities'])  ) { abort(404); }
  
    $data = Nationality::get();
  
    return view('backend.pages.nationalities.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_nationalities'])  ) { abort(404); }

   return view('backend.pages.nationalities.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_nationalities'])  ) { abort(404); }


  $data = new Nationality;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->save();



    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/nationalities');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_nationalities'])  ) { abort(404); }
    $data  = Nationality::find($id);

    return view('backend.pages.nationalities.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_nationalities'])  ) { abort(404); }


    $data = Nationality::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    $data->save();

 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/nationalities');

  }



//  public function approve(Request $request , $id , $status)
//  {
//    if ( Gate::denies(['update_nationalities'])  ) { abort(404); }
//    $data = Nationality::find($id);
//    $data->status = $status;
//    $data->save();
//    Session::flash('msg', ' Done! ' );
//    Session::flash('alert', 'success');
//    return back();
//  }
//

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_nationalities'])  ) { abort(404); }
    
    Nationality::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  

}
