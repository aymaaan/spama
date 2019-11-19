<?php

namespace App\Http\Controllers\backend;
use App\City;
use App\Driver;
use App\DriverPhotos;
use App\Language;
use App\Nationality;
use App\ProductsComplementary;
use App\ProductsPhotos;
use App\ProductsRepositories;
use App\ProductsSuppliers;
use App\ProductsUnits;
use App\ProductsWebsitesFields;
use App\ProductsWebsitesFieldsFiles;
use App\Websites;
use Illuminate\Http\Request;
use App\Http\Requests\DriverRequest ;
use App\Http\Controllers\Controller;
use App\User;
use App\VerifyUser;
use App\Mail\VerifyMail;
use Auth;
use Session;
use Hash;
use Gate;
use Cache;
use DB;
define('DESTINATION_UPLOAD_drivers_PHOTOS', 'assets/uploads/drivers/');


class DriverController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

  }


  public function index(Request $request)
  {
   // if ( Gate::denies(['drivers'])  ) { abort(404); }
 
    $drivers = User::orderby('id','desc')->where('role' , 'driver')->with('driver')->paginate(30);
   // dd($drivers);
    return view('backend.pages.drivers.index' , compact('drivers') );
  }



  
  
  
  public function create()
  {
  // if ( Gate::denies(['drivers','create_drivers'])  ) { abort(404); }

   $city = City::pluck('title' , 'id');
   $nationality = Nationality::pluck('title' , 'id');
   $language = Language::pluck('title' , 'code');
   return view('backend.pages.drivers.create' ,compact('city','nationality','language'));
 }


 public function store(DriverRequest $request)
 {
 // if ( Gate::denies(['drivers','create_drivers'])  ) { abort(404); }
//dd($request->toArray());  

   $check_user = User::where('email' , $request->email )->first();
  
  if( $check_user && $check_user->role == 'driver') {
      
  Session::flash('msg', ' هذا البريد الالكتروني مسجل من قبل لسائق  اخر ' );
  Session::flash('alert', 'danger');
  return back();
  
  }
  
 $user = new User;
  $user-> name = $request->name;
  $user-> email = $request->email;
  $user-> phone = $request->phone;
  $user-> password = Hash::make($request->password);
  $user-> role = 'driver';
  $user-> job = 'driver';
  $user-> save();

     $driver = new Driver();
     $driver->address = $request->autocomplete_search;
    // $driver->lat = $request->lat ;
     //$driver->long = $request->long ;
     $driver->city_id = $request->city_id ;
     $driver->nationality_id = $request->	nationality_id ;
     $driver->id_number = $request->id_number ;
     $driver->language = $request->language ;
     $driver->BOD = $request->BOD ;
    // $driver->user_id = $user->id ;
     $driver->work_type = $request->work_type ;
     $driver->from_time = $request->from_time ;
     $driver->to_time = $request->to_time ;
     if (is_array($request->input('days_work')) || is_object($request->input('days_work')))
{
     foreach ($request->input('days_work') as $itm){
           // dd($itm);
         // $var = $var . ','  . $item;
      
          $driver->days_work = $itm ;
     }
}

     if ( $request->photo ) {

             $driver_photo = $request->photo;

      

                 $extension = $driver_photo->getClientOriginalExtension();
                 $destinationPath = 'uploads/driver_photos/' ;

                 $var = date_create();
                 $time = date_format($var, 'YmdHis');
                 $filename = $time .".".$extension;
                 $driver_photo->move($destinationPath , $filename);

       
//dd($products_photo);
        
 $driver->photo = $filename;

             }
            
     if( $driver->save() ){

//dd($request->driver_photos);

         if ( $request->driver_photos ) {

             $driver_photos = $request->driver_photos;

             foreach ($driver_photos as $k=>$driver_photo) {

                 $extension = $driver_photo->getClientOriginalExtension();
                 $destinationPath = 'uploads/driver_photos/'.$driver->id ;

                 $var = date_create();
                 $time = date_format($var, 'YmdHis');
                 $filename = $time .".".$extension;
                 $driver_photo->move($destinationPath , $filename);

                 $drivers_photo = new DriverPhotos();
                 $drivers_photo->driver_id = $driver->id;
                 $drivers_photo->photo_name = $filename;
//dd($products_photo);
                 $drivers_photo->save();


             }

         }





     }
  Session::flash('msg', ' Done! ' );
  Session::flash('alert', 'success');
  return Redirect(config('settings.BackendPath').'/drivers');
}



