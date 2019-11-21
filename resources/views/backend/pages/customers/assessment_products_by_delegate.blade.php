@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title">   {{  __('backend.assessment') }} | {{$customer->name ? : $customer->consumer_name}}   </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <!-- Task List table -->
 
@if(count($total_products))

@if( $total_products[0]['assessment_date'] == date('Y-m-d'))

<div class="col-md-12">

<div class="table-responsive">
    
<a style="float: left;"  href="{{url('')}}/{{config('settings.BackendPath')}}/consumer/products/{{$total_products[0]['serial']}}" class="btn btn-success btn">
<i class="icon-pencil"></i>     
</a>         
<table  class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>SKU</th>
      @if( Auth::user()->display_content_ar == 1 )
      <th>{{__('backend.arabic_title')}}</th>
      @endif
      @if( Auth::user()->display_content_en == 1 )
      <th>{{__('backend.english_title')}}</th>
      @endif

      <th>{{__('backend.unit')}}</th>
      <th>{{__('backend.quantity')}} </th>
      <th>{{ __('backend.price') }}</th>
      <th>{{__('backend.estimate_consumption')}}</th>
    </tr>
  </thead>
  <tbody>

  @foreach($total_products as $product)
    <tr>
      <th> {{ $product->info['sku'] }}  </th>
      @if( Auth::user()->display_content_ar == 1 )
      <th> {{ $product->info['title_ar'] }}</th>
      @endif
      @if( Auth::user()->display_content_en == 1 )
      <th> {{ $product->info['title_en'] }} </th>
      @endif
      <td>{!! $product->unit['title']  !!}</td>
      <td>{!! $product->total_all_products !!}</td>
      <td>{!! $product->total_all_price !!}</td>
      <td>{!! $product->total_all_estimate !!}</td>
    </tr>
  @endforeach

  </tbody>
</table>
</div>



</form>

</div>

<br><br>

@endif


@endif

<div class="col-md-12">



				        <ul  id="tree_category">
				            @foreach($categories as $category)
				                <li id="category_id" value="{{ $category->id }}">
                   <a href="#">  <B> {{ $category->title }} </B> </a> 
				                </li> <br>
				            @endforeach
				        </ul>


                <div id="imageLoading"><img src="{{url('')}}/assets/animated-loader.gif"> </div>
                <ul id="tree_mother_products"></ul>
                
                <div id="tree_products"></div>

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

  <title>{{ __('backend.assessment') }}  | {{config('settings.sitename')}}</title>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/vendors.css">
  
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/app.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/custom-rtl.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/pages/timeline.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/pages/dashboard-ecommerce.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/css/style-rtl.css">


<script>
$(document).ready(function() {
  $('#example').DataTable( {
      "paging":   false,
      "ordering": true,
      "info":     false
  } );
} );
</script>
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
  <script src="{{url('')}}/assets/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>

  <script src="{{url('')}}/assets/app-assets/js/scripts/tables/datatables/datatable-basic.js"
  type="text/javascript"></script>







<script>
$(document).ready(function(){
  
$('#tree_category').show();
$('#tree_mother_products').hide();    
$('#tree_products').hide();
$('#imageLoading').hide();

//On Click Main Category
$(document).on('click','#category_id',function(e)
{
   e.preventDefault();
   var category_id = $(this).attr('value');
   $('#tree_category').hide();
   $('#tree_products').hide();
   $('#tree_mother_products').show();  

   $.ajax({
    beforeSend: function(){
        $('#imageLoading').show();
    },
    complete: function(){
        $('#imageLoading').hide();
    },
    success:function(){
    $('#tree_mother_products').load('{{URL::to(config("settings.BackendPath")."/tree_mother_products")}}/'+category_id) ;
    }

    });



  });

//On Click Main Category


//back_to_categories
$(document).on('click','#back_to_categories',function(e)
{
   //e.preventDefault();
  // $('#tree_category').show();
  // $('#tree_products').hide();
   //$('#tree_mother_products').hide();


  });

//back_to_categories


//On Click Main Category
$(document).on('click','#mother_id',function(e)
{
   e.preventDefault();
   var category_id = $(this).attr('value');
   var customer_id = "{{$customer->id}}";
   @if(Request::segment(2) == 'assessment_products_doctor')
   var request_by = 'doctors' ;
   @else
   var request_by = 'delegates' ;
   @endif
   
   $('#tree_category').hide();
   $('#tree_mother_products').hide(); 
   $('#tree_products').show();

   $.ajax({
    beforeSend: function(){
        $('#imageLoading').show();
    },
    complete: function(){
        $('#imageLoading').hide();
    },
    success:function(){
    $('#tree_products').load('{{URL::to(config("settings.BackendPath")."/tree_products")}}/'+category_id + '/' +  customer_id + '/' + request_by  ) ;
    }

    });



  });

//On Click Main Category


//Price
$(document).on('change','#quantity',function(e)
{
e.preventDefault();
var product_id = $(this).attr('product_id');
var quantity =  $(this).val();
var unit =  $("#unit_id_" + product_id ).val();
if ( quantity > 0) {
$("#price_" + product_id).prop('required',true);
$("#estimate_consumption_" + product_id).val(0);
$("#quantity_" + product_id).prop('required',true);
} else {
$("#price_" + product_id).prop('required',false);
$("#estimate_consumption_" + product_id).val('');
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







});
</script>

@endsection