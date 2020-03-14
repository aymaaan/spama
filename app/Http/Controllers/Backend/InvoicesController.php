<?php

namespace App\Http\Controllers\backend;
use App\Invoice;
use App\Invoice_details;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\invoices;
use Session;
use Gate;


class InvoicesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
//    if ( Gate::denies(['invoices'])  ) { abort(404); }
  
    $data = Invoice::get();
  
    return view('backend.pages.invoices.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_invoices'])  ) { abort(404); }

   return view('backend.pages.invoices.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_invoices'])  ) { abort(404); }


  $data = new invoices;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->serial = generate_serial('invoices');
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/invoices');
  }



//   public function edit(Request $request , $id)
//   {
// //    if ( Gate::denies(['update_invoices'])  ) { abort(404); }
// //    $data  = invoices::find($id);

//     return view('backend.pages.invoices.edit', compact('data')  ); 
//   }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_invoices'])  ) { abort(404); }


    $data = invoices::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/invoices');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_invoices'])  ) { abort(404); }
    $data = invoices::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_invoices'])  ) { abort(404); }
    
    invoices::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }

    public function show($id)
    {
        //    if ( Gate::denies(['update_invoices'])  ) { abort(404); }
        $data  = Invoice::find($id);
        $data_details  = Invoice_details::where('invoice_id',$id)->get();
// dd($data_details);
        return view('backend.pages.invoices.edit', compact('data','data_details')  );
    }
  
  
  
  

}
