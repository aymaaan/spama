<form method="post" action="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/assessment_products_delegate/<?php echo e($customer_id); ?>">
<div class="table-responsive">
<table id="example" class="table table-striped table-bordered zero-configuration dataTable">
  <thead>
    <tr>
      <th scope="col">SKU</th>
      <th scope="col"><?php echo e(__('backend.title')); ?></th>
      <th  scope="col"><?php echo e(__('backend.unit')); ?></th>
      <th scope="col"> <?php echo e(__('backend.quantity')); ?> </th>
      <th scope="col"> <?php echo e(__('backend.price')); ?></th>
      <th scope="col">  <?php echo e(__('backend.estimate_consumption')); ?>  </th>
    </tr>
  </thead>
  <tbody>


<button  type="submit" class="btn btn-success btn">
<i class="icon-action-undo"></i>  حفظ   
</button>

  <?php $__currentLoopData = $categories->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th><?php echo e($category->sku); ?>  </th>
      <th><?php echo e($category->title_ar); ?> <br> <?php echo e($category->title_en); ?></th>
      <td><?php echo Form::select('unit_id[]', $units ,  null , ['id'=>'unit_id_'.$category->id, 'style'=>'width:80px;', 'class' => 'form-control'  ] ); ?></td>
      <td><?php echo Form::number('quantity[]', null , ['id'=>'quantity' , 'product_id'=> $category->id , 'style'=>'width:80px;', 'class' => 'form-control' , 'placeholder'=> __('backend.quantity') ] ); ?></td>
      <td><?php echo Form::text('price[]', null , ['id'=>'price_'.$category->id, 'class' => 'form-control', 'style'=>'width:80px;' , 'placeholder'=> __('backend.price') ] ); ?></td>
      <td><?php echo Form::text('estimate_consumption[]', null , ['id'=>'estimate_consumption_'.$category->id , 'style'=>'width:80px;', 'class' => 'form-control' , 'placeholder'=> __('backend.estimate_consumption') ] ); ?></td>
    </tr>
    <?php echo Form::hidden('products_doc[]', $category->id  , ['id'=>'products_doc'.$category->id, 'class' => 'form-control'  ] ); ?>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </tbody>
</table>
</div>
<?php echo Form::token(); ?>


<?php echo Form::hidden('request_by', $request_by , ['id'=>'request_by'.$category->id, 'class' => 'form-control'  ] ); ?>


<button  type="submit" class="btn btn-success btn">
<i class="icon-action-undo"></i>  حفظ   
</button>


</form>



<script>
$(document).ready(function() {
  $('#example').DataTable( {
      "paging":   true,
      "ordering": true,
      "info":     false
  } );
} );
</script>


<!-- END PAGE LEVEL JS-->
<script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>

<script src="<?php echo e(url('')); ?>/assets/app-assets/js/scripts/tables/datatables/datatable-basic.js"
type="text/javascript"></script>


