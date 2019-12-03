<?php

namespace App\Http\Controllers\backend;

use App\Customers;
use App\Driver;
use App\Order;
use App\City;
use App\order_confirmationtop;
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

class OrderConfirmationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
//        if (Gate::denies(['order_confirmation'])) {
//            abort(404);
//        }
        $statuses = Status::all();
        $data = Order::where('order_status','pending')->get();

        return view('backend.pages.order_confirmation.index', compact('data','statuses'));
    }


//    public function create(Request $request)
//    {
//        //if ( Gate::denies(['create_order_confirmation'])  ) { abort(404); }
//        $drivers = User::where('role','driver')->pluck('name','id');
//        $cities = City::pluck('title', 'id');
//        $branches = Branch::pluck('title', 'id');
//        $customers = Customers::all();
//        $days = ['Saturday' => 'Saturday', 'Sunday' => 'Sunday', 'Monday' => 'Monday', 'Tuesday' => 'Tuesday'
//            , 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday'];
//        return view('backend.pages.order_confirmation.create', compact('customers','drivers', 'days','cities','branches'));
//    }


//    public function store(Request $request)
//    {
////        dd($request->toArray());
//
////        if (Gate::denies(['create_order_confirmation'])) {
////            abort(404);
////        }
//
////
//        $data = new Order;
//        $data->date = $request->date;
//        $data->from_time = $request->from_time;
//        $data->to_time = $request->to_time;
//        $data->branch_start = $request->branch_start;
//        $data->customer_start = $request->customer_start;
//        $data->other_start = $request->other_start;
//        $data->branch_des = $request->branch_des;
//        $data->customer_des = $request->customer_des;
//        $data->other_des = $request->other_des;
//       // $data->city_id = $request->city_id;
//        $data->driver_id = $request->driver_id;
//        $data->user_id = Auth::user()->id;
//        $data->save();
//
//
////        $order_confirmationtos->order_id =$data->id;
//        if ($request->stop_value && $request->stop_type > 0)
//
//            foreach ($request->stop_value as $k=>$item) {
//                if ($item > 0) {
//                  // dd($item[$k]);
//
//                    $order_confirmationtos = new order_confirmationtop();
//                    $order_confirmationtos->order_id = $data->id;
//                    $order_confirmationtos->stop_value = $item;
//                    $order_confirmationtos->stop_type = $request->stop_type[$k];
//                    $order_confirmationtos->save();
//                }
//
//        }
//
//
////        $order_confirmationtos->branch_stop[] =$request->branch_stop ;
////        $order_confirmationtos->customer_stop[] =$request->customer_stop ;
////        $order_confirmationtos->other_stop[] =$request->other_stop;
////        $order_confirmationtos->save();
//        Session::flash('msg', ' Done! ');
//        Session::flash('alert', 'success');
//        return Redirect(config('settings.BackendPath') . '/order_confirmation');
//    }


    public function edit(Request $request, $id)
    {
//        if (Gate::denies(['update_order_confirmation'])) {
//            abort(404);
//        }
        $drivers = User::where('role','driver')->pluck('name','id');
//        $cities = City::pluck('title', 'id');
//        $branches = Branch::pluck('title', 'id');
//        $customers = Customers::all();
        $data = Order::find($id);
//        $branchStop = order_confirmationtop::where('order_id',$data->id)->where('stop_type','branch')->get();
//        $customerStop = order_confirmationtop::where('order_id',$data->id)->where('stop_type','customer')->get();
//        $otherStop = order_confirmationtop::where('order_id',$data->id)->where('stop_type','other')->get();
//dd($branchStop);
//            DB::table('order_confirmation')
//            ->join('order_stops', 'order_confirmation.id', '=', 'order_stops.order_id')
//            ->select('order_confirmation.*', 'order_stops.*')
//            ->where('order_id',$id)
//            ->first();
//        dd($dataStop);
        $user = User::find($data->user_id)->first();

        return view('backend.pages.order_confirmation.edit', compact('data','drivers','user'));
    }


    public function update(Request $request, $id)
    {
//        if (Gate::denies(['update_order_confirmation'])) {
//            abort(404);
//        }


        $data = Order::find($id);
        $data->date = $request->date;
        $data->from_time = $request->from_time;
        $data->to_time = $request->to_time;
        $data->driver_id = $request->driver_id;
        $data->save();


        Session::flash('msg', ' Done! ');
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath') . '/order_confirmation');

    }

    public function statusChange(Request $request)
    {

        \Illuminate\Support\Facades\DB::table('book_dates')
            ->where('id', $request->id)
            ->update(['status_id' => $request->status_id]);
        if ($request->status_id == 1) {
            $color = '#e67e22';

        } else if ($request->status_id == 2) {
            $color = '#2ecc71';

        } else if ($request->status_id == 3) {
            $color = '#e74c3c';
        }

        return $color;
    }


//  public function approve(Request $request , $id , $status)
//  {
//    if ( Gate::denies(['update_order_confirmation'])  ) { abort(404); }
//    $data = Order::find($id);
//    $data->status = $status;
//    $data->save();
//    Session::flash('msg', ' Done! ' );
//    Session::flash('alert', 'success');
//    return back();
//  }
//


//    public function destroy(Request $request, $id)
//    {
////        if (Gate::denies(['delete_order_confirmation'])) {
////            abort(404);
////        }
//
//        Order::find($id)->delete();
//        $order_confirmationtop = order_confirmationtop::where('order_id',$id)->first();
//        $order_confirmationtop->delete();
//        Session::flash('msg', ' Done! ');
//        Session::flash('alert', 'danger');
//        return back();
//    }
//    public function destoryStop( $id)
//    {
////        if (Gate::denies(['delete_order_confirmation'])) {
////            abort(404);
////        }
//
//        order_confirmationtop::find($id)->delete();
//
//        Session::flash('msg', ' Done! ');
//        Session::flash('alert', 'danger');
//        return back();
//    }

//    public function getCustomer()
//    {
//        $q = Input::get('customer');
//
//        $customer = Customers::where('name', 'LIKE', '%' . $q . '%')->first();
//        //dd($customer);
//        return $customer;
//        // echo $customer->name;
////echo   $customer->id;
//
//    }
}
