<form method="post" action="{{url('')}}/{{config('settings.BackendPath')}}/assessment_products_delegate/{{$customer_id}}">
<div class="table-responsive">
<table id="example" class="table table-striped table-bordered zero-configuration dataTable">
  <thead>
    <tr>
      <th scope="col">SKU</th>
      @if( Auth::user()->display_content_ar == 1 )
      <th scope="col">{{__('backend.arabic_title')}}</th>
      @endif
      @if( Auth::user()->display_content_en == 1 ) 
      <th scope="col">{{__('backend.english_title')}}</th>
      @endif
      <th  scope="col">{{__('backend.unit')}}</th>
      <th scope="col"> {{__('backend.quantity')}} </th>
      <th scope="col"> {{ __('backend.price') }}</th>
      <th scope="col">  {{__('backend.estimate_consumption')}}  </th>
    </tr>
  </thead>
  <tbody>


<button  type="submit" class="btn btn-success btn">
<i class="icon-action-undo"></i>  حفظ   
</button>

  @foreach($categories->products as $category)
    <tr>
      <th>{{ $category->sku }} {!! Form::hidden('products_doc[]', $category->id  , ['id'=>'products_doc'.$category->id ] ) !!}  </th>
      @if( Auth::user()->display_content_ar == 1 )
      <th>{{ $category->title_ar }}</th>
      @endif
      @if( Auth::user()->display_content_en == 1 ) 
      <th>{{ $category->title_en }}</th>
      @endif
      <td>{!! Form::select('unit_id[]', $units ,  null , ['id'=>'unit_id_'.$category->id, 'style'=>'width:80px;', 'class' => 'form-control'  ] ) !!}</td>
      <td>{!! Form::number('quantity[]', null , ['id'=>'quantity' , 'product_id'=> $category->id , 'style'=>'width:80px;', 'class' => 'form-control' , 'placeholder'=> __('backend.quantity') ] ) !!}</td>
      <td>{!! Form::text('price[]', null , ['id'=>'price_'.$category->id, 'class' => 'form-control', 'style'=>'width:80px;' , 'placeholder'=> __('backend.price') ] ) !!}</td>
      <td>{!! Form::text('estimate_consumption[]', null , ['id'=>'estimate_consumption_'.$category->id , 'style'=>'width:80px;', 'class' => 'form-control' , 'placeholder'=> __('backend.estimate_consumption') ] ) !!}</td>
    </tr>
    
  @endforeach

  </tbody>
</table>
</div>
{!! Form::token() !!}

{!! Form::hidden('request_by', $request_by , ['id'=>'request_by'.$category->id, 'class' => 'form-control'  ] ) !!}

<button  type="submit" class="btn btn-success btn">
<i class="icon-action-undo"></i>  حفظ   
</button>


</form>



<script>
$(document).ready(function() {
  $('#example').DataTable( {
      "paging":   true,
      "ordering": true,
      "info":     false
  } );
} );
</script>


<!-- END PAGE LEVEL JS-->
<script src="{{url('')}}/assets/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>

<script src="{{url('')}}/assets/app-assets/js/scripts/tables/datatables/datatable-basic.js"
type="text/javascript"></script>