<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NamesMotherProducts;
use App\Features;
use Session;
use Gate;


class FeaturesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['features_products'])  ) { abort(404); }
  
    $category = NamesMotherProducts::find($request->get('cat'));
    $data = Features::where('parent_id' , 0 )->where('name_id' , $category->id )->get();
  
    return view('backend.pages.features_products.index' , compact('data','category') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_features_products'])  ) { abort(404); }
   $category = NamesMotherProducts::find($request->get('cat'));
   return view('backend.pages.features_products.create' , compact('category') );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_features_products'])  ) { abort(404); }

  $data = new Features;
  $data->title =  $request->title;
  $data->name_id = $request->cat;
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/features-products?cat='.$request->cat);
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_features_products'])  ) { abort(404); }
    
    $data  = Features::find($id);
    $category  = NamesMotherProducts::find($data->name_id);
 
    return view('backend.pages.features_products.edit', compact('data','category')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_features_products'])  ) { abort(404); }


  $data  = Features::find($id);
  $data->title =  $request->title;
  $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/features-products?cat='.$data->name_id);

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_features_products'])  ) { abort(404); }
    $data = Features::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_features_products'])  ) { abort(404); }
    
   Features::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  public function order_list(Request $request , $id , $order_list)
  {
      
    
    if ( Gate::denies(['update_features_products'])  ) { abort(404); }
    $data = Features::find($id);
    if($order_list < 10) {
        $data->order_list = '0'.$order_list;
    } else {
        $data->order_list = $order_list;
    }
    
    
    
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  
  

}
