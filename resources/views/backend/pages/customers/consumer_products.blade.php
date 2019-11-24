@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title">  {{ __('backend.assessment') }}   </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                  

<form method="post" action="{{url('')}}/{{config('settings.BackendPath')}}/post_assessment_update_products_delegate/{{$total_products[0]->customer_id}}">

<div class="table-responsive">
             
<table  class="table table-striped table-bordered zero-configuration dataTable">
  <thead>
    <tr>
      <th>SKU</th>
      <th>{{__('backend.title')}}</th>
      <th> {{__('backend.by')}}  </th>
      
      <th>{{__('backend.unit')}}</th>
      <th> {{__('backend.quantity')}} </th>
      <th> {{ __('backend.price') }}</th>
      <th>  {{__('backend.estimate_consumption')}}  </th>
     
      <th> </th>
      <th> </th>
    </tr>
  </thead>
  <tbody>


  @foreach($total_products as $product)
    <tr>
      <th> {{ $product->info['sku'] }}  </th>
      <th> {{ $product->info['title_ar'] }}  </th>
      <th> @if($product->request_by == 'delegates') {{'تقييم'}} @else {{'احالة'}} @endif  </th>
      <td >{!! Form::select('unit_id[]', $units ,  $product->unit_id , ['id'=>'unit_id_'.$product->id, 'class' => 'form-control' , 'style'=>'width:100px;'] ) !!}</td>
      <td>{!! Form::number('quantity[]', $product->quantity , ['id'=>'quantity' , 'product_id'=> $product->id , 'class' => 'form-control' , 'style'=>'width:80px;' , 'placeholder'=> __('backend.quantity') ] ) !!}</td>
      <td>{!! Form::text('price[]', $product->price , ['id'=>'price_'.$product->id, 'class' => 'form-control', 'style'=>'width:80px;'  ,  'placeholder'=> __('backend.price') ] ) !!}</td>
      <td>{!! Form::text('estimate_consumption[]',  $product->estimate_consumption , ['id'=>'estimate_consumption_'.$product->id , 'style'=>'width:80px;', 'class' => 'form-control' , 'placeholder'=> __('backend.estimate_consumption') ] ) !!}</td>

      <th> <a href="{{url('')}}/{{config('settings.BackendPath')}}/assessment_products/{{$product->id}}/delete" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>  </th>
      <th> {{$product->created_at}}  </th>
    </tr>
    {!! Form::hidden('products_doc[]', $product->product_id  , ['id'=>'products_doc'.$product->id, 'class' => 'form-control'  ] ) !!}
    {!! Form::hidden('assessment_id[]', $product->id  , ['id'=>'assessment_id'.$product->id, 'class' => 'form-control'  ] ) !!}
    
  @endforeach

  </tbody>
</table>
</div>
{!! Form::token() !!}


<button  type="submit" class="btn btn-success btn">
<i class="icon-action-undo"></i>  تحديث   
</button>


</form>



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

$("#pricing").attr("href","{{url('')}}/{{config('settings.BackendPath')}}/assessment_pricing/"+customer);

} else {
  $("#new_registration").show(); 
  $("#tools").hide();
}
  
        });

      });
  



//Price
$(document).on('change','#quantity',function(e)
{
e.preventDefault();
var product_id = $(this).attr('product_id');
var quantity =  $(this).val();
var unit =  $("#unit_id_" + product_id ).val();
if ( quantity > 0) {
$("#price_" + product_id).prop('required',true);
$("#estimate_consumption_" + product_id).prop('required',true);
$("#quantity_" + product_id).prop('required',true);
} else {
$("#price_" + product_id).prop('required',false);
$("#estimate_consumption_" + product_id).prop('required',false);
$("#quantity_" + product_id).prop('required',false);
}
$.ajax(
        {
         url: "{{url('')}}/{{config('settings.BackendPath')}}/products/get_consumer_price/1/" + unit + "/" + quantity,
         type: 'GET',

       }).done( 

       function(data) {
        $("#price_" + product_id).val(data.customer_price);
        
        });

});
//Price


</script>

@endsection