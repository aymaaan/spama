<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupons;
use App\Products;
use App\ProductsCoupons;
use Session;
use Gate;
use File;


class CouponsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['coupons'])  ) { abort(404); }
  
    $data = Coupons::groupBy('title')->paginate(20);
  
    return view('backend.pages.coupons.index' , compact('data') );
  }


  

  public function print(Request $request , $title)
  {
    if ( Gate::denies(['coupons'])  ) { abort(404); }
    $coupoun_name = str_replace('-', ' ', $title);
    $data = Coupons::where('title' , $coupoun_name )->get();

   
    return view('backend.pages.coupons.coupons_print_list' , compact('coupoun_name' ,'data') );
  }



  public function list(Request $request , $title)
  {
    if ( Gate::denies(['coupons'])  ) { abort(404); }
    $coupoun_name = str_replace('-', ' ', $title);
    $data = Coupons::where('title' , $coupoun_name )->paginate(200);

   
    return view('backend.pages.coupons.coupons_list' , compact('coupoun_name' ,'data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_coupons'])  ) { abort(404); }
   $all_products = Products::get();
   $coupoun = coupoun();
   return view('backend.pages.coupons.create' , compact('coupoun','all_products') );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_coupons'])  ) { abort(404); }

$i = 1;

while ( $i <= $request->numbers_of_coupons ) {

  $data = new Coupons;
  $data->title =  $request->title;
  if($request->numbers_of_coupons == 1) {
  $data->code =  $request->code;
} else {
  $data->code = coupoun();
}
  $data->amount =  $request->amount;
  $data->type =  $request->type;
  $data->start_date =  $request->start_date;
  $data->end_date =  $request->end_date;
  $data->qr_width =  $request->qr_width;
  
  $data->discount =  $request->discount;
  $data->uses_per_coupon =  $request->uses_per_coupon;
  $data->uses_per_customer =  $request->uses_per_customer;
  

  
  $data->all_products =  $request->checked_all_products ? : '0';
  $data->save();

  $path = 'uploads/qrcodes/'.$data->title;
  File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

// Create image for this QR
\QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
->format('png')->size($data->qr_width)
->generate($data->code, ('uploads/qrcodes/'.$data->title.'/'.$data->code.'.png'));


  if ( $request->checked_all_products != 1 && $request->products ) {
      
    foreach ($request->products as $k=>$product) {

    $product_data = new ProductsCoupons;
    $product_data->coupon_id = $data->id;
    $product_data->product_id = $product;
    $product_data->save();

    }

    }

$i++;
  }




    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/coupons');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_coupons'])  ) { abort(404); }
    $data  = Coupons::find($id);
    $coupoun = coupoun();
    $all_products = Products::get();
    return view('backend.pages.coupons.edit', compact('coupoun','all_products','data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_coupons'])  ) { abort(404); }


  $data = Coupons::find($id);
  $data->title =  $request->title;
  $data->code =  $request->code;
  $data->amount =  $request->amount;
  $data->type =  $request->type;
  $data->discount =  $request->discount;
  $data->uses_per_coupon =  $request->uses_per_coupon;
  $data->uses_per_customer =  $request->uses_per_customer;
  $data->start_date =  $request->start_date;
  $data->end_date =  $request->end_date;
  $data->qr_width =  $request->qr_width;
  $data->all_products =  $request->checked_all_products ? : '0';
  $data->save();

  $path = 'uploads/qrcodes/'.$data->title;
  File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

// Create image for this QR
\QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
->format('png')->size($data->qr_width)
->generate($data->code, ('uploads/qrcodes/'.$data->title.'/'.$data->code.'.png'));


  if ( $request->checked_all_products != 1 && $request->products ) {
      
    foreach ($request->products as $k=>$product) {

    $product_data = new ProductsCoupons;
    $product_data->coupon_id = $data->id;
    $product_data->product_id = $product;
    $product_data->save();

    }

    }

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/coupons');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_coupons'])  ) { abort(404); }
    $data = Coupons::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_coupons'])  ) { abort(404); }
    
    Coupons::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
