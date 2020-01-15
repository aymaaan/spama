
                      <div class="form-body">

                        @include('backend.includes.errors') 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>     {{__('backend.basic_information')}}      </h4>


                        <div class="row">
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.country_name_ar')}}  </label>

                              {!! Form::text('country_name_ar', null , ['class' => 'form-control' , 'placeholder'=> __('backend.country_name_ar')] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.nationality_ar')}}  </label>

                              {!! Form::text('title', null , ['class' => 'form-control' , 'placeholder'=> __('backend.nationality_ar')] ) !!}
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.country_name_en')}}  </label>

                              {!! Form::text('country_name_en', null , ['class' => 'form-control' , 'placeholder'=> __('backend.country_name_en')] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.nationality_en')}}  </label>

                              {!! Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=> __('backend.nationality_en')] ) !!}
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> CODE  </label>

                              {!! Form::text('code', null , ['class' => 'form-control' , 'placeholder'=> 'ex:EG'] ) !!}
                             
                            </div>
                          </div>





                        </div>


                          
                        </div>
                       


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i>  {{__('backend.save')}} 
                        </button>
                      </div>
                    
