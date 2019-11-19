<?php

namespace App\Http\Controllers\backend;

use App\Customers;
use App\Driver;
use App\Order;
use App\City;
use App\User;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Session;
use Gate;


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
// dd($request->toArray());
//        if (Gate::denies(['create_orders'])) {
//            abort(404);
//        }


        $data = new Order;
        $data->date = $request->date;
        $data->from_time = $request->from_time.' '.$request->from;
        $data->to_time = $request->to_time.' '.$request->to;
        $data->branch_start = $request->branch_start;
        $data->customer_start = $request->customer_start;
        $data->other_start = $request->other_start;
        $data->branch_des = $request->branch_des;
        $data->customer_des = $request->customer_des;
        $data->other_des = $request->other_des;
       // $data->city_id = $request->city_id;
        $data->driver_id = $request->driver_id;
        $data->save();


        Session::flash('msg', ' Done! ');
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath') . '/orders');
    }


    public function edit(Request $request, $id)
    {
        if (Gate::denies(['update_orders'])) {
            abort(404);
        }
        $data = Order::find($id);

        return view('backend.pages.orders.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        if (Gate::denies(['update_orders'])) {
            abort(404);
        }


        $data = Order::find($id);
        $data->day = $request->day;
        $data->date = $request->date;
        $data->from_time = $request->from_time;
        $data->to_time = $request->to_time;
        $data->to = $request->to;
        $data->from = $request->from;
        $data->destinations = $request->destinations;
        $data->customer = $request->customer;
        $data->customer_id = $request->customer_id;
        $data->city_id = $request->city_id;
        $data->driver_id = $request->driver_id;
        $data->notes = $request->notes;
        $data->save();


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
        if (Gate::denies(['delete_orders'])) {
            abort(404);
        }

        Order::find($id)->delete();

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
