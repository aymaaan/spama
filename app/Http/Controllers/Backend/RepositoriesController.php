<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories;
use Session;
use Gate;


class RepositoriesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(Request $request)
  {
    if ( Gate::denies(['repositories'])  ) { abort(404); }
  
    $data = Repositories::paginate(15);
  
    return view('backend.pages.repositories.index' , compact('data') );
  }



  public function create(Request $request)
  {
   if ( Gate::denies(['create_repositories'])  ) { abort(404); }

   return view('backend.pages.repositories.create' );
 }


 public function store(Request $request)
 {

  if ( Gate::denies(['create_repositories'])  ) { abort(404); }

  $data = new Repositories;
  $data->title_ar =  $request->title_ar;
  $data->title_en =  $request->title_en;
  $data->address =  $request->address;
  $data->repository_keeper =  $request->repository_keeper;
  $data->repository_capacity =  $request->repository_capacity;
  $data->notes =  $request->notes;
  $data->save();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect( config('settings.BackendPath').'/repositories');
  }



  public function edit(Request $request , $id)
  {
    if ( Gate::denies(['update_repositories'])  ) { abort(404); }
    $data  = Repositories::find($id);

    return view('backend.pages.repositories.edit', compact('data')  ); 
  }



  public function update(Request $request, $id)
  {
    if ( Gate::denies(['update_repositories'])  ) { abort(404); }


    $data = Repositories::find($id);
    $data->title_ar =  $request->title_ar;
    $data->title_en =  $request->title_en;
    $data->address =  $request->address;
    $data->repository_keeper =  $request->repository_keeper;
    $data->repository_capacity =  $request->repository_capacity;
    $data->notes =  $request->notes;
    $data->save();
 

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return Redirect(config('settings.BackendPath').'/repositories');

  }



  public function approve(Request $request , $id , $status)
  {
    if ( Gate::denies(['update_repositories'])  ) { abort(404); }
    $data = Repositories::find($id);
    $data->status = $status;
    $data->save();
    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'success');
    return back();
  }
  

  
  
  public function destroy(Request $request , $id )
  {
    if ( Gate::denies(['delete_repositories'])  ) { abort(404); }
    
    Repositories::find($id)->delete();

    Session::flash('msg', ' Done! ' );
    Session::flash('alert', 'danger');
    return back();
  }
  
  
  
  
  
  

}
