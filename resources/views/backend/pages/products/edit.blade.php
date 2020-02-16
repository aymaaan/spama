@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title"> {{ __('backend.products') }}   </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <!-- Task List table -->
    
{!! Form::model( $data ,[ 'url' =>  config('settings.BackendPath').'/products/'.$data->id, 'method'=>'PATCH' ,  'class' => 'form' ,  'files' => 'true' ]) !!}  


<div class="form-body">

  @include('backend.includes.errors') 

                    <ul class="nav nav-tabs nav-topline">
					
					
                      <li class="nav-item">
                        <a style="width: 200px;" class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" aria-controls="home2"
                        aria-expanded="true">{{ __('backend.basic_information') }}</a>
                      </li>
					  
					  
                      <li class="nav-item">
                        <a style="width: 200px;"  class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" aria-controls="profile2"
                        aria-expanded="false">{{ __('backend.general_properties') }}</a>
                      </li>


                      <li class="nav-item">
                        <a style="width: 200px;"  class="nav-link" id="websites_properties-tab2" data-toggle="tab" href="#websites_properties" aria-controls="websites_properties"
                        aria-expanded="false">{{ __('backend.websites_properties') }}</a>
                      </li>

                      <li class="nav-item">
                        <a style="width: 200px;"  class="nav-link" id="photos_properties-tab2" data-toggle="tab" href="#photos_properties" aria-controls="photos_properties"
                        aria-expanded="false">{{ __('backend.photos') }}</a>
                      </li>
					  
					  
					  
                    </ul>



                    <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">



                    <div class="tab-pane" id="photos_properties" role="tabpanel" aria-labelledby="photos_properties-tab2"
                      aria-expanded="false">




 




<div class="row">



@foreach ( $data->photos as $photo) 




<div class="col-md-3">
    <div class="form-group">
     


<a data-toggle="modal" data-target="#photoModal{{$photo->id}}" href="#">
<img src="{{url('')}}/uploads/products_photos/{{$data->id}}/{{$photo->photo_name}}"   width="150">
</a> 

<br>



@if( $photo->is_main_photo == 0 )
<a  href="{{url('')}}/{{config('settings.BackendPath')}}/products/photos/delete/{{$photo->id}}" style="color:#fff;" type="button" class="btn btn-danger" data-dismiss="modal">Delete</a>

<a  href="{{url('')}}/{{config('settings.BackendPath')}}/products/photos/set_main/{{$photo->id}}" style="color:#fff;" type="button" class="btn btn-success" data-dismiss="modal"> تعيين كرئيسية </a>

@else 

<a href="#" style="color:#fff;" type="button" class="btn btn-info">  الصورة الرئيسية </a>

@endif




    </div>
  </div>





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

      <img src="{{url('')}}/uploads/products_photos/{{$data->id}}/{{$photo->photo_name}}"   width="100%">


<hr>

<p style="color:black;">

{{$photo->photo_width}} عرض  -  {{$photo->photo_height}} طول
<br>
 {{$data->title_en}}  
 <br>
  {{$data->title_ar}}
 

</p>


      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

@endforeach

</div>



<hr>

<br>


<div class="row">

<div class="col-md-3">




    <div class="form-group">
      <label for="projectinput3">  {{ __('backend.choose_photo') }}  </label>

      <input type="file" multiple id="product_photos" name="product_photos[]" >

    </div>
  </div>

</div>

					  
</div>
                 
					
<div role="tabpanel" class="tab-pane active" id="home2" aria-labelledby="home-tab2" aria-expanded="true">
                        
                    
<h4 class="form-section"><i class="la la-commenting"></i>{{ __('backend.basic_information') }}</h4>


<div class="row">

<div class="col-md-3">
    <div class="form-group">
      
      @if(isset($data->photos))

         @foreach ( $data->photos->where('is_main_photo' , 1) as $photo) 
      
         <img src="{{url('')}}/uploads/products_photos/{{$data->id}}/{{$photo->photo_name}}"   width="150" heigh="100">
         
         @endforeach
         
         @else
         
         
          <img src="https://spama.com/image/cache/catalog/logo-2-2x-322x70.png"   width="150" heigh="100">
         
        @endif
     
      
    </div>
  </div>

