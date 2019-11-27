<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customers;
use App\AssessmentQuestions;
use App\CustomersAssessmentQuestions;
use App\CustomersAssessmentProducts;
use App\Categories;
use App\MotherProducts;
use App\Units;
use Session;
use Gate;
use Auth;
use DB;


class AssessmentController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function make_assessment(Request $request , $id)
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }
  
    $customer = Customers::find($id);
    

    $assessment_questions = AssessmentQuestions::where('assessment_questions.status',1)
    ->select('assessment_questions.*' , 'customers_assessment_questions.question_answer')
    ->leftJoin('customers_assessment_questions', function($leftJoin)use($id)
        {
            $leftJoin->on( 'assessment_questions.id' , '=' , 'customers_assessment_questions.question_id');
            $leftJoin->on(DB::raw('customers_assessment_questions.customer_id'), DB::raw('='),DB::raw("'".$id."'"));
        })
    ->get();


    $categories = Categories::orderby('serial','asc')->with('mother_products','mother_products.products')->get();


    return view('backend.pages.customers.assessment_questions' , compact('customer','assessment_questions','categories') );
  }



  
  public function tree_mother_products_ajax(Request $request , $id)
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }

    $categories = Categories::where('id',$id)->with('mother_products','mother_products.products')->first();
  
    return view('backend.widgets.tree_mother_products_ajax' , compact('categories') );
  }

  public function tree_products_ajax(Request $request , $id , $customer_id , $request_by)
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }
    $units = Units::where('status' , 1)->pluck('title' , 'id');
    $categories = MotherProducts::where('id',$id)->with('products')->first();
    
    return view('backend.widgets.tree_products_ajax' , compact('units','categories','customer_id','request_by') );
  }



  
  public function post_assessment(Request $request , $id)
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }
    $customer = Customers::find($id);
    $customer->assessment_weight = $request->assessment_weight;
    $customer->assessment_length = $request->assessment_length;
    $customer->assessment_purchase_ability = $request->assessment_purchase_ability;
    $customer->save();

    $assessment_questions = AssessmentQuestions::whereStatus(1)->get();
    
    foreach($assessment_questions as $question) {
    
     $customer_question = CustomersAssessmentQuestions::firstOrNew(array('customer_id' => $id , 'question_id'=> $question->id));
     $customer_question->question_answer = $request['q'.$question->id];
     $customer_question->save();
    

    }


  }

  public function make_assessment_products_delegate(Request $request , $id , $lang = null )
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }
    $lang = LangUser($lang);
    $customer = Customers::find($id);
    $units = Units::where('status' , 1)->pluck('title' , 'id');
    $categories = Categories::orderby('serial','asc')->get();
    $total_products = CustomersAssessmentProducts::where('customer_id',$id)
    ->select('customers_assessment_products.*',DB::raw("SUM(quantity) as total_all_products"),DB::raw("SUM(price) as total_all_price") ,DB::raw("SUM(estimate_consumption) as total_all_estimate") )
    ->groupBy('product_id')
    ->where('assessment_date',date('Y-m-d'))
    ->orderBy('customers_assessment_products.id','desc')
    ->get();
    return view('backend.pages.customers.assessment_products_by_delegate' , compact('total_products','units','customer','categories') );
  }


  public function make_assessment_products_doctor(Request $request , $id , $lang = null )
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }
    $lang = LangUser($lang);
    $customer = Customers::find($id);
    $units = Units::where('status' , 1)->pluck('title' , 'id');
    $categories = Categories::orderby('serial','asc')->get();
    $total_products = CustomersAssessmentProducts::where('customer_id',$id)
    ->select('customers_assessment_products.*',DB::raw("SUM(quantity) as total_all_products"),DB::raw("SUM(price) as total_all_price") ,DB::raw("SUM(estimate_consumption) as total_all_estimate") )
    ->groupBy('product_id')
    ->where('assessment_date',date('Y-m-d'))
    ->orderBy('customers_assessment_products.id','desc')
    ->get();
    return view('backend.pages.customers.assessment_products_by_delegate' , compact('total_products','units','customer','categories') );
  }



  public function details_assessment_products_by_serial(Request $request , $id , $lang = null )
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }
    $lang = LangUser($lang);
    
    $units = Units::where('status' , 1)->pluck('title' , 'id');
    $categories = Categories::orderby('serial','asc')->get();
    $total_products = CustomersAssessmentProducts::where('serial',$id)
    ->select('customers_assessment_products.*',DB::raw("SUM(quantity) as total_all_products"),DB::raw("SUM(price) as total_all_price") ,DB::raw("SUM(estimate_consumption) as total_all_estimate") )
    ->groupBy('product_id')->get();
    $customer = Customers::find($total_products[0]['customer_id']);
    return view('backend.pages.customers.details_assessment_products_by_serial' , compact('total_products','units','customer','categories') );
  }



  public function re_assessment(Request $request , $id , $lang = null )
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }
    $lang = LangUser($lang);
    
    $units = Units::where('status' , 1)->pluck('title' , 'id');
    $categories = Categories::orderby('serial','asc')->get();
    $total_products = CustomersAssessmentProducts::where('serial',$id)
    ->select('customers_assessment_products.*',DB::raw("SUM(quantity) as total_all_products"),DB::raw("SUM(price) as total_all_price") ,DB::raw("SUM(estimate_consumption) as total_all_estimate") )
    ->groupBy('product_id')->get();


    $customer = Customers::find($total_products[0]['customer_id']);

    $serial = CustomersAssessmentProducts::orderBy('id','desc')
    ->where('assessment_date','!=',date('Y-m-d'))
    ->first();

    if($serial) {
      $serial = $serial->serial;
    } else {
      $serial = 0;
    }


    if( date('Y-m-d') != $total_products[0]['assessment_date']) {



    foreach( $total_products as $k=>$product) {

    $products_units = \DB::table('products_units')->where('product_id'  , $product->product_id )->where('unit_id', $product->unit_id )->first();

    if($products_units) {
      $customer_price = $products_units->customer_price ;
    } else {
      $customer_price = $request->price[$k] / $request->quantity[$k];
    }
   
     $customer_question = new CustomersAssessmentProducts;
     $customer_question->customer_id = $product->customer_id;
     $customer_question->product_id = $product->product_id;
     $customer_question->unit_id = $product->unit_id;
     $customer_question->quantity = $product->quantity;
     $customer_question->price = $product->price;
     $customer_question->estimate_consumption = $product->estimate_consumption;
     $customer_question->request_by = $product->request_by;
     $customer_question->assessment_date = date('Y-m-d');
     $customer_question->serial = $serial + 1;
     $customer_question->user_id = \Auth::user()->id;
     $customer_question->unit_price = $customer_price;
     $customer_question->save();
    
    }

    $total_products = CustomersAssessmentProducts::where('serial',$customer_question->serial)
    ->select('customers_assessment_products.*',DB::raw("SUM(quantity) as total_all_products"),DB::raw("SUM(price) as total_all_price") ,DB::raw("SUM(estimate_consumption) as total_all_estimate") )
    ->groupBy('product_id')->get();



  }

    




    return view('backend.pages.customers.re_assessment_products' , compact('total_products','units','customer','categories') );
  }

  


  public function post_assessment_products_delegate(Request $request , $id)
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }

    $serial = CustomersAssessmentProducts::orderBy('id','desc')
    ->where('assessment_date','!=',date('Y-m-d'))
    ->first();

    if($serial) {
      $serial = $serial->serial;
    } else {
      $serial = 0;
    }

    foreach( $request->products_doc as $k=>$product_id) {

    if ( $request->quantity[$k] && $request->price[$k] ) {

    $products_units = \DB::table('products_units')->where('product_id'  , $product_id )->where('unit_id',$request->unit_id[$k])->first();

    if($products_units) {
      $customer_price = $products_units->customer_price ;
    } else {
      $customer_price = $request->price[$k] / $request->quantity[$k];
    }


     $customer_question = new CustomersAssessmentProducts;
     $customer_question->customer_id = $id;
     $customer_question->product_id = $product_id;
     $customer_question->unit_id = $request->unit_id[$k];
     $customer_question->quantity = $request->quantity[$k];
     $customer_question->price = $request->price[$k];
     $customer_question->estimate_consumption = $request->estimate_consumption[$k];
     $customer_question->request_by = $request->request_by;
     $customer_question->assessment_date = date('Y-m-d');
     $customer_question->serial = $serial + 1;
     $customer_question->user_id = \Auth::user()->id;
     $customer_question->unit_price = $customer_price;
     $customer_question->save();
    }
    
    }

    Session::flash('msg', ' تم اضافة المنتجات بنجاح ' );
    Session::flash('alert', 'success');
    return back();

  }


  public function post_assessment_update_products_delegate(Request $request , $id)
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }

    foreach( $request->products_doc as $k=>$product_id) {
      if ( $request->quantity[$k] && $request->price[$k] && $request->estimate_consumption[$k] ) {
     $customer_question = CustomersAssessmentProducts::find( $request->assessment_id[$k] );
     $customer_question->unit_id = $request->unit_id[$k];
     $customer_question->quantity = $request->quantity[$k];
     $customer_question->price = $request->price[$k];
     $customer_question->estimate_consumption = $request->estimate_consumption[$k];
     $customer_question->save();
    }
    
    }

    Session::flash('msg', ' تم اضافة المنتجات بنجاح ' );
    Session::flash('alert', 'success');
    
    return Redirect( config('settings.BackendPath')."/assessment_products_delegate" . "/" . $customer_question->customer_id );
    

  }




  public function assessment_index(Request $request )
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }
    $customers = Customers::where('customer_type','individual')->get();
    return view('backend.pages.customers.assessment_index' ,compact('customers') );

  }


  public function pricing_index(Request $request )
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }
    $customers = Customers::where('customer_type','individual')->get();
    return view('backend.pages.customers.pricing_index' ,compact('customers') );

  }


  public function products_delete(Request $request , $id )
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }
    CustomersAssessmentProducts::find($id)->delete();
    return back();

  }
  

  public function consumer_products( $id )
  {
    if ( Gate::denies(['make_assessment'])  ) { abort(404); }


    $customer = Customers::find($id);
    $units = Units::where('status' , 1)->pluck('title' , 'id');
    $total_products = CustomersAssessmentProducts::where('serial',$id)->with('info')->get();
    return view('backend.pages.customers.consumer_products' ,compact('total_products','customer','units') );

  }

  

}
