<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate,Session,File;
use App\Language;
define('DESTINATION_UPLOAD_LOGO', 'assets/');

class SettingsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

  }


  public function index()
  {
 

    if ( Gate::denies('settings')  ) { abort(404); }

    $languages = Language::pluck('title','code');

    /*
    foreach (\File::getRequire(base_path().'/resources/lang/ar/frontend.php') as $row) {
      
      echo $row.'</br>';
      
          }
      
      die();
      */

    return view('backend.pages.settings.settings.index'  , compact('languages'));
  }

  public function update(Request $request)
  {
      
 
    $array = \Config::get('settings');

    $array['sitename'] = $request->sitename;
    $array['siteurl'] = $request->siteurl;
    $array['order_email'] = $request->order_email;
    $array['sms_notifications'] = $request->sms_notifications;
    $array['createdby'] = $request->createdby;
    $array['site_email'] = $request->site_email;
    $array['DefaultLanguage'] = $request->default_language;
    $array['order_sms'] = $request->order_sms;
    $array['general_manager_sms'] = $request->general_manager_sms;
    $array['general_manager_email'] = $request->general_manager_email;
    $array['username_msegat'] = $request->username_msegat;
    $array['apikey_msegat'] = $request->apikey_msegat;
    $array['sender_msegat'] = $request->sender_msegat;
    $array['send_sms_from_time'] = $request->send_sms_from_time;
    $array['send_sms_to_time'] = $request->send_sms_to_time;
   

    if ($request->file('logo') ) {
    $file= $request->file('logo');
    $extension = $file->getClientOriginalExtension();
    $destinationPath = DESTINATION_UPLOAD_LOGO;
    $filename = "logo.".$extension;
    $file->move($destinationPath , $filename);
    $array['logo'] = DESTINATION_UPLOAD_LOGO . $filename ;
    }


    if ($request->file('logo_form') ) {
    $file= $request->file('logo_form');
    $extension = $file->getClientOriginalExtension();
    $destinationPath = DESTINATION_UPLOAD_LOGO;
    $filename = "logo_form.".$extension;
    $file->move($destinationPath , $filename);
    $array['logo_form'] = DESTINATION_UPLOAD_LOGO . $filename ;
    }



    if ($request->file('logo_background') ) {
    $file= $request->file('logo_background');
    $extension = $file->getClientOriginalExtension();
    $destinationPath = DESTINATION_UPLOAD_LOGO;
    $filename = "logo_background.".$extension;
    $file->move($destinationPath , $filename);
    $array['logo_background'] = DESTINATION_UPLOAD_LOGO . $filename ;
    }


    if ($request->file('loading') ) {
    $file= $request->file('loading');
    $extension = $file->getClientOriginalExtension();
    $destinationPath = DESTINATION_UPLOAD_LOGO;
    $filename = "loading.".$extension;
    $file->move($destinationPath , $filename);
    $array['loading'] = DESTINATION_UPLOAD_LOGO . $filename ;
    }



    $data = var_export($array, 1);
    if(File::put(base_path() . '/config/settings.php', "<?php\n return $data ;")) {
    }
    

    Session::flash('msg', ' Done!   ');
    Session::flash('alert', 'success');

    $languages = Language::pluck('title','code');
    return view('backend.pages.settings.settings.index'  , compact('languages'));


  }


}
