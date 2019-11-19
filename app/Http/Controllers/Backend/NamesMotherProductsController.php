<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MotherProducts;
use App\NamesMotherProducts;
use App\Brands;
use Session;
use Gate;


class NamesMotherProductsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['names_products'])  ) { abort(404); }
  
    $category = MotherProducts::find($request->get('cat'));
    $data = NamesMotherProducts::where('products_id' , $category->id )->get();
    return view('backend.pages.names_products.index' , compact('data','category') );
  }


  public function create(Request $request)
  {
   if ( Gate::denies(['create_names_products'])  ) { abort(404); }
   $category = MotherProducts::find($request->get('cat'));
   
   return view('backend.pages.names_products.create' , compact('category') );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_names_products'])  ) { abort(404); }



  $data = new NamesMotherProducts;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->products_id =  $request->cat;
  $data->serial = generate_product_serial('names_mother_products' , $request->cat );
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/names-products?cat='.$request->cat);
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_names_products'])  ) { abort(404); }
    
    $data  = NamesMotherProducts::find($id);
    $category  = MotherProducts::find($data->categories_id);
    

    return view('backend.pages.names_products.edit', compact('data','category')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_names_products'])  ) { abort(404); }


  $data  = NamesMotherProducts::find($id);
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/names-products?cat='.$data->products_id);

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_names_products'])  ) { abort(404); }
    $data = NamesMotherProducts::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_names_products'])  ) { abort(404); }
    
   NamesMotherProducts::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
}
