@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-head">
            <div class="card-header">
              <h4 class="card-title">
              
              {{ __('backend.mother_products') }}    
              
              | 

              @if( $AppLangUser == 'ar' )
              {{$category->title OR '' }} 
              @else
              {{$category->title_en OR ''}}
              @endif
              
               | <B>  {{ __('backend.features') }}  <B>
               
                  
                  
                  </h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              @can('create_features_products')
              
              <div class="heading-elements">
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/features-products/create?cat={{$_GET['cat']}}">
                  <button class="btn btn-primary btn">
                    <i class="la la-plus-square-o"></i>    {{ __('backend.add_feature') }}          </button>
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
                        <th> ID </th>
                        <th> {{ __('backend.name') }}   </th>
                        
                        
                        <th>  {{ __('backend.sort') }} </th>

                        <th> {{ __('backend.options') }} </th>
                        
                        
                        
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ( $data as $k=>$row )

                      <tr>
                        <td>{{$k + 1 }}</td>
                        <td>{{$row->title}}</td>


<td>
<select  class="form-control" onchange="if( this.options[this.selectedIndex].value != '' ) location.href=this.options[this.selectedIndex].value;">


  <option> {{ $row->order_list OR __('backend.sort')  }} </option>
  
  @for ($i = 1; $i <= count($data) ; $i++)
  
  @if ($i != $row->order_list )
  
  <option  value="{{url(config('settings.BackendPath').'/features-products/order_list/'. $row->id.'/'.$i)}}">{{$i}}</option>
  
  @endif
  
  
  @endfor
  
  
</select>
      </td>                 
                        
 
                        <td>


                          @can('delete_features_products') 
                          <a title="Delete Post" href="{{url(config('settings.BackendPath').'/features-products/'.$row->id.'/delete')}}" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                          @endcan



                          @can('update_features_products') 
                          @if($row->status == 1 )
                          <a title='Block features' href="{{url(config('settings.BackendPath').'/features-products/approve/'.$row->id.'/0')}}" class="badge badge badge-success float-right"><i class="la la-check"></i> </a>
                          @else
                          <a title='Publish features' href="{{url(config('settings.BackendPath').'/features-products/approve/'.$row->id.'/1')}}" class="badge badge badge-danger float-right"><i class="la la-ban "></i> </a>
                          @endif
                          @endcan



                           @can('update_features_products') 
                              <a href="{{url('')}}/{{config('settings.BackendPath')}}/features-products/{{$row->id}}/edit" class="badge badge badge-info float-right"><i class="la la-pencil"></i> </a>
                           @endcan


                  @can('features_products') 

                  <a href="{{url('')}}/{{config('settings.BackendPath')}}/sub-features-products?cat={{$row->id}}">
                  <button class="btn btn-success btn">
                  {{ __('backend.values') }}   <span class="badge badge badge-dark  badge-pill float-right mr-2"> {{ count( $row->sub_features )}}  </span></button>
                  </a> 
                  
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

      <title> {{ __('backend.features') }}  | {{config('settings.sitename')}}</title>

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