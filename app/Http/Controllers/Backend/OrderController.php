<?php

namespace App\Http\Controllers\backend;

use App\Customers;
use App\Driver;
use App\Order;
use App\City;
use App\OrderStop;
use App\Status;
use App\User;
use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
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

        $totalPending = Order::where('order_status', 1)->count();
        $totalConfirmed = Order::where('order_status', 2)->count();

        return view('backend.pages.orders.index', compact('totalPending', 'totalConfirmed'));
    }
    public function calendar(Request $request)
    {
        $totalPending = Order::where('order_status', 1)->count();
        $totalConfirmed = Order::where('order_status', 2)->count();

        return view('backend.pages.orders.form', compact('totalPending', 'totalConfirmed'));
    }

    public function details($id)
    {
//        if (Gate::denies(['orders'])) {
//            abort(404);
//        }

        $data = Order::find($id);

        return view('backend.pages.orders.details', compact('data'));
    }

    public function confirmedOrder(Request $request)
    {
//        if (Gate::denies(['orders'])) {
//            abort(404);
//        }
        $inputs = Input::get();

        if ($inputs) {

            $date1 = Input::get('date_from');
            $date2 = Input::get('date_to');
            $time1 = Input::get('from_time');
            $time2 = Input::get('to_time');
            $driver = Input::get('driver');
            $user = Input::get('customer');
            $drivers = User::where('role', 'driver')->pluck('name', 'id');
            $customers = User::where('role', '!=', 'driver')->pluck('name', 'name');
            $statuses = Status::all();
            $data = Order::query()
                ->where('order_status', 2)
                ->whereBetween('date', [$date1, $date2])
                ->orWhere('from_time', $time1)
                ->orWhere('to_time', $time2)
                ->orWhere('driver_id', $driver)
                ->orWhere('user_id', $user)
                //   ->orWhere('date', 'LIKE', "%$date1%")
                ->orderBy('id', 'DESC')->get();
            return view('backend.pages.orders.confirmed_order', compact('data', 'drivers', 'customers', 'statuses'));

        }
        $customers = User::where('role', '!=', 'driver')->pluck('name', 'id');

        $drivers = User::where('role', 'driver')->pluck('name', 'id');
        $data = Order::where('order_status', 2)->orderBy('id', 'DESC')->get();
        $statuses = Status::all();
        return view('backend.pages.orders.confirmed_order', compact('data', 'drivers', 'customers', 'statuses'));
    }


    public function create(Request $request)
    {
        //if ( Gate::denies(['create_orders'])  ) { abort(404); }
        $drivers = User::where('role', 'driver')->pluck('name', 'id');
        $cities = City::where('parent_id',1)->pluck('title', 'id');
        $branches = Branch::pluck('title', 'id');
        $customers = Customers::all();
        $days = ['Saturday' => 'Saturday', 'Sunday' => 'Sunday', 'Monday' => 'Monday', 'Tuesday' => 'Tuesday'
            , 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday'];
        return view('backend.pages.orders.create', compact('customers', 'drivers', 'days', 'cities', 'branches'));
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
        $data->city_id = $request->city_id;
        $data->driver_id = $request->driver_id;
        $data->longitude_des = $request->longitude_des;
        $data->latitude_des = $request->latitude_des;
        $data->address_google = $request->address_google;
        $data->order_status = 1;
        $data->user_id = Auth::user()->id;
        $data->save();


//        $orderStos->order_id =$data->id;
        if ($request->stop_value && $request->stop_type > 0)

            foreach ($request->stop_value as $k => $item) {
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
        $inputs = Input::get('t');


        $drivers = User::where('role', 'driver')->pluck('name', 'id');
        $cities = City::pluck('title', 'id');
        $branches = Branch::pluck('title', 'id');
        $customers = Customers::all();
        $data = Order::find($id);
        $branchStop = OrderStop::where('order_id', $data->id)->where('stop_type', 'branch')->get();
        $customerStop = OrderStop::where('order_id', $data->id)->where('stop_type', 'customer')->get();
        $otherStop = OrderStop::where('order_id', $data->id)->where('stop_type', 'other')->get();
        $statuses = Status::all();

//            DB::table('orders')
//            ->join('order_stops', 'orders.id', '=', 'order_stops.order_id')
//            ->select('orders.*', 'order_stops.*')
//            ->where('order_id',$id)
//            ->first();
//        dd($dataStop);
        $user = User::find($data->user_id)->first();

        return view('backend.pages.orders.edit', compact('branchStop', 'customerStop', 'otherStop', 'user', 'data', 'drivers', 'cities', 'branches', 'customers', 'statuses', 'inputs'));
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
        $data->city_id = $request->city_id;
        $data->driver_id = $request->driver_id;
        $data->order_status = $request->order_status;
        $data->longitude_des = $request->longitude_des;
        $data->latitude_des = $request->latitude_des;
        $data->address_google = $request->address_google;
        $data->user_id = Auth::user()->id;
        $data->save();

        if ($request->order_id > 0) {

            foreach ($request->order_id as $k => $item) {
                $orderStops = OrderStop::find($item);
                $orderStops->stop_value = $request->stop_value[$k];
                $orderStops->stop_type = $request->stop_type[$k];
                $orderStops->save();
            }
        } else {
            foreach ($request->stop_value as $k => $item) {
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
        if ($request->cat == "pending") {
            return Redirect(config('settings.BackendPath') . '/orderPending');
        } elseif ($request->cat == "confirmed") {
            return Redirect(config('settings.BackendPath') . '/orders/confirmed/order');
        }
        return Redirect(config('settings.BackendPath') . '/orders/confirmed/order');
    }


    public function destroy(Request $request, $id)
    {
//        if (Gate::denies(['delete_orders'])) {
//            abort(404);
//        }

        Order::find($id)->delete();
        $orderstop = OrderStop::where('order_id', $id)->first();
        $orderstop->delete();
        Session::flash('msg', ' Done! ');
        Session::flash('alert', 'danger');
        return back();
    }

    public function destoryStop($id)
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


    }

    public function statusChange(Request $request)
    {
//dd($request->status_id);

        Order::where('id', $request->id)
            ->update(['order_status' => $request->status_id]);
        if ($request->status_id == 1) {
            $color = '#e67e22';

        } else if ($request->status_id == 2) {
            $color = '#2ecc71';

        } else if ($request->status_id == 3) {
            $color = '#e74c3c';
        }

        return $color;
    }

public function mapReview()
{
    return view('backend.pages.orders.map_review', compact('branchStop', 'customerStop', 'otherStop', 'user', 'data', 'drivers', 'cities', 'branches', 'customers', 'statuses', 'inputs'));

}
}
