
                      <div class="form-body">

                        <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>     <?php echo e(__('backend.basic_information')); ?>      </h4>


                        <div class="row">
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.quantity')); ?>  </label>

                              <?php echo Form::text('quantity', null , ['class' => 'form-control' , 'placeholder'=> __('backend.quantity')] ); ?>

                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.price')); ?>  </label>

                              <?php echo Form::text('price', null , ['class' => 'form-control' , 'placeholder'=> __('backend.price')] ); ?>

                             
                            </div>
                          </div>


                        </div>


                          
                        </div>
                       


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i>  <?php echo e(__('backend.save')); ?> 
                        </button>
                      </div>
                    
