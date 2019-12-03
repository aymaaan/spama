<?php

namespace App\Http\Controllers\backend;

use App\Customers;
use App\Driver;
use App\Order;
use App\City;
use App\OrderStop;
use App\User;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Session;
use Gate;
use DB;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
//        if (Gate::denies(['orders'])) {
//            abort(404);
//        }

        $data = Order::get();

        return view('backend.pages.orders.index', compact('data'));
    }


    public function create(Request $request)
    {
        //if ( Gate::denies(['create_orders'])  ) { abort(404); }
        $drivers = User::where('role','driver')->pluck('name','id');
        $cities = City::pluck('title', 'id');
        $branches = Branch::pluck('title', 'id');
        $customers = Customers::all();
        $days = ['Saturday' => 'Saturday', 'Sunday' => 'Sunday', 'Monday' => 'Monday', 'Tuesday' => 'Tuesday'
            , 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday'];
        return view('backend.pages.orders.create', compact('customers','drivers', 'days','cities','branches'));
    }


    public function store(Request $request)
    {
//        dd($request->toArray());

//        if (Gate::denies(['create_orders'])) {
//            abort(404);
//        }

//
        $data = new Order;
        $data->date = $request->date;
        $data->from_time = $request->from_time;
        $data->to_time = $request->to_time;
        $data->branch_start = $request->branch_start;
        $data->customer_start = $request->customer_start;
        $data->other_start = $request->other_start;
        $data->branch_des = $request->branch_des;
        $data->customer_des = $request->customer_des;
        $data->other_des = $request->other_des;
       // $data->city_id = $request->city_id;
        $data->driver_id = $request->driver_id;
        $data->user_id = Auth::user()->id;
        $data->save();


//        $orderStos->order_id =$data->id;
        if ($request->stop_value && $request->stop_type > 0)

            foreach ($request->stop_value as $k=>$item) {
                if ($item > 0) {
                  // dd($item[$k]);

                    $orderStos = new OrderStop();
                    $orderStos->order_id = $data->id;
                    $orderStos->stop_value = $item;
                    $orderStos->stop_type = $request->stop_type[$k];
                    $orderStos->save();
                }

        }


//        $orderStos->branch_stop[] =$request->branch_stop ;
//        $orderStos->customer_stop[] =$request->customer_stop ;
//        $orderStos->other_stop[] =$request->other_stop;
//        $orderStos->save();
        Session::flash('msg', ' Done! ');
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath') . '/orders');
    }


    public function edit(Request $request, $id)
    {
//        if (Gate::denies(['update_orders'])) {
//            abort(404);
//        }
        $drivers = User::where('role','driver')->pluck('name','id');
        $cities = City::pluck('title', 'id');
        $branches = Branch::pluck('title', 'id');
        $customers = Customers::all();
        $data = Order::find($id);
        $branchStop = OrderStop::where('order_id',$data->id)->where('stop_type','branch')->get();
        $customerStop = OrderStop::where('order_id',$data->id)->where('stop_type','customer')->get();
        $otherStop = OrderStop::where('order_id',$data->id)->where('stop_type','other')->get();
//dd($branchStop);
//            DB::table('orders')
//            ->join('order_stops', 'orders.id', '=', 'order_stops.order_id')
//            ->select('orders.*', 'order_stops.*')
//            ->where('order_id',$id)
//            ->first();
//        dd($dataStop);
        $user = User::find($data->user_id)->first();

        return view('backend.pages.orders.edit', compact('branchStop','customerStop','otherStop','user','data','drivers','cities','branches','customers'));
    }


    public function update(Request $request, $id)
    {
//        if (Gate::denies(['update_orders'])) {
//            abort(404);
//        }


        $data = Order::find($id);
        $data->date = $request->date;
        $data->from_time = $request->from_time;
        $data->to_time = $request->to_time;
        $data->branch_start = $request->branch_start;
        $data->customer_start = $request->customer_start;
        $data->other_start = $request->other_start;
        $data->branch_des = $request->branch_des;
        $data->customer_des = $request->customer_des;
        $data->other_des = $request->other_des;
        // $data->city_id = $request->city_id;
        $data->driver_id = $request->driver_id;
        $data->user_id = Auth::user()->id;
        $data->save();

if ($request->order_id > 0 ){

    foreach ($request->order_id as $k=>$item){
        $orderStops = OrderStop::find($item); dd($orderStops );
        $orderStops->stop_value = $request->stop_value[$k];
        $orderStops->stop_type = $request->stop_type[$k];
        $orderStops->save();
    }
}else{
        foreach ($request->stop_value as $k=>$item) {
            if ($item > 0) {
                $orderStos = new OrderStop();
                $orderStos->order_id = $id;
                $orderStos->stop_value = $item;
                $orderStos->stop_type = $request->stop_type[$k];
                $orderStos->save();
            }

        }
}



        Session::flash('msg', ' Done! ');
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath') . '/orders');

    }



//  public function approve(Request $request , $id , $status)
//  {
//    if ( Gate::denies(['update_orders'])  ) { abort(404); }
//    $data = Order::find($id);
//    $data->status = $status;
//    $data->save();
//    Session::flash('msg', ' Done! ' );
//    Session::flash('alert', 'success');
//    return back();
//  }
//


    public function destroy(Request $request, $id)
    {
//        if (Gate::denies(['delete_orders'])) {
//            abort(404);
//        }

        Order::find($id)->delete();
        $orderstop = OrderStop::where('order_id',$id)->first();
        $orderstop->delete();
        Session::flash('msg', ' Done! ');
        Session::flash('alert', 'danger');
        return back();
    }
    public function destoryStop( $id)
    {
//        if (Gate::denies(['delete_orders'])) {
//            abort(404);
//        }

        OrderStop::find($id)->delete();

        Session::flash('msg', ' Done! ');
        Session::flash('alert', 'danger');
        return back();
    }

    public function getCustomer()
    {
        $q = Input::get('customer');

        $customer = Customers::where('name', 'LIKE', '%' . $q . '%')->first();
        //dd($customer);
        return $customer;
        // echo $customer->name;
//echo   $customer->id;

    }
}
