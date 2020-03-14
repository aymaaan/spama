<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use App\Features;
use App\Units;
use App\Categories;
use App\MotherProducts;
use App\NamesMotherProducts;
use App\Brands;
use App\Supplier;
use App\ProductsSuppliers;
use App\ProductsUnits;
use App\Types;
use App\ProductsComplementary;
use App\Repositories;
use App\ProductsRepositories;
use App\QuantityPrices;
use App\Coupons;
use App\Websites;
use App\ProductsWebsitesFields;
use App\ProductsWebsitesFieldsFiles;
use App\ProductsPhotos;
use Session;
use Gate;
use Auth;


class ProductsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  

  public function get_mother_products_ajax(Request $request , $type)
  {

    
    if ( Gate::denies(['products'])  ) { abort(404); }
    $category = Categories::where('serial' , $type)->first();
    $data = MotherProducts::where('categories_id' , $category->id )->get();
    return view('backend.widgets.mother_products_dropdown' , compact('data'));


  }


public function get_names_products_ajax(Request $request , $type)
  {

    if ( Gate::denies(['products'])  ) { abort(404); }
    $product = MotherProducts::where('id' , $type)->first();
    $data = NamesMotherProducts::where('products_id' , $product->id)->get();
    return view('backend.widgets.names_mother_products_dropdown' , compact('data'));


  }


  public function get_features_products_ajax(Request $request , $type)
  {

    if ( Gate::denies(['products'])  ) { abort(404); }
    
    $data = Features::where('name_id' , $type )->where('parent_id' , 0 )->take(3)->orderby('order_list' , 'asc')->get();
  $last_serial = Products::orderby('id' , 'desc')->first();
  $last_serial  = "01";
    return view('backend.widgets.features_dropdown' , compact('data' , 'last_serial'));
  }


  public function get_product_serial_ajax(Request $request , $sku)
  {

    if ( Gate::denies(['products'])  ) { abort(404); }
    
      $check_sku = Products::where('sku' , $sku )->first();
      $x = 1;

      if ( $check_sku ) {

      while ( $x <= 99) {


      $last_number = substr($sku , -2);
      $last_number = (int)$last_number;
      $serial =  $last_number + 1 ;
      



      if($last_number < 9) {
      $serial =  substr($sku, 0, -1) . $serial;
      }else {
      $serial =  substr($sku, 0, -2) . $serial;
      }


      $check_sku = Products::where('sku' , $serial )->first();
      

      if (!$check_sku) {
        $x = 100;
      } else {
        $sku = $check_sku->sku;
      }



        
      }


    } else {
      $serial = $sku;
    }
    
  return response()->json(['serial'=>  $serial ]);


  }


  public function get_consumer_price_ajax(Request $request , $product_id , $unit_id , $quantity )
  {
    $products_units = \DB::table('products_units')->where('product_id'  , $product_id )->where('unit_id',$unit_id)->first();


    if($products_units) {
      $customer_price = $products_units->customer_price * $quantity;
    
    } else {
      $customer_price = 0;
    }

    if(!$customer_price) {
      $customer_price = 0;
    }

   
   return response()->json(['customer_price'=>  $customer_price ]);


  }

  public function index(Request $request)
  {
    
    if ( Gate::denies(['products'])  ) { abort(404); }
    $total_fast_added = Products::where('sku' , 'FAST_ADDED')->count(); 
    return view('backend.pages.products.index' , compact('total_fast_added'));
  }


   public function create( $lang = null )
  {
 if ( Gate::denies(['products','create_products'])  ) { abort(404); }
  
 $lang = LangUser($lang);

 if($lang == 'ar'){
   $title = 'title';
 }else{
  $title = 'title_'.$lang;
 }

 if ( $title == 'title_') {
  $title = 'title';
 }


  $categories = Categories::where('status' , 1)->pluck( $title , 'serial');
  $types = Types::where('status' , 1)->pluck('title' , 'id');
  $units = Units::where('status' , 1)->pluck('title' , 'id');
  $brands = Brands::where('status' , 1)->select('*',  $title .' as title')->get();
  $websites = Websites::where('status' , 1)->select('*',  $title .' as title')->get();
  $last_serial = "01";
  $suppliers = Supplier::where('status' , 1)->get();
  $all_products = Products::get();
  $repositories = Repositories::where('status' , 1)->pluck('title_ar' , 'id');
  $coupons = Coupons::where('status' , 1)->pluck('title' , 'id');
  $quantity_prices = QuantityPrices::get();
   return view('backend.pages.products.create'  , compact('websites','coupons','quantity_prices','repositories','all_products','units','types','categories','brands','last_serial','suppliers') );
 }


