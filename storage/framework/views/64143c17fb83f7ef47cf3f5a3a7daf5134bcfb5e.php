<ul>
<?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li>
<?php if($child->title_ar): ?>
    <input type="checkbox" name="products_delegates[]" value="<?php echo e($child->id); ?>">
<?php endif; ?>

    <?php echo e($child->title); ?>  <?php echo e($child->title_ar); ?>

	<?php if(count($child->products)): ?>
            <?php echo $__env->make('backend.widgets.manageTreeChild',['childs' => $child->products], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
	</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>