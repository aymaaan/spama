<option serial="" title_ar="" title_en ="" value=""  > -- Product Names  -- </option>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option serial="<?php echo e($row->serial); ?>" title_ar="<?php echo e($row->title); ?>" title_en="<?php echo e($row->title_en); ?>"  value="<?php echo e($row->id); ?>" >
  	<?php echo e($row->title); ?>

  </option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<script>
  $(document).ready(function(){

 $('select[name="first_name"]').on('change', function() {
//Change Product Name

//Arabic
var brand_title_ar = $('select[name="brand_id"]').find('option:selected').attr("title_ar");
var firstname_title_ar = $('select[name="first_name"]').find('option:selected').attr("title_ar");


$('#title_ar').val(brand_title_ar + ' ' + firstname_title_ar );

//English
var brand_title_en = $('select[name="brand_id"]').find('option:selected').attr("title_en");
var firstname_title_en = $('select[name="first_name"]').find('option:selected').attr("title_en");


$('#title_en').val(brand_title_en + ' ' + firstname_title_en );


//End Change Product Name

 });


   });

</script>


