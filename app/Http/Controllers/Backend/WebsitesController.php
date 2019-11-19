<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Websites;
use App\WebsitesFields;
use Session;
use Gate;


class WebsitesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['websites'])  ) { abort(404); }
  
    $data = Websites::get();
  
    return view('backend.pages.websites.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_websites'])  ) { abort(404); }

   return view('backend.pages.websites.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_websites'])  ) { abort(404); }


  $data = new Websites;
  $data->title =  $request->title;
  $data->title_en =  $request->title_en;
  $data->save();


if($data->save()) {


    foreach ($request->field_type as $key => $type) {
     
        if ($type != '') {
        $WebsitesFields = new WebsitesFields; 
        $WebsitesFields->name = str_replace(' ','_',$request->label_en[$key].'_'.$data->id);
        $WebsitesFields->label_ar = $request->label_ar[$key];
        $WebsitesFields->label_en = $request->label_en[$key];
        $WebsitesFields->websites_id = $data->id;
        $WebsitesFields->field_type = $type;
        $WebsitesFields->section = 'products';
        $WebsitesFields->selected_options = $request->selected_options[$key];
        $WebsitesFields->save();
     
        }
     
         }


         foreach ($request->field_type_categories as $key => $type) {

          dd('dd');
     
          if ($type != '') {
          $WebsitesFields = new WebsitesFields; 
          $WebsitesFields->name = str_replace(' ','_',$request->label_en_categories[$key].'_'.$data->id);
          $WebsitesFields->label_ar = $request->label_ar_categories[$key];
          $WebsitesFields->label_en = $request->label_en_categories[$key];
          $WebsitesFields->websites_id = $data->id;
          $WebsitesFields->field_type = $type;
          $WebsitesFields->section = 'categories';
          $WebsitesFields->selected_options = $request->selected_options_categories[$key];
          $WebsitesFields->save();
       
          }
       
           }





}
  





    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/websites');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_websites'])  ) { abort(404); }
    $data  = Websites::find($id);
    return view('backend.pages.websites.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_websites'])  ) { abort(404); }


    $data = Websites::find($id);
    $data->title =  $request->title;
    $data->title_en =  $request->title_en;
    if($data->save()) {

        $delegates = WebsitesFields::where('websites_id' , $data->id )->delete(); 
        foreach ($request->field_type as $key => $type) {
         
            if ($type != '') {
            $WebsitesFields = new WebsitesFields; 
            $WebsitesFields->name = str_replace(' ','_',$request->label_en[$key].'_'.$data->id);
            $WebsitesFields->label_ar = $request->label_ar[$key];
            $WebsitesFields->label_en = $request->label_en[$key];
            $WebsitesFields->websites_id = $data->id;
            $WebsitesFields->field_type = $type;
            $WebsitesFields->selected_options = $request->selected_options[$key];
            $WebsitesFields->save();
         
            }
         
             }



             
         foreach ($request->field_type_categories as $key => $type) {

     
          if ($type != '') {
          $WebsitesFields = new WebsitesFields; 
          $WebsitesFields->name = str_replace(' ','_',$request->label_en_categories[$key].'_'.$data->id);
          $WebsitesFields->label_ar = $request->label_ar_categories[$key];
          $WebsitesFields->label_en = $request->label_en_categories[$key];
          $WebsitesFields->websites_id = $data->id;
          $WebsitesFields->field_type = $type;
          $WebsitesFields->section = 'categories';
          $WebsitesFields->selected_options = $request->selected_options_categories[$key];
          $WebsitesFields->save();
       
          }
       
           }




           
    
    }
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/websites');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_websites'])  ) { abort(404); }
    $data = Websites::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_websites'])  ) { abort(404); }
    
    Websites::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  public function websites_fields_destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_websites'])  ) { abort(404); }
    
    WebsitesFields::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  

}
