<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use App\SupplierDelegates;
use Session;
use Gate;
use Auth;


class SuppliersController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
  
  
  
  public function products(Request $request , $id)
  {

    
    if ( Gate::denies(['suppliers'])  ) { abort(404); }
    $data = Supplier::find($id);
    return view('backend.pages.suppliers.products' ,compact('data') );

    }


  public function index(Request $request)
  {

    
    if ( Gate::denies(['suppliers'])  ) { abort(404); }

    return view('backend.pages.suppliers.index' );

  }


   public function create()
  {
   if ( Gate::denies(['suppliers','create_suppliers'])  ) { abort(404); }
  
   
   return view('backend.pages.suppliers.create' , compact('roles'));
 }


public function store(Request $request)
 {
  if ( Gate::denies(['suppliers','create_suppliers'])  ) { abort(404); }
  


  $data = new Supplier;
  $data->name = $request->name;
  $data->email = $request->email;
  $data->address = $request->address;
  $data->website = $request->website;
  $data->supplier_type = $request->supplier_type;
  $data->credit_limit = $request->credit_limit;
  $data->credit_term = $request->credit_term;
  $data->supplying_duration = $request->supplying_duration;
  $data->payment_method = $request->payment_method;

  if($data->save()) {


   foreach ($request->delegate_names as $key => $name) {
     
   if ($name != '') {
   $delegates = new SupplierDelegates; 
   $delegates->name = $name;
   $delegates->phone = $request->delegate_phones[$key];
   $delegates->email = $request->delegate_emails[$key];
   $delegates->suppliers_id = $data->id;
   $delegates->save();

   }

    }



  }



  Session::flash('msg', ' Done! ' );
  Session::flash('alert', 'success');
  return Redirect(config('settings.BackendPath').'/suppliers');
}








public function edit($id)
{
  if ( Gate::denies(['suppliers','update_suppliers'])  ) { abort(404); }

  $data = Supplier::find($id);

  return view('backend.pages.suppliers.edit', compact('data')  );
}



public function update(Request $request, $id)
{
  if ( Gate::denies(['suppliers','update_suppliers'])  ) { abort(404); }

  $data= Supplier::find($id);

  $data->name = $request->name;
  $data->email = $request->email;
  $data->address = $request->address;
  $data->website = $request->website;
  $data->supplier_type = $request->supplier_type;
  $data->credit_limit = $request->credit_limit;
  $data->credit_term = $request->credit_term;
  $data->supplying_duration = $request->supplying_duration;
  $data->payment_method = $request->payment_method;

  if($data->save()) {

   $delegates = SupplierDelegates::where('suppliers_id' , $data->id )->delete(); 
   foreach ($request->delegate_names as $key => $name) {
     
   if ($name != '') {
   $delegates = new SupplierDelegates; 
   $delegates->name = $name;
   $delegates->phone = $request->delegate_phones[$key];
   $delegates->email = $request->delegate_emails[$key];
   $delegates->suppliers_id = $data->id;
   $delegates->save();

   }

    }



  }


    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/suppliers');

  }




  public function block($id , $action)
{

  if ( Gate::denies(['users','block_user'])  ) { abort(404); }
  $user= User::find($id);
  $user->status = $action;
  $user->save();

  Session::flash('msg', ' Done! ');
  Session::flash('alert', 'success');
  return redirect()->back();

}









  public function all_suppliers(Request $request)
    {
        
        $columns = array( 
                            0 =>'id', 
                            1 =>'name',
                            2=> 'supplier_type',
                            3=> 'credit_limit',
                            4=> 'credit_term',
                            5=> 'website',
                            6=> 'address',
                            7=> 'id',
                        );
  
        $totalData = Supplier::count();     
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');


        $posts = Supplier::query();


        if ( $_GET['t']) {  

        if ( $_GET['t'] && $_GET['t'] == 'local') {
          if ( Gate::allows(['Local_Suppliers'])  ) {
            $posts =  $posts->where('supplier_type','=',"داخلى");
            }
        }

        if ( $_GET['t'] && $_GET['t'] == 'foreign') {
          if ( Gate::allows(['Foreign_Suppliers'])  ) {
            $posts =  $posts->where('supplier_type','=',"خارجى");
            }
        }
      } else {



        if ( Gate::allows(['Local_Suppliers']) &&  Gate::allows(['Foreign_Suppliers'])  )  {
         $posts =  $posts->whereIn('supplier_type', ["داخلى" , "خارجى"]) ;
        }

        else {
        if ( Gate::allows(['Local_Suppliers'])  ) {
        $posts =  $posts->where('supplier_type','=',"داخلى");
        } elseif ( Gate::allows(['Foreign_Suppliers'])  ) {
        $posts =  $posts->where('supplier_type','=',"خارجى");
        }

        }



        
      }



            
        if(empty($request->input('search.value')))
        {       

            $posts = $posts->offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();

 
        }
        else {


            $search = $request->input('search.value'); 

 
            $posts =  $posts->where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->orWhere('address', 'LIKE',"%{$search}%")
                            ->orWhere('credit_limit', '=',"{$search}")
                            ->orWhere('credit_term', '=',"{$search}")
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



              if ( Gate::allows(['delete_suppliers'])  ) {

                 $delete_button = '<a href='.url(config('settings.BackendPath')).'/suppliers/'.$post->id.'/delete'.' class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>';
               } else {
                $delete_button = "";
               }

             if ( Gate::allows(['update_suppliers'])  ) {

                 $update_button = '<a href= '.url(config('settings.BackendPath')).'/suppliers/'.$post->id.'/edit'.' class="badge badge badge-info float-right"><i class="la la-pencil"></i></a>';
               } else {
                $update_button = "";
               }




               if ( Gate::allows(['update_suppliers'])  ) {


               if($post->status == 1 ) {

                $approve_button = '<a href= '.url(config('settings.BackendPath')).'/suppliers/'.$post->id.'/approve/0'.' class="badge badge badge-success float-right"><i class="la la-check"></i></a>';
              

               } else {


                $approve_button = '<a href= '.url(config('settings.BackendPath')).'/suppliers/'.$post->id.'/approve/1'.' class="badge badge badge-danger float-right"><i class="la la-ban"></i></a>';
              


               }



               }



                else {
                $approve_button = "";
               }



               
                

                $nestedData['id'] = $post->id;
                $nestedData['name'] =  '<a href= '.url(config('settings.BackendPath')).'/suppliers/'.$post->id.'/products'.' >'.$post->name.'</a>';
                $nestedData['supplier_type'] = $post->supplier_type;
                $nestedData['website'] =  $post->website;
                $nestedData['credit_limit'] =  $post->credit_limit;
                $nestedData['credit_term'] =  $post->credit_term;
                $nestedData['address'] =  $post->address;
                $nestedData['options'] = "{$delete_button}{$update_button}{$approve_button}";
                                          
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

  if( Gate::denies(['delete_suppliers'])  ) { abort(404); }
    Supplier::find($id)->delete();
    Session::flash('msg', 'Deleted!' );
    Session::flash('alert', 'success');
    return back();

  }



  
  public function delegates_destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_suppliers'])  ) { abort(404); }
    
    SupplierDelegates::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  




    public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_suppliers'])  ) { abort(404); }
    $data = Supplier::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }





}
