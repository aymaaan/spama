<?php

namespace App\Http\Controllers\backend;

use App\Customers;
use App\Driver;
use App\Order;
use App\City;
use App\Status;
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

class OrderPendingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
//        if (Gate::denies(['pending'])) {
//            abort(404);
//        }
        $inputs= Input::get ();
        if($inputs){

            $date1 = Input::get ( 'date_from' );
            $date2 = Input::get ( 'date_to' );
            $time1 = Input::get ( 'from_time' );
            $time2 = Input::get ( 'from_time' );
            $driver = Input::get ( 'driver' );
            $user = Input::get ( 'user_id' );
            $statuses = Status::all();
            $drivers = User::where('role','driver')->pluck('name','id');
            $customers = Customers::pluck('name','id');
            $data = Order::query()
                //   ->where('date', 'LIKE', "%$date1%")
                ->where('order_status',1)
                ->whereBetween('date', [$date1, $date2])
                ->orWhere('from_time', $time1)
                ->orWhere('to_time', $time2)
                ->orWhere('driver_id', $driver)
                ->orWhere('user_id', $user)
                //   ->orWhere('date', 'LIKE', "%$date1%")

                ->orderBy('id', 'DESC')->get();

            return view('backend.pages.pending.index', compact('data','drivers','customers','statuses'));

        }
        $customers = Customers::pluck('name','id');
        $drivers = User::where('role','driver')->pluck('name','id');
        $data = Order::where('order_status',1)->orderBy('id', 'DESC')->get();
        $statuses = Status::all();


        return view('backend.pages.pending.index', compact('customers','data','statuses','drivers'));

    }




    public function edit(Request $request, $id)
    {
//        if (Gate::denies(['update_pending'])) {
//            abort(404);
//        }
        $drivers = User::where('role','driver')->pluck('name','id');
//        $cities = City::pluck('title', 'id');
//        $branches = Branch::pluck('title', 'id');
//        $customers = Customers::all();
        $data = Order::find($id);
//        $branchStop = pendingtop::where('order_id',$data->id)->where('stop_type','branch')->get();
//        $customerStop = pendingtop::where('order_id',$data->id)->where('stop_type','customer')->get();
//        $otherStop = pendingtop::where('order_id',$data->id)->where('stop_type','other')->get();
//dd($branchStop);
//            DB::table('pending')
//            ->join('order_stops', 'pending.id', '=', 'order_stops.order_id')
//            ->select('pending.*', 'order_stops.*')
//            ->where('order_id',$id)
//            ->first();
//        dd($dataStop);
        $user = User::find($data->user_id)->first();
        $statuses = Status::all();
        return view('backend.pages.pending.edit', compact('data','drivers','user','statuses'));
    }


    public function update(Request $request, $id)
    {
//        if (Gate::denies(['update_pending'])) {
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
        return Redirect(config('settings.BackendPath') . '/pending');

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








}
