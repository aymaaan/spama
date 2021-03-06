@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-head">
            <div class="card-header">
              <h4 class="card-title"> <B>   {{__('backend.commercial_activities')}}     </B></h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              @can('create_commercial_activities')
              <div class="heading-elements">
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/commercial_activities/create">


                  <button class="btn btn-primary btn">
                    <i class="la la-plus-square-o"></i>    {{__('backend.add_commercial_activities')}}    </button>


                  </a> </div> 
              @endcan


                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <!-- Task List table -->
                  @include('backend.includes.errors')
                  <table id="users-contacts" style='width:100%;' class="table datatable table-hover table-responsive">
                    <thead>
                      <tr>
                        <th> #ID </th>
                        <th>  {{__('backend.arabic_title')}}  </th>
                        <th>  {{__('backend.english_title')}}  </th>
                       
                        <th>  {{__('backend.options')}}  </th>
                        
                        
                        
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ( $data as $k=>$row )

                      <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->title_en}}</td>
                       
 
                        <td>


                          @can('delete_commercial_activities') 
                          <a title="Delete Post" href="{{url(config('settings.BackendPath').'/commercial_activities/'.$row->id.'/delete')}}" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                          @endcan



                          @can('update_commercial_activities') 
                          @if($row->status == 1 )
                          <a title='Block' href="{{url(config('settings.BackendPath').'/commercial_activities/approve/'.$row->id.'/0')}}" class="badge badge badge-success float-right"><i class="la la-check"></i> </a>
                          @else
                          <a title='Publish' href="{{url(config('settings.BackendPath').'/commercial_activities/approve/'.$row->id.'/1')}}" class="badge badge badge-danger float-right"><i class="la la-ban "></i> </a>
                          @endif
                          @endcan


                          @can('update_commercial_activities') 
                              <a href="{{url('')}}/{{config('settings.BackendPath')}}/commercial_activities/{{$row->id}}/edit" class="badge badge badge-info float-right"><i class="la la-pencil"></i> </a>
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

      <title> {{__('backend.commercial_activities')}} | {{config('settings.sitename')}}</title>

      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
      rel="stylesheet">
      <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
      rel="stylesheet">
      <!-- BEGIN VENDOR CSS-->
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/vendors.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/weather-icons/climacons.min.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/fonts/meteocons/style.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/morris.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/chartist.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
      <!-- END VENDOR CSS-->
      <!-- BEGIN MODERN CSS-->
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/app.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/custom-rtl.css">
      <!-- END MODERN CSS-->
      <!-- BEGIN Page Level CSS-->
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/fonts/simple-line-icons/style.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/pages/timeline.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/pages/dashboard-ecommerce.css">
      <!-- END Page Level CSS-->
      <!-- BEGIN Custom CSS-->
      <link rel="stylesheet" type="text/css" href="assets/css/style-rtl.css">
      <!-- END Custom CSS-->

      @endsection

      @section('scripts')

      <!-- BEGIN VENDOR JS-->
      <script src="{{url('')}}/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
      <!-- BEGIN VENDOR JS-->
      <!-- BEGIN PAGE VENDOR JS-->
      <script src="{{url('')}}/assets/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"
      type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
      <!-- END PAGE VENDOR JS-->
      <!-- BEGIN MODERN JS-->
      <script src="{{url('')}}/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/js/core/app.js" type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
      <!-- END MODERN JS-->
      <!-- BEGIN PAGE LEVEL JS-->
      <script src="{{url('')}}/assets/app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
      <!-- END PAGE LEVEL JS-->

      @endsection