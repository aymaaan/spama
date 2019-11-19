
                      <div class="form-body">

                        <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>    <?php echo e(__('backend.basic_information')); ?>  </h4>


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"><?php echo e(__('backend.arabic_title')); ?></label>

                              <?php echo Form::text('title_ar', null , ['class' => 'form-control' , 'placeholder'=> __('backend.arabic_title')] ); ?>

                             
                            </div>
                          </div>



                                
                     <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"><?php echo e(__('backend.english_title')); ?></label>

                              <?php echo Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=> __('backend.english_title')] ); ?>

                             
                            </div>
                          </div>
                        </div>



                        <div class="row">        
                     <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"><?php echo e(__('backend.address')); ?></label>

                              <?php echo Form::text('address', null , ['class' => 'form-control' , 'placeholder'=> __('backend.address')] ); ?>

                             
                            </div>
                          </div>
                              
                     <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"><?php echo e(__('backend.repository_keeper')); ?></label>

                              <?php echo Form::text('repository_keeper', null , ['class' => 'form-control' , 'placeholder'=> __('backend.repository_keeper')] ); ?>

                             
                            </div>
                          </div>
                        </div>



                        <div class="row">        
                     <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"><?php echo e(__('backend.repository_capacity')); ?></label>

                              <?php echo Form::text('repository_capacity', null , ['class' => 'form-control' , 'placeholder'=> __('backend.repository_capacity')] ); ?>

                             
                            </div>
                          </div>
                             
                     <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"><?php echo e(__('backend.notes')); ?></label>

                              <?php echo Form::text('notes', null , ['class' => 'form-control' , 'placeholder'=> __('backend.notes')] ); ?>

                             
                            </div>
                          </div>
                        </div>

                        

                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> <?php echo e(__('backend.save')); ?>

                        </button>
                      </div>