public function store(Request $request)
 {
  if ( Gate::denies(['products','create_products'])  ) { abort(404); }

  $data = new Products;
  $data->title_ar = $request->title_ar;
  $data->title_en = $request->title_en;
  $data->sku = $request->sku;

  $data->title_ar_old = $request->title_ar_old;
  $data->title_en_old = $request->title_en_old;
  $data->sku_old = $request->sku_old;
  if ( $request->photo ) {
    $photo = $request->photo;
    $extension = $photo->getClientOriginalExtension();
    $destinationPath = 'uploads/products_photos/' ;
    $photo_filename = time().".".$extension;
    $photo->move($destinationPath , $photo_filename);
    $data->photo = $photo_filename;
  }

  $data->type_id = $request->type_id;
  $data->category_id = $request->category_id;
  $data->brand_id = $request->brand_id;
  $data->mother_product_id = $request->mother_product_id;
  $data->first_name = $request->first_name;
  $data->feature_1 = $request->feature_1;
  $data->feature_2 = $request->feature_2;
  $data->feature_3 = $request->feature_3;
  $data->last_purchase_price = $request->last_purchase_price;
  $data->average_purchase_price = $request->average_purchase_price;
  $data->value_added = $request->value_added;
  $data->notes = $request->notes;
  $data->description_ar = nl2br($request->description_ar);
  $data->description_en = nl2br($request->description_en);
  $data->expiration_date = $request->expiration_date;
  $data->production_date = $request->production_date;
  $data->loot_number = $request->loot_number;
  $data->product_package_dimensions_x = $request->product_package_dimensions_x;
  $data->product_package_dimensions_y = $request->product_package_dimensions_y;
  $data->product_package_dimensions_z = $request->product_package_dimensions_z;
  $data->sku_supplier = $request->sku_supplier;
  $data->total_quantity = $request->total_quantity;
  $data->minimum_total_quantity = $request->minimum_total_quantity;
  $data->maximum_total_quantity = $request->maximum_total_quantity;
  $data->total_demand_limit = $request->total_demand_limit;
  $data->delivery_period_main_repository = $request->delivery_period_main_repository;
  $data->special_price_realted_by_another_product = $request->special_price_realted_by_another_product;
  $data->cost_price = $request->cost_price;
  $data->price_related_by_quantity = $request->price_related_by_quantity;
  $data->additional_costs_related_by_product = $request->additional_costs_related_by_product;
  $data->shipping_charges = $request->shipping_charges;
  $data->cod_charges = $request->cod_charges;
  

  if( $data->save() ){

//dd($request->product_photos);

    if ( $request->product_photos ) {

      $product_photos = $request->product_photos;

      foreach ($product_photos as $k=>$product_photo) {
    
        $extension = $product_photo->getClientOriginalExtension();
        $destinationPath = 'uploads/products_photos/'.$data->id ;
      if($k != 0) {
        $filename = $data->sku.'_'.$k.".".$extension;
      } else {
        $filename = $data->sku.".".$extension;
      }

        $product_photo->move($destinationPath , $filename);

        list($width, $height) = getimagesize('uploads/products_photos/'.$data->id.'/'.$filename);

            $products_photo = new ProductsPhotos;
            $products_photo->product_id = $data->id;
            $products_photo->photo_name = $filename;
            $products_photo->photo_width = $width;
            $products_photo->photo_height = $height;
            $products_photo->save();
    
    
      }
    
      }




    
    if ( $request->local_suppliers_id ) {

    foreach ($request->local_suppliers_id as $supplier) {

    $suppliers = new ProductsSuppliers;
    $suppliers->product_id = $data->id;
    $suppliers->supplier_id = $supplier;
    $suppliers->type = "local";
    $suppliers->save();

    }

    }


    if ( $request->foreign_suppliers_id ) {
      
    foreach ($request->foreign_suppliers_id as $supplier) {

    $suppliers = new ProductsSuppliers;
    $suppliers->product_id = $data->id;
    $suppliers->supplier_id = $supplier;
    $suppliers->type = "foreign";
    $suppliers->save();

    }

    }

   
    if ( $request->unit_id ) {
      
      foreach ($request->unit_id as $k=>$unit) {
  
      $unit_data = new ProductsUnits;
      $unit_data->product_id = $data->id;
      $unit_data->unit_id = $unit;
      $unit_data->unit_text = $request->unit_text[$k];
      $unit_data->customer_price = $request->customer_price[$k];
      $unit_data->wholesale_price = $request->wholesale_price[$k];
      $unit_data->semi_wholesale_price = $request->semi_wholesale_price[$k];
      $unit_data->ean = $request->ean[$k];
      $unit_data->save();
  
      }
  
      }




      if ( $request->repositories ) {
      
        foreach ($request->repositories as $k=>$repository) {

if( $request->quantity_each_repository[$k] && $request->minimum_quantity_each_repository[$k] ) {
    
        $repository_data = new ProductsRepositories; 
        $repository_data->product_id = $data->id;
        $repository_data->repositories_id = $repository;
        $repository_data->quantity_each_repository = $request->quantity_each_repository[$k];
        $repository_data->minimum_quantity_each_repository = $request->minimum_quantity_each_repository[$k];
        $repository_data->maximum_quantity_each_repository = $request->maximum_quantity_each_repository[$k];
        $repository_data->total_demand_limit_each_repository = $request->total_demand_limit_each_repository[$k];
        $repository_data->delivery_period_each_repository = $request->delivery_period_each_repository[$k];
        $repository_data->product_place_x = $request->product_place_x[$k];
        $repository_data->product_place_y = $request->product_place_y[$k];
        $repository_data->product_place_z = $request->product_place_z[$k];
        $repository_data->save();

      }
    
        }
    
        }




  



      if ( $request->complementary_products ) {
      
        foreach ($request->complementary_products as $complementary_product) {
    
        $complementary = new ProductsComplementary;
        $complementary->product_id = $data->id;
        $complementary->complementary_product_id = $complementary_product;
        $complementary->save();
    
        }
    
        }




        if ( $request->repositories ) {
      
          foreach ($request->repositories as $repository) {
      
          $repositories = new ProductsRepositories;
          $repositories->product_id = $data->id;
          $repositories->repositories_id = $repository;
          $repositories->save();
      
          }
      
          }





//Save Websites Data

$websites = Websites::where('status' , 1)->get();


foreach($websites as $website) {

  foreach($website->fields->where('section' , 'product') as $field) {


    $ProductsWebsitesFields = new ProductsWebsitesFields;

    if( $field->field_type == 'files' || $field->field_type == 'images') {
      $ProductsWebsitesFields->value =  'files';
    } else {
      $ProductsWebsitesFields->value = $request[$field->name];
    }

          
          $ProductsWebsitesFields->product_id = $data->id;
          $ProductsWebsitesFields->field_id = $field->id;
          //$ProductsWebsitesFields->value = $request[$field->name];
          
          $ProductsWebsitesFields->save();



//upload files
if( $field->field_type == 'files' || $field->field_type == 'images' ) {


  if ($request->file($field->name) ) {

  $files= $request->file($field->name);
  foreach ($files as $k=>$file) {

    $extension = $file->getClientOriginalExtension();
    $destinationPath = 'uploads/products_files/'.$field->field_type ;
    $filename = $data->sku.'_'.$k.".".$extension;
    $file->move($destinationPath , $filename);

        $FieldsFiles = new ProductsWebsitesFieldsFiles;
        $FieldsFiles->file_name = $filename;
        $FieldsFiles->field_id = $ProductsWebsitesFields->id;
        $FieldsFiles->save();


  }

  }



          
    } //end upload files

    
  }


}













  }


  Session::flash('msg', ' Done! ' );
  Session::flash('alert', 'success');
  return Redirect(config('settings.BackendPath').'/products');
}













