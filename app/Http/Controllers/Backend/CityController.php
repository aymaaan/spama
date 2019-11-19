<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;

use Session;
use Gate;


class CityController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['cities'])  ) { abort(404); }
  
    $data = City::get();
  
    return view('backend.pages.cities.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_cities'])  ) { abort(404); }

   return view('backend.pages.cities.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_cities'])  ) { abort(404); }


  $data = new City;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->save();



    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/cities');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_cities'])  ) { abort(404); }
    $data  = City::find($id);

    return view('backend.pages.cities.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_cities'])  ) { abort(404); }


    $data = City::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    $data->save();

 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/cities');

  }



//  public function approve(Request $request , $id , $status)
//  {
//    if ( Gate::denies(['update_cities'])  ) { abort(404); }
//    $data = City::find($id);
//    $data->status = $status;
//    $data->save();
//    Session::flash('msg', ' Done! ' );
//    Session::flash('alert', 'success');
//    return back();
//  }
//

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_cities'])  ) { abort(404); }
    
    City::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  

}
