
                      <div class="form-body">

                        <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


                       
 <h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('backend.basic_information')); ?></h4>
     


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.name')); ?> </label>

                              <?php echo Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ); ?>

                             
                            </div>
                          </div>


                           <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  <?php echo e(__('backend.phone')); ?>     </label>

                              <?php echo Form::number('phone' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: 01008939750'] ); ?>


                            </div>
                          
                            </div>
                            
                            
                            
                            
                     
                     

                          


                        </div>

 <h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.login_information')); ?>    </h4>
     
                          
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.email')); ?>   </label>

                              <?php echo Form::text('email', null , ['class' => 'form-control' , 'placeholder'=> __('backend.email')] ); ?>

                           
                            </div>
                          </div>


<?php if(!isset($user)): ?>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  <?php echo e(__('backend.password')); ?>    </label>

                              <?php echo Form::password('password', ['class' => 'form-control' , 'placeholder'=> __('backend.password')] ); ?>


                            </div>
                          
                            </div>
<?php endif; ?>

                          



                            
                            </div>

<h4 class="form-section"><i class="la la-key"></i> <?php echo e(__('backend.roles')); ?>    </h4>

<div class="row">

                   
                             

<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="form-group  col-md-2">
<label>

<input             <?php if(isset($user->roles)): ?> <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $current_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($current_role->id == $role->id): ?> checked <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                     name='role_id[]' value='<?php echo e($role->id); ?>' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple"> <B 
                     title='<?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($permission->label); ?> | <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>' > <?php echo e($role->title); ?></B> 

</label>
</div>					

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


 </div>

                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> <?php echo e(__('backend.save')); ?>

                        </button>
                      </div>
                  