public function edit(  $id ,  $lang = null  )
{
if ( Gate::denies(['products','create_products'])  ) { abort(404); }

$lang = LangUser($lang);

if($lang == 'ar'){
 $title = 'title';
}else{
$title = 'title_'.$lang;
}

if ( $title == 'title_') {
$title = 'title';
}

$data = Products::find($id);
$categories = Categories::where('status' , 1)->pluck( $title , 'serial');
$types = Types::where('status' , 1)->pluck('title' , 'id');
$units = Units::where('status' , 1)->pluck('title' , 'id');
$brands = Brands::where('status' , 1)->select('*',  $title .' as title')->get();
$websites = Websites::where('status' , 1)->select('*',  $title .' as title')->get();
$last_serial = "01";
$suppliers = Supplier::where('status' , 1)->get();
$all_products = Products::get();
$repositories = Repositories::where('status' , 1)->pluck('title_ar' , 'id');
$coupons = Coupons::where('status' , 1)->pluck('title' , 'id');
$quantity_prices = QuantityPrices::get();

$category = Categories::where('serial' , $data->category_id)->first();
if($category) {
$mother_products = MotherProducts::where('categories_id' , $category->id )->get();
} else {
$mother_products = MotherProducts::get();
}
if(isset($data->mother_product_id)) {
$motherproduct = MotherProducts::where('serial' , $data->mother_product_id)->first();
}
if(isset($motherproduct->id)) {
  $first_names = NamesMotherProducts::where('products_id' , $motherproduct->id)->get();
} else {
  $first_names = NamesMotherProducts::get();
}


$units_data_prices = ProductsUnits::where('product_id' , $id)->get() ;
$products_repositories = ProductsRepositories::where('product_id' , $id)->get() ;

 return view('backend.pages.products.edit'  , compact('products_repositories','units_data_prices','first_names','mother_products','data','websites','coupons','quantity_prices','repositories','all_products','units','types','categories','brands','last_serial','suppliers') );
}



