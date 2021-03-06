@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title">  {{ __('backend.pricing') }}   </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                  
                  <div class="col-md-6">

                  <select name="customer" id="customer" class="select2 form-control">
                  <option value="0" >----</option>
                  @foreach($customers as $customer)
                          <option value="{{$customer->id}}">
                          {{$customer->name}} - {{$customer->phone}} 
                          </option>
                  @endforeach 
                        
                      </select>

                      </div>

                      <hr>


                      <a id="assessment_products_pricing" href="" class="btn btn-danger btn"> {{ __('backend.show_pricing') }}  </a>


                      </div>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>


@endsection


@section('head')

        <title> {{ __('backend.customers') }}  | {{config('settings.sitename')}}</title>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/forms/selects/select2.min.css">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/vendors.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/weather-icons/climacons.min.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/fonts/meteocons/style.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/chartist.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
  <!-- END VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/plugins/forms/checkboxes-radios.css">
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
  <script src="{{url('')}}/assets/app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
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
  <script src="{{url('')}}/assets/app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
 <!-- BEGIN PAGE LEVEL JS-->
 <script src="{{url('')}}/assets/app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->


<script>


$(document).ready(function(){

$('select[name="customer"]').on('change', function() {
var customer = $(this).val();
if(customer != 0){
$("#new_registration").hide();
$("#tools").show();

$("#assessment_products_doctor").attr("href","{{url('')}}/{{config('settings.BackendPath')}}/assessment_products_doctor/"+customer);

$("#assessment_products_delegate").attr("href","{{url('')}}/{{config('settings.BackendPath')}}/assessment_products_delegate/"+customer);

$("#assessment_products_pricing").attr("href","{{url('')}}/{{config('settings.BackendPath')}}/customers/pricing/"+customer);

} else {
  $("#new_registration").show(); 
  $("#tools").hide();
}
  
        });

      });
  
</script>

@endsection