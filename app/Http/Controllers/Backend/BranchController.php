<?php

namespace App\Http\Controllers\backend;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Session;
use Gate;


class BranchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        //if ( Gate::denies(['branches'])  ) { abort(404); }

        $data = Branch::get();

        return view('backend.pages.branches.index', compact('data'));
    }


    public function create(Request $request)
    {
        //if ( Gate::denies(['create_branches'])  ) { abort(404); }

        return view('backend.pages.branches.create');
    }


    public function store(Request $request)
    {

        //if ( Gate::denies(['create_branches'])  ) { abort(404); }


        $data = new Branch;
        $data->title = $request->title;
        $data->title_en = $request->title_en;
        $data->address = $request->autocomplete_search;
        $data->save();


        Session::flash('msg', ' Done! ');
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath') . '/branches');
    }


    public function edit(Request $request, $id)
    {
        if (Gate::denies(['update_branches'])) {
            abort(404);
        }
        $data = Branch::find($id);

        return view('backend.pages.branches.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        if (Gate::denies(['update_branches'])) {
            abort(404);
        }


        $data = Branch::find($id);
        $data->title = $request->title;
        $data->title_en = $request->title_en;
        $data->address = $request->autocomplete_search;
        $data->save();


        Session::flash('msg', ' Done! ');
        Session::flash('alert', 'success');
        return Redirect(config('settings.BackendPath') . '/branches');

    }



//  public function approve(Request $request , $id , $status)
//  {
//    if ( Gate::denies(['update_branches'])  ) { abort(404); }
//    $data = Branch::find($id);
//    $data->status = $status;
//    $data->save();
//    Session::flash('msg', ' Done! ' );
//    Session::flash('alert', 'success');
//    return back();
//  }
//


    public function destroy(Request $request, $id)
    {
        if (Gate::denies(['delete_branches'])) {
            abort(404);
        }

        Branch::find($id)->delete();

        Session::flash('msg', ' Done! ');
        Session::flash('alert', 'danger');
        return back();
    }


}
