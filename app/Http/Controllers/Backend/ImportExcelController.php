<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brands;
use App\Products;
use App\Supplier;
use App\Categories;
use App\MotherProducts;
use App\ProductsUnits;
use App\Features;
use App\NamesMotherProducts;
use App\Customers;
use App\Units;
use App\QrCode;
use Session;
use DB;
use Excel;
use Auth;
use File;

class ImportExcelController extends Controller
{
   

    function import_products(Request $request)
    {

    

     $this->validate($request, [
      'select_file'  => 'mimes:xls,xlsx',
      'select_file_suppliers'  => 'mimes:xls,xlsx'
     ]);

     //Import Product File
     if ($request->file('select_file')) {

     $path_products = $request->file('select_file')->getRealPath();

     $data_products = Excel::load($path_products)->get();

     if($data_products->count() > 0)
     {

      foreach( array_chunk( $data_products->toArray() , 1000 , true )  as $key => $value_part )
      {

       foreach( $value_part  as $key => $value )
      {
          
        if ( $value['final_sku'] ) {

        $check_new_products = Products::where('sku' , $value['final_sku'])->first();

        if ( $check_new_products ) {
    
         $check_new_products->title_ar = $value['arabic_title'];
         $check_new_products->title_en = $value['english_title'];
         $check_new_products->title_ar_old = $value['arabic_title_old'];
         $check_new_products->title_en_old = $value['english_title_old'];
         $check_new_products->sku_old = $value['sku_old'];
         $check_new_products->type_id = $value['type'];
         $check_new_products->category_id = $value['category'];
         $check_new_products->brand_id = $value['brand'];
         $check_new_products->mother_product_id = $value['mother_product'];
         $check_new_products->first_name = $value['first_name'];
         $check_new_products->feature_1 = $value['feature_1'];
         $check_new_products->feature_2 = $value['feature_2'];
         $check_new_products->feature_3 = $value['feature_3'];
         $check_new_products->last_purchase_price = $value['last_purchase_price'];
         $check_new_products->average_purchase_price = $value['average_purchase_price'];
         $check_new_products->value_added = $value['value_added'];
         $check_new_products->notes = $value['notes'];

         $check_new_products->expiration_date = $value['expiration_date'];
         $check_new_products->production_date = $value['production_date'];
         $check_new_products->loot_number = $value['loot_number'];
         $check_new_products->product_package_dimensions_x = $value['package_dimensions_x'];
         $check_new_products->product_package_dimensions_y = $value['package_dimensions_y'];
         $check_new_products->product_package_dimensions_z = $value['package_dimensions_z'];
        
         $check_new_products->sku_supplier = $value['sku_supplier'];
         $check_new_products->total_quantity = $value['total_quantity'];
         $check_new_products->minimum_total_quantity = $value['minimum_total_quantity'];
         $check_new_products->maximum_total_quantity = $value['maximum_total_quantity'];
         $check_new_products->total_demand_limit = $value['total_demand_limit'];
         $check_new_products->delivery_period_main_repository = $value['delivery_period_main_repository'];
         
         $check_new_products->special_price_realted_by_another_product = $value['special_price_realted_product'];
         $check_new_products->cost_price = $value['cost_price'];
         $check_new_products->price_related_by_quantity = $value['price_related_quantity'];
         $check_new_products->additional_costs_related_by_product = $value['additional_costs_related_product'];
         $check_new_products->shipping_charges = $value['shipping_charges'];
         $check_new_products->cod_charges = $value['cod_charges'];
 
         $check_new_products->save();

 
        } else {


        $insert_data_products[] = array(

            'title_ar' => $value['arabic_title'],
            'title_en' => $value['english_title'],
            'sku' => $value['final_sku'],
            'title_ar_old' => $value['arabic_title_old'],
            'title_en_old' => $value['english_title_old'],
            'sku_old' => $value['sku_old'],
            'type_id' => $value['type'],
            'category_id' => $value['category'],
            'brand_id' => $value['brand'],
            'mother_product_id' => $value['mother_product'],
            'first_name' => $value['first_name'],
            'feature_1' => $value['feature_1'],
            'feature_2' => $value['feature_2'],
            'feature_3' => $value['feature_3'],
            'last_purchase_price' => $value['last_purchase_price'],
            'average_purchase_price' => $value['average_purchase_price'],
            'value_added' => $value['value_added'],
            'notes' => $value['notes'],
            'expiration_date' => $value['expiration_date'],
            'production_date' => $value['production_date'],
            'loot_number' => $value['loot_number'],
            'sku_supplier' => $value['sku_supplier'],
            'total_quantity' => $value['total_quantity'],
            'minimum_total_quantity' => $value['minimum_total_quantity'],
            'maximum_total_quantity' => $value['maximum_total_quantity'],
            'total_demand_limit' => $value['total_demand_limit'],
            'delivery_period_main_repository' => $value['delivery_period_main_repository'],
            'cost_price' => $value['cost_price'],
            'special_price_realted_by_another_product' => $value['special_price_realted_product'],
            'price_related_by_quantity' => $value['price_related_quantity'],
            'additional_costs_related_by_product' => $value['additional_costs_related_product'],
            'shipping_charges' => $value['shipping_charges'],
            'cod_charges' => $value['cod_charges']
        );



      




    }
    
    
      }



      }


      if(!empty($insert_data_products))
      {
       DB::table('products')->insert($insert_data_products);
       $insert_data_products = null;
      }


    }

     

      

     }


    }





     //Import Suppliers File

     if ($request->file('select_file_suppliers')) {

     $path_suppliers = $request->file('select_file_suppliers')->getRealPath();

     $data_suppliers = Excel::load($path_suppliers)->get();

     if($data_suppliers->count() > 0)
     {


      foreach( array_chunk(  $data_suppliers->toArray() , 1000 , true ) as $key => $value_sp_part )
      {

        foreach( $value_sp_part as $key => $value )
        {

        $product_id = Products::where('sku'  , $value['final_sku'] )->first();
        $supplier_id = Supplier::where('name'  , $value['supplier_name'] )->first();

       if ( $product_id &&  $supplier_id)  {

        $product_id = $product_id->id;
        

       if ( $supplier_id->supplier_type == 'خارجى' ) {
           $type = 'foreign';
       } else {
        $type = 'local';
       }

       $supplier_id = $supplier_id->id;


       $check_products_suppliers =  DB::table('products_suppliers')
       ->where('product_id' , $product_id)->where('supplier_id' , $supplier_id)->first();

       if ( empty($check_products_suppliers) ) {

        $insert_data_suppliers[] = array(

            'product_id' => $product_id,
            'supplier_id' => $supplier_id,
            'type' => $type
        );

    }


    }


}


if(!empty($insert_data_suppliers))
{
 DB::table('products_suppliers')->insert($insert_data_suppliers);
 $insert_data_suppliers = null;
}


      }

     

     



     }


    }







    //Import units

    if ($request->file('select_file_units')) {

        $path_units = $request->file('select_file_units')->getRealPath();
   
        $data_units = Excel::load($path_units)->get();
   
        if($data_units->count() > 0)
        {
   
   
         foreach( array_chunk( $data_units->toArray() , 1000 , true ) as $key => $value_u_part )
         {
   
            foreach( $value_u_part as $key => $value )
            {
                
                
   
           $product_id = Products::where('sku'  , $value['final_sku'] )->first();
           $unit_id = Units::where('serial'  , $value['unit_serial'] )
           ->where('serial' , '!=' , null)->first();
 
          if ( $product_id)  {
   
           $product_id = $product_id->id;
           
           if ($unit_id) {
           $unit_id = $unit_id->id;
        } else {
            $unit_id = 0;
        }
        
        
        $check_unit = ProductsUnits::where('product_id' , $product_id)->first();
        
          if ($check_unit) {
              
              
              $check_unit->unit_id = $unit_id;
              $check_unit->unit_text = $value['unit_text'];
              $check_unit->customer_price = $value['customer_price'];
              $check_unit->wholesale_price = $value['wholesale_price'];
              $check_unit->semi_wholesale_price = $value['semi_wholesale_price'];
              $check_unit->ean = $value['ean'];
              $check_unit->save();
              
              
              
          } else {
              
              
              
               $insert_data_units[] = array(
   
               'product_id' => $product_id,
               'unit_id' => $unit_id,
               'unit_text' => $value['unit_text'],
               'customer_price' => $value['customer_price'],
               'wholesale_price' => $value['wholesale_price'],
               'semi_wholesale_price' => $value['semi_wholesale_price'],
               'ean' => $value['ean'],

           );
           
           
          }

          
   
   
       }
   
   
   
         }


         if(!empty($insert_data_units))
         {
          DB::table('products_units')->insert($insert_data_units);
          $insert_data_units = null;
         }


   
        }
   
         
   
   
   
        }
   
   
       }








     return back()->with('success', 'Excel Data Imported successfully.');
    }







