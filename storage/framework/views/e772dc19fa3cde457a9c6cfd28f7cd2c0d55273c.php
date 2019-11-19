
                      <div class="form-body">

                        <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>     <?php echo e(__('backend.basic_information')); ?>      </h4>


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.arabic_title')); ?>  </label>

                              <?php echo Form::text('title', null , ['class' => 'form-control' , 'placeholder'=> __('backend.arabic_title')] ); ?>

                             
                            </div>
                          </div>




                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.english_title')); ?>  </label>

                              <?php echo Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=> __('backend.english_title')] ); ?>

                             
                            </div>
                          </div>





                        </div>


                          
                        </div>
                       

<h4 class="form-section"><i class="la la-commenting"></i>    <?php echo e(__('backend.delegates')); ?>  </h4>


<?php if( isset($data)): ?>


<?php $__currentLoopData = $data->delegates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delegates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row">

<div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.name')); ?>     </label>

                              <?php echo Form::text('delegate_names[]', $delegates->name , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ); ?>

                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">   <?php echo e(__('backend.phone')); ?>      </label>

                              <?php echo Form::number('delegate_phones[]', $delegates->phone , ['class' => 'form-control' , 'placeholder'=> __('backend.phone')] ); ?>

                           
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">   <?php echo e(__('backend.area_covered')); ?>      </label>

                              <?php echo Form::text('area_covered[]', $delegates->area_covered , ['class' => 'form-control' , 'placeholder'=> __('backend.area_covered')] ); ?>

                           
                            </div>
                          </div>



                          


                          <div class="col-md-1">
                            <div class="form-group">
                               <label  for="projectinput3">       </label>

                               <br>

                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_users')): ?> 
                              <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/sales_channels/delegates/<?php echo e($delegates->id); ?>/delete" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                               <?php endif; ?>
                             
                           
                            </div>
                          </div>



 </div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>


<div class="row">

<div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.name')); ?>      </label>

                              <?php echo Form::text('delegate_names[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ); ?>

                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.phone')); ?>      </label>

                              <?php echo Form::text('delegate_phones[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.phone')] ); ?>

                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">   <?php echo e(__('backend.area_covered')); ?>      </label>

                              <?php echo Form::text('area_covered[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.area_covered')] ); ?>

                           
                            </div>
                          </div>


                          


 </div>



 <button id='repeat_div' class="btn btn-success">  <?php echo e(__('backend.add_delegate')); ?> </button>



                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i>  <?php echo e(__('backend.save')); ?> 
                        </button>
                      </div>
                    
