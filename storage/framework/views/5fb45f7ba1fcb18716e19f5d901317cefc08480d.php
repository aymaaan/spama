<option serial="" value=""  > -- Mother Product -- </option>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option  serial="<?php echo e($row->serial); ?>" value="<?php echo e($row->serial); ?>" ><?php echo e($row->title); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


