<ul >
@foreach($childs as $child)
	<li >

@if($child->title_ar) 
<input type="checkbox" name="products_doc[]" value="{{$child->id}}" @if( $customer_products->contains('product_id', $child->id)) checked @endif >
@endif
 {{ $child->title }}   <B>{{ $child->title_ar }}</B>
	    @if( isset($child->products) )
        @include('backend.widgets.manageTreeChild',['childs' => $child->products])
        @endif

@if($child->title_ar)

  
<div class="row">

<div class="col-md-2">
    <div class="form-group">
      
      {!! Form::select('unit_id[]', $units ,  null , ['id'=>'unit_id_'.$child->id, 'class' => 'form-control' , 'placeholder'=> __('backend.unit') ] ) !!}
    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      
    {!! Form::number('quantity[]', null , ['id'=>'quantity_'.$child->id, 'class' => 'form-control' , 'placeholder'=> __('backend.quantity') ] ) !!}


    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      
    {!! Form::text('price[]', null , ['id'=>'price_'.$child->id, 'class' => 'form-control' , 'placeholder'=> __('backend.price') ] ) !!}


    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      
    {!! Form::text('estimate_consumption[]', null , ['id'=>'estimate_consumption_'.$child->id, 'class' => 'form-control' , 'placeholder'=> __('backend.estimate_consumption') ] ) !!}


    </div>
  </div>


  


  </div>


<script> 

        $("#quantity_{{$child->id}}").on("change", function() { 

            var quantity =  $("#quantity_{{$child->id}}").val();
            var unit =  $("#unit_id_{{$child->id}}").val();
  
        $.ajax(
        {
         url: "{{url('')}}/{{config('settings.BackendPath')}}/products/get_consumer_price/1/" + unit + "/" + quantity,
         type: 'GET',

       }).done( 

       function(data) {
        $("#price_{{$child->id}}").val(data.customer_price);
        });
 
        }); 


    </script> 
  


@endif

    
	</li>
@endforeach
</ul>