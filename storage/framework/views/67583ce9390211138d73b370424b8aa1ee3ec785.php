
                      <div class="form-body">

                        <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>     <?php echo e(__('backend.basic_information')); ?>      </h4>


                        <div class="row">
                          
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.arabic_title')); ?>  </label>

                              <?php echo Form::text('title', null , ['class' => 'form-control' , 'placeholder'=> __('backend.arabic_title')] ); ?>

                             
                            </div>
                          </div>




                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.english_title')); ?>  </label>

                              <?php echo Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=> __('backend.english_title')] ); ?>

                             
                            </div>
                          </div>
                            <div class="col-md-4">
                                <div id="custom-search-input">
                                    <label for="projectinput1">  <?php echo e(__('backend.address')); ?>     </label>
                                    <div class="input-group">

                                        <input id="autocomplete_search" name="autocomplete_search" type="text" class="form-control" placeholder="Search" />
                                        <input type="hidden" name="lat">
                                        <input type="hidden" name="long">
                                    </div>
                                </div>
                            </div>




                        </div>


                          
                        </div>
                       


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i>  <?php echo e(__('backend.save')); ?> 
                        </button>
                      </div>
                    
