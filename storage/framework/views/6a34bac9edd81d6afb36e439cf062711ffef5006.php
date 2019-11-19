<ul >
<?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li >

<?php if($child->title_ar): ?> 
<input type="checkbox" name="products_doc[]" value="<?php echo e($child->id); ?>" <?php if( $customer_products->contains('product_id', $child->id)): ?> checked <?php endif; ?> >
<?php endif; ?>
 <?php echo e($child->title); ?>   <B><?php echo e($child->title_ar); ?></B>
	    <?php if( isset($child->products) ): ?>
        <?php echo $__env->make('backend.widgets.manageTreeChild',['childs' => $child->products], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

<?php if($child->title_ar): ?>

  
<div class="row">

<div class="col-md-2">
    <div class="form-group">
      
      <?php echo Form::select('unit_id[]', $units ,  null , ['id'=>'unit_id_'.$child->id, 'class' => 'form-control' , 'placeholder'=> __('backend.unit') ] ); ?>

    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      
    <?php echo Form::number('quantity[]', null , ['id'=>'quantity_'.$child->id, 'class' => 'form-control' , 'placeholder'=> __('backend.quantity') ] ); ?>



    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      
    <?php echo Form::text('price[]', null , ['id'=>'price_'.$child->id, 'class' => 'form-control' , 'placeholder'=> __('backend.price') ] ); ?>



    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      
    <?php echo Form::text('estimate_consumption[]', null , ['id'=>'estimate_consumption_'.$child->id, 'class' => 'form-control' , 'placeholder'=> __('backend.estimate_consumption') ] ); ?>



    </div>
  </div>


  


  </div>


  <script> 



        $("#quantity_<?php echo e($child->id); ?>").on("change", function() { 

            var quantity =  $("#quantity_<?php echo e($child->id); ?>").val();
            var unit =  $("#unit_id_<?php echo e($child->id); ?>").val();
  
        $.ajax(
        {
         url: "<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/products/get_consumer_price/1/" + unit + "/" + quantity,
         type: 'GET',

       }).done( 

       function(data) {
        $("#price_<?php echo e($child->id); ?>").val(data.customer_price);
        });



           
        }); 












    </script> 
  


<?php endif; ?>

    
	</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>