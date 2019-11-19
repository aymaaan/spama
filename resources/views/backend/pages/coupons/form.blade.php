
                      <div class="form-body">

                        @include('backend.includes.errors') 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>     {{__('backend.basic_information')}}      </h4>


                        <div class="row">

                        @if( isset($_GET['campaign_title']) )
                          
                        
                              {!! Form::hidden('title', str_replace('-', ' ', $_GET['campaign_title']) , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.campaign_title')] ) !!}
                            

                          @else

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.campaign_title')}}  </label>

                              {!! Form::text('title', null , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.campaign_title')] ) !!}
                             
                            </div>
                          </div>

                          @endif


                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.numbers_of_coupons')}}  </label>

                              {!! Form::number('numbers_of_coupons', 1 , ['required' => 'required','class' => 'form-control' ,'id'=>'numbers_of_coupons' , 'placeholder'=> __('backend.amount')] ) !!}
                             
                            </div>
                          </div>


                          <div id="code" class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.code')}}  </label>

                              {!! Form::text('code', $coupoun , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.code')] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.discount_type')}}  </label>

                              {!! Form::select('type', [ 'fixed'=> __('backend.fixed') ,  'percent'=> __('backend.percent')] , null , ['class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.discount')}}  </label>

                              {!! Form::text('discount', null , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.discount')] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.total_amount')}}  </label>

                              {!! Form::text('amount', null , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.total_amount')] ) !!}
                             
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.uses_per_coupon')}}  </label>

                              {!! Form::text('uses_per_coupon', null , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.uses_per_coupon')] ) !!}
                             
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.uses_per_customer')}}  </label>

                              {!! Form::text('uses_per_customer', null , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.uses_per_customer')] ) !!}
                             
                            </div>
                          </div>


                        


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.start_date')}}  </label>

                              {!! Form::date('start_date', null , ['class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>


                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.end_date')}}  </label>

                              {!! Form::date('end_date', null , ['class' => 'form-control' ] ) !!}
                             
                            </div>
                          </div>


                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.qr_width')}}  </label>

                              {!! Form::text('qr_width', 500 , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.qr_width')] ) !!}
                             
                            </div>
                          </div>





<div class="col-md-12">
<h4 class="form-section"><i class="la la-commenting"></i> {{ __('backend.products') }}       </h4>
</div>





<div class="col-md-12">
  <div class="form-group">
    

<br>

<input id="checked_all_products" checked name='checked_all_products' value='1' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple"> <B> {{ __('backend.all_products') }}</B> 
   
<div id="checked_custom_products"  @if( isset($data) && $data->all_products == 1)  style="display:none" @endif>
<br>
<h4 class="form-section"><i class="la la-commenting"></i> {{ __('backend.add_product') }}       </h4>


    <select  style="width:100%;"  name='products[]' class="select2 form-control" multiple="multiple">
                      
                      @foreach ($all_products as $row)
                     <option  value="{{$row->id}}">{{ $row->title_ar }}</option>
                      @endforeach
                         
                         
                       </select>
                       </div>


  </div>
</div>








                        </div>


                          
                        </div>
                       


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i>  {{__('backend.save')}} 
                        </button>
                      </div>