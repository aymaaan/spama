<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Language;
use Session;
use Gate;
use Cache;


class LanguagesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }



  public function getAllwords($lang){

    $data = \File::getRequire(base_path().'/resources/lang/'.$lang.'/backend.php');
    
    return view('backend.pages.languages.words' , compact('data','lang') );
    
    }


    public function postAllwords(Request $request , $lang) {
      $array = [];
      foreach (\File::getRequire(base_path().'/resources/lang/'.$lang.'/backend.php') as $k=>$row) {
    
      $array[$k] = $request[$k];

      }
      $data = var_export($array, 1);
      if(\File::put(base_path() . "/resources/lang/".$lang."/backend.php", "<?php\n return $data ;")) {
      }
      Session::flash('msg', 'تم تحديث الاعدادات');
      Session::flash('alert', 'success');
      return Redirect(config('settings.BackendPath').'/languages');
      
      }

  public function index(Request $request)
  {
    if ( Gate::denies(['languages'])  ) { abort(404); }
  
    $data = Language::get();
  
    return view('backend.pages.languages.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_languages'])  ) { abort(404); }
   return view('backend.pages.languages.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_languages'])  ) { abort(404); }


  $data = new Language;
  $data->title =  $request->title;
  $data->code =  $request->code;
  $data->save();
  
  \File::makeDirectory('resources/lang/'.$request->code);
  \File::copy(base_path('resources/lang/en/backend.php'),base_path('resources/lang/'.$request->code.'/backend.php'));

   Cache::forget('LanguageList');
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/languages');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_languages'])  ) { abort(404); }
    $data  = Language::find($id);

    return view('backend.pages.languages.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_languages'])  ) { abort(404); }


    $data = Language::find($id);
    $data->title =  $request->title;
    $data->code =  $request->code;
    $data->save();
 
    Cache::forget('LanguageList');
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/languages');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_languages'])  ) { abort(404); }
    $data = Language::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    Cache::forget('LanguageList');
    return back();
  }
  

  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_languages'])  ) { abort(404); }
    
    Language::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');

    Cache::forget('LanguageList');
    return back();
  }
  


}