</div>


  <div class="row">


  
<div class="col-md-3">
    <div class="form-group">
      <label for="projectinput3">  {{ __('backend.type') }}  </label>

      
      {!! Form::select('type_id', $types ,  null , ['id'=>'categories', 'class' => 'form-control' , 'placeholder'=> '-- Type  --' ] ) !!}


    </div>
  </div>


  <div class="col-md-4">
    <div class="form-group">
      <label for="projectinput3">  {{ __('backend.category') }}  </label>

      
      {!! Form::select('category_id', $categories ,  null , ['id'=>'categories', 'class' => 'form-control' , 'placeholder'=> '-- Category  --' ] ) !!}


    </div>
  </div>


  <div class="col-md-3">
    <div class="form-group">
      <label for="projectinput1"> {{ __('backend.brand') }}    </label>




      <select  id="brand_id" name="brand_id" required  class="form-control">


        <option title_ar="" title_en="" serial="" value=""> -- {{ __('backend.brand') }} -- </option>
        @foreach ( $brands as $brand )
        <option @if($data->brand_id == $brand->id) selected  @endif title_ar ="{{$brand->title}}" title_en ="{{$brand->title_en}}" serial="{{$brand->serial}}"  value="{{$brand->serial}}">{{$brand->title}}</option>
        @endforeach



      </select>




    </div>
  </div>


  <div   class="col-md-4">
    <div class="form-group">
      <label for="projectinput1">{{ __('backend.mother_product') }}</label>



      <select  id="mother_product_id" required name="mother_product_id" class="form-control">


<option serial="" value=""> -- {{ __('backend.mother_product') }} -- </option>

@foreach($mother_products as $row)
  <option @if($data->mother_product_id == $row->serial) selected  @endif  serial="{{$row->serial}}" title_ar="{{$row->title}}" title_en="{{$row->title_en}}"  value="{{$row->id}}" >
  	{{$row->title}}
  </option>
@endforeach



      </select>





    </div>

  </div>



  <div class="col-md-4">
    <div class="form-group">
      <label for="projectinput1">{{ __('backend.first_name') }}</label>

      <select id="first_name"  required name="first_name" class="form-control">


        <option title_ar="" title_en ="" serial="" value=""> -- {{ __('backend.product_names') }} -- </option>

@foreach($first_names as $row)
  <option @if($data->first_name == $row->id) selected  @endif   serial="{{$row->serial}}" title_ar="{{$row->title}}" title_en="{{$row->title_en}}"  value="{{$row->id}}" >
  	{{$row->title}}
  </option>
@endforeach


      </select>

    </div>

  </div>





</div>




<h4 class="form-section"><i class="la la-commenting"></i>   {{ __('backend.features') }}   </h4>



<div id="features_div" class="row">


 <div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> {{ __('backend.feature') }} 1 </label>

    <select id="feature_1" name="feature_1"   class="form-control">

      <option title_ar="" title_en ="" serial="" value=""> -- {{ __('backend.feature') }} 1 -- </option>

    </select>

  </div>
</div>


<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> {{ __('backend.feature') }} 2 </label>

    <select  id="feature_2" name="feature_2"   class="form-control">


      <option title_ar="" title_en ="" serial="" value=""> -- {{ __('backend.feature') }} 2 -- </option>


    </select>

  </div>
</div>



<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> {{ __('backend.feature') }} 3 </label>

    <select id="feature_3" name="feature_3"   class="form-control">


      <option  title_ar="" title_en ="" serial="" value=""> -- {{ __('backend.feature') }} 3 -- </option>


    </select>

  </div>
</div>



</div>


<h4 class="form-section"><i class="la la-commenting"></i>  {{ __('backend.titles') }} &  SKU </h4>



<div id="features_div" class="row">

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.product_name_ar') }}       </label>

    {!! Form::text('title_ar', null , ['id'=>'title_ar', 'class' => 'form-control' , 'placeholder'=>  __('backend.arabic_title')   ] ) !!}

  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.product_name_en') }}</label>

    {!! Form::text('title_en', null , ['id'=>'title_en', 'class' => 'form-control' , 'placeholder'=>  __('backend.english_title')   ] ) !!}

  </div>