    function export_products()
    {
     $customer_data = Products::with('unit_prices')->with('unit_prices.unit')->get()->toArray();
     //$customer_data = DB::table('products')->get()->toArray();

     $customer_array[] = array(
     
      'Notes',
      'Arabic_Title',
      'English_Title',
      'Sku_Old',
      'Arabic_Title_Old',
      'English_Title_Old',
      'Type',
      'Category',
      'Mother_Product' ,
      'Brand',
      'First_Name' ,
      'Feature_1',
      'Feature_2' ,
      'Feature_3',
      'Final_SKU' ,
      'Last_Purchase_Price' ,
      'Average_Purchase_Price' ,
      'Value_Added',
      'Unit',
      'Customer_Price',
      'Wholesale_Price',
      'Semi_Wholesale_Price',
      'EAN',
      'Expiration_Date',
      'Production_Date',
      'Loot_Number',
      'Package_Dimensions_X',
      'Package_Dimensions_Y',
      'Package_Dimensions_Z',
      'SKU_Supplier',
      'Total_Quantity',
      'Minimum_Total_Quantity',
      'Maximum_Total_Quantity',
      'Total_Demand_Limit',
      'Delivery_Period_Main_Repository',
      'Cost_Price',
      'Special_Price_Realted_Product',
      'Special_Price_Realted_Coupon',
      'Price_Related_Quantity',
      'Additional_Costs_Related_Product',
      'Shipping_Charges',
      'COD_Charges'
 
         
     );

     if ( Auth::user()->display_content_ar != 1 ) { unset($customer_array[0][1]); }
     if ( Auth::user()->display_content_en != 1 ) { unset($customer_array[0][2]); }


     foreach($customer_data as $k=> $customer)
     {
      
 if (isset ( $customer['unit_prices'][0]['unit']['title']   ) ) {

        $unit_title = $customer['unit_prices'][0]['unit']['title'];
    } else {

        $unit_title = '';
    }




    
    if (isset ($customer['unit_prices'][0]['customer_price'])) {

        $customer_price = $customer['unit_prices'][0]['customer_price'];
    } else {

        $customer_price = '';
    }


    if (isset ($customer['unit_prices'][0]['wholesale_price'])) {

        $wholesale_price = $customer['unit_prices'][0]['wholesale_price'];
    } else {

        $wholesale_price = '';
    }


    if (isset ($customer['unit_prices'][0]['semi_wholesale_price'])) {

        $semi_wholesale_price = $customer['unit_prices'][0]['semi_wholesale_price'];
    } else {

        $semi_wholesale_price = '';
    }


    if (isset ($customer['unit_prices'][0]['ean'])) {

        $ean = $customer['unit_prices'][0]['ean'];
    } else {

        $ean = '';
    }


    if (isset ($customer['unit_prices'][0]['unit_text'])) {

        $unit_text = $customer['unit_prices'][0]['unit_text'];
    } else {

        $unit_text = '';
    }

    

       $customer_array[] = array(
       'Notes'  => $customer['notes'],
       'Arabic_Title'   => $customer['title_ar'],
       'English_Title'    => $customer['title_en'],
       'Sku_Old'  => $customer['sku_old'],
       'Arabic_Title_Old'   => $customer['title_ar_old'],
       'English_Title_Old'    => $customer['title_en_old'],
       'Type'  => $customer['type_id'],
       'Category'  => $customer['category_id'],
       'Mother_Product'   => $customer['mother_product_id'],
       'Brand'   => $customer['brand_id'],
       'First_Name'   => $customer['first_name'],
       'Feature_1'   => $customer['feature_1'],
       'Feature_2'   => $customer['feature_2'],
       'Feature_3'   => $customer['feature_3'],
       'Final_SKU'   => $customer['sku'],
       'Last_Purchase_Price'   => $customer['last_purchase_price'],
       'Average_Purchase_Price'   => $customer['average_purchase_price'],
       'Value_Added' => $customer['value_added'],
       'Unit' => $unit_title . $unit_text,
       'Customer_Price' => $customer_price,
       'Wholesale_Price' => $wholesale_price,
       'Semi_Wholesale_Price' => $semi_wholesale_price,
       'EAN' => $ean,
     
      'Expiration_Date'=> $customer['expiration_date'],
      'Production_Date'=> $customer['production_date'],
      'Loot_Number'=> $customer['loot_number'],
      'Package_Dimensions_X'=> $customer['product_package_dimensions_x'],
      'Package_Dimensions_Y'=> $customer['product_package_dimensions_y'],
      'Package_Dimensions_Z'=> $customer['product_package_dimensions_z'],
      'SKU_Supplier'=> $customer['sku_supplier'],
      'Total_Quantity'=> $customer['total_quantity'],
      'Minimum_Total_Quantity'=> $customer['minimum_total_quantity'],
      'Maximum_Total_Quantity'=> $customer['maximum_total_quantity'],
      'Total_Demand_Limit'=> $customer['total_demand_limit'],
      'Delivery_Period_Main_Repository'=> $customer['delivery_period_main_repository'],
      'Cost_Price'=> $customer['cost_price'],
      'Special_Price_Realted_Product'=> $customer['special_price_realted_by_another_product'],
      'Price_Related_Quantity'=> $customer['price_related_by_quantity'],
      'Additional_Costs_Related_Product'=> $customer['additional_costs_related_by_product'],
      'Shipping_Charges'=> $customer['shipping_charges'],
      'COD_Charges'=> $customer['cod_charges']

      );


     if ( Auth::user()->display_content_ar != 1 ) { unset($customer_array[$k]['Arabic_Title']); }
     if ( Auth::user()->display_content_en != 1 ) { unset($customer_array[$k]['English_Title']); }


     }

     


     Excel::create('Products Data_'.date('Y-m-d'), function($excel) use ($customer_array){
      $excel->setTitle('Products Data '.date('Y-m-d'));
      $excel->sheet('Products Data '.date('Y-m-d'), function($sheet) use ($customer_array){
       $sheet->fromArray($customer_array, null, 'A1', false, false);
      });
     })->download('xlsx');
    }









