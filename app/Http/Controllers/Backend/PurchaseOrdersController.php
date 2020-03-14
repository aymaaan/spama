<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cache;
use Auth;
use App\Repositories;



class PurchaseOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */








public function list_purchase_orders(Request $request , $lang = null)
{

$lang = LangUser($lang);
$data = Repositories::where('status' , 1)->with('products_list')->get();

return view('backend.pages.purchase_orders.list_purchase_orders' , compact('data')  );
}


 

}