</div>




<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3">SKU </label>

    {!! Form::text('sku', null , ['id'=>'sku', 'class' => 'form-control' , 'placeholder'=> 'SKU' ] ) !!}



  </div>
</div>



</div>






<h4 class="form-section"><i class="la la-commenting"></i> Old {{ __('backend.titles') }} &  SKU </h4>



<div id="features_div" class="row">

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.product_name_ar') }}   Old    </label>

    {!! Form::text('title_ar_old', $data->title_ar_old , ['id'=>'title_ar', 'class' => 'form-control' , 'placeholder'=>  __('backend.arabic_title')   ] ) !!}

  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.product_name_en') }} Old </label>

    {!! Form::text('title_en_old', $data->title_en_old , ['id'=>'title_en', 'class' => 'form-control' , 'placeholder'=>  __('backend.english_title')   ] ) !!}

  </div>
</div>


<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3">Old SKU </label>

    {!! Form::text('sku_old', $data->sku_old , ['id'=>'sku', 'class' => 'form-control' , 'placeholder'=> 'SKU' ] ) !!}

  </div>
</div>

</div>


<h4 class="form-section"><i class="la la-commenting"></i> {{ __('backend.units') }} & {{ __('backend.prices') }}        </h4>

@foreach( $units_data_prices as $uniprice )
@if( $uniprice->customer_price )

<div class="row">



<div class="col-md-2">
    <div class="form-group">
      <label for="projectinput3">  {{ __('backend.unit') }}  </label>

      
      {!! Form::select('unit_id[]', $units ,  $uniprice->unit_id , ['id'=>'unit_id', 'class' => 'form-control'  ] ) !!}


    </div>
  </div>


  <div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.unit') }}      </label>

    {!! Form::text('unit_text[]', $uniprice->unit_text , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> 'Unit Free Text' ] ) !!}

  </div>
</div>



