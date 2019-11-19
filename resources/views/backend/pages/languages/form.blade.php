
                      <div class="form-body">

                        @include('backend.includes.errors') 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>   {{ __('backend.basic_information') }}      </h4>


                        <div class="row">
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.title') }}    </label>

                              {!! Form::text('title', null , ['class' => 'form-control' , 'placeholder'=>  __('backend.title') ] ) !!}
                             
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="projectinput1"> Code   </label>

                              {!! Form::text('code', null , ['class' => 'form-control' , 'placeholder'=> 'Code' ] ) !!}
                             
                            </div>
                          </div>

                           


                        </div>


                          
                        </div>
                       


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> {{ __('backend.save') }} 
                        </button>
                      </div>
                    
