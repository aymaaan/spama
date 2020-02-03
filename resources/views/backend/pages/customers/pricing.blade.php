@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title">عرض اسعار</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">



<div class="row">

@if($total_products)

<div class="col-md-6">

    <div class="form-group">
   
      رقم  : {{ $total_products[0]->serial }}

    </div>
  
    </div>


    
<div class="col-md-6">

<div class="form-group">

  التاريخ  : {{ $total_products[0]->assessment_date }}

</div>

</div>

@endif

<div class="col-md-6">

    <div class="form-group">
   
      السيد  : {{$customer->name}}

    </div>
  
    </div>


    <div class="col-md-6">
    <div class="form-group">
    
     
      العنوان  : {{$customer->address}}


    </div>
               
    <br>
    </div>




    <div class="col-md-12">
 
 <div class="form-group">
 
 <h4 class="form-section"><i class="la la-commenting"></i>  موجز التسعيرة     </h4>
 
 
 </div>
 
 </div>
      

    <div class="col-md-6">

   
    
    <div class="form-group">
    
     
      المجموع  :
      
      @if($total_products)
      
       {{ $total_products->sum('total_all_price') }} ريال سعودي

       @else
 
       0 ريال سعودي

      @endif


    </div>
  
    </div>


    <div class="col-md-6">

    
   
    <div class="form-group">

      الخصم  :  {{ $total_discount }} ريال سعودي

    </div>
  
    </div>


    <div class="col-md-6">

    <div class="form-group">
    
     
      الصافى  :  @if($total_products)
      
      {{ $total_products->sum('total_all_price') - $total_discount  }} ريال سعودي

      @else

      0 ريال سعودي

     @endif


    </div>
  
    </div>

    <div class="col-md-6">

    
   
    <div class="form-group">
    
     
      الضريبة  : 
    @if( isset($total_vat) && $total_vat > 0)
      
      {{ $total_vat }}

    @else

     0  ريال سعودي

    @endif


    </div>
  
    </div>

    <div class="col-md-6">

<div class="form-group">

 
  الصافى مع الضريبة  :  @if($total_products)
      
      {{ $total_products->sum('total_all_price') + $total_vat -  $total_discount }}

      @else

     0 ريال سعودي

     @endif


</div>

</div>

<div class="col-md-12">
 
<div class="form-group">

 
<h4 class="form-section"><i class="la la-commenting"></i>  الشروط والاحكام      </h4>
  


</div>

</div>


<div class="col-md-6">
 
<div class="form-group">

<a href="#" data-toggle="modal" data-target="#settings_payment_methods" >
   طريقة الدفع  
   
   
</a>
@if(isset($pricing_settings->payment_title1))
:  {{__('backend.'.$pricing_settings->payment_title1)}} التعميد {{$payment_before}}% -
@endif
@if( isset($pricing_settings->payment_title2))
 {{__('backend.'.$pricing_settings->payment_title2)}} التسليم {{$payment_while}}% -
 @endif
 @if(isset($pricing_settings->payment_title3))
  {{__('backend.'.$pricing_settings->payment_title3)}} التركيب {{$payment_after }}%
  @endif

</div>

</div>

<!-- Modal -->
<div class="modal fade" id="settings_payment_methods" tabindex="-1" role="dialog" aria-labelledby="settings_payment_methods" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settings_pricing">{{ __('backend.settings') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


