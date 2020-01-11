@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-head">
            <div class="card-header">
              <h4 class="card-title"> <B>   {{ __('backend.departments') }}    </B></h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              @can('create_departments')
              <div class="heading-elements">
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/departments/create">


                  <button class="btn btn-primary btn">
                    <i class="la la-plus-square-o"></i>   {{ __('backend.add_departments') }}      </button>


                  </a> </div> 
              @endcan


                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <!-- Task List table -->
                  @include('backend.includes.errors')
                  <table class="table table-striped table-bordered default-ordering">
                    <thead>
                      <tr>
                        
                        @if( Auth::user()->display_content_ar == 1 )
                        <th>{{ __('backend.arabic_title') }}</th>
                        @endif
                        @if( Auth::user()->display_content_en == 1 )
                      <th>{{ __('backend.english_title') }}</th>
                       @endif
                        <th> {{ __('backend.parent_section') }}  </th>
                        <th> {{ __('backend.direct_manager') }}  </th>
                        <th> {{ __('backend.options') }}  </th>
                        
                        
                        
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ( $data as $row )

                      <tr>
                       
                        @if( Auth::user()->display_content_ar == 1 )
                        <td>{{$row->title}}</td>
                        @endif
                        @if( Auth::user()->display_content_en == 1 )
                         <td style="text-align:left;">{{$row->title_en}}</td>
                         @endif

                         <td>{{ $row->parentSection['title'] ?? __('backend.master_department') }}</td>

                         <td>{{$row->DirectManager['name']}}</td>
 
                        <td>


                          @can('delete_departments') 
                          <a title="Delete Post" href="{{url(config('settings.BackendPath').'/departments/'.$row->id.'/delete')}}" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                          @endcan



                          @can('update_departments') 
                          @if($row->status == 1 )
                          <a title='Block departments' href="{{url(config('settings.BackendPath').'/departments/approve/'.$row->id.'/0')}}" class="badge badge badge-success float-right"><i class="la la-check"></i> </a>
                          @else
                          <a title='Publish departments' href="{{url(config('settings.BackendPath').'/departments/approve/'.$row->id.'/1')}}" class="badge badge badge-danger float-right"><i class="la la-ban "></i> </a>
                          @endif
                          @endcan


                          @can('update_departments') 
                              <a href="{{url('')}}/{{config('settings.BackendPath')}}/departments/{{$row->id}}/edit" class="badge badge badge-info float-right"><i class="la la-pencil"></i> </a>
                           @endcan


                        </td>


                      </tr>

                      @endforeach


                    </table>
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>


      @endsection


      @section('head')

      <title>  {{ __('backend.departments') }}   | {{config('settings.sitename')}}</title>

      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
      rel="stylesheet">
      
      
      <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/vendors.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/tables/datatable/datatables.min.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/app.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/custom-rtl.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/css/style-rtl.css">
  <!-- END Custom CSS-->


      @endsection

      @section('scripts')

   

    <script src="{{url('')}}/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{url('')}}/assets/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{url('')}}/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="{{url('')}}/assets/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{url('')}}/assets/app-assets/js/scripts/tables/datatables/datatable-basic.js"
  type="text/javascript"></script>



      @endsection