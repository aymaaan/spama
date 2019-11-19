<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomersCases;

use Session;
use Gate;


class CustomersCasesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['customers_cases'])  ) { abort(404); }
  
    $data = CustomersCases::get();
  
    return view('backend.pages.customers_cases.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_customers_cases'])  ) { abort(404); }

   return view('backend.pages.customers_cases.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_customers_cases'])  ) { abort(404); }


  $data = new CustomersCases;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->save();



    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/customers_cases');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_customers_cases'])  ) { abort(404); }
    $data  = CustomersCases::find($id);

    return view('backend.pages.customers_cases.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_customers_cases'])  ) { abort(404); }


    $data = CustomersCases::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    $data->save();

 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/customers_cases');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_customers_cases'])  ) { abort(404); }
    $data = CustomersCases::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_customers_cases'])  ) { abort(404); }
    
    CustomersCases::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  

}
