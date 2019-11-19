<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Websites;
use App\WebsitesFields;
use App\ProductsWebsitesFields;
use App\CategoriesWebsitesFields;
use App\CategoriesWebsitesFieldsFiles;
use Session;
use DB;
use Excel;
use Auth;

class ImportExcelWebsitesController extends Controller
{
   



    function export_website(Request $request)
    {

     $website = $request->get('website');
     $product = $request->get('product');

     $website_fields = WebsitesFields::where('websites_id' , $website)->where('section','product')->get();
     $website_data = Websites::where('id' , $website)->first();

    
     $array1= array();
     foreach( $website_fields as $field) {
        array_push($array1, $field->label_en);
    }


    $customer_array[] = $array1;

    $array2= array();

    foreach($website_fields as $k=>$website_field)
    {

     $value_field = ProductsWebsitesFields::where('product_id' , $product)->where('field_id' , $website_field->id )->first();

    

     if($value_field){

        $array2[$website_field->label_en] = $value_field->value;
        }

        


}


$customer_array[] = $array2;




    Excel::create($website_data->title_en.' Products Data_'.date('Y-m-d'), function($excel) use ($customer_array,$website_data){
        $excel->setTitle($website_data->title_en.' Products Data '.date('Y-m-d'));
        $excel->sheet($website_data->title_en.' Products Data '.date('Y-m-d'), function($sheet) use ($customer_array){
         $sheet->fromArray($customer_array, null, 'A1', false, false);
        });
       })->download('xlsx');





    
    







}













function export_categories_website(Request $request)
{

 $website = $request->get('website');
 $product = $request->get('categories');

 $website_fields = WebsitesFields::where('websites_id' , $website)->where('section','categories')->get();
 $website_data = Websites::where('id' , $website)->first();


 $array1= array();
 foreach( $website_fields as $field) {
    array_push($array1, $field->label_en);
}


$customer_array[] = $array1;

$array2= array();

foreach($website_fields as $k=>$website_field)
{

 $value_field = CategoriesWebsitesFields::where('product_id' , $product)->where('field_id' , $website_field->id )->first();



 if($value_field){

    $array2[$website_field->label_en] = $value_field->value;
    }

    


}


$customer_array[] = $array2;




Excel::create($website_data->title_en.' Categories Data_'.date('Y-m-d'), function($excel) use ($customer_array,$website_data){
    $excel->setTitle($website_data->title_en.' Categories Data '.date('Y-m-d'));
    $excel->sheet($website_data->title_en.' Categories Data '.date('Y-m-d'), function($sheet) use ($customer_array){
     $sheet->fromArray($customer_array, null, 'A1', false, false);
    });
   })->download('xlsx');














}







}