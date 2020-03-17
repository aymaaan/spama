<?php

namespace App\Http\Controllers\backend;
use App\Invoice;
use App\Invoice_details;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\invoices;
use Illuminate\Support\Facades\Input;
use Session;
use Gate;


class InvoicesPurchasesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
//    if ( Gate::denies(['invoices'])  ) { abort(404); }

    $data = Invoice::where('is_customer',1)->get();

    return view('backend.pages.invoices.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_invoices'])  ) { abort(404); }

   return view('backend.pages.invoices.create' );
 }







  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_invoices'])  ) { abort(404); }

    invoices::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }

    public function show($id,Request $request)
    {
        //    if ( Gate::denies(['update_invoices'])  ) { abort(404); }
        $data  = Invoice::find($id);
        $data_details  = Invoice_details::where('invoice_id',$id)->get();

dd($data_details);

        if ( $request->input('print')){
            dd(Input::get('print'));
        }

        return view('backend.pages.invoices.edit', compact('data','data_details')  );
    }

  
  
  
  

}
