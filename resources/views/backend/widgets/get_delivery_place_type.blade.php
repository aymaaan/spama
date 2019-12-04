<div class="form-group">
<label for="projectinput1"> <B>   بيان التسليم    </B>   </label>



 @if($id == 'from')

 
<select required name="delivery_place_value" id="colorselector2" class="form-control">
<option >----</option>
@foreach($data as $row)
<option value="{{$row->id}}">{{$row->title}}</option>
@endforeach
</select>

@elseif($id == 'customer')

<select required name="delivery_place_value" id="colorselector2" class="form-control">
<option >----</option>

@foreach($data as $row)
<option value="{{$row->id}}">{{$row->name}}</option>
@endforeach

</select>

@else

 {!! Form::text('delivery_place_value', null  , ['class' => 'form-control' ] ) !!}

@endif


                             
</div>