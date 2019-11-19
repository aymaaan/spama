
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div id="feature_<?php echo e($k + 1); ?>" class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e($row->title); ?> </label>

    <select  required name="feature_<?php echo e($k + 1); ?>" class="form-control">


      <option serial="" title_ar="" title_en ="" value=""> -- <?php echo e($row->title); ?> -- </option>

      <?php $__currentLoopData = $row->sub_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option title_ar="<?php echo e($feature->title); ?>" title_en="<?php echo e($feature->title_en); ?>" serial="<?php echo e($feature->serial); ?>"  value="<?php echo e($feature->serial); ?>"><?php echo e($feature->title); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    </select>

  </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                 



<script>
  $(document).ready(function(){

 $('select[name="feature_1"]').on('change', function() {


//Change Product Name

//Arabic
var brand_title_ar = $('select[name="brand_id"]').find('option:selected').attr("title_ar");
var firstname_title_ar = $('select[name="first_name"]').find('option:selected').attr("title_ar");
var feature_1_title_ar = $('select[name="feature_1"]').find('option:selected').attr("title_ar");
var feature_2_title_ar = $('select[name="feature_2"]').find('option:selected').attr("title_ar");
var feature_3_title_ar = $('select[name="feature_3"]').find('option:selected').attr("title_ar");

$('#title_ar').val(brand_title_ar + ' ' + firstname_title_ar + ' ' + feature_1_title_ar + ' ' + feature_2_title_ar + ' ' + feature_3_title_ar);

//English
var brand_title_en = $('select[name="brand_id"]').find('option:selected').attr("title_en");
var firstname_title_en = $('select[name="first_name"]').find('option:selected').attr("title_en");
var feature_1_title_en = $('select[name="feature_1"]').find('option:selected').attr("title_en");
var feature_2_title_en = $('select[name="feature_2"]').find('option:selected').attr("title_en");
var feature_3_title_en = $('select[name="feature_3"]').find('option:selected').attr("title_en");


$('#title_en').val(brand_title_en + ' ' + firstname_title_en + ' ' + feature_1_title_en + ' ' + feature_2_title_en + ' '  + feature_3_title_en);


//End Change Product Name

//Change SKU

      var serial_product =  "<?php echo e($last_serial); ?>";
      var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
      var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
      var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");
      var feature_1 = $('select[name="feature_1"]').find('option:selected').attr("serial");
      var feature_2 = $('select[name="feature_2"]').find('option:selected').attr("serial");
      var feature_3 = $('select[name="feature_3"]').find('option:selected').attr("serial");
      if(!feature_3 || feature_1.length == 2 ) var feature_3 = '';
      $('#sku').val(mother_product_serial + brand_serial + firstname + feature_1  + feature_2 + feature_3 + serial_product);


      if( feature_1.length == 1 ) {
        $('#feature_3').show();
      } else {

        $('#feature_3').hide();
      }


    });


$('select[name="feature_2"]').on('change', function() {
//Change Product Name

//Arabic
var brand_title_ar = $('select[name="brand_id"]').find('option:selected').attr("title_ar");
var firstname_title_ar = $('select[name="first_name"]').find('option:selected').attr("title_ar");
var feature_1_title_ar = $('select[name="feature_1"]').find('option:selected').attr("title_ar");
var feature_2_title_ar = $('select[name="feature_2"]').find('option:selected').attr("title_ar");
var feature_3_title_ar = $('select[name="feature_3"]').find('option:selected').attr("title_ar");

$('#title_ar').val(brand_title_ar + ' ' + firstname_title_ar + ' ' + feature_1_title_ar + ' ' + feature_2_title_ar + ' ' + feature_3_title_ar);

//English
var brand_title_en = $('select[name="brand_id"]').find('option:selected').attr("title_en");
var firstname_title_en = $('select[name="first_name"]').find('option:selected').attr("title_en");
var feature_1_title_en = $('select[name="feature_1"]').find('option:selected').attr("title_en");
var feature_2_title_en = $('select[name="feature_2"]').find('option:selected').attr("title_en");
var feature_3_title_en = $('select[name="feature_3"]').find('option:selected').attr("title_en");


$('#title_en').val(brand_title_en + ' ' + firstname_title_en + ' ' + feature_1_title_en + ' ' + feature_2_title_en + ' '  + feature_3_title_en);


//End Change Product Name


// Change SKU

      var serial_product =  "<?php echo e($last_serial); ?>";
      var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
      var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
      var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");
      var feature_1 = $('select[name="feature_1"]').find('option:selected').attr("serial");
      var feature_2 = $('select[name="feature_2"]').find('option:selected').attr("serial");
      var feature_3 = $('select[name="feature_3"]').find('option:selected').attr("serial");
      if(!feature_3 || feature_1.length == 2 ) var feature_3 = '';
      $('#sku').val(mother_product_serial + brand_serial + firstname + feature_1  + feature_2 + feature_3 + serial_product);

//End Change SKU


    });



$('select[name="feature_3"]').on('change', function() {


//Change Product Name

//Arabic
var brand_title_ar = $('select[name="brand_id"]').find('option:selected').attr("title_ar");
var firstname_title_ar = $('select[name="first_name"]').find('option:selected').attr("title_ar");
var feature_1_title_ar = $('select[name="feature_1"]').find('option:selected').attr("title_ar");
var feature_2_title_ar = $('select[name="feature_2"]').find('option:selected').attr("title_ar");
var feature_3_title_ar = $('select[name="feature_3"]').find('option:selected').attr("title_ar");

$('#title_ar').val(brand_title_ar + ' ' + firstname_title_ar + ' ' + feature_1_title_ar + ' ' + feature_2_title_ar + ' ' + feature_3_title_ar);

//English
var brand_title_en = $('select[name="brand_id"]').find('option:selected').attr("title_en");
var firstname_title_en = $('select[name="first_name"]').find('option:selected').attr("title_en");
var feature_1_title_en = $('select[name="feature_1"]').find('option:selected').attr("title_en");
var feature_2_title_en = $('select[name="feature_2"]').find('option:selected').attr("title_en");
var feature_3_title_en = $('select[name="feature_3"]').find('option:selected').attr("title_en");


$('#title_en').val(brand_title_en + ' ' + firstname_title_en + ' ' + feature_1_title_en + ' ' + feature_2_title_en + ' '  + feature_3_title_en);
//End Change Product Name

//Change SKU

      var serial_product =  "<?php echo e($last_serial); ?>";
      var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
      var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
      var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");
      var feature_1 = $('select[name="feature_1"]').find('option:selected').attr("serial");
      var feature_2 = $('select[name="feature_2"]').find('option:selected').attr("serial");
      var feature_3 = $('select[name="feature_3"]').find('option:selected').attr("serial");
      if(!feature_3 || feature_1.length == 2 ) var feature_3 = '';
      $('#sku').val(mother_product_serial + brand_serial + firstname + feature_1  + feature_2 + feature_3 + serial_product);

//END Change SKU



   });






  });








</script>