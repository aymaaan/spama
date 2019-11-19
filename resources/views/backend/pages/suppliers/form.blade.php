
<div class="form-body">

@include('backend.includes.errors') 
              
 <h4 class="form-section"><i class="la la-commenting"></i>  {{ __('backend.basic_information') }}     </h4>
     


                        <div class="row">


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  {{ __('backend.type') }}   </label>


                              <select id="supplier_type" required name="supplier_type" class="form-control">

                                @can(['Local_Suppliers','Foreign_Suppliers'])

                                <option value=""> --- </option>


                                @endcan



                                @can('Local_Suppliers')

                                <option value="داخلى"  @if( isset($data) && $data->supplier_type == 'داخلى' ) {{'selected'}} @endif > داخلى </option>

                                @endcan

                                @can('Foreign_Suppliers')

                                <option value="خارجى" @if( isset($data) && $data->supplier_type == 'خارجى' ) {{'selected'}} @endif> خارجى </option>


                                @endcan



                              </select>

                           
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  {{ __('backend.facility_name') }} </label>

                              {!! Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.facility_name')] ) !!}
                             
                            </div>
                          </div>


                           <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  {{ __('backend.website') }}       </label>

                              {!! Form::text('website' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: www.google.com'] ) !!}

                            </div>
                            
                            </div>
                            
                     
                     
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  {{ __('backend.email') }}      </label>

                              {!! Form::text('email' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: info@google.com'] ) !!}

                            </div>
                          
                            </div>



                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">   {{ __('backend.address') }}   </label>

                              {!! Form::text('address', null , ['class' => 'form-control' , 'placeholder'=> __('backend.address')  ] ) !!}
                           
                            </div>
                          </div>

                        </div>



                        <div class="row">



                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  {{ __('backend.supplying_duration') }}       </label>

                              {!! Form::text('supplying_duration' , null , ['class' => 'form-control' , 'placeholder'=> __('backend.supplying_duration')] ) !!}

                            </div>
                            
                            </div>

                            <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  {{ __('backend.payment_method') }}       </label>

                              {!! Form::select('payment_method' , [__('backend.cash_money')=>__('backend.cash_money') , __('backend.pay_later')=>__('backend.pay_later')  ] , null , ['class' => 'form-control' ] ) !!}

                            </div>
                            
                            </div>



                            </div>


@can('Local_Suppliers')

<div id="credit_div">
<h4 class="form-section"><i class="la la-commenting"></i> {{ __('backend.credit_information') }}</h4>
<div class="row">
      

<div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  {{ __('backend.credit_limit') }}   </label>

                              {!! Form::text('credit_limit', null , ['class' => 'form-control' , 'placeholder'=> __('backend.credit_limit')] ) !!}
                           
                            </div>
                          </div>






<div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">   {{ __('backend.credit_term') }}    </label>

                              {!! Form::text('credit_term', null , ['class' => 'form-control' , 'placeholder'=> __('backend.credit_term') ] ) !!}
                           
                            </div>
                          </div>





 </div>



    </div>
@endcan

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

                              {!! Form::text('delegate_phones[]', $delegates->phone , ['class' => 'form-control' , 'placeholder'=> __('backend.phone')] ) !!}
                           
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  {{ __('backend.email') }} </label>

                              {!! Form::text('delegate_emails[]' , $delegates->email , ['class' => 'form-control' , 'placeholder'=> 'ex: info@google.com'] ) !!}

                            </div>
                          
                            </div>






                          <div class="col-md-1">
                            <div class="form-group">
                               <label  for="projectinput3">       </label>

                               <br>

                              @can('delete_users') 
                              <a href="{{url('')}}/{{config('settings.BackendPath')}}/delegates/{{$delegates->id}}/delete" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
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
                              <label for="projectinput1">  {{ __('backend.email') }} </label>

                              {!! Form::text('delegate_emails[]' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: info@google.com'] ) !!}

                            </div>
                          
                            </div>


 </div>



 <button id='repeat_div' class="btn btn-success">  {{ __('backend.add_delegate') }} </button>




                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> {{ __('backend.save') }}
                        </button>
                      </div>
                    
