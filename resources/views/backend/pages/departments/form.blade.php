
                      <div class="form-body">

                        @include('backend.includes.errors') 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>   {{ __('backend.basic_information') }}      </h4>


                        <div class="row">
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.arabic_title') }}    </label>

                              {!! Form::text('title', null , ['class' => 'form-control' , 'placeholder'=>  __('backend.arabic_title') ] ) !!}
                             
                            </div>
                          </div>


                           <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.english_title') }}   </label>

                              {!! Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=> __('backend.english_title') ] ) !!}
                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.parent_section') }}   </label>

                              {!! Form::select('parent_id',  $sections  , null , ['class' => 'form-control' , 'placeholder'=> __('backend.master_department') ] ) !!}
                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.direct_manager') }}   </label>

                              {!! Form::select('direct_manager',  $managers  , null , ['class' => 'form-control' , 'placeholder'=> __('backend.direct_manager') ] ) !!}
                             
                            </div>
                          </div>



                        </div>


                          
                        </div>
                       


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> {{ __('backend.save') }} 
                        </button>
                      </div>
                    
