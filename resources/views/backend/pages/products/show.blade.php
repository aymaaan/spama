@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
  <div class="content-body">
    <section class="row">

    

      <div class="col-12">
        <div class="card">
          <div class="card-head">

<br>
<a style=" float: left;" href="{{ url('') }}/{{config('settings.BackendPath')}}/products/{{$product->id}}/edit">
    <button class="btn btn-info btn">
    <i class="icon-pencil"></i>  تعديل   </button>
    </a>


            <div class="card-header">
              <h4 class="card-title">   <B>  SKU: {{$product->sku}}   </B></h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              
              


                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <!-- Task List table -->


                  <div  class="card-body px-0">



                    <h4 class="card-title"> {{$product->title_en}} </h4>
                    <h4 class="card-title"> {{$product->title_ar}}</h4>

                     

@if($product->title_en_old)
                    <h4 style="color:red;" class="card-title"> Old : </h4>

                    <h4 class="card-title"> {{$product->title_en_old}} </h4>
                    <h4 class="card-title"> {{$product->title_ar_old}}</h4>


@endif


<div class="row">

         <div class="col-12 col-md-6">

                    <ul class="list-group">


                    <li class="list-group-item">
                         {{$product->sku_old}}  <strong style="color:red;">: Old SKU</strong> </li>



                      <li class="list-group-item">
                         {{$product->sku}}  <strong>:SKU</strong> </li>

                         <li class="list-group-item">
                        <strong>{{ __('backend.type') }}:</strong> {{$product->type['title']}} </li>
                      <li class="list-group-item">
                        <strong>{{ __('backend.category') }}:</strong> 
                        <br>
                        {{$product->category['title']}} <br>
                         {{$product->category['title_en']}} 
                        </li>
                      <li class="list-group-item">
                        <strong> {{ __('backend.brand') }}:</strong> {{$product->brand['title']}}</li>
                      
                      
                      <li class="list-group-item">
                        <strong>{{ __('backend.mother_product') }}:</strong> <br> {{$product->mother_product['title']}} <br>  {{$product->mother_product['title_en']}} </li>



                        <li class="list-group-item">
                        <strong>{{ __('backend.expiration_date') }}:</strong> <br>
                         {{$product->expiration_date}}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.production_date') }}:</strong> <br>
                         {{$product->production_date}}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.loot_number') }}:</strong> <br>
                         {{$product->loot_number}}  </li>

                         <li class="list-group-item">
                        <strong>{{ __('backend.product_package_dimensions') }}:</strong> <br>
                         {{$product->product_package_dimensions_x}} * {{$product->product_package_dimensions_y}} * {{$product->product_package_dimensions_z}}   </li>

                         

                         <li class="list-group-item">
                        <strong>{{ __('backend.sku_supplier') }}:</strong> <br>
                         {{$product->sku_supplier}}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.total_quantity') }}:</strong> <br>
                         {{$product->total_quantity}}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.minimum_total_quantity') }}:</strong> <br>
                         {{$product->minimum_total_quantity}}  </li>



                         <li class="list-group-item">
                        <strong>{{ __('backend.maximum_total_quantity') }}:</strong> <br>
                         {{$product->maximum_total_quantity}}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.total_demand_limit') }}:</strong> <br>
                         {{$product->total_demand_limit}}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.delivery_period_main_repository') }}:</strong> <br>
                         {{$product->delivery_period_main_repository}}  </li>




                         <li class="list-group-item">
                        <strong>{{ __('backend.special_price_realted_by_another_product') }}:</strong> <br>
                         {{$product->special_price_realted_by_another_product}}  </li>

                         <li class="list-group-item">
                        <strong>{{ __('backend.cost_price') }}:</strong> <br>
                         {{$product->cost_price}}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.price_related_by_quantity') }}:</strong> <br>
                         {{$product->price_related_by_quantity}}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.additional_costs_related_by_product') }}:</strong> <br>
                         {{$product->additional_costs_related_by_product}}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.shipping_charges') }}:</strong> <br>
                         {{$product->shipping_charges}}  </li>

                         <li class="list-group-item">
                        <strong>{{ __('backend.cod_charges') }}:</strong> <br>
                         {{$product->cod_charges}}  </li>






@foreach ( $product->unit_prices as $unit_price)

<li style="background-color:#e5f8ff" class="list-group-item">
<strong>{{ __('backend.unit') }}:</strong> {{$unit_price->unit['title']}}{{$unit_price['unit_text']}}</li>


