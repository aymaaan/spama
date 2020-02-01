<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests\CustomersRequest;
use App\Http\Controllers\Controller;
use App\Customers;
use App\CustomersCases;
use App\SalesChannels;
use App\SalesDelegates;
use App\CommercialActivities;
use App\AgeCtegories;
use App\CustomersCorporateManagers;
use App\Diseases;
use App\AssessmentQuestions;
use App\CustomersAssessmentProducts;
use App\Doctors;
use App\Branch;
use App\Units;
use App\User;
use App\Products;
use App\CustomersPricingSettings;
use App\Job;
use Session;
use Gate;
use Auth;
use DB;


class CustomersController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  
  
  public function get_followed_delegate_ajax($id)
  {
    $data = SalesDelegates::where('channel_id' , $id )->get();
    return view('backend.widgets.followed_delegate_dropdown' , compact('data'));
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['customers'])  ) { abort(404); }
    $data = Customers::latest()->paginate(10);
    return view('backend.pages.customers.index' , compact('data') );
  }


  public function details($id)
  {

   if ( Gate::denies(['customers','create_customers'])  ) { abort(404); }
   $customer = Customers::find($id);
   $activities = CustomersAssessmentProducts::where('customer_id',$id)->groupBy('assessment_date')->get();
   $serial = CustomersAssessmentProducts::where('customer_id',$id)->orderBy('serial','desc')->first();
   if($serial) {
   $total_products = CustomersAssessmentProducts::where('serial',$serial->serial)
    ->select('customers_assessment_products.*',DB::raw("SUM(quantity) as total_all_products"),DB::raw("SUM(price) as total_all_price") ,DB::raw("SUM(estimate_consumption) as total_all_estimate") )
    ->groupBy('product_id')
    ->orderBy('customers_assessment_products.id','desc')
    ->get();
  } else {
    $total_products = [];
  }
   return view('backend.pages.customers.details' , compact('total_products','activities','customer') );
 }


 public function pricing($id)
 {


  if ( Gate::denies(['customers','create_customers'])  ) { abort(404); }
  $customer = Customers::find($id);
  $serial = CustomersAssessmentProducts::where('customer_id',$id)->orderBy('serial','desc')->first();
  if($serial) {
  $delgate_name = User::find($serial->user_id);
  $total_products = CustomersAssessmentProducts::where('serial',$serial->serial)
   ->select('customers_assessment_products.*',DB::raw("SUM(quantity) as total_all_products"),DB::raw("SUM(price) as total_all_price") ,DB::raw("SUM(estimate_consumption) as total_all_estimate") )
   ->groupBy('product_id')
   ->orderBy('customers_assessment_products.id','desc')
   ->get();

   $pricing_settings = CustomersPricingSettings::where('serial',$serial->serial)->first();

   if($pricing_settings) {
     $payment_before =  $pricing_settings->payment_before;
     $payment_while =  $pricing_settings->payment_while;
     $payment_after =  $pricing_settings->payment_after;
     $offer_validity = $pricing_settings->offer_validity;
     $supplying_duration = $pricing_settings->supplying_duration;
     $notes = $pricing_settings->notes;
     $delivery_place_type = $pricing_settings->delivery_place_type;
     if( $delivery_place_type == 'customer') {
     $delivery_place_value = Customers::find($pricing_settings->delivery_place_value);
     if(isset($delivery_place_value->address)) {
     $delivery_place_value =  $delivery_place_value->address ;
     } else {
        $delivery_place_value =   '' ; 
     }
    }
    elseif( $delivery_place_type == 'from') {
      $delivery_place_value = Branch::find($pricing_settings->delivery_place_value);
      $delivery_place_value =  $delivery_place_value->address ? : '';
     } else {
      $delivery_place_value =  $pricing_settings->delivery_place_value;
     }

   } else {
    $payment_before = 0;
    $payment_while = 0;
    $payment_after = 0;
    $offer_validity = 0;
    $supplying_duration = 0;
   $notes = null;
   $delivery_place_type = null;
   $delivery_place_value = null;
   }

   

$total_vat = 0;
$total_discount = 0;
foreach($total_products as $product) {
  $total_discount = $total_discount + ( $product->total_all_price  * $product->discount / 100);
  if($product->info['value_added'] == 'YES') {
    $total_vat = $total_vat + ( $product->total_all_price  * 5 / 100);
    
  }
}
 } else {
   $total_products = [];
   $payment_before = 0;
   $payment_while = 0;
   $payment_after = 0;
   $offer_validity = 0;
   $supplying_duration = 0;
   $notes = 0;
   $delivery_place_type = 0;
   $delivery_place_value = 0;
 }


$units = Units::where('status' , 1)->pluck('title' , 'id');


if( isset( $_GET['t'] ) && $_GET['t'] == 'print') {


    if(isset( $_GET['width'] ) && $_GET['width'] == 'full') {
    $width = "_full";
    }else {
      $width = "";
    }


    if(isset( $_GET['table'] ) && $_GET['table'] == 'a4') {
      $table = "_table";
    } else {
      $table = "";
    }
 
  return view('backend.pages.customers.invoices.'.$_GET['lang'].$table.$width , compact('pricing_settings','units','delivery_place_type','delivery_place_value','notes','supplying_duration','offer_validity','payment_while','payment_after','payment_before','total_discount','total_vat','total_products','customer','delgate_name') );
 
 }

else {
  return view('backend.pages.customers.pricing' , compact('pricing_settings','units','delivery_place_type','delivery_place_value','notes','supplying_duration','offer_validity','payment_while','payment_after','payment_before','total_discount','total_vat','total_products','customer','delgate_name') );
}

}

   public function create()
  {

   if ( Gate::denies(['customers','create_customers'])  ) { abort(404); }
   $sales_channels = SalesChannels::pluck('title','id');
   $customers_cases = CustomersCases::pluck('title','id');
   $commercial_activities = CommercialActivities::pluck('title','id');
   $ages = AgeCtegories::pluck('title','id');
   $diseases = Diseases::pluck('title','id');
   $doctors = Doctors::pluck('name','id');
   $assessment_questions = AssessmentQuestions::whereStatus(1)->get();
   $jobs = Job::pluck('title','id');
   return view('backend.pages.customers.create' , compact('jobs','assessment_questions','doctors','diseases','ages','commercial_activities','customers_cases','sales_channels') );
 }