{!! Form::open([ 'url' => config('settings.BackendPath').'/pricing/update_settings_pricing'   , 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}  

<div class="form-body">

{!! Form::hidden('serial', $total_products[0]->serial   , ['class' => 'form-control' ] ) !!}

<div class="row">

                           <div class="col-md-3">
                            <div class="form-group">
                             
<label for="projectinput1"> <B> المرحلة </B>   </label>
{!! Form::select('payment_title1', [ 'before'=>__('backend.before') ,  'while'=>__('backend.while') , 'after'=>__('backend.after')]  , null  , ['required' => 'required','class' => 'form-control' , 'placeholder'=>'----'] ) !!}
                             
                            </div>
                          </div>


                          
                          <div class="col-md-3">
                            <div class="form-group">
                             
<label for="projectinput1"> <B>  التعميد %</B>   </label>
{!! Form::text('payment_before', $payment_before  , ['class' => 'form-control' ] ) !!} 
                             
                            </div>
                          </div>



</div>




<div class="row">

<div class="col-md-3">
                            <div class="form-group">
                             
<label for="projectinput1"> <B> المرحلة </B>   </label>
{!! Form::select('payment_title2', [ 'before'=>__('backend.before') ,  'while'=>__('backend.while') , 'after'=>__('backend.after')]  , null  , ['required' => 'required','class' => 'form-control' , 'placeholder'=>'----'] ) !!}
                             
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <B>  التسليم %</B>   </label>

                              {!! Form::text('payment_while', $payment_while  , ['class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>


                          </div>


                          

<div class="row">



<div class="col-md-3">
                            <div class="form-group">
                             
<label for="projectinput1"> <B> المرحلة </B>   </label>
{!! Form::select('payment_title3', [ 'before'=>__('backend.before') ,  'while'=>__('backend.while') , 'after'=>__('backend.after')]  , null  , ['required' => 'required','class' => 'form-control' , 'placeholder'=>'----'] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <B>  التركيب %</B>   </label>

                              {!! Form::text('payment_after', $payment_after , ['class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>

                          </div>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.close') }}</button>
        <button type="submit" type="button" class="btn btn-primary"> {{ __('backend.save') }}  </button>
      </div>

      {!!Form::close()!!}
     

    </div>


  </div>
</div>

<div class="col-md-6">

<div class="form-group">

<a href="#" data-toggle="modal" data-target="#settings_offer_validity" >
 
   صلاحية العرض    : 

   </a>

   {{$offer_validity}} يوم


</div>

</div>


<!-- Modal -->
<div class="modal fade" id="settings_offer_validity" tabindex="-1" role="dialog" aria-labelledby="settings_payment_methods" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settings_pricing">{{ __('backend.settings') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


{!! Form::open([ 'url' => config('settings.BackendPath').'/pricing/update_settings_pricing'   , 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}  

<div class="form-body">

{!! Form::hidden('serial', $total_products[0]->serial   , ['class' => 'form-control' ] ) !!}

<div class="row">
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <B> صلاحية العرض </B>   </label>

                              {!! Form::text('offer_validity', $offer_validity  , ['class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>

                          </div>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.close') }}</button>
        <button type="submit" type="button" class="btn btn-primary"> {{ __('backend.save') }}  </button>
      </div>

      {!!Form::close()!!}
     

    </div>


  </div>
</div>


<!-- End MOdal -->


<div class="col-md-6">

<div class="form-group">

 
<a href="#" data-toggle="modal" data-target="#settings_delivery_place" >
 
   مكان التسليم     : 

</a>

{{$delivery_place_value}}


</div>

</div>




<!-- Modal -->
<div class="modal fade" id="settings_delivery_place" tabindex="-1" role="dialog" aria-labelledby="settings_payment_methods" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settings_pricing">{{ __('backend.settings') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


{!! Form::open([ 'url' => config('settings.BackendPath').'/pricing/update_settings_pricing'   , 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}  

<div class="form-body">

{!! Form::hidden('serial', $total_products[0]->serial   , ['class' => 'form-control' ] ) !!}

<div class="row">




                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <B>   مكان التسليم   </B>   </label>

                             
                                                      
<Select required name="delivery_place_type" id="colorselector2" class="form-control">
<option >----</option>
<option value="from">{{__('backend.from')}}</option>
<option value="customer">{{__('backend.customer')}}</option>
<option value="other">{{__('backend.other')}}</option>
</Select>
                             
                            </div>
                          </div>




                          <div id="delivery_place_div" class="col-md-9">


                          
                          </div>







                          </div>

</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.close') }}</button>
        <button type="submit" type="button" class="btn btn-primary"> {{ __('backend.save') }}  </button>
      </div>

      {!!Form::close()!!}
     

    </div>


  </div>
</div>
<!-- End MOdal -->











<div class="col-md-6">

<div class="form-group">

<a href="#" data-toggle="modal" data-target="#settings_supplying_duration" >

   مدة التوريد      :

</a>

{{$supplying_duration}} يوم عمل

</div>

</div>






<!-- Modal -->
<div class="modal fade" id="settings_supplying_duration" tabindex="-1" role="dialog" aria-labelledby="settings_payment_methods" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settings_pricing">{{ __('backend.settings') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


{!! Form::open([ 'url' => config('settings.BackendPath').'/pricing/update_settings_pricing'   , 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}  

<div class="form-body">

{!! Form::hidden('serial', $total_products[0]->serial   , ['class' => 'form-control' ] ) !!}

<div class="row">
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <B>  مدة التوريد  </B>   </label>

                              {!! Form::text('supplying_duration', $supplying_duration  , ['class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>


                          </div>

</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.close') }}</button>
        <button type="submit" type="button" class="btn btn-primary"> {{ __('backend.save') }}  </button>
      </div>

      {!!Form::close()!!}
     

    </div>


  </div>
</div>
<!-- End MOdal -->






<div class="col-md-6">
<div class="form-group">

 
<a href="#" data-toggle="modal" data-target="#settings_notes" >
   ملاحظات :  
</a>

{{$notes}}

</div>

</div>



<!-- Modal -->
<div class="modal fade" id="settings_notes" tabindex="-1" role="dialog" aria-labelledby="settings_payment_methods" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settings_pricing">{{ __('backend.settings') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


{!! Form::open([ 'url' => config('settings.BackendPath').'/pricing/update_settings_pricing'   , 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}  

<div class="form-body">

{!! Form::hidden('serial', $total_products[0]->serial   , ['class' => 'form-control' ] ) !!}

<div class="row">
                          
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="projectinput1"> <B>  ملاحظات   </B>   </label>

                              {!! Form::textarea('notes', $notes  , ['rows'=>'5' , 'class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>


                          </div>

</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.close') }}</button>
        <button type="submit" type="button" class="btn btn-primary"> {{ __('backend.save') }}  </button>
      </div>

      {!!Form::close()!!}
     

    </div>


  </div>
</div>
<!-- End MOdal -->








</div>









<div class="col-md-12">
 
 <div class="form-group">
 
 <h4 class="form-section"><i class="la la-commenting"></i>  تفاصيل التسعيرة      </h4>
 
 
 </div>
 
 </div>




@if($total_products)

<!-- Modal -->
<div class="modal fade" id="settings_add_fast_product" tabindex="-1" role="dialog" aria-labelledby="settings_add_fast_product" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settings_pricing"> أضافة منتج سريع </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


{!! Form::open([ 'url' => config('settings.BackendPath').'/pricing/settings_add_fast_product'   , 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}  

<div class="form-body">

{!! Form::hidden('serial', $total_products[0]->serial   , ['class' => 'form-control' ] ) !!}
{!! Form::hidden('customer_id', $customer->id   , ['class' => 'form-control' ] ) !!}

<div class="row">
                          
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="projectinput1"> <B>  أسم المنتج عربي   </B>   </label>

                              {!! Form::text('title_ar', null , ['rows'=>'5' , 'class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="projectinput1"> <B>  أسم المنتج بالانجليزية   </B>   </label>

                              {!! Form::text('title_en', null , ['rows'=>'5' , 'class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>



                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> <B> الوحدة  </B>   </label>

                              {!! Form::select('unit_id', $units , null , ['rows'=>'5' , 'class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <B> سعر الوحدة  </B>   </label>

                              {!! Form::text('unit_price', null , ['rows'=>'5' , 'class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <B> الكمية  </B>   </label>

                              {!! Form::text('quantity', null , ['rows'=>'5' , 'class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>


                          </div>

</div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.close') }}</button>
        <button type="submit" type="button" class="btn btn-primary"> {{ __('backend.save') }}  </button>
      </div>

      {!!Form::close()!!}
     

    </div>


  </div>
</div>
<!-- End MOdal -->




     <div class="col-md-12">
     
     <a href="#" data-toggle="modal" data-target="#settings_add_fast_product" style="float:left;"  class="btn btn-success"> اضافة منتجات  </a>
        <table id="example" class="table table-striped table-bordered table-responsive  zero-configuration dataTable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">رقم المنتج</th>
              <th scope="col">البيان</th>
              <th scope="col">الوحدة</th>
              <th scope="col">الكمية</th>
              <th scope="col">سعر الوحدة</th>
              
              <th scope="col"> الخصم </th>
              <th scope="col"> الضريبة </th>
              <th scope="col"> المجموع </th>
            </tr>
          </thead>
          <tbody>
        
        
@foreach( $total_products as $k=>$product)
            <tr>
              <th> {{ $k + 1 }}</th>
        
              <th> @if( $product->info['sku']  != 'FAST_ADDED') {{ $product->info['sku'] }} @else 010101010101 @endif</th>
              <th> {{ $product->info['title_ar'] }} </th>
              <th> {{ $product->unit['title']  }} </th>
              <th> {{ $product->total_all_products  }} </th>
              <th> {{ $product->unit_price }} </th>
              <th>
              <a href="#" data-toggle="modal" data-target="#settings_discount_{{$product->id}}" >
               
              %{{ $product->discount OR '0' }}
               </a>
               </th>
              <th>
                 @if($product->info['value_added'] == 'YES') {{ ( $product->total_all_price - ( $product->total_all_price * $product->discount / 100  ) ) * 5 / 100 }} @else 0  @endif </th>
              
              <th>
                

              @if($product->info['value_added'] == 'YES')
               {{ $product->total_all_price - ( $product->total_all_price * $product->discount / 100  ) +  (($product->total_all_price - ( $product->total_all_price * $product->discount / 100  ) ) * 5 / 100)  }}
               @else
               {{ $product->total_all_price -  ( $product->total_all_price * $product->discount / 100  ) }}
               @endif
                </th>
            </tr>







<!-- Modal -->
<div class="modal fade" id="settings_discount_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="settings_user" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settings_pricing">{{ __('backend.settings') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


{!! Form::open([ 'url' => config('settings.BackendPath').'/pricing/update_discount_pricing'   , 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}  

<div class="form-body">

{!! Form::hidden('row_id', $product->id , ['class' => 'form-control' ] ) !!}

<div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> <B> % نسبة الخصم  | {{ $product->info['title_ar'] }}  </B>   </label>

                              {!! Form::text('discount', $product->discount  , ['class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>

                          </div>

</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.close') }}</button>
        <button type="submit" type="button" class="btn btn-primary"> {{ __('backend.save') }}  </button>
      </div>

      {!!Form::close()!!}
     

    </div>


  </div>
</div>



        @endforeach
 
          </tbody>
        </table>

        <a target="#"  data-toggle="modal" data-target="#print" style="float:left;" class="btn btn-success">  طباعة    </a> 

        
      
<!-- Modal -->
<div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="print" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settings_pricing">{{ __('backend.print') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


<div class="form-body">

<h4 class="form-section"><i class="la la-commenting"></i>  عربي      </h4>

<div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">

                              <a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/customers/pricing/{{$customer->id}}?t=print&lang=ar"  >   الموجز    </a> 

                              | 

                              <a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/customers/pricing/{{$customer->id}}?t=print&lang=ar&table=a4"  >    التفاصيل     </a> 

|
<a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/customers/pricing/{{$customer->id}}?t=print&lang=ar&table=a4&width=full"  >   2 التفاصيل     </a> 

                             
                            </div>
                          </div>

                          </div>



                          
<h4 class="form-section"><i class="la la-commenting"></i>  انجليزي      </h4>

<div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">

                              <a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/customers/pricing/{{$customer->id}}?t=print&lang=en"  >   الموجز    </a> 
| 

                              <a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/customers/pricing/{{$customer->id}}?t=print&lang=en&table=a4"  >    التفاصيل    </a> 

                              |
<a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/customers/pricing/{{$customer->id}}?t=print&lang=en&table=a4&width=full"  >   2 التفاصيل     </a> 

                             
                            </div>
                          </div>

                          </div>




</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.close') }}</button>
        
      </div>

      {!!Form::close()!!}


  </div>
</div>



        @endif
	  
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

$("#pricing").attr("href","{{url('')}}/{{config('settings.BackendPath')}}/assessment_pricing/"+customer);

} else {
  $("#new_registration").show(); 
  $("#tools").hide();
}
  
        });

      });



  
  $('select[name="delivery_place_type"]').on('change', function() {
  var delivery_place_type = $(this).val();
  
           
           $.ajax({
  
             beforeSend: function() {
                $("#loading-image").show();              
             },
             
               success: function() {
               $('#delivery_place_div').load("{{url('')}}/{{config('settings.BackendPath')}}/pricing/delivery_place_type/"+ delivery_place_type );
               $("#loading-image").hide();
  
               
               
             }
        });
        
    
          });


  
</script>

@endsection