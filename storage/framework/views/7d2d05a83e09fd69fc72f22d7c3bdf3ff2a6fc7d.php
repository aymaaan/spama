<?php if(count($errors)): ?>
<div id='msg' class="note note-danger">
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p style="color:red;">   <?php echo $error; ?> </p>      
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div>
<?php endif; ?>


<?php if(Session()->has('msg')): ?>

<div class="alert alert-<?php echo e(Session::get('alert')); ?>" role="<?php echo e(Session::get('alert')); ?>"  >

<?php echo Session::get("msg"); ?>

  
</div>


<?php endif; ?>