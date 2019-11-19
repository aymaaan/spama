@extends('backend.layouts.default')

@section('content')



<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-head">
            <div class="card-header">
              
               <h4 class="card-title"> <B> {{ __('backend.products') }}   </B></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                      
                    <div class="heading-elements">


                      

                      @can('create_products')

                      <a href="{{url(config('settings.BackendPath').'/products/create')}}">
                      <button class="btn btn-primary btn">
                      <i class="la la-plus-square-o"></i> {{ __('backend.add_product') }}  </button>
                      </a>

                      @endcan


@can('create_products')

<button  data-toggle="modal" data-target="#importModal" class="btn btn-success btn">
<i class="la la-cloud-upload"></i> {{ __('backend.import') }}</button>


<a href="{{ url('') }}/{{config('settings.BackendPath')}}/export_excel/export_products" >
<button  class="btn btn-warning btn">
<i class="la la-cloud-download"></i> {{ __('backend.export') }}</button>
</a>



<!-- Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('backend.import') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



   <form method="post" enctype="multipart/form-data" action="{{ url('') }}/{{config('settings.BackendPath')}}/import_excel/import_products">
    {{ csrf_field() }}
  
    <div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.choose_product_file') }}</label>

  <input type="file" name="select_file" />

  </div>
</div>

   <div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.choose_suppliers_file') }}</label>

  <input type="file" name="select_file_suppliers" />

  </div>
</div>




   <div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.choose_units_file') }}</label>

  <input type="file" name="select_file_units" />

  </div>
</div>



      </div>
        <div class="modal-footer">
        <button  id='importFileClose'  type="button" class="btn btn-secondary" data-dismiss="modal"> {{ __('backend.close') }} </button>

        <img style="display: none;"  id="importFileLoading" src="{{url('')}}/assets/animated-loader.gif" alt="Loading ... ">
        <button id='importFile' type="submit" class="btn btn-primary"> {{ __('backend.import') }} </button>

         </form>


      </div>
    </div>
  </div>
</div>


@endcan





                       </div> 

                       
              </div>
              <div class="card-content">
                <div class="card-body">
                  <!-- Task List table -->

    

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif



                  @include('backend.includes.errors')
                  <table class="table-striped table-bordered table-responsive" id="data_list">
                  <thead>

                  <th width="5%">  S/N </th>
                  <th width="5%"> SKU </th>
                  @if( Auth::user()->display_content_ar == 1 )
                  <th width="20%"> {{ __('backend.arabic_title') }}   </th>
                  @endif
                  @if( Auth::user()->display_content_en == 1 ) 
                  <th width="20%" >  {{ __('backend.english_title') }}   </th>
                  @endif
                  

                  <th width="20%"> {{ __('backend.category') }} </th>
                  <th width="5%"> {{ __('backend.unit') }} </th>
                   <th width="5%"> {{ __('backend.customer_price') }}     </th>
                   <th width="5%"> {{ __('backend.total_quantity') }}     </th>
                   

                  <th width="2%">     </th>

   
                    </thead>        
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

      
        <title> Products | {{config('settings.sitename')}}</title>





  <!-- datatables -->
  <!-- BEGIN VENDOR JS-->
 <script src="{{url('')}}/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <script type="text/javascript" src=" https://code.jquery.com/jquery-3.3.1.js" ></script>
  <script  type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 

 
  <!-- BEGIN VENDOR JS-->
<script  src="{{url('')}}/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->




  <script>
$.noConflict();
// Code that uses other library's $ can follow here.
</script>






<script type="text/javascript">
    $(document).ready(function () {
        $('#data_list').DataTable({
         
            "processing": true,
            "serverSide": true,
            
            "scrollX": true,
            
            
            "ajax":{
                     "url": "{{ url('') }}/{{config('settings.BackendPath')}}/all_products",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "sku" },
                @if( Auth::user()->display_content_ar == 1 )
                { "data": "title_ar" },
                @endif
                @if( Auth::user()->display_content_en == 1 ) 
                { "data": "title_en" , className: "text_column_left" },
                @endif
               
                { "data": "category_id" },
                { "data": "unit_price" },
                { "data": "customer_price" },
                { "data": "total_quantity" },
                { "data": "options" }

                


            ]  

        })
        .columns.adjust()
        .responsive.recalc();
        
    });
</script>
<!-- datatables -->

      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
      rel="stylesheet">
      <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
      rel="stylesheet">
      <!-- BEGIN VENDOR CSS-->
      
<style>
    .text_column_left {
    text-align: left;
}
</style>


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
      

      

<script>

$('#importFile').click(function() {

$('#importFile').hide();
$('#importFileClose').hide();

$('#importFileLoading').show();
});

</script>

      @endsection