public function store(CustomersRequest $request)
 {
  if ( Gate::denies(['customers','create_customers'])  ) { abort(404); }
 
  $data = new Customers;

  $data->name = $request->name;
  $data->email = $request->email;
  $data->phone = $request->phone;
  $data->address = $request->address;
  $data->website = $request->website;
  $data->gender = $request->gender;
  $data->delivery_schedule = $request->delivery_schedule;
  $data->customer_case_id = $request->customer_case_id;
  $data->age_group = $request->age_group;
  $data->facility_name = $request->facility_name;
  $data->facility_address = $request->facility_address;
  $data->facility_website = $request->facility_website;
  $data->sales_channel_id = $request->sales_channel_id;
  $data->commercial_activities_id = $request->commercial_activities_id;
  $data->is_consumer = $request->is_consumer;
  $data->consumer_name = $request->consumer_name;
  $data->consumer_age = $request->consumer_age;
  $data->consumer_address = $request->consumer_address;
  $data->consumer_phone = $request->consumer_phone;
  $data->consumer_email = $request->consumer_email;
  $data->consumer_relationship = $request->consumer_relationship;
  $data->disease_type = $request->disease_type;
  $data->doctor_id = $request->doctor_id;
  $data->google_map = $request->google_map;
  $data->continuity = $request->continuity;
  $data->is_sick = $request->is_sick;
  $data->address_lat = $request->lat;
  $data->address_long = $request->long;
  $data->address_google = $request->address_google;
  if($data->save()) {

    if($request->facility_manager_name) {
    foreach ($request->facility_manager_name as $key => $name) {
      
    if ($name != '') {
    $delegates = new CustomersCorporateManagers; 
    $delegates->name = $name;
    $delegates->email = $request->facility_manager_email[$key];
    $delegates->phone = $request->facility_manager_phone[$key];
    $delegates->job = $request->facility_manager_job[$key];
    $delegates->customer_id = $data->id;
    $delegates->save();
 
    }
  }
     }
 
 
 
   }

  Session::flash('msg', ' Done! ' );
  Session::flash('alert', 'success');
  return Redirect(config('settings.BackendPath').'/customers');
}




public function edit($id)
{
  if ( Gate::denies(['customers','update_customers'])  ) { abort(404); }

  $data = Customers::find($id);
  $customers_cases = CustomersCases::pluck('title','id');
  $sales_channels = SalesChannels::pluck('title','id');
  $commercial_activities = CommercialActivities::pluck('title','id');
  $ages = AgeCtegories::pluck('title','id');
  $diseases = Diseases::pluck('title','id');
  $doctors = Doctors::pluck('name','id');
  $assessment_questions = AssessmentQuestions::whereStatus(1)->get();
  $jobs = Job::pluck('title','id');
  return view('backend.pages.customers.edit', compact('jobs','assessment_questions','doctors','diseases','ages','commercial_activities','data','customers_cases','sales_channels')  );
}



