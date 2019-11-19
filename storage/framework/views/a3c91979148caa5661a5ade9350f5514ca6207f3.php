<?php $__currentLoopData = $categories->mother_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li id="mother_id" value="<?php echo e($category->id); ?>">
<a href="#">  <B> <?php echo e($category->title); ?> </B> </a> 
</li> <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





<a href="#" id="back_to_categories" class="btn btn-success btn">
<i class="icon-action-undo"></i> التصنيفات الاساسية
</a>