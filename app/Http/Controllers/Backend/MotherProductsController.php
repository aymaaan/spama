<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MotherProducts;
use App\Categories;
use App\Brands;
use Session;
use Gate;


class MotherProductsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  

  public function list(Request $request)
  {
    if ( Gate::denies(['create_mother_products'])  ) { abort(404); }
  
    $data = MotherProducts::paginate(20);
    return view('backend.pages.mother_products.list' , compact('data') );
  }



  public function index(Request $request)
  {
    if ( Gate::denies(['create_mother_products'])  ) { abort(404); }
  
    $category = Categories::find($request->get('cat'));
    $data = MotherProducts::where('categories_id' , $category->id )->paginate(20);
  
    return view('backend.pages.mother_products.index' , compact('data','category') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_mother_products'])  ) { abort(404); }
   $category = Categories::find($request->get('cat'));
   $categories_id = Categories::where('status' , 1 )->pluck('title','id');
   return view('backend.pages.mother_products.create' , compact('category','categories_id') );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_mother_products'])  ) { abort(404); }

  $data = new MotherProducts;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->categories_id =  $request->cat;
  
  $data->serial = generate_serial('mother_products');
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/mother-products?cat='.$request->cat);
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_mother_products'])  ) { abort(404); }
    
    $data  = MotherProducts::find($id);
    $category  = Categories::find($data->categories_id);
    $categories_id = Categories::where('status' , 1 )->pluck('title','id');

    return view('backend.pages.mother_products.edit', compact('data','category','categories_id')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_mother_products'])  ) { abort(404); }


  $data  = MotherProducts::find($id);
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->categories_id =  $request->categories_id;
  
  $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/mother-products?cat='.$data->categories_id);

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_mother_products'])  ) { abort(404); }
    $data = MotherProducts::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_mother_products'])  ) { abort(404); }
    
   MotherProducts::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
