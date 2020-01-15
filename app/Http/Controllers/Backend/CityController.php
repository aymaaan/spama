<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Nationality;
use Session;
use Gate;


class CityController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

 
  public function get_cities_ajax(Request $request , $country)
  {
    if ( Gate::denies(['cities'])  ) { abort(404); }
    $cities = City::where('parent_id' , $country )->pluck('title','id');
    return view('backend.widgets.cities_dropdown' , compact('cities'));
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['cities'])  ) { abort(404); }
  
    if( $request->get('id') ) {
    $data = City::where('parent_id', $request->get('id'))->get();
  } else {
    $data = City::get();
  }
  
    return view('backend.pages.cities.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_cities'])  ) { abort(404); }
   $countries = Nationality::pluck('country_name_ar','id');
   return view('backend.pages.cities.create' , compact('countries') );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_cities'])  ) { abort(404); }


  $data = new City;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->parent_id =  $request->parent_id;
  $data->save();



    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/cities?id=' . $data->parent_id );
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_cities'])  ) { abort(404); }
    $data  = City::find($id);
    $countries = Nationality::pluck('country_name_ar','id');
    return view('backend.pages.cities.edit', compact('data','countries')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_cities'])  ) { abort(404); }


    $data = City::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    $data->parent_id =  $request->parent_id;
    $data->save();

 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/cities?id=' . $data->parent_id);

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
