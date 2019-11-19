<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CommercialActivities;
use Session;
use Gate;


class CommercialActivitiesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['commercial_activities'])  ) { abort(404); }
  
    $data = CommercialActivities::get();
  
    return view('backend.pages.commercial_activities.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_commercial_activities'])  ) { abort(404); }

   return view('backend.pages.commercial_activities.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_commercial_activities'])  ) { abort(404); }


  $data = new CommercialActivities;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/commercial_activities');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_commercial_activities'])  ) { abort(404); }
    $data  = CommercialActivities::find($id);

    return view('backend.pages.commercial_activities.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_commercial_activities'])  ) { abort(404); }


    $data = CommercialActivities::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/commercial_activities');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_commercial_activities'])  ) { abort(404); }
    $data = CommercialActivities::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_commercial_activities'])  ) { abort(404); }
    
    CommercialActivities::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