public function update(CustomersRequest $request, $id)
{
  if ( Gate::denies(['customers','update_customers'])  ) { abort(404); }

  $data= Customers::find($id);
  $data->name = $request->name;
  $data->email = $request->email;
  $data->phone = $request->phone;
  $data->address = $request->address;
  $data->website = $request->website;
  $data->gender = $request->gender;
  $data->delivery_schedule = $request->delivery_schedule;
  $data->customer_case_id = $request->customer_case_id;
  $data->age_group = $request->age_group;
  $data->facility_name = $request->facility_name;
  $data->facility_address = $request->facility_address;
  $data->facility_website = $request->facility_website;
  $data->sales_channel_id = $request->sales_channel_id;
  $data->commercial_activities_id = $request->commercial_activities_id;
  $data->is_consumer = $request->is_consumer;
  $data->consumer_name = $request->consumer_name;
  $data->consumer_age = $request->consumer_age;
  $data->consumer_address = $request->consumer_address;
  $data->consumer_phone = $request->consumer_phone;
  $data->consumer_email = $request->consumer_email;
  $data->consumer_relationship = $request->consumer_relationship;
  $data->disease_type = $request->disease_type;
  $data->doctor_id = $request->doctor_id;
  $data->google_map = $request->google_map;
  $data->continuity = $request->continuity;
  $data->is_sick = $request->is_sick;
  $data->address_lat = $request->lat;
  $data->address_long = $request->long;
  $data->address_google = $request->address_google;
    
  if($data->save()) {

    $delegates = CustomersCorporateManagers::where('customer_id' , $data->id )->delete(); 
    if($request->facility_manager_name) {
    foreach ($request->facility_manager_name as $key => $name) {
      
    if ($name != '') {
    $delegates = new CustomersCorporateManagers; 
    $delegates->name = $name;
    $delegates->email = $request->facility_manager_email[$key];
    $delegates->phone = $request->facility_manager_phone[$key];
    $delegates->job = $request->facility_manager_job[$key];
    $delegates->customer_id = $data->id;
    $delegates->save();
 
    }
  }
 
     }
 
 
 
   }

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/customers');

  }




  
  public function destroy($id)
  {

  if( Gate::denies(['delete_customers'])  ) { abort(404); }
  Customers::find($id)->delete();
    Session::flash('msg', 'Deleted!' );
    Session::flash('alert', 'success');
    return back();

  }




    public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_customers'])  ) { abort(404); }
    $data = Customers::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }


  public function update_settings_pricing( Request $request )
  {

   
    if ( Gate::denies(['update_customers'])  ) { abort(404); }
    $data = CustomersPricingSettings::where('serial' , $request->serial)->first();
if(!$data) {
  $data = new CustomersPricingSettings;
}

if($request->serial) {
    
   if( $request->payment_before ) {
    $data->payment_before = $request->payment_before;
    $data->payment_title1 = $request->payment_title1;
   }

   if( $request->payment_while ) {
    $data->payment_while = $request->payment_while;
    $data->payment_title2 = $request->payment_title2;
   }

   if($request->payment_after ) {
    $data->payment_after = $request->payment_after;
    $data->payment_title3 = $request->payment_title3;
   }

   if($request->offer_validity) {
    $data->offer_validity = $request->offer_validity;
   }

   if($request->supplying_duration) {
    $data->supplying_duration = $request->supplying_duration;
   }

   if($request->delivery_place_type) {
    $data->delivery_place_type = $request->delivery_place_type;
   }

   if($request->delivery_place_value) {
    $data->delivery_place_value = $request->delivery_place_value;
   }

   
   if($request->notes) {
    $data->notes = $request->notes;
   }

    $data->serial = $request->serial;
    $data->save();

  }
    
    return back();
  }




  
  public function update_discount_pricing( Request $request )
  {
    if ( Gate::denies(['update_customers'])  ) { abort(404); }
   
    $data = CustomersAssessmentProducts::find( $request->row_id );

    $data->discount = $request->discount;
    $data->save();
    return back();
  }


  
  
  public function get_delivery_place_type( Request $request , $id )
  {
    if ( Gate::denies(['update_customers'])  ) { abort(404); }
   
    if(  $id  == 'from') {

      $data = Branch::get();


    } elseif (  $id  == 'customer') {

      $data = Customers::get();

    } 
    
    return view('backend.widgets.get_delivery_place_type' , compact('data','id'));


  }





  public function settings_add_fast_product( Request $request )
  {
    if ( Gate::denies(['update_customers'])  ) { abort(404); }


    $data = new Products;
    $data->title_ar = $request->title_ar;
    $data->title_en = $request->title_en;
    $data->sku = "FAST_ADDED";
    $data->save();
   
     $customer_question = new CustomersAssessmentProducts;
     $customer_question->customer_id = $request->customer_id;
     $customer_question->unit_id = $request->unit_id;
     $customer_question->unit_price = $request->unit_price;
     $customer_question->user_id = \Auth::user()->id;
     $customer_question->serial = $request->serial;
     $customer_question->assessment_date = date('Y-m-d');
     $customer_question->price = $request->quantity  * $request->unit_price;
     $customer_question->quantity = $request->quantity;
     $customer_question->request_by = 'delegates';
     $customer_question->product_id = $data->id;
     $customer_question->save();


    return back();
  }

  






  

}
