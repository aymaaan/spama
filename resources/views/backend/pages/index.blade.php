@extends('backend.layouts.default')

@section('content')

<div class="app-content content"> 
    <div class="content-wrapper">

      <div class="content-header row">
           

      </div>


      <div class="content-body">
        <!-- eCommerce statistic -->

     
        <div class="row">


<div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="{{url(config('settings.BackendPath'))}}/products/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> {{$totalProducts}} </h3>
                      <h5> {{ __('backend.add_product') }} </h5>
                    </div>
                    <div>
                      <i class="icon-basket-loaded info font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>



<div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="{{url(config('settings.BackendPath'))}}/mother-products/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> {{$totalMotherProducts}} </h3>
                      <h5>{{ __('backend.add_mother_product') }}</h5>
                    </div>
                    <div>
                      <i class="icon-basket-loaded info font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>


<div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="{{url(config('settings.BackendPath'))}}/suppliers/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> {{$totalSuppliers}} </h3>
                      
                      <h5>{{ __('backend.add_supplier') }}</h5>
                    </div>
                    <div>
                      <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>



<div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="{{url(config('settings.BackendPath'))}}/categories/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> {{$totalCategories}} </h3>
                     
                      <h5>{{ __('backend.add_category') }}</h5>
                      
                    </div>
                    <div>
                      <i class="icon-pie-chart warning font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>

<div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="{{url(config('settings.BackendPath'))}}/brands/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> {{$totalBrands}}  </h3>
                      <h5>{{ __('backend.add_brand') }}</h5>
                    </div>
                    <div>
                      <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>

          

          <div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="{{url(config('settings.BackendPath'))}}/coupons/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> {{count($totalCoupons)}} </h3>
                      
                      <h5>{{ __('backend.add_coupons') }}</h5>
                    </div>
                    <div>
                      <i class="icon-screen-tablet success font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="{{url(config('settings.BackendPath'))}}/assessment">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> {{count($totalAssessment)}} </h3>
                      
                      <h5>{{ __('backend.assessment') }}</h5>
                    </div>
                    <div>
                      <i class="icon-book-open success font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>

        </div>

        <!--/ eCommerce statistic -->
      
        <!--/ Products sell and New Orders -->
        <!-- Recent Transactions -->
        
        <div class="row">
        
          <div id="recent-transactions" class="col-12">
          @include('backend.includes.errors')
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">{{ __('backend.latest_products') }}</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                
                
                
              </div>
              <div class="card-content">
                <div class="table-responsive">

 <table id="users-contacts" style='width:100%;' class="table datatable table-hover ">
                        <thead>


                          <tr>


                            <th>SKU</th>
                           @if( Auth::user()->display_content_ar == 1 )
                            <th>{{ __('backend.arabic_title') }}</th>
                            @endif
                            @if( Auth::user()->display_content_en == 1 )
                            <th>{{ __('backend.english_title') }}</th>
                            @endif
                             <th>{{ __('backend.category') }}</th>
                             <th>{{ __('backend.brand') }}</th>
                             <th>{{ __('backend.mother_product') }}</th>

                          </tr>

                        </thead>
                        <tbody>


@foreach ( $products_data as $row)
                          <tr>

                            <td> {{$row->sku}} </td>
                            @if( Auth::user()->display_content_ar == 1 )
                            <td> {{$row->title_ar}} </td>
                            @endif
                            @if( Auth::user()->display_content_en == 1 )
                            <td style="text-align:left;"> {{$row->title_en}} </td>
                            @endif

                            <td> 
                            @if( Auth::user()->display_content_ar == 1 )
                            {{$row->category['title']}} <br>
                            @endif
                            @if( Auth::user()->display_content_en == 1 ) 
                            <div style="text-align:left;"> {{$row->category['title_en']}} </div>
                            @endif
                             </td>

                            <td>
                            @if( Auth::user()->display_content_ar == 1 )
                            {{$row->brand['title']}} <br>
                            @endif
                            @if( Auth::user()->display_content_en == 1 ) 
                            {{$row->brand['title_en']}}
                            @endif 
                            
                            </td>
                            
                            <td>

                            @if( Auth::user()->display_content_ar == 1 )
                            {{$row->mother_product['title']}} <br>
                            @endif
                            @if( Auth::user()->display_content_en == 1 ) 
                            {{$row->mother_product['title_en']}}
                            @endif 
  
                              </td>
         
                          </tr>
@endforeach


                        
                      </table>
                      

                </div>  
              </div> 
            </div> 

          </div> 
        </div>
        
        <!--/ Recent Transactions -->
        <!--Recent Orders & Monthly Sales -->
       
        <!--/Recent Orders & Monthly Sales -->
        <!-- Basic Horizontal Timeline -->
        
        <!--/ Basic Horizontal Timeline -->
      </div>
    </div>
  </div>




@endsection


@section('head')

        <title>{{config('settings.sitename')}}</title>

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