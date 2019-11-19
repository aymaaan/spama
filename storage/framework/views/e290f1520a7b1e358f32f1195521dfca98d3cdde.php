
                      <div class="form-body">

                        <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.basic_information')); ?>    </h4>





<?php if( isset($_GET['cat']) ): ?>
<?php echo Form::hidden('cat', $_GET['cat']); ?>

<?php else: ?>
<div class="row">
 <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">  <?php echo e(__('backend.category')); ?>  </label>

                              <?php echo Form::select('categories_id' , $categories_id , null , ['class' => 'form-control' , 'placeholder'=> '---'] ); ?>

                             
                            </div>
                          </div>

</div> 
<?php endif; ?>



                        <div class="row">

                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.arabic_title')); ?>   </label>

                              <?php echo Form::text('title', null , ['class' => 'form-control' , 'placeholder'=> __('backend.arabic_title')] ); ?>

                             
                            </div>
                          </div>

                          </div>
                          <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.english_title')); ?>    </label>

                              <?php echo Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=>  __('backend.english_title') ] ); ?>

                             
                            </div>
                          </div>


                        </div>


                          
                        </div>
                       



                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> <?php echo e(__('backend.save')); ?>

                        </button>
                      </div>
                    