public function update(Request $request, $id)
 {

  if ( Gate::denies(['products'])  ) { abort(404); }

  $data = Products::find($id) ;
  $data->title_ar = $request->title_ar;
  $data->title_en = $request->title_en;
  $data->sku = $request->sku;

  if ( $request->photo ) {
      $photo = $request->photo;
      $extension = $photo->getClientOriginalExtension();
      $destinationPath = 'uploads/products_photos/' ;
      $photo_filename = time().".".$extension;
      $photo->move($destinationPath , $photo_filename);
      $data->photo = $photo_filename;
    }

  $data->title_ar_old = $request->title_ar_old;
  $data->title_en_old = $request->title_en_old;
  $data->sku_old = $request->sku_old;
  $data->description_ar = nl2br($request->description_ar);
  $data->description_en = nl2br($request->description_en);
  $data->type_id = $request->type_id;
  $data->category_id = $request->category_id;
  $data->brand_id = $request->brand_id;
  $data->mother_product_id = $request->mother_product_id;
  $data->first_name = $request->first_name;
  $data->feature_1 = $request->feature_1;
  $data->feature_2 = $request->feature_2;
  $data->feature_3 = $request->feature_3;
  $data->last_purchase_price = $request->last_purchase_price;
  $data->average_purchase_price = $request->average_purchase_price;
  $data->value_added = $request->value_added;
  $data->notes = $request->notes;
  $data->expiration_date = $request->expiration_date;
  $data->production_date = $request->production_date;
  $data->loot_number = $request->loot_number;
  $data->product_package_dimensions_x = $request->product_package_dimensions_x;
  $data->product_package_dimensions_y = $request->product_package_dimensions_y;
  $data->product_package_dimensions_z = $request->product_package_dimensions_z;
  $data->sku_supplier = $request->sku_supplier;
  $data->total_quantity = $request->total_quantity;
  $data->minimum_total_quantity = $request->minimum_total_quantity;
  $data->maximum_total_quantity = $request->maximum_total_quantity;
  $data->total_demand_limit = $request->total_demand_limit;
  $data->delivery_period_main_repository = $request->delivery_period_main_repository;
  $data->special_price_realted_by_another_product = $request->special_price_realted_by_another_product;
  $data->cost_price = $request->cost_price;
  $data->price_related_by_quantity = $request->price_related_by_quantity;
  $data->additional_costs_related_by_product = $request->additional_costs_related_by_product;
  $data->shipping_charges = $request->shipping_charges;
  $data->cod_charges = $request->cod_charges;
  
  if( $data->save() ){

    if ( $request->product_photos ) {

      $product_photos = $request->product_photos;

      foreach ($product_photos as $k=>$product_photo) {
    
        $extension = $product_photo->getClientOriginalExtension();
        $destinationPath = 'uploads/products_photos/'.$data->id ;
      if($k != 0) {
        $filename = $data->sku.'_'.$k.".".$extension;
      } else {
        $filename = $data->sku.".".$extension;
      }

        $product_photo->move($destinationPath , $filename);

        list($width, $height) = getimagesize('uploads/products_photos/'.$data->id.'/'.$filename);

            $products_photo = new ProductsPhotos;
            $products_photo->product_id = $data->id;
            $products_photo->photo_name = $filename;
            $products_photo->photo_width = $width;
            $products_photo->photo_height = $height;
            $products_photo->save();

      }
    
      }






    ProductsSuppliers::where('product_id' , $data->id)->delete();
    
    if ( $request->local_suppliers_id ) {

    foreach ($request->local_suppliers_id as $supplier) {

    $suppliers = new ProductsSuppliers;
    $suppliers->product_id = $data->id;
    $suppliers->supplier_id = $supplier;
    $suppliers->type = "local";
    $suppliers->save();

    }

    }


    if ( $request->foreign_suppliers_id ) {
      
    foreach ($request->foreign_suppliers_id as $supplier) {

    $suppliers = new ProductsSuppliers;
    $suppliers->product_id = $data->id;
    $suppliers->supplier_id = $supplier;
    $suppliers->type = "foreign";
    $suppliers->save();

    }

    }


    ProductsUnits::where('product_id' , $data->id)->delete();
   
    if ( $request->unit_id ) {
      
      foreach ($request->unit_id as $k=>$unit) {

      $unit_data = new ProductsUnits;
      $unit_data->product_id = $data->id;
      $unit_data->unit_id = $unit;
      $unit_data->unit_text = $request->unit_text[$k];
      $unit_data->customer_price = $request->customer_price[$k];
      $unit_data->wholesale_price = $request->wholesale_price[$k];
      $unit_data->semi_wholesale_price = $request->semi_wholesale_price[$k];
      $unit_data->ean = $request->ean[$k];
      $unit_data->save();
    
  
      }
  
      }


ProductsRepositories::where('product_id' , $data->id)->delete();

if ( $request->repositories ) {

foreach ($request->repositories as $k=>$repository) {

if(isset($repository) && isset($request->quantity_each_repository[$k]) && isset($request->minimum_quantity_each_repository[$k])  ) {

  $repository_data = new ProductsRepositories;

        $repository_data->product_id = $data->id;
        $repository_data->repositories_id = $repository;
        $repository_data->quantity_each_repository = $request->quantity_each_repository[$k];
        $repository_data->minimum_quantity_each_repository = $request->minimum_quantity_each_repository[$k];
        $repository_data->maximum_quantity_each_repository = $request->maximum_quantity_each_repository[$k];
        $repository_data->total_demand_limit_each_repository = $request->total_demand_limit_each_repository[$k];
        $repository_data->delivery_period_each_repository = $request->delivery_period_each_repository[$k];
        $repository_data->product_place_x = $request->product_place_x[$k];
        $repository_data->product_place_y = $request->product_place_y[$k];
        $repository_data->product_place_z = $request->product_place_z[$k];
        $repository_data->save();
      }
      
      }
      
        }
    
        

        ProductsComplementary::where('product_id' , $data->id)->delete();

      if ( $request->complementary_products ) {
      
        foreach ($request->complementary_products as $complementary_product) {
    
        $complementary = new ProductsComplementary;
        $complementary->product_id = $data->id;
        $complementary->complementary_product_id = $complementary_product;
        $complementary->save();
    
        }
    
        }



//Save Websites Data

ProductsWebsitesFields::where('product_id' , $data->id)->delete();

$websites = Websites::where('status' , 1)->get();

foreach($websites as $website) {

  foreach($website->fields->where('section' , 'product') as $field) {


    $ProductsWebsitesFields = new ProductsWebsitesFields;

    if( $field->field_type == 'files' || $field->field_type == 'images') {
      $ProductsWebsitesFields->value =  'files';
    } else {
      $ProductsWebsitesFields->value = $request[$field->name];
    }

          
          $ProductsWebsitesFields->product_id = $data->id;
          $ProductsWebsitesFields->field_id = $field->id;
          //$ProductsWebsitesFields->value = $request[$field->name];
          
          $ProductsWebsitesFields->save();



//upload files
if( $field->field_type == 'files' || $field->field_type == 'images' ) {


  if ($request->file($field->name) ) {

  $files= $request->file($field->name);
  foreach ($files as $k=>$file) {

    $extension = $file->getClientOriginalExtension();
    $destinationPath = 'uploads/products_files/'.$field->field_type ;
    $filename = $data->sku.'_'.$k.".".$extension;
    $file->move($destinationPath , $filename);

        $FieldsFiles = new ProductsWebsitesFieldsFiles;
        $FieldsFiles->file_name = $filename;
        $FieldsFiles->field_id = $ProductsWebsitesFields->id;
        $FieldsFiles->save();


  }

  }



          
    } //end upload files

    
  }


}


}

  Session::flash('msg', ' Done! ' );
  Session::flash('alert', 'success');
  return Redirect(config('settings.BackendPath').'/products');
}


