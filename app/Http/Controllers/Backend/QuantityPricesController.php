<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QuantityPrices;
use Session;
use Gate;


class QuantityPricesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['types'])  ) { abort(404); }
  
    $data = QuantityPrices::get();
  
    return view('backend.pages.quantity_prices.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_types'])  ) { abort(404); }

   return view('backend.pages.quantity_prices.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_types'])  ) { abort(404); }


  $data = new QuantityPrices;
  $data->quantity =  $request->quantity;
  $data->price =  $request->price;
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/quantity_prices');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_types'])  ) { abort(404); }
    $data  = QuantityPrices::find($id);

    return view('backend.pages.quantity_prices.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_types'])  ) { abort(404); }


    $data = QuantityPrices::find($id);
    $data->quantity =  $request->quantity;
    $data->price =  $request->price;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/quantity_prices');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_types'])  ) { abort(404); }
    $data = QuantityPrices::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_types'])  ) { abort(404); }
    
    QuantityPrices::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
