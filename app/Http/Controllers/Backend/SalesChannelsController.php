<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SalesChannels;
use App\SalesDelegates;
use Session;
use Gate;


class SalesChannelsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['sales_channels'])  ) { abort(404); }
  
    $data = SalesChannels::get();
  
    return view('backend.pages.sales_channels.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_sales_channels'])  ) { abort(404); }

   return view('backend.pages.sales_channels.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_sales_channels'])  ) { abort(404); }


  $data = new SalesChannels;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->save();

  
  foreach ($request->delegate_names as $key => $name) {
     
    if ($name != '') {
    $delegates = new SalesDelegates; 
    $delegates->name = $name;
    $delegates->phone = $request->delegate_phones[$key];
    $delegates->channel_id = $data->id;
    $delegates->area_covered = $request->area_covered[$key];
    
    $delegates->save();
 
    }
 
     }


    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/sales_channels');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_sales_channels'])  ) { abort(404); }
    $data  = SalesChannels::find($id);

    return view('backend.pages.sales_channels.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_sales_channels'])  ) { abort(404); }


    $data = SalesChannels::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;

  if($data->save()) {

    $delegates = SalesDelegates::where('channel_id' , $data->id )->delete(); 
    foreach ($request->delegate_names as $key => $name) {
      
    if ($name != '') {
    $delegates = new SalesDelegates; 
    $delegates->name = $name;
    $delegates->phone = $request->delegate_phones[$key];
    $delegates->channel_id = $data->id;
    $delegates->area_covered = $request->area_covered[$key];
    $delegates->save();
 
    }
 
     }
 
 
 
   }
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/sales_channels');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_sales_channels'])  ) { abort(404); }
    $data = SalesChannels::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_sales_channels'])  ) { abort(404); }
    
    SalesChannels::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  
  public function delegates_destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_sales_channels'])  ) { abort(404); }
    
    SalesDelegates::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  

}
