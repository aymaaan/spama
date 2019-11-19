
<div class="form-body">


    <?php if(count($errors)): ?>


    <div id='msg' class="note note-danger">

     من فضلك أدخل بيانات جميع الحقول المميزة بعلامة *

 </div>


 <?php endif; ?>


 <div class="form-group  margin-top-20 <?php if($errors->has('title')): ?> has-error <?php endif; ?>">
    <label class="control-label col-md-3"> أسم المجموعة
        <span class="required"> * </span>
    </label>
    <div class="col-md-4">
        <div class="input-icon right">
            <i class="fa"></i>

            <?php echo Form::text('title', null ,  ['class' => 'form-control' , 'placeholder' => 'HR,User,Aprrover ... etc'] ); ?>

            <?php if($errors->has('title')): ?>
            <span class="help-block">
                <?php echo e($errors->first('title')); ?>

            </span>
            <?php endif; ?>


        </div>
    </div>
</div>



<div class="row">

                   

<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="form-group  col-md-12">


<h4 class="form-section"><i class="<?php echo e($permission->icon); ?>"></i>  <?php echo e($permission->label); ?>   <input <?php if( isset($role->id) && $role->permissions->contains('id' , $permission->id)): ?> checked <?php endif; ?> name='permissions[]' value='<?php echo e($permission->id); ?>' type="checkbox"  class="input-chk" data-checkbox="icheckbox_square-purple"></h4>




</div>	

<?php $__currentLoopData = $permission->list_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="form-group  col-md-3">
<label>

<input <?php if( isset($role->id) && $role->permissions->contains('id' , $list_permission->id)): ?> checked <?php endif; ?> name='permissions[]' value='<?php echo e($list_permission->id); ?>' type="checkbox"  class="input-chk" data-checkbox="icheckbox_square-purple"> <B ><?php echo e($list_permission->label); ?> </B> 

</label>
</div>	

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


 </div>
                        





</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green"><?php echo e($submiteText); ?></button>

        </div>
    </div>
</div>


</div> 






