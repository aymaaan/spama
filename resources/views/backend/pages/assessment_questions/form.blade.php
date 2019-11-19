
                      <div class="form-body">

                        @include('backend.includes.errors') 


                       
 <h4 class="form-section">
 <i class="la la-commenting">
 </i>{{ __('backend.basic_information') }}
 </h4>


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> {{ __('backend.title') }} </label>

                              {!! Form::text('title', null , ['class' => 'form-control' , 'placeholder'=> __('backend.title')] ) !!}
                             
                            </div>
                          </div>

                        </div>
 
                        </div>
                       


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> {{ __('backend.save') }}
                        </button>
                      </div>
                    
