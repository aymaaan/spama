
                      <div class="form-body">

                        <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>   <?php echo e(__('backend.basic_information')); ?>       </h4>


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.name')); ?> </label>

                              <?php echo Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ); ?>

                             
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.phone')); ?> </label>

                              <?php echo Form::text('phone', null , ['class' => 'form-control' , 'placeholder'=> __('backend.phone')] ); ?>

                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.email')); ?> </label>

                              <?php echo Form::text('email', null , ['class' => 'form-control' , 'placeholder'=> __('backend.email')] ); ?>

                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.job')); ?> </label>

                              <?php echo Form::text('job', null , ['class' => 'form-control' , 'placeholder'=> __('backend.job')] ); ?>

                             
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.address')); ?> </label>

                              <?php echo Form::text('address', null , ['class' => 'form-control' , 'placeholder'=> __('backend.address')] ); ?>

                             
                            </div>
                          </div>



                        </div>




                        </div>
                       


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> <?php echo e(__('backend.save')); ?>

                        </button>
                      </div>
                    
