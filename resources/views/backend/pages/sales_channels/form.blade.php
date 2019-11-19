
                      <div class="form-body">

                        @include('backend.includes.errors') 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>     {{__('backend.basic_information')}}      </h4>


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.arabic_title')}}  </label>

                              {!! Form::text('title', null , ['class' => 'form-control' , 'placeholder'=> __('backend.arabic_title')] ) !!}
                             
                            </div>
                          </div>




                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.english_title')}}  </label>

                              {!! Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=> __('backend.english_title')] ) !!}
                             
                            </div>
                          </div>





                        </div>


                          
                        </div>
                       

<h4 class="form-section"><i class="la la-commenting"></i>    {{ __('backend.delegates') }}  </h4>


@if( isset($data))
@foreach( $data->delegates as $delegates)

<div class="row">

<div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  {{ __('backend.name') }}     </label>

                              {!! Form::text('delegate_names[]', $delegates->name , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ) !!}
                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">   {{ __('backend.phone') }}      </label>

                              {!! Form::number('delegate_phones[]', $delegates->phone , ['class' => 'form-control' , 'placeholder'=> __('backend.phone')] ) !!}
                           
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">   {{ __('backend.area_covered') }}      </label>

                              {!! Form::text('area_covered[]', $delegates->area_covered , ['class' => 'form-control' , 'placeholder'=> __('backend.area_covered')] ) !!}
                           
                            </div>
                          </div>



                          


                          <div class="col-md-1">
                            <div class="form-group">
                               <label  for="projectinput3">       </label>

                               <br>

                              @can('delete_users') 
                              <a href="{{url('')}}/{{config('settings.BackendPath')}}/sales_channels/delegates/{{$delegates->id}}/delete" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                               @endcan
                             
                           
                            </div>
                          </div>



 </div>


@endforeach

@endif


<div class="row">

<div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  {{ __('backend.name') }}      </label>

                              {!! Form::text('delegate_names[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ) !!}
                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  {{ __('backend.phone') }}      </label>

                              {!! Form::text('delegate_phones[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.phone')] ) !!}
                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">   {{ __('backend.area_covered') }}      </label>

                              {!! Form::text('area_covered[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.area_covered')] ) !!}
                           
                            </div>
                          </div>


                          


 </div>



 <button id='repeat_div' class="btn btn-success">  {{ __('backend.add_delegate') }} </button>



                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i>  {{__('backend.save')}} 
                        </button>
                      </div>
                    
