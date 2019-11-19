@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-head">
            <div class="card-header">
              <h4 class="card-title"> <B>   {{__('backend.coupons')}} | {{$coupoun_name}} </B></h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              @can('create_coupons')



              <div class="heading-elements">
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/coupons/create?campaign_title={{str_replace(' ','-', $coupoun_name)}}">


                  <button class="btn btn-primary btn">
                    <i class="la la-plus-square-o"></i>    {{__('backend.add_coupons')}}    </button>


                  </a> 


                
<a href="{{url('')}}/{{config('settings.BackendPath')}}/coupons/qr/{{$coupoun_name}}">


<button class="btn btn-info btn">
  <i class="la la-download"></i>    {{__('backend.download_qr')}}    </button>


</a> 

                  
                  
                 
<a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/coupons/print/{{str_replace(' ','-', $coupoun_name)}}">


<button class="btn btn-info btn">
  <i class="la la-print"></i>    {{__('backend.print')}}    </button>


</a> 




<a href="{{ url('') }}/{{config('settings.BackendPath')}}/export_excel/export_coupons/{{$coupoun_name}}" >
<button  class="btn btn-warning btn">
<i class="la la-cloud-download"></i>   {{ __('backend.export') }} 
</button>
</a>
                  
                  
                  
                  
                  </div> 







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
                        
                        
                        <th>  {{__('backend.code')}}  </th>
                        <th>  {{__('backend.discount_amount')}}  </th>
                        <th>  {{__('backend.discount_type')}}  </th>
                        <th>  {{__('backend.products')}}  </th>
                        
                        <th>  {{__('backend.start_date')}}  </th>
                        <th>  {{__('backend.end_date')}}  </th>
                        <th>  {{ __('backend.options')}}  </th>
                        
                        
                        
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ( $data as $row )

                      <tr>
                        
                       
                        <td>

                        
                         <a data-toggle="modal" data-target="#QrModal{{$row->id}}" href="#"> {{$row->code}} </a></td>
                        <td>{{$row->amount}}</td>
                        <td> {{ __('backend.'.$row->type) }}  </td>
                        <td>
                        
                        
                        @if($row->all_products == 1) 
<button class="btn btn-success btn">
     {{__('backend.all_products')}}  </button>
                        @else 
                 <a data-toggle="modal" data-target="#exampleModal{{$row->id}}" href="#">
                  <button class="btn btn-info btn">
                     {{__('backend.products')}} 
                     <span class="badge badge badge-dark  badge-pill float-right mr-2">{{count($row->products)}}</span>
                      </button>
                  </a>

                

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel{{$row->id}}"> {{__('backend.products')}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<ul>
@foreach($row->products as $product)
<li>
<a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/product/{{$row->id}}"> {{$product->product['sku']}} </a> - {{$product->product['title_ar']}} 
</li>
@endforeach
</ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


                        @endif                       
                        </td>



<!-- Modal -->
<div class="modal fade" id="QrModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="QrModal{{$row->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="QrModal{{$row->id}}"> {{__('backend.qr_code')}} | {{$row->code}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="text-align:center" class="modal-body">

      {!! QrCode::size(250)->generate($row->code); !!}

    <h3 style="text-align:center"> {{$row->code}}</h3>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>



<td>{{$row->start_date}}</td>
<td>{{$row->end_date}}</td>
                        <td>


                          @can('delete_coupons') 
                          <a title="Delete coupons" href="{{url(config('settings.BackendPath').'/coupons/'.$row->id.'/delete')}}" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                          @endcan



                          @can('update_coupons') 
                          @if($row->status == 1 )
                          <a title='Block coupons' href="{{url(config('settings.BackendPath').'/coupons/approve/'.$row->id.'/0')}}" class="badge badge badge-success float-right"><i class="la la-check"></i> </a>
                          @else
                          <a title='Publish coupons' href="{{url(config('settings.BackendPath').'/coupons/approve/'.$row->id.'/1')}}" class="badge badge badge-danger float-right"><i class="la la-ban "></i> </a>
                          @endif
                          @endcan


                          @can('update_coupons') 
                              <a href="{{url('')}}/{{config('settings.BackendPath')}}/coupons/{{$row->id}}/edit" class="badge badge badge-info float-right"><i class="la la-pencil"></i> </a>
                           @endcan


                        </td>


                      </tr>

                      @endforeach


                    </table>

                    {{$data->links()}}
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>


      @endsection


      @section('head')

      <title> {{__('backend.coupons')}} | {{config('settings.sitename')}}</title>

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