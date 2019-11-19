<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class HomeController extends Controller
{

    
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
     
 
public function index(Request $request , $lang = null)
{
$lang = LangUser($lang);


//return view('frontend.pages.index'  );	
return Redirect( config('settings.BackendPath').'/');
	
}




	
}
