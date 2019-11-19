
                      <div class="form-body">

                        @include('backend.includes.errors') 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>    {{ __('backend.basic_information') }}  </h4>


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">{{ __('backend.arabic_title') }}</label>

                              {!! Form::text('title_ar', null , ['class' => 'form-control' , 'placeholder'=> __('backend.arabic_title')] ) !!}
                             
                            </div>
                          </div>



                                
                     <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">{{ __('backend.english_title') }}</label>

                              {!! Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=> __('backend.english_title')] ) !!}
                             
                            </div>
                          </div>
                        </div>



                        <div class="row">        
                     <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">{{ __('backend.address') }}</label>

                              {!! Form::text('address', null , ['class' => 'form-control' , 'placeholder'=> __('backend.address')] ) !!}
                             
                            </div>
                          </div>
                              
                     <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">{{ __('backend.repository_keeper') }}</label>

                              {!! Form::text('repository_keeper', null , ['class' => 'form-control' , 'placeholder'=> __('backend.repository_keeper')] ) !!}
                             
                            </div>
                          </div>
                        </div>



                        <div class="row">        
                     <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">{{ __('backend.repository_capacity') }}</label>

                              {!! Form::text('repository_capacity', null , ['class' => 'form-control' , 'placeholder'=> __('backend.repository_capacity')] ) !!}
                             
                            </div>
                          </div>
                             
                     <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">{{ __('backend.notes') }}</label>

                              {!! Form::text('notes', null , ['class' => 'form-control' , 'placeholder'=> __('backend.notes')] ) !!}
                             
                            </div>
                          </div>
                        </div>

                        

                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> {{ __('backend.save') }}
                        </button>
                      </div>