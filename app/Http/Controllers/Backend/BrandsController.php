<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brands;
use Session;
use Gate;


class BrandsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['brands'])  ) { abort(404); }
  
    $data = Brands::get();
  
    return view('backend.pages.brands.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_brands'])  ) { abort(404); }

   return view('backend.pages.brands.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_brands'])  ) { abort(404); }


  $data = new Brands;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->serial = generate_serial('brands');
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/brands');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_brands'])  ) { abort(404); }
    $data  = Brands::find($id);

    return view('backend.pages.brands.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_brands'])  ) { abort(404); }


    $data = Brands::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/brands');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_brands'])  ) { abort(404); }
    $data = Brands::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_brands'])  ) { abort(404); }
    
    Brands::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
