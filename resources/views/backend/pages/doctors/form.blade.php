
                      <div class="form-body">

                        @include('backend.includes.errors') 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>   {{ __('backend.basic_information') }}       </h4>


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.name') }} </label>

                              {!! Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ) !!}
                             
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.phone') }} </label>

                              {!! Form::text('phone', null , ['class' => 'form-control' , 'placeholder'=> __('backend.phone')] ) !!}
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.email') }} </label>

                              {!! Form::text('email', null , ['class' => 'form-control' , 'placeholder'=> __('backend.email')] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.job') }} </label>

                              {!! Form::text('job', null , ['class' => 'form-control' , 'placeholder'=> __('backend.job')] ) !!}
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.address') }} </label>

                              {!! Form::text('address', null , ['class' => 'form-control' , 'placeholder'=> __('backend.address')] ) !!}
                             
                            </div>
                          </div>



                        </div>




                        </div>
                       


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> {{ __('backend.save') }}
                        </button>
                      </div>
                    