public function edit($id)
{
 // if ( Gate::denies(['drivers','update_drivers'])  ) { abort(404); }
    //dd($id);
    $data = DB::table('users')
        ->join('drivers', 'users.id', '=', 'drivers.user_id')
        ->select('users.*', 'drivers.*')
        ->where('user_id',$id)
        ->get();
   // dd($data);


    $data2 = Driver::where('user_id',$id)->first();
    $city = City::pluck('title' , 'id');
    $nationality = Nationality::pluck('title' , 'id');
    $language = Language::pluck('title' , 'code');

   

  return view('backend.pages.drivers.edit', compact('data','data2','nationality','city','language')  );
}


public function update(DriverRequest $request,$id)
{
 // if ( Gate::denies(['drivers','update_drivers'])  ) { abort(404); }
  $user= User::find($id);
  //dd($user);
  $user->name = $request->name;
  $user->email = $request->email;
  $user->phone = $request->phone;
  $user->save();

       $data = Driver::where('user_id',$id)->first();
       
      $driver= Driver::find($data->id);
     $driver->address = $request->autocomplete_search;
    // $driver->lat = $request->lat ;
    // $driver->long = $request->long ;
     $driver->city_id = $request->city_id ;
     $driver->nationality_id = $request->	nationality_id ;
     $driver->id_number = $request->id_number ;
     $driver->language = $request->language ;
     $driver->BOD = $request->BOD ;
     $driver->user_id = $user->id ;
        $driver->work_type = $request->work_type ;
     $driver->from_time = $request->from_time ;
     $driver->to_time = $request->to_time ;
if ( $request->photo ) {

             $driver_photo = $request->photo;

      

                 $extension = $driver_photo->getClientOriginalExtension();
                 $destinationPath = 'uploads/driver_photos/' ;

                 $var = date_create();
                 $time = date_format($var, 'YmdHis');
                 $filename = $time .".".$extension;
                 $driver_photo->move($destinationPath , $filename);

       
//dd($products_photo);
        
 $driver->photo = $filename;

             }

                  
  if( $driver->save() ){

if ( $request->driver_photos ) {

             $driver_photos = $request->driver_photos;

             foreach ($driver_photos as $k=>$driver_photo) {

                 $extension = $driver_photo->getClientOriginalExtension();
                 $destinationPath = 'uploads/driver_photos/'.$driver->id ;

                 $var = date_create();
                 $time = date_format($var, 'YmdHis');
                 $filename = $time .".".$extension;
                 $driver_photo->move($destinationPath , $filename);

                 $drivers_photo = new DriverPhotos();
                 $drivers_photo->driver_id = $driver->id;
                 $drivers_photo->photo_name = $filename;
//dd($products_photo);
                 $drivers_photo->save();


             }
}
         }

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/drivers');

  }




  public function block($id , $action)
{

  if ( Gate::denies(['drivers','block_user'])  ) { abort(404); }
  $user= User::find($id);
  $user->status = $action;
  $user->save();

  Session::flash('msg', ' Done! ');
  Session::flash('alert', 'success');
  return redirect()->back();

}

  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_drivers'])  ) { abort(404); }
    $data = User::find($id);
    $data->status = $status;
   $data->save();
   Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }


   public function destroy($id)
  {

    if ( Gate::denies(['delete_drivers'])  ) { abort(404); }
    
    
    $user = User::find($id);
    $user->delete();
    $drive = Driver::where('user_id',$id)->first();
    $drive->delete();
    Session::flash('msg', 'Done!' );
    Session::flash('alert', 'success');
    return back();

  }




}