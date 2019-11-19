
                      <div class="form-body">

                        @include('backend.includes.errors') 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>     {{__('backend.basic_information')}}      </h4>


                        <div class="row">
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.quantity')}}  </label>

                              {!! Form::text('quantity', null , ['class' => 'form-control' , 'placeholder'=> __('backend.quantity')] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.price')}}  </label>

                              {!! Form::text('price', null , ['class' => 'form-control' , 'placeholder'=> __('backend.price')] ) !!}
                             
                            </div>
                          </div>


                        </div>


                          
                        </div>
                       


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i>  {{__('backend.save')}} 
                        </button>
                      </div>
                    