<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.customer_price') }}    </label>

    {!! Form::text('customer_price[]', $uniprice->customer_price , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.customer_price') ] ) !!}

  </div>
</div>





<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.wholesale_price') }}</label>

    {!! Form::text('wholesale_price[]', $uniprice->wholesale_price , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.wholesale_price') ] ) !!}

  </div>
</div>



<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.semi_wholesale_price') }}</label>

    {!! Form::text('semi_wholesale_price[]', $uniprice->semi_wholesale_price , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.semi_wholesale_price') ] ) !!}

  </div>
</div>


<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  EAN </label>

    {!! Form::text('ean[]', $uniprice->ean , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> 'EAN' ] ) !!}

  </div>
</div>


</div>
@endif
@endforeach


<div class="row">



<div class="col-md-2">
    <div class="form-group">
      <label for="projectinput3">  {{ __('backend.unit') }}  </label>

      
      {!! Form::select('unit_id[]', $units ,  null , ['id'=>'unit_id', 'class' => 'form-control' ] ) !!}


    </div>
  </div>


  <div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.unit') }}      </label>

    {!! Form::text('unit_text[]', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> 'Unit Free Text' ] ) !!}

  </div>
</div>



<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.customer_price') }}    </label>

    {!! Form::text('customer_price[]', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.customer_price') ] ) !!}

  </div>
</div>





<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.wholesale_price') }}</label>

    {!! Form::text('wholesale_price[]', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.wholesale_price') ] ) !!}

  </div>
</div>



<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.semi_wholesale_price') }}</label>

    {!! Form::text('semi_wholesale_price[]', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.semi_wholesale_price') ] ) !!}

  </div>
</div>


<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  EAN </label>

    {!! Form::text('ean[]', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> 'EAN' ] ) !!}

  </div>
</div>


</div>







<button id='repeat_div' class="btn btn-success">{{ __('backend.add_unit') }}</button>


<br>
<br>

<div class="row">


<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.last_purchase_price') }}</label>

    {!! Form::text('last_purchase_price', $data->last_purchase_price , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.last_purchase_price') ] ) !!}

  </div>
</div>


<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> {{ __('backend.average_purchase_price') }}</label>

    {!! Form::text('average_purchase_price', $data->average_purchase_price , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.average_purchase_price') ] ) !!}

  </div>
</div>





<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> {{ __('backend.value_added') }}  </label>

    {!! Form::select('value_added', ['YES'=>'YES' , 'NO'=>'NO'] , $data->value_added  , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.value_added') ] ) !!}


  </div>
</div>





</div>




<h4 class="form-section"><i class="la la-commenting"></i> {{ __('backend.local_suppliers') }} </h4>
<div class="row">
<div class="form-group  col-md-8">

                    
                   
     <select  name='local_suppliers_id[]' class="select2 form-control" multiple="multiple">
                      
                   @foreach ($suppliers->where('supplier_type' , 'داخلى') as $row)

                 <option 

                  
                 @if ( $data->products_local_suppliers->contains('supplier_id' , $row->id))

                 selected

                 @endif
       
       
               value="{{$row->id}}">{{$row->name}}</option>


                        @endforeach
                      
                      
                    </select>
</div>
</div>





<h4 class="form-section"><i class="la la-commenting"></i>{{ __('backend.foreign_suppliers') }}</h4>


<div class="row">
<div class="form-group  col-md-8">

                    
                   
     <select  name='foreign_suppliers_id[]' class="select2 form-control" multiple="multiple">
                      
                   @foreach ($suppliers->where('supplier_type' , 'خارجى') as $row)
                   <option 
                   
                   
                   
                  
@if ( $data->products_local_suppliers->contains('supplier_id' , $row->id))

selected

@endif


                     value="{{$row->id}}">{{$row->name}}</option>
                   @endforeach
                      
                      
                    </select>
</div>
</div>





<h4 class="form-section"><i class="la la-commenting"></i>{{ __('backend.notes') }}</h4>


<div class="row">
<div class="col-md-12">
  <div class="form-group">
   
    

    {!! Form::text('notes', null , ['id'=>'notes', 'class' => 'form-control' , 'placeholder'=> ' Notes' ] ) !!}

  </div>
</div>
</div>




                      </div>
					  
					  
					  
                      <div class="tab-pane" id="profile2" role="tabpanel" aria-labelledby="profile-tab2"
                      aria-expanded="false">




 
<div  class="row">

<div class="col-md-12">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.complementary_products') }}       </label>

    <select  style="width:100%"  name='complementary_products[]' class="select2 form-control" multiple="multiple">
                      
                      @foreach ($all_products as $row)
                     <option 
                     
                                    
@if ( $data->products_complementary->contains('id' , $row->id))

selected

@endif


 value="{{$row->id}}">{{ $row->title_ar }}</option>
                      @endforeach
                         
                         
                       </select>


  </div>
</div>




</div>                      
                        

<div  class="row">



<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.expiration_date') }}       </label>

    {!! Form::date('expiration_date', $data->expiration_date , ['id'=>'expiration_date', 'class' => 'form-control' , 'placeholder'=>  __('backend.expiration_date')   ] ) !!}

  </div>
</div>





<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.production_date') }}       </label>

    {!! Form::date('production_date', $data->production_date , ['id'=>'production_date', 'class' => 'form-control' , 'placeholder'=>  __('backend.production_date')   ] ) !!}

  </div>
</div>




<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.loot_number') }}       </label>

    {!! Form::number('loot_number', $data->loot_number , ['id'=>'loot_number', 'class' => 'form-control' , 'placeholder'=>  __('backend.loot_number')   ] ) !!}

  </div>
</div>


<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.product_package_dimensions') }}       </label>

<div class="row">
  <div class="col-sm-2">{!! Form::text('product_package_dimensions_x', $data->product_package_dimensions_x , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=>  'X'  ] ) !!}</div>
  <div class="col-sm-2">{!! Form::text('product_package_dimensions_y', $data->product_package_dimensions_y , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=>  'Y'   ] ) !!}</div>
  <div class="col-sm-2">{!! Form::text('product_package_dimensions_z', $data->product_package_dimensions_z , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=> 'Z'   ] ) !!}</div>
</div>

  </div>
</div>



</div>









@foreach($products_repositories as $row_repository)

<div class="row">

<div class="col-md-12">
<h4 class="form-section"><i class="la la-commenting"></i> {{ __('backend.add_repository') }}       </h4>
</div>



<div class="col-md-3">
    <div class="form-group">
      <label for="projectinput3">  {{ __('backend.repository') }}  </label>

      
      {!! Form::select('repositories[]', $repositories ,  $row_repository->repositories_id , ['id'=>'repositories', 'class' => 'form-control' , 'placeholder'=> '------' ] ) !!}


    </div>
  </div>


  
  

<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.quantity_each_repository') }} </label>

    {!! Form::text('quantity_each_repository[]', $row_repository->quantity_each_repository , ['id'=>'quantity_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'  ] ) !!}

  </div>
</div>





<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.minimum_quantity_each_repository') }} </label>

    {!! Form::text('minimum_quantity_each_repository[]', $row_repository->minimum_quantity_each_repository , ['id'=>'minimum_quantity_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'   ] ) !!}

  </div>
</div>


<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.maximum_quantity_each_repository') }} </label>

    {!! Form::text('maximum_quantity_each_repository[]', $row_repository->maximum_quantity_each_repository , ['id'=>'maximum_quantity_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'   ] ) !!}

  </div>
</div>




<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.delivery_period_each_repository') }} </label>

    {!! Form::text('delivery_period_each_repository[]', $row_repository->delivery_period_each_repository , ['id'=>'delivery_period_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'   ] ) !!}

  </div>
</div>







<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.product_place') }}       </label>

<div class="row">
  <div class="col-sm-2">{!! Form::text('product_place_x[]', $row_repository->product_place_x , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=>  'X'  ] ) !!}</div>
  <div class="col-sm-2">{!! Form::text('product_place_y[]', $row_repository->product_place_y , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=>  'Y'   ] ) !!}</div>
  <div class="col-sm-2">{!! Form::text('product_place_z[]', $row_repository->product_place_z , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=> 'Z'   ] ) !!}</div>
</div>

  </div>
</div>




</div>



@endforeach


<div class="row">

<div class="col-md-12">
<h4 class="form-section"><i class="la la-commenting"></i> {{ __('backend.add_repository') }}       </h4>
</div>



<div class="col-md-3">
    <div class="form-group">
      <label for="projectinput3">  {{ __('backend.repository') }}  </label>

      
      {!! Form::select('repositories[]', $repositories ,  null , ['id'=>'repositories', 'class' => 'form-control' , 'placeholder'=> '------' ] ) !!}


    </div>
  </div>


  
  

<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.quantity_each_repository') }} </label>

    {!! Form::text('quantity_each_repository[]', null , ['id'=>'quantity_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'  ] ) !!}

  </div>
</div>





<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.minimum_quantity_each_repository') }} </label>

    {!! Form::text('minimum_quantity_each_repository[]', null , ['id'=>'minimum_quantity_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'   ] ) !!}

  </div>
</div>


<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.maximum_quantity_each_repository') }} </label>

    {!! Form::text('maximum_quantity_each_repository[]', null , ['id'=>'maximum_quantity_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'   ] ) !!}

  </div>
</div>




<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.delivery_period_each_repository') }} </label>

    {!! Form::text('delivery_period_each_repository[]', null , ['id'=>'delivery_period_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'   ] ) !!}

  </div>
</div>







<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3">   {{ __('backend.product_place') }}       </label>

<div class="row">
  <div class="col-sm-2">{!! Form::text('product_place_x[]', null , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=>  'X'  ] ) !!}</div>
  <div class="col-sm-2">{!! Form::text('product_place_y[]', null , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=>  'Y'   ] ) !!}</div>
  <div class="col-sm-2">{!! Form::text('product_place_z[]', null , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=> 'Z'   ] ) !!}</div>
</div>

  </div>
</div>




</div>



<button id='repeat_repository_div' class="btn btn-success">{{ __('backend.add_repository') }}</button>


<br>
<br>




<hr>







<div  class="row">



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.sku_supplier') }} </label>

    {!! Form::text('sku_supplier', $data->sku_supplier , ['id'=>'package_unit', 'class' => 'form-control' , 'placeholder'=>  __('backend.sku_supplier')   ] ) !!}

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.total_quantity') }} </label>

    {!! Form::text('total_quantity',  $data->total_quantity , ['id'=>'package_unit', 'class' => 'form-control' , 'placeholder'=>  __('backend.total_quantity')   ] ) !!}

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.minimum_total_quantity') }} </label>

    {!! Form::text('minimum_total_quantity',  $data->minimum_total_quantity , ['id'=>'package_unit', 'class' => 'form-control' , 'placeholder'=>  __('backend.minimum_total_quantity')   ] ) !!}

  </div>
</div>





<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.maximum_total_quantity') }} </label>

    {!! Form::text('maximum_total_quantity', $data->maximum_total_quantity , ['id'=>'package_unit', 'class' => 'form-control' , 'placeholder'=>  __('backend.maximum_total_quantity')   ] ) !!}

  </div>
</div>




<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.total_demand_limit') }} </label>

    {!! Form::text('total_demand_limit', $data->total_demand_limit , ['id'=>'total_demand_limit', 'class' => 'form-control' , 'placeholder'=>  __('backend.total_demand_limit')   ] ) !!}

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.delivery_period_main_repository') }} </label>

    {!! Form::number('delivery_period_main_repository',  $data->delivery_period_main_repository , ['id'=>'delivery_period_main_repository', 'class' => 'form-control' , 'placeholder'=>  __('backend.delivery_period_main_repository')   ] ) !!}

  </div>
</div>








<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> {{__('backend.special_price_realted_by_another_product') }}   </label>

    {!! Form::text('special_price_realted_by_another_product', $data->special_price_realted_by_another_product , ['id'=>'special_price_realted_by_another_product', 'class' => 'form-control'  , 'placeholder'=>  __('backend.special_price_realted_by_another_product')     ] ) !!}

  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> {{__('backend.cost_price') }}   </label>

    {!! Form::text('cost_price', $data->cost_price , ['id'=>'cost_price', 'class' => 'form-control'  , 'placeholder'=>  __('backend.cost_price')     ] ) !!}

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> {{__('backend.price_related_by_quantity') }}   </label>


    <select   name='price_related_by_quantity' class="form-control">
    <option  >-----</option>
                      @foreach ($quantity_prices as $row)
                     <option @if($data->price_related_by_quantity == $row->id ) selected @endif  value="{{$row->price}}">Quantity : {{ $row->quantity }} - Price : {{ $row->price }}</option>
                      @endforeach
                         
                         
                       </select>


   

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> {{__('backend.additional_costs_related_by_product') }}   </label>

    {!! Form::text('additional_costs_related_by_product', $data->additional_costs_related_by_product , ['id'=>'additional_costs_related_by_product', 'class' => 'form-control'  , 'placeholder'=>  __('backend.additional_costs_related_by_product')     ] ) !!}

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> {{__('backend.shipping_charges') }}   </label>

    {!! Form::text('shipping_charges',  $data->shipping_charges , ['id'=>'shipping_charges', 'class' => 'form-control'  , 'placeholder'=>  __('backend.shipping_charges')     ] ) !!}

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> {{__('backend.cod_charges') }}   </label>

    {!! Form::text('cod_charges', $data->cod_charges , ['id'=>'cod_charges', 'class' => 'form-control'  , 'placeholder'=>  __('backend.cod_charges')     ] ) !!}

  </div>
</div>





                      </div>
					  
					  
                    </div>



                    <div class="tab-pane" id="websites_properties" role="tabpanel" aria-labelledby="websites_properties-tab2"
                      aria-expanded="false">


        <ul class="nav nav-tabs nav-topline">
					
        <li class="nav-item">
                        <a class="nav-link active" id="homesss-tab2" data-toggle="tab" href="#homesss2" aria-controls="homesss2"
                        aria-expanded="true">عروض الاسعار</a>
                      </li>


        @foreach($websites as $k=>$website)
          <li class="nav-item">
            <a style="width: 200px;" class="nav-link" id="websites_tab_properties-tab2{{$website->id}}" data-toggle="tab" href="#websites_tab_properties{{$website->id}}" aria-controls="websites_tab_properties"
            aria-expanded="true">{{$website->title}}</a>
          </li>
       @endforeach



        </ul>
        <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
        <div role="tabpanel" class="tab-pane active" id="homesss2" aria-labelledby="homesss-tab2" aria-expanded="true">
                       
        


                       <div  class="row">
               
               <div class="col-md-6">
                 <div class="form-group">
                   <label for="projectinput3">   {{ __('backend.description_ar') }}       </label>
               
                   {!! Form::textarea('description_ar', null , ['id'=>'description_ar', 'class' => 'form-control' , 'placeholder'=>  __('backend.description_ar')   ] ) !!}
               
                 </div>
               </div>
               
               
               <div class="col-md-6">
                 <div class="form-group">
                   <label for="projectinput3">{{ __('backend.description_en') }}</label>
               
                   {!! Form::textarea('description_en', null , ['id'=>'description_en', 'class' => 'form-control' , 'placeholder'=>  __('backend.description_en')   ] ) !!}
               
                 </div>
               </div>
               
               
               </div>
                                     </div>

        @foreach($websites as $k=>$website)


        <div role="tabpanel" class="tab-pane" id="websites_tab_properties{{$website->id}}" aria-labelledby="home-tab2{{$website->id}}" aria-expanded="true">
                        

                          <div class="row">



@foreach( $website->fields->where('section' , 'product') as $field )
@php
$value = $field->GetFieldValue($field->id,$data->id);
@endphp



                          
                          @if( $field->field_type  == 'textarea' || $field->field_type  == 'checkbox' || $field->field_type  == 'options'  || $field->field_type  == 'files' )
                          <div class="col-md-12">
                          @else
                          <div class="col-md-4">
                          @endif


                            <div class="form-group">
                              <label for="projectinput1"> {{ $field->label_ar }}  </label>

                              @if($field->field_type  == 'number')

                              {!! Form::number(  $field->name , $value , ['class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ) !!}

                              @elseif($field->field_type  == 'textarea')

                              {!! Form::textarea(  $field->name , $value , [ 'rows' => '3' ,'class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ) !!}
                         
                              @elseif($field->field_type  == 'select')


<select name="{{$field->name}}" class="form-control">

  <option value="">---</option>

@foreach( explode(',',$field->selected_options) as $select_option )
  <option @if($value == $select_option ) selected @endif value="{{$select_option }}">{{$select_option }}</option>
@endforeach

  
</select>


@elseif($field->field_type  == 'checkbox')
{!! Form::checkbox(  $field->name , null , ['class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ) !!}
@elseif($field->field_type  == 'options')


@foreach( explode(',',$field->selected_options) as $select_option )
 
  <input type="radio"  name="{{$field->name}}" value="{{$select_option }}">{{$select_option }}  

@endforeach

  
@elseif( $field->field_type  == 'files' || $field->field_type  == 'images' )

<input type="file" multiple="multiple" name="{{$field->name}}[]"  />

                              @else

                              {!! Form::text(  $field->name , $value , ['class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ) !!}

                             @endif

                            </div>
                        
                          </div>

                          




                          @endforeach



                        </div>
                        
                        
       
                                              </div>
                                    
                                              @endforeach








        </div>

                      </div>
					  
					  
                    </div>

<div class="form-actions">

  <button type="submit" class="btn btn-primary">
    <i class="la la-check-square-o"></i> حفظ
  </button>
</div>



{!!Form::close()!!}



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

        <title> Products | {{config('settings.sitename')}}</title>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/forms/selects/select2.min.css">

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
  <script src="{{url('')}}/assets/app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="{{url('')}}/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="{{url('')}}/assets/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="{{url('')}}/assets/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{url('')}}/assets/app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

  <script src="{{url('')}}/assets/app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->


<script>

$(document).click(function() {
    
//Check Product Serial
      var len_sku = $('#sku').val();
      if( len_sku.length == 12 ) {

        $.ajax(
        {
         url: "{{url('')}}/{{config('settings.BackendPath')}}/products/get_product_serial_ajax/" + len_sku,
         type: 'GET',

       }).done( 

       function(data) {
        $('#sku').val(data.serial)
        });
     }
//End Check

});



$(document).ready(function(){

$('select[name="category_id"]').on('change', function() {
var category_id = $(this).val();
         
         $.ajax({

           beforeSend: function() {
              $("#loading-image").show();              
           },
           
             success: function() {
             $('#mother_product_id').load("{{url('')}}/{{config('settings.BackendPath')}}/products/get_mother_products_ajax/"+ category_id );
             $("#loading-image").hide();

             
             
           }
      });
      
  
        });


$('select[name="mother_product_id"]').on('change', function() {
var category_id = $(this).val();
var serial_product = "{{$last_serial}}";
var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");
$('#sku').val(mother_product_serial + brand_serial + firstname + '000' + serial_product); 


         $.ajax({

           beforeSend: function() {
              $("#loading-image").show();              
           },
           
             success: function() {
             $('#first_name').load("{{url('')}}/{{config('settings.BackendPath')}}/products/get_names_products_ajax/"+ category_id );
             $("#loading-image").hide();
             
             
           }
      });
      
  
        });

$('select[name="brand_id"]').on('change', function() {

//Change Product Name

//Arabic
var brand_title_ar = $('select[name="brand_id"]').find('option:selected').attr("title_ar");
var firstname_title_ar = $('select[name="first_name"]').find('option:selected').attr("title_ar");
var feature_1_title_ar = $('select[name="feature_1"]').find('option:selected').attr("title_ar");
var feature_2_title_ar = $('select[name="feature_2"]').find('option:selected').attr("title_ar");
var feature_3_title_ar = $('select[name="feature_3"]').find('option:selected').attr("title_ar");

$('#title_ar').val(brand_title_ar + ' ' + firstname_title_ar + ' ' + feature_1_title_ar + ' ' + feature_2_title_ar + ' ' + feature_3_title_ar);

//English
var brand_title_en = $('select[name="brand_id"]').find('option:selected').attr("title_en");
var firstname_title_en = $('select[name="first_name"]').find('option:selected').attr("title_en");
var feature_1_title_en = $('select[name="feature_1"]').find('option:selected').attr("title_en");
var feature_2_title_en = $('select[name="feature_2"]').find('option:selected').attr("title_en");
var feature_3_title_en = $('select[name="feature_3"]').find('option:selected').attr("title_en");


$('#title_en').val(brand_title_en + ' ' + firstname_title_en + ' ' + feature_1_title_en + ' ' + feature_2_title_en + ' '  + feature_3_title_en);


//End Change Product Name



//Change SKU 
var serial_product =  "{{$last_serial}}";
var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");
var feature_1 = $('select[name="feature_1"]').find('option:selected').attr("serial");
var feature_2 = $('select[name="feature_2"]').find('option:selected').attr("serial");
var feature_3 = $('select[name="feature_3"]').find('option:selected').attr("serial");
if(!feature_3 || feature_1.length == 2 ) var feature_3 = '';
$('#sku').val(mother_product_serial + brand_serial + firstname + feature_1  + feature_2 + feature_3 + serial_product);

//END Change SKU 


});


$('select[name="first_name"]').on('change', function() {

//Change SKU

var category_id = $(this).val();
var element = $(this).find('option:selected'); 
var title_en = element.attr("title_en");
var title_ar = element.attr("title_ar"); 
$('#title_ar').val(title_ar); 
$('#title_en').val(title_en); 

var serial_product =  "{{$last_serial}}";
var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");




$('#sku').val(mother_product_serial + brand_serial + firstname + '000' + serial_product ); 

//END Change SKU


         $.ajax({

           beforeSend: function() {
              $("#loading-image").show();              
           },
           
             success: function() {
             $('#features_div').load("{{url('')}}/{{config('settings.BackendPath')}}/products/get_features_products_ajax/"+ category_id );
             $("#loading-image").hide();

             


             
             
           }
      });
      
  
});




        

    });




$(function () {
    $("#repeat_div").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        $self.before($self.prev('div').clone());
        
    });
});

$(function () {
    $("#repeat_repository_div").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        $self.before($self.prev('div').clone());
        
    });
});


$(function () {
    $("#repeat_photo_div").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        $self.before($self.prev('div').clone());
        
    });
});





</script>
@endsection