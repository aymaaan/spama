<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
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
use App\CustomersPricingSettings;
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
    $data = Customers::paginate(10);
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
  $total_products = CustomersAssessmentProducts::where('serial',$serial->serial)
   ->select('customers_assessment_products.*',DB::raw("SUM(quantity) as total_all_products"),DB::raw("SUM(price) as total_all_price") ,DB::raw("SUM(estimate_consumption) as total_all_estimate") )
   ->groupBy('product_id')
   ->orderBy('customers_assessment_products.id','desc')
   ->get();




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
 }
  return view('backend.pages.customers.pricing' , compact('total_discount','total_vat','total_products','customer') );
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
   return view('backend.pages.customers.create' , compact('assessment_questions','doctors','diseases','ages','commercial_activities','customers_cases','sales_channels') );
 }


public function store(Request $request)
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
  
  if($data->save()) {

    
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
  return view('backend.pages.customers.edit', compact('assessment_questions','doctors','diseases','ages','commercial_activities','data','customers_cases','sales_channels')  );
}



public function update(Request $request, $id)
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
    
  if($data->save()) {

    $delegates = CustomersCorporateManagers::where('customer_id' , $data->id )->delete(); 
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
    $data->discount = $request->discount;
    $data->serial = $request->serial;
    $data->save();
    
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



}
