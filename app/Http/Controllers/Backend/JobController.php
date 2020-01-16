<?php

namespace App\Http\Controllers\backend;
use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Session;
use Gate;


class JobController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['jobs'])  ) { abort(404); }
  
    $data = Job::get();
  
    return view('backend.pages.jobs.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_jobs'])  ) { abort(404); }

   return view('backend.pages.jobs.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_jobs'])  ) { abort(404); }


  $data = new Job;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->save();



    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/jobs');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_jobs'])  ) { abort(404); }
    $data  = Job::find($id);

    return view('backend.pages.jobs.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_jobs'])  ) { abort(404); }


    $data = Job::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    $data->save();

 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/jobs');

  }



//  public function approve(Request $request , $id , $status)
//  {
//    if ( Gate::denies(['update_jobs'])  ) { abort(404); }
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
    if ( Gate::denies(['delete_jobs'])  ) { abort(404); }

      Job::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  

}