public function details(Request $request , $id)
{

$product = Products::with('unit_prices')->find($id);
$websites = Websites::where('status' , 1)->get();

return view('backend.pages.products.show'  , compact('product','websites') );

}



  public function all_products(Request $request )
    {
        
        $columns = array( 
                            0 =>'id', 
                            1 =>'title_ar',
                            2=> 'title_en',
                            3=> 'sku',
                            4=>'category_id',
                            5=> 'id',
                        );


         
        
        if ( $_POST['fast_added'] == "FAST_ADDED"  ) {
          $totalData = Products::where('sku' , 'FAST_ADDED')->count(); 
        } else {
          $totalData = Products::count(); 
        }
        
        
        $totalFiltered = $totalData; 
 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');


        
          $posts = Products::query();

      

            
        if(empty($request->input('search.value')))
        {  


          if ( $_POST['fast_added'] == "FAST_ADDED"  ) {

            $posts = $posts->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->where('sku' , 'FAST_ADDED')
            ->get();

          } else {
  
             $posts = $posts->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();

          }

   
        }
        else {


            $search = $request->input('search.value'); 

 
            $posts =  $posts->Where('sku_old', 'LIKE',"%{$search}%")
            ->orWhere('sku', 'LIKE',"%{$search}%")
                            ->orWhere('title_ar', 'LIKE',"%{$search}%")
                            ->orWhere('title_en', 'LIKE',"%{$search}%")
                            ->orWhere('title_ar_old', 'LIKE',"%{$search}%")
                            ->orWhere('title_en_old', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = $posts->count();
            $totalData = $posts->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {


              if ( Gate::allows(['delete_products'])  ) {

                 $delete_button = '<a href='.url(config('settings.BackendPath')).'/products/'.$post->id.'/delete'.' class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>';
               } else {
                $delete_button = "";
               }


               if ( Gate::allows(['delete_products'])  ) {

                $edit_button = '<a href='.url(config('settings.BackendPath')).'/products/'.$post->id.'/edit'.' class="badge badge badge-success float-right"><i class="la la-pencil"></i> </a>';
              } else {
               $edit_button = "";
              }



               if  (isset($post->unit_prices[0])) {
                 $customer_price = $post->unit_prices[0]['customer_price'];
                 $unit_price = $post->unit_prices[0]->unit['title'] .' '. $post->unit_prices[0]['unit_text'];


               } else {
                $customer_price = '';
                $unit_price = '';
               }


               if ( Auth::user()->display_content_ar == 1 ) {
                $title_ar = $post->category['title'] . "<br>" ;
              } else {
                $title_ar  = '' ;
              }


              if ( Auth::user()->display_content_en == 1 ) {
                $title_en = "<div style='text-align:left;'>".$post->category['title_en']."</div>";
              } else {
                $title_en  = '';
              }


              if ( count($post->photos) ) {
                $attachment = "<a class='icon-paper-clip' aria-hidden='true'></a>";
              } else {
                $attachment  = '';
              }

              $category_title = $title_ar . $title_en ;
                $nestedData['id'] = $post->id;



                $nestedData['title_ar'] = $post->title_ar_old;

                if (empty($post->title_ar_old)) { 

                  $nestedData['title_ar'] = $post->title_ar;
                }


                $nestedData['title_en'] = $post->title_en_old;

                if (empty($post->title_en_old)) { 

                  $nestedData['title_en'] = $post->title_en;
                }


                $nestedData['sku'] =  '<a href= '.url(config('settings.BackendPath')).'/product/'.$post->id.' >' .$post->sku_old. '</a>';

                if (empty($post->sku_old)) {
                  $nestedData['sku'] =  '<a href= '.url(config('settings.BackendPath')).'/product/'.$post->id.' >' .$post->sku. '</a>';
                }


                $nestedData['category_id'] = $category_title;
                $nestedData['customer_price'] = $customer_price; 
                $nestedData['unit_price'] = $unit_price; 
                $nestedData['total_quantity'] = $post->total_quantity;
                $nestedData['options'] = "{$attachment} {$delete_button} {$edit_button} ";
                
                                          
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
        
    }

  
  public function destroy($id)
  {

  if ( Gate::denies(['delete_products'])  ) { abort(404); }
    Products::find($id)->delete();
    Session::flash('msg', 'Deleted!' );
    Session::flash('alert', 'success');
    return back();

  }






  
  public function delete_photos($id)
  {

  if ( Gate::denies(['delete_products'])  ) { abort(404); }
    $photo = ProductsPhotos::find($id);
    $file = 'uploads/products_photos/'.$photo->product_id.'/'.$photo->photo_name;

    if (!unlink($file)) { 
      
  } 
  else { 
      
     $photo = ProductsPhotos::find($id)->delete();
    
  } 

  return back();
  }



  public function set_main_photos($id)
  {

  if ( Gate::denies(['delete_products'])  ) { abort(404); }
  $photo = ProductsPhotos::find($id);


  $photo_main = ProductsPhotos::where('product_id' , $photo->product_id )->where('is_main_photo' , 1 )->first();
  if($photo_main) {
  $photo_main->is_main_photo = 0;
  $photo_main->save();
}

  $photo->is_main_photo = 1;
  $photo->save();
   
  return back();


  }


  




}