    function import_categories(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'mimes:xls,xlsx'
     ]);

     //Categories File
     if ($request->file('select_file')) {

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();

     if($data->count() > 0)
     {


      foreach( $data->toArray() as $key => $value )
      {

if ( $value['serial'] ) {

    $check_new_categories = Categories::where('serial' , $value['serial'])->first();

    if ( $check_new_categories ) {
     //$check_new_categories->id = $value['id'];
     $check_new_categories->title = $value['arabic_title'];
     $check_new_categories->title_en = $value['english_title'];
     $check_new_categories->status = $value['status'];
     $check_new_categories->order_list = $value['order_list'];
     $check_new_categories->save();

    } else {

        $insert_data[] = array(
            'id' => $value['id'],
            'serial' => $value['serial'],
            'title' => $value['arabic_title'],
            'title_en' => $value['english_title'],
            'status' => $value['status'],
            'order_list' => $value['order_list'],

        );

    }


    }


      }

     

      if(!empty($insert_data))
      {
       DB::table('categories')->insert($insert_data);
      }


    }


     }



//Mother Products

if ($request->file('select_file_mother')) {

    $path_mother = $request->file('select_file_mother')->getRealPath();

    $data_mother = Excel::load($path_mother)->get();

    if($data_mother->count() > 0)
    {


     foreach( $data_mother->toArray() as $key => $value )
     {



      $categories_id = Categories::where('serial'  , $value['category_serial'] )->first();
      

      if ( $categories_id ) {

       $categories_id = $categories_id->id;

       if ( isset ( $categories_id ) &&  isset ( $value['serial'] )) {


        $check_new_mother_products = MotherProducts::where('serial' , $value['serial'])->first();

       if ( $check_new_mother_products ) {
        
        $check_new_mother_products->categories_id = $categories_id;
        $check_new_mother_products->title = $value['arabic_title'];
        $check_new_mother_products->title_en = $value['english_title'];
        $check_new_mother_products->save();

       } else {

       $insert_data_categories[] = array(

           'serial' => $value['serial'],
           'categories_id' => $categories_id,
           'title' => $value['arabic_title'],
           'title_en' => $value['english_title']


       );

    }


    }

    }



     }

    

     if(!empty($insert_data_categories))
     {
      DB::table('mother_products')->insert($insert_data_categories);
     }


   }


    }








