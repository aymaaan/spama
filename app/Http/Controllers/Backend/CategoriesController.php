<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\CategoriesWebsitesFieldsFiles;
use App\CategoriesWebsitesFields;
use App\Websites;
use App\CategoriesPhotos;
use Session;
use Gate;


class CategoriesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['categories'])  ) { abort(404); }
  
    $data = Categories::orderby('serial' , 'asc')->paginate(15);
    $websites = Websites::where('status' , 1)->get();
    return view('backend.pages.categories.index' , compact('data','websites') );
  }



  public function create(Request $request , $lang = null)
  {
   if ( Gate::denies(['create_categories'])  ) { abort(404); }

   $lang = LangUser($lang);
   $cat_id = null;
 if($lang == 'ar'){
   $title = 'title';
 }else{
  $title = 'title_'.$lang;
 }

 if ( $title == 'title_') {
  $title = 'title';
 }


   $websites = Websites::where('status' , 1)->select('*',  $title .' as title')->get();
   return view('backend.pages.categories.create' , compact('websites' , 'cat_id') );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_categories'])  ) { abort(404); }

  $data = new Categories;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->serial = generate_2digits_serial('categories');
  $data->save();


  if ( $request->product_photos ) {

    $product_photos = $request->product_photos;

    foreach ($product_photos as $k=>$product_photo) {
  
      $extension = $product_photo->getClientOriginalExtension();
      $destinationPath = 'uploads/categories_photos/'.$data->id ;
    if($k != 0) {
      $filename = $data->serial.'_'.$k.".".$extension;
    } else {
      $filename = $data->serial.".".$extension;
    }

      $product_photo->move($destinationPath , $filename);

      list($width, $height) = getimagesize('uploads/categories_photos/'.$data->id.'/'.$filename);

          $products_photo = new CategoriesPhotos;
          $products_photo->product_id = $data->id;
          $products_photo->photo_name = $filename;
          $products_photo->photo_width = $width;
          $products_photo->photo_height = $height;
          $products_photo->save();

    }
  
    }

    
//Save Websites Data
$websites = Websites::where('status' , 1)->get();

foreach($websites as $website) {

  foreach($website->fields->where('section' , 'categories') as $field) {


    $ProductsWebsitesFields = new CategoriesWebsitesFields;

    if( $field->field_type == 'files' || $field->field_type == 'images') {
      $ProductsWebsitesFields->value =  'files';
    } else {
      $ProductsWebsitesFields->value = $request[$field->name];
    }

          
          $ProductsWebsitesFields->product_id = $data->id;
          $ProductsWebsitesFields->field_id = $field->id;
          $ProductsWebsitesFields->save();
     

//upload files
if( $field->field_type == 'files' || $field->field_type == 'images' ) {


  if ($request->file($field->name) ) {

  $files= $request->file($field->name);
  foreach ($files as $k=>$file) {

    $extension = $file->getClientOriginalExtension();
    $destinationPath = 'uploads/categories_files/'.$field->field_type ;
    $filename = $data->sku.'_'.$k.".".$extension;
    $file->move($destinationPath , $filename);

        $FieldsFiles = new CategoriesWebsitesFieldsFiles;
        $FieldsFiles->file_name = $filename;
        $FieldsFiles->field_id = $ProductsWebsitesFields->id;
        $FieldsFiles->save();


  }

  }



          
    } //end upload files

    
  }


}



    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/categories');
  }



  public function edit(Request $request , $id , $lang = null)
  {
    if ( Gate::denies(['update_categories'])  ) { abort(404); }


    $lang = LangUser($lang);

 if($lang == 'ar'){
   $title = 'title';
 }else{
  $title = 'title_'.$lang;
 }

 if ( $title == 'title_') {
  $title = 'title';
 }


    $data  = Categories::find($id);
    $cat_id = $id;
    $websites = Websites::where('status' , 1)->select('*',  $title .' as title')->get();
    
    return view('backend.pages.categories.edit', compact('data','websites' , 'cat_id')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_categories'])  ) { abort(404); }

    $data = Categories::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    $data->save();



    
  if ( $request->product_photos ) {

    $product_photos = $request->product_photos;

    foreach ($product_photos as $k=>$product_photo) {
  
      $extension = $product_photo->getClientOriginalExtension();
      $destinationPath = 'uploads/categories_photos/'.$data->id ;
    if($k != 0) {
      $filename = $data->serial.'_'.$k.".".$extension;
    } else {
      $filename = $data->serial.".".$extension;
    }

      $product_photo->move($destinationPath , $filename);

      list($width, $height) = getimagesize('uploads/categories_photos/'.$data->id.'/'.$filename);

          $products_photo = new CategoriesPhotos;
          $products_photo->product_id = $data->id;
          $products_photo->photo_name = $filename;
          $products_photo->photo_width = $width;
          $products_photo->photo_height = $height;
          $products_photo->save();

    }
  
    }

//Save Websites Data
$websites = Websites::where('status' , 1)->get();

foreach($websites as $website) {

  foreach($website->fields->where('section' , 'categories') as $field) {

    $ProductsWebsitesFields =  CategoriesWebsitesFields::where('field_id',$field->id)
    ->where('product_id',$id)->first();

    if ( !$ProductsWebsitesFields ) {
      $ProductsWebsitesFields =  new CategoriesWebsitesFields;
    }

    if( $field->field_type == 'files' || $field->field_type == 'images') {
      $ProductsWebsitesFields->value =  'files';
    } else {
      $ProductsWebsitesFields->value = $request[$field->name];
    }

          
          $ProductsWebsitesFields->product_id = $data->id;
          $ProductsWebsitesFields->field_id = $field->id;
          $ProductsWebsitesFields->save();
     

//upload files
if( $field->field_type == 'files' || $field->field_type == 'images' ) {


  if ($request->file($field->name) ) {

  $files= $request->file($field->name);
  foreach ($files as $k=>$file) {

    $extension = $file->getClientOriginalExtension();
    $destinationPath = 'uploads/categories_files/'.$field->field_type ;
    $filename = $data->sku.'_'.$k.".".$extension;
    $file->move($destinationPath , $filename);

        $FieldsFiles = new CategoriesWebsitesFieldsFiles;
        $FieldsFiles->file_name = $filename;
        $FieldsFiles->field_id = $ProductsWebsitesFields->id;
        $FieldsFiles->save();


  }

  }



          
    } //end upload files

    
  }


}


 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/categories');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_categories'])  ) { abort(404); }
    $data = Categories::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_categories'])  ) { abort(404); }
    
   Categories::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  

  
  public function delete_photos($id)
  {

  if ( Gate::denies(['delete_products'])  ) { abort(404); }
    $photo = CategoriesPhotos::find($id);
    $file = 'uploads/categories_photos/'.$photo->product_id.'/'.$photo->photo_name;

    if (!unlink($file)) { 
      echo ("cannot be deleted due to an error"); 
  } 
  else { 
      echo ("Photo has been deleted"); 
     $photo = CategoriesPhotos::find($id)->delete();
    
  } 


  }
  
  

}
