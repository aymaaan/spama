<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AgeCtegories;
use Session;
use Gate;

class AgeCategoriesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['age_categories'])  ) { abort(404); }
  
    $data = AgeCtegories::get();
  
    return view('backend.pages.age_categories.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_age_categories'])  ) { abort(404); }

   return view('backend.pages.age_categories.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_age_categories'])  ) { abort(404); }


  $data = new AgeCtegories;
  $data->title =  $request->title;
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/age_categories');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_age_categories'])  ) { abort(404); }
    $data  = AgeCtegories::find($id);

    return view('backend.pages.age_categories.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_age_categories'])  ) { abort(404); }


    $data = AgeCtegories::find($id);
    $data->title =  $request->title;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/age_categories');

  }


  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_age_categories'])  ) { abort(404); }
    
    AgeCtegories::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
