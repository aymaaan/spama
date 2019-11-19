<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssessmentQuestions;
use Session;
use Gate;


class AssessmentQuestionsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['assessment_questions'])  ) { abort(404); }
  
    $data = AssessmentQuestions::get();
  
    return view('backend.pages.assessment_questions.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_assessment_questions'])  ) { abort(404); }

   return view('backend.pages.assessment_questions.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_assessment_questions'])  ) { abort(404); }


  $data = new AssessmentQuestions;
  $data->title =  $request->title;
 
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    //return Redirect( config('settings.BackendPath').'/assessment_questions');
    return back();
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_assessment_questions'])  ) { abort(404); }
    $data  = AssessmentQuestions::find($id);

    return view('backend.pages.assessment_questions.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_assessment_questions'])  ) { abort(404); }


    $data = AssessmentQuestions::find($id);
    $data->title =  $request->title;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    //return Redirect(config('settings.BackendPath').'/assessment_questions');
    return back();
  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_assessment_questions'])  ) { abort(404); }
    $data = AssessmentQuestions::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_assessment_questions'])  ) { abort(404); }
    
    AssessmentQuestions::find($id)->delete();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