//Names Mother Products

if ($request->file('select_file_names')) {

    $path_names_mother = $request->file('select_file_names')->getRealPath();

    $data_names_mother = Excel::load($path_names_mother)->get();

    if($data_names_mother->count() > 0)
    {


     foreach( $data_names_mother->toArray() as $key => $value )
     {

      $products_id = MotherProducts::where('serial'  , $value['mother_product_serial'] )->first();
      

      if ( $products_id ) {

       $products_id = $products_id->id;


       $check_new_names_mother_products = NamesMotherProducts::where('serial' , $value['serial'])
       ->where('products_id' , $products_id)->first();

       if ( $check_new_names_mother_products ) {

        $check_new_names_mother_products->title = $value['arabic_title'];
        $check_new_names_mother_products->title_en = $value['english_title'];
        $check_new_names_mother_products->save();

       } else {

       
       $insert_data_names_mother[] = array(

           'serial' => $value['serial'],
           'products_id' => $products_id,
           'title' => $value['arabic_title'],
           'title_en' => $value['english_title']
       );

    }





    }



     }

    

     if(!empty($insert_data_names_mother))
     {
      DB::table('names_mother_products')->insert($insert_data_names_mother);
     }


   }


    }















    

//Features Names  Products

if ($request->file('select_file_features')) {

    $path_names_features = $request->file('select_file_features')->getRealPath();

    $data_names_features = Excel::load($path_names_features)->get();

    if($data_names_features->count() > 0)
    {
    
    


     foreach( $data_names_features->toArray() as $key => $value )
     {
         
         $mother_products = MotherProducts::where('serial'  , $value['mother_product_serial'] )->first();
       
         
      $products_id = $mother_products->id;

     $first_name =  NamesMotherProducts::where('serial' ,  $value['first_name_serial'])->where('products_id' ,  $products_id)->first();




      if ( $first_name ) {

        $first_name_id = $first_name->id;
        $features =  Features::where('parent_id',0)->where('name_id',$first_name_id)->get();
        


         //Feature 1


        if ( isset($value['feature_1_arabic'] )  ) {

           

            $serial_id = $value['serial_feature_1'];
            $title =  $value['feature_1_arabic'];
            $title_en =  $value['feature_1_english'];

            if ( isset($features[0])  ) {

                
                $parent_id = $features[0]->id;


            } else {


                $new_feature_1  = new Features;
                $new_feature_1->serial = 0;
                $new_feature_1->parent_id = 0;
                $new_feature_1->name_id = $first_name_id;
                $new_feature_1->title = 'Feature 1';
                $new_feature_1->save();

                $parent_id = $new_feature_1->id;
                


            }


            $check_new_feature_1 = Features::where('serial' , $serial_id)
            ->where('name_id' , $first_name_id)->where('parent_id' , $parent_id)->first();

           

            if ( $check_new_feature_1 ) {

            $check_new_feature_1->serial = $serial_id;
            $check_new_feature_1->name_id = $first_name_id;
            $check_new_feature_1->parent_id = $parent_id;
            $check_new_feature_1->title = $title;
            $check_new_feature_1->title_en = $title_en;
            $check_new_feature_1->save();


            } else {

            $insert_data_names_features[] = array(

                'serial' => $serial_id,
                'name_id' => $first_name_id,
                'parent_id' => $parent_id,
                'title' => $title,
                'title_en' => $title_en
            );

        }

            
    
         }



         //Feature 2

         if ( isset($value['feature_2_arabic'] )  ) {

            $serial_id = $value['serial_feature_2'];
            $title =  $value['feature_2_arabic'];
            $title_en =  $value['feature_2_english'];

            if ( isset($features[1])  ) {


                $parent_id = $features[1]->id;


            } else {


                $new_feature_2  = new Features;
                $new_feature_2->serial = 0;
                $new_feature_2->parent_id = 0;
                $new_feature_2->name_id = $first_name_id;
                $new_feature_2->title = 'Feature 2';
                $new_feature_2->save();

                $parent_id = $new_feature_2->id;
               


            }


            $check_new_feature_2 = Features::where('serial' , $serial_id)
            ->where('name_id' , $first_name_id)->where('parent_id' , $parent_id)->first();

            if ( $check_new_feature_2 ) {

            $check_new_feature_2->serial = $serial_id;
            $check_new_feature_2->name_id = $first_name_id;
            $check_new_feature_2->parent_id = $parent_id;
            $check_new_feature_2->title = $title;
            $check_new_feature_2->title_en = $title_en;
            $check_new_feature_2->save();


            } else {

            $insert_data_names_features[] = array(

                'serial' => $serial_id,
                'name_id' => $first_name_id,
                'parent_id' => $parent_id,
                'title' => $title,
                'title_en' => $title_en
            );

        }

         }



          //Feature 3

          if ( isset($value['feature_3_arabic'] )  ) {

            $serial_id = $value['serial_feature_3'];
            $title =  $value['feature_3_arabic'];
            $title_en =  $value['feature_3_english'];

            if ( isset($features[2])  ) {


                $parent_id = $features[2]->id;


            } else {


                $new_feature_3  = new Features;
                $new_feature_3->serial = 0;
                $new_feature_3->parent_id = 0;
                $new_feature_3->name_id = $first_name_id;
                $new_feature_3->title = 'Feature 3';
                $new_feature_3->save();

                $parent_id = $new_feature_3->id;
                
            }


            $check_new_feature_3 = Features::where('serial' , $serial_id)
            ->where('name_id' , $first_name_id)->where('parent_id' , $parent_id)->first();

            if ( $check_new_feature_3 ) {

            $check_new_feature_3->serial = $serial_id;
            $check_new_feature_3->name_id = $first_name_id;
            $check_new_feature_3->parent_id = $parent_id;
            $check_new_feature_3->title = $title;
            $check_new_feature_3->title_en = $title_en;
            $check_new_feature_3->save();


            } else {

            $insert_data_names_features[] = array(

                'serial' => $serial_id,
                'name_id' => $first_name_id,
                'parent_id' => $parent_id,
                'title' => $title,
                'title_en' => $title_en
            );

        }
            

         }
         

       


    }



     }

    

     if(!empty($insert_data_names_features))
     {
      DB::table('features_products')->insert($insert_data_names_features);
     }


   }


    }


     return back()->with('success', 'Excel Data Imported successfully.');
    }





    








    function export_categories()
    {
     $customer_data = DB::table('categories')->get()->toArray();
     $customer_array[] = array('ID','Serial', 'Arabic_Title' , 'English_Title','Status','Order_List');

     

     if ( Auth::user()->display_content_ar != 1 ) { unset($customer_array[0][2]); }
     if ( Auth::user()->display_content_en != 1 ) { unset($customer_array[0][3]); }
 
     
     foreach($customer_data as $k=>$customer)
     {
      $customer_array[] = array(
       'ID'  => $k + 1 ,
       'Serial'  => $customer->serial,
       'Arabic_Title'   => $customer->title,
       'English_Title'   => $customer->title_en,
       'Status'   => $customer->status,
       'Order_List'   => $customer->order_list
      );



      
      if ( Auth::user()->display_content_ar != 1 ) { unset($customer_array[$k]['Arabic_Title']); }
     if ( Auth::user()->display_content_en != 1 ) { unset($customer_array[$k]['English_Title']); }
     }
     Excel::create('Categories Data_'.date('Y-m-d'), function($excel) use ($customer_array){
      $excel->setTitle('Categories Data '.date('Y-m-d'));
      $excel->sheet('Categories Data '.date('Y-m-d'), function($sheet) use ($customer_array){
       $sheet->fromArray($customer_array, null, 'A1', false, false);
      });
     })->download('xlsx');
    }







    function export_coupons($campaign_title)
    {
     $customer_data = DB::table('coupons')->where('title' , $campaign_title)->get()->toArray();
     $customer_array[] = array('Code', 'QR','Date_Start','Date_End','Discount_Type','Discount','Total_Amount','Uses_Per_Coupon','Uses_Per_Customer');

     foreach($customer_data as $k=>$customer)
     {
      $customer_array[] = array(
  
       'Code'  => $customer->code,
       'QR'   => url('qr-code?c='.$customer->code),
       
       'Discount_Type'   => $customer->type,
       'Discount'   => $customer->discount,
       'Total_Amount'   => $customer->amount,
       'Uses_Per_Coupon'   => $customer->uses_per_coupon,
       'Uses_Per_Customer'   => $customer->uses_per_customer,
       'Date_Start'   => $customer->start_date,
       'Date_End'   =>  $customer->end_date,
    );


    $path = 'uploads/qrcodes/'.$customer->title;
    File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

    \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
              ->format('png')->size($customer->qr_width)
              ->generate( $customer->code, ('uploads/qrcodes/'.$customer->title.'/'.$customer->code.'.png'));
     }

     Excel::create('Coupons Data_'.date('Y-m-d'), function($excel) use ($customer_array){
      $excel->setTitle('Coupons Data '.date('Y-m-d'));
      $excel->sheet('Coupons Data '.date('Y-m-d'), function($sheet) use ($customer_array){
       $sheet->fromArray($customer_array, null, 'A1', false, false);
      });
     })->download('xlsx');
    }









    
    function export_customers()
    {
     $customer_data = DB::table('customers')->get()->toArray();
     $customer_array[] = array('Name', 'Phone','Email','Website','Address','Type','Gender','Age','Delivery_Schedule');

     foreach($customer_data as $k=>$customer)
     {
      $customer_array[] = array(
  
      'Name'  => $customer->name,
      'Phone'  => $customer->phone,
      'Email'  => $customer->email,
      'Website'  => $customer->website,
      'Address'  => $customer->address,
      'Type'  => $customer->customer_type,
      'Gender'  => $customer->gender,
      'Age'  => $customer->age_group,
      'Delivery_Schedule'  => $customer->delivery_schedule,

    );

}



     Excel::create('Customers Data_'.date('Y-m-d'), function($excel) use ($customer_array){
      $excel->setTitle('Customers Data '.date('Y-m-d'));
      $excel->sheet('Customers Data '.date('Y-m-d'), function($sheet) use ($customer_array){
       $sheet->fromArray($customer_array, null, 'A1', false, false);
      });
     })->download('xlsx');
    }











    function import_customers(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'mimes:xls,xlsx'
     ]);



     //customers File
     if ($request->file('select_file')) {

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();

     if($data->count() > 0)
     {


      foreach( $data->toArray() as $key => $value )
      {

    if ( $value['name'] ) {

    $check_new_customers = Customers::where('phone' , $value['phone'])->first();

    if ( $check_new_customers ) {

     $check_new_customers->name = $value['name'];
     $check_new_customers->phone = $value['phone'];
     $check_new_customers->email = $value['email'];
     $check_new_customers->website = $value['website'];
     $check_new_customers->address = $value['address'];
     $check_new_customers->customer_type = $value['type'];
     $check_new_customers->gender = $value['gender'];
     $check_new_customers->age_group = $value['age'];
     $check_new_customers->delivery_schedule = $value['delivery_schedule'];
     $check_new_customers->save();

    } else {

        $insert_data[] = array(

            'name' => $value['name'],
            'phone' => $value['phone'],
            'email' => $value['email'],
            'website' => $value['website'],
            'address' => $value['address'],
            'customer_type' => $value['type'],
            'gender' => $value['gender'],
            'age_group' => $value['age'],
            'delivery_schedule' => $value['delivery_schedule'],

        );

    }


    }


      }

     

      if(!empty($insert_data))
      {
       DB::table('customers')->insert($insert_data);
      }


    }


     }


     return back()->with('success', 'Excel Data Imported successfully.');
    }





    function import_suppliers(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'mimes:xls,xlsx'
     ]);



     //customers File
     if ($request->file('select_file')) {

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();

     if($data->count() > 0)
     {


      foreach( $data->toArray() as $key => $value )
      {

    if ( $value['arabic_name'] ) {

    $check_new_customers = Supplier::where('name' , $value['arabic_name'])->first();

    if ( $check_new_customers ) {

     $check_new_customers->name = $value['arabic_name'];
     $check_new_customers->supplier_type = $value['type'];
     $check_new_customers->credit_limit = $value['credit_limit'];
     $check_new_customers->credit_term = $value['credit_term'];
     $check_new_customers->status = $value['status'];
     $check_new_customers->supplying_duration = $value['supplying_duration'];
     $check_new_customers->payment_method = $value['payment_method'];
     $check_new_customers->address = $value['address'];
     $check_new_customers->email = $value['email'];
     $check_new_customers->save();

    } else {

        $insert_data[] = array(

            'name' => $value['arabic_name'],
            'supplier_type' => $value['type'],
            'credit_limit' => $value['credit_limit'],
            'credit_term' => $value['credit_term'],
            'status' => $value['status'],
            'supplying_duration' => $value['supplying_duration'],
            'payment_method' => $value['payment_method'],
            'address' => $value['address'],
            'email' => $value['email'],

        );

    }


    }


      }

     

      if(!empty($insert_data))
      {
       DB::table('suppliers')->insert($insert_data);
      }


    }


     }


     return back()->with('success', 'Excel Data Imported successfully.');
    }

    



}