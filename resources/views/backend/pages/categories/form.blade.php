
                      <div class="form-body">

                        @include('backend.includes.errors') 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>    {{ __('backend.basic_information') }}  </h4>


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">{{ __('backend.arabic_title') }}</label>

                              {!! Form::text('title', null , ['class' => 'form-control' , 'placeholder'=> 'Arabic Title'] ) !!}
                             
                            </div>
                          </div>


                        </div>



                          
                        </div>
                        
                        
                        
                        
                        
                 <div class="row">        
                        
                        
                        
 <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">{{ __('backend.english_title') }}</label>

                              {!! Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=> 'English Title'] ) !!}
                             
                            </div>
                          </div>


                        </div>




                 
<h4 class="form-section"><i class="la la-commenting"></i>    {{ __('backend.photos') }}  </h4>



@if(isset($data->photos) )

<div class="row">

@foreach ( $data->photos as $photo) 

<div class="col-md-3">
    <div class="form-group">
     


<a data-toggle="modal" data-target="#photoModal{{$photo->id}}" href="#">
<img src="{{url('')}}/uploads/categories_photos/{{$data->id}}/{{$photo->photo_name}}"   width="150">
</a> 

<br>

<a target="_blank" href="{{url('')}}/{{config('settings.BackendPath')}}/categories/photos/delete/{{$photo->id}}" style="color:#fff;" type="button" class="btn btn-danger" data-dismiss="modal">Delete</a>

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

      <img src="{{url('')}}/uploads/categories_photos/{{$data->id}}/{{$photo->photo_name}}"   width="100%">


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


@endif



<div class="row">

<div class="col-md-3">
    <div class="form-group">
      <label for="projectinput3">  {{ __('backend.choose_photo') }}  </label>

      <input type="file" multiple  id="product_photos" name="product_photos[]" >

    </div>
  </div>

</div>




                    
<h4 class="form-section"><i class="la la-commenting"></i>    {{ __('backend.websites_properties') }}  </h4>



                        <div class="tab-pane" id="websites_properties" role="tabpanel" aria-labelledby="websites_properties-tab2"
                      aria-expanded="false">


        <ul class="nav nav-tabs nav-topline">
					
        


        @foreach($websites as $k=>$website)
          <li class="nav-item">
            <a style="width: 200px;" class="nav-link @if($k == 0) {{'active'}} @endif" id="websites_tab_properties-tab2{{$website->id}}" data-toggle="tab" href="#websites_tab_properties{{$website->id}}" aria-controls="websites_tab_properties"
            aria-expanded="true">{{$website->title}}</a>
          </li>
       @endforeach



        </ul>
        <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">






        @foreach($websites as $k=>$website)


        <div role="tabpanel" class="tab-pane @if($k == 0) {{'active'}} @endif" id="websites_tab_properties{{$website->id}}" aria-labelledby="home-tab2{{$website->id}}" aria-expanded="true">
                        
                      

                       
                        
                          <div class="row">
                          @foreach( $website->fields->where('section' , 'categories') as $field )

                          

                          
                          @if( $field->field_type  == 'textarea' || $field->field_type  == 'checkbox' || $field->field_type  == 'options'  || $field->field_type  == 'files' )
                          <div class="col-md-12">
                          @else
                          <div class="col-md-4">
                          @endif


                            <div class="form-group">
                              <label for="projectinput1"> {{ $field->label_ar }}  </label>

                              @if($field->field_type  == 'number')

                              {!! Form::number(  $field->name , null , ['class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ) !!}

                              @elseif($field->field_type  == 'textarea')

                              {!! Form::textarea(  $field->name , null , [ 'rows' => '3' ,'class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ) !!}
                         
                              @elseif($field->field_type  == 'select')


<select name="{{$field->name}}" class="form-control">

  <option value="">---</option>

@foreach( explode(',',$field->selected_options) as $select_option )
  <option value="{{$select_option }}">{{$select_option }}</option>
@endforeach

  
</select>





@elseif($field->field_type  == 'checkbox')
{!! Form::checkbox(  $field->name , null , ['class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ) !!}
@elseif($field->field_type  == 'options')


@foreach( explode(',',$field->selected_options) as $select_option )
 
  <input type="radio" name="{{$field->name}}" value="{{$select_option }}">{{$select_option }}  

@endforeach

  
@elseif( $field->field_type  == 'files' || $field->field_type  == 'images' )

<input type="file" multiple="multiple" name="{{$field->name}}[]"  />



                              @else


                              {!! Form::text(  $field->name , $field->category_value($cat_id) , ['class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ) !!}

                             @endif

                            </div>
                        
                          </div>

                          




                          @endforeach



                        </div>
                        
                        
       
                                              </div>
                                    
                                              @endforeach


        </div>

                     


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> {{ __('backend.save') }}
                        </button>
                      </div>