<li class="list-group-item">
<strong>{{ __('backend.customer_price') }}:</strong> {{$unit_price['customer_price']}} </li>


<li class="list-group-item">
<strong>{{ __('backend.wholesale_price') }}:</strong> {{$unit_price['wholesale_price']}} </li>


<li class="list-group-item">
<strong>{{ __('backend.semi_wholesale_price') }}:</strong> {{$unit_price['semi_wholesale_price']}} </li>



<li class="list-group-item">
<strong> EAN   :</strong> {{$unit_price['ean']}} </li>


@endforeach

                          


 
                
                </div>


                
         <div class="col-12 col-md-6">


          <ul class="list-group">

<li class="list-group-item">
                      <strong>{{ __('backend.last_purchase_price') }}:</strong> {{$product['last_purchase_price']}} </li>
                       <li class="list-group-item">
                          <strong>{{ __('backend.average_purchase_price') }}:</strong> {{$product['average_purchase_price']}} </li>
             
                          <li class="list-group-item">
                               <strong> {{ __('backend.value_added') }} :</strong> {{$product['value_added']}} </li>
                                       <li class="list-group-item">
                                               <strong> {{ __('backend.notes') }}:</strong> {{$product['notes']}} </li>
               
</ul>


<br>       
   
      
   <ul class="list-group">
           <li style="background-color:#e5f8ff" class="list-group-item">
               <strong>  {{ __('backend.coupons') }} </strong> </li>

@foreach ( $product->products_complementary as $complementary)
<a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/product/{{$complementary->id}}" >
<li class="list-group-item">
<strong>  {{$complementary['title_ar']}} </br>   {{$complementary['title_en']}}  </strong> </li>
</a>
@endforeach

             
     </ul>

       <br>







   <br>       
   
      
                <ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong>  {{ __('backend.complementary_products') }} </strong> </li>

@foreach ( $product->products_complementary as $complementary)
<a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/product/{{$complementary->id}}" >
                        <li class="list-group-item">
                          <strong>  {{$complementary['title_ar']}} </br>   {{$complementary['title_en']}}  </strong> </li>
</a>
                
@endforeach

                          
                  </ul>

                    <br>
					
					
	

                    <ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong>  {{ __('backend.repositories') }} </strong> </li>

@foreach ( $product->products_repositories as $repository)
<a href="#" >
                        <li style="background-color:#efefef" class="list-group-item">
                          <strong> {{$repository->id}}  {{$repository->repository['title_ar']}}   {{$repository->repository['title_en']}} </strong> </li>

                          <li class="list-group-item">
                        <strong>{{ __('backend.quantity_each_repository') }}:</strong>
                         {{$repository->quantity_each_repository}}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.minimum_quantity_each_repository') }}:</strong> 
                         {{$repository->minimum_quantity_each_repository}}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.maximum_quantity_each_repository') }}:</strong>
                         {{$repository->maximum_quantity_each_repository}}  </li>

                         <li class="list-group-item">
                        <strong>{{ __('backend.total_demand_limit_each_repository') }}:</strong> 
                         {{ $repository->maximum_quantity_each_repository - $repository->minimum_quantity_each_repository }}  </li>


                         <li class="list-group-item">
                        <strong>{{ __('backend.delivery_period_each_repository') }}:</strong> 
                         {{$repository->delivery_period_each_repository}}  </li>

                         <li class="list-group-item">
                        <strong>{{ __('backend.product_place') }}:</strong> 
                         {{$repository->product_place_x}} * {{$repository->product_place_y}} * {{$repository->product_place_z}}   </li>


                
@endforeach

                          
                  </ul>

                    <br>
					



					
					
					
					
					
					

   
     
      
                <ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong>  {{ __('backend.local_suppliers') }} </strong> </li>

                        @foreach ( $product->suppliers->where('supplier_type' , 'داخلى') as $supplier)
<a href="#"  data-toggle="modal" data-target="#exampleModal{{$supplier['id']}}">
                        <li     class="list-group-item">
                          <strong>  {{$supplier['name']}}  </strong> </li>

                          </a>




<!-- Modal -->
<div class="modal fade"  id="exampleModal{{$supplier['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$supplier['name']}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
     

<ul class="list-group">



                          <li class="list-group-item">
                                <strong> {{ __('backend.website') }}: {{$supplier['website']}}  </strong> </li>

                                <li class="list-group-item">
                                        <strong> {{ __('backend.email') }}: {{$supplier['email']}}  </strong> </li>

                                        <li class="list-group-item">
                                                <strong> {{ __('backend.address') }}: {{$supplier['address']}}  </strong> </li>

                                                <li class="list-group-item">
                                                        <strong>{{ __('backend.credit_limit') }}: {{$supplier['credit_limit']}}  </strong> </li>


<li class="list-group-item">

<strong>    {{ __('backend.credit_term') }}: {{$supplier['credit_term']}}  </strong> </li>

<li  style="background-color:#edeaea" class="list-group-item">

<strong>  {{ __('backend.delegates') }} </strong> </li>

@foreach ($supplier->delegates as $delegate)
    

<li class="list-group-item">

        <strong> {{$delegate['name']}}  </strong> -    {{ __('backend.phone') }}:  {{$delegate['phone']}}  </li>
                      
@endforeach                    
                 


</ul>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.close') }}</button>
        
      </div>
    </div>
  </div>
</div>


     
                      
                      
@endforeach

                          
                  </ul>

                    <br>


                  <ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong>{{ __('backend.foreign_suppliers') }}  </strong> </li>

                        @foreach ( $product->suppliers->where('supplier_type' , 'خارجى') as $supplier)
                        <a href="#"  data-toggle="modal" data-target="#exampleModal{{$supplier['id']}}">
                        <li  class="list-group-item">
                          <strong> {{$supplier['name']}}  </strong> </li>

</a>


<!-- Modal -->
<div class="modal fade" id="exampleModal{{$supplier['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{$supplier['name']}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        

<ul class="list-group">

                  
                  <li class="list-group-item">
                                <strong> {{ __('backend.website') }}: {{$supplier['website']}}  </strong> </li>

                                <li class="list-group-item">
                                        <strong> {{ __('backend.email') }}: {{$supplier['email']}}  </strong> </li>

                                        <li class="list-group-item">
                                                <strong> {{ __('backend.address') }}: {{$supplier['address']}}  </strong> </li>


<li style="background-color:#edeaea" class="list-group-item">

<strong>  {{ __('backend.delegates') }} </strong> </li>

@foreach ($supplier->delegates as $delegate)
    

<li class="list-group-item">

        <strong> {{$delegate['name']}}  </strong> -     {{ __('backend.phone') }}:  {{$delegate['phone']}}  </li>
                      
@endforeach


</ul>


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.close') }}</button>
        
      </div>
    </div>
  </div>
</div>


                        @endforeach

                          
                  </ul>
 
         <br>

                  <ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong>  {{ __('backend.websites_properties') }}  </strong> </li>

                        
                        
<li  class="list-group-item">

<strong>@foreach ( $websites as $website)  <a  href="{{url('')}}/{{config('settings.BackendPath')}}/websites_properties/export?website={{$website->id}}&product={{$product->id}}" class="btn btn-success btn" href="" > 

{{$website->title}}  </a>     @endforeach</strong> </li>

</ul>



@if(count($product->photos))

<ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong>  {{ __('backend.photos') }}  </strong>

</li>

                        
                        
<li  class="list-group-item">

<strong>

@foreach ( $product->photos as $photo)  

<a data-toggle="modal" data-target="#photoModal{{$photo->id}}" href="#">
<img src="{{url('')}}/uploads/products_photos/{{$product->id}}/{{$photo->photo_name}}"   width="150">
</a>
@endforeach

</strong>

<a href="{{url('')}}/{{config('settings.BackendPath')}}/products/photos/{{$product->id}}">
<button class="btn btn-info btn">
  <i class="la la-download"></i>    {{__('backend.download_photos')}}   </button>
</a> 

 </li>

</ul>

@foreach ( $product->photos as $photo) 
<!-- Modal -->
<div class="modal fade" id="photoModal{{$photo->id}}" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel{{$photo->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Photo | {{$photo->photo_name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <img src="{{url('')}}/uploads/products_photos/{{$product->id}}/{{$photo->photo_name}}"   width="100%">


<hr>

<p style="color:black;">

{{$photo->photo_width}} عرض  -  {{$photo->photo_height}} طول
<br>
 {{$product->title_en}}  
 <br>
  {{$product->title_ar}}
 

</p>


      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
@endforeach

@endif


                </div>

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