<?php $__env->startSection('content'); ?>

<div class="app-content content">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title">   <?php echo e(__('backend.assessment')); ?> | <?php echo e($customer->name ? : $customer->consumer_name); ?>   </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <!-- Task List table -->
<?php if(count($total_products)): ?>


<div class="col-md-12">


<div class="table-responsive">
    
<a style="float: left;"  href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/consumer/products/<?php echo e($customer->id); ?>" class="btn btn-success btn">
<i class="icon-pencil"></i>     
</a>         
<table  class="table table-striped table-bordered">
  <thead>
    <tr>
      <th >SKU</th>
      <th ><?php echo e(__('backend.title')); ?></th>
      <th ><?php echo e(__('backend.unit')); ?></th>
      <th  > <?php echo e(__('backend.quantity')); ?> </th>
      <th  > <?php echo e(__('backend.price')); ?></th>
      <th  >  <?php echo e(__('backend.estimate_consumption')); ?>  </th>
      
      
    </tr>
  </thead>
  <tbody>


  <?php $__currentLoopData = $total_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th> <?php echo e($product->info['sku']); ?>  </th>
      <th> <?php echo e($product->info['title_ar']); ?> <br> <?php echo e($product->info['title_en']); ?> </th>
     
      <td><?php echo $product->unit_id; ?></td>
      <td><?php echo $product->total_all_products; ?></td>
      <td><?php echo $product->total_all_price; ?></td>
      <td><?php echo $product->total_all_estimate; ?></td>
    </tr>
    
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </tbody>
</table>
</div>



</form>

</div>

<br><br>

<?php endif; ?>



<div class="col-md-12">



				        <ul  id="tree_category">
				            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                <li id="category_id" value="<?php echo e($category->id); ?>">
                   <a href="#">  <B> <?php echo e($category->title); ?> </B> </a> 
				                </li> <br>
				            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				        </ul>


                <div id="imageLoading"><img src="<?php echo e(url('')); ?>/assets/animated-loader.gif"> </div>
                <ul id="tree_mother_products"></ul>
                
                <div id="tree_products"></div>

</div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('head'); ?>

  <title><?php echo e(__('backend.assessment')); ?>  | <?php echo e(config('settings.sitename')); ?></title>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/vendors.css">
  
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/app.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/custom-rtl.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/tables/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/pages/timeline.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/pages/dashboard-ecommerce.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/css/style-rtl.css">


<script>
$(document).ready(function() {
  $('#example').DataTable( {
      "paging":   false,
      "ordering": true,
      "info":     false
  } );
} );
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<!-- BEGIN VENDOR JS-->
  <script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
  <script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"
  type="text/javascript"></script>
  <script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
  <script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
  <script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  <script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>

  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/scripts/tables/datatables/datatable-basic.js"
  type="text/javascript"></script>







<script>
$(document).ready(function(){
  
$('#tree_category').show();
$('#tree_mother_products').hide();    
$('#tree_products').hide();
$('#imageLoading').hide();

//On Click Main Category
$(document).on('click','#category_id',function(e)
{
   e.preventDefault();
   var category_id = $(this).attr('value');
   $('#tree_category').hide();
   $('#tree_products').hide();
   $('#tree_mother_products').show();  

   $.ajax({
    beforeSend: function(){
        $('#imageLoading').show();
    },
    complete: function(){
        $('#imageLoading').hide();
    },
    success:function(){
    $('#tree_mother_products').load('<?php echo e(URL::to(config("settings.BackendPath")."/tree_mother_products")); ?>/'+category_id) ;
    }

    });



  });

//On Click Main Category


//back_to_categories
$(document).on('click','#back_to_categories',function(e)
{
   //e.preventDefault();
  // $('#tree_category').show();
  // $('#tree_products').hide();
   //$('#tree_mother_products').hide();


  });

//back_to_categories


//On Click Main Category
$(document).on('click','#mother_id',function(e)
{
   e.preventDefault();
   var category_id = $(this).attr('value');
   var customer_id = "<?php echo e($customer->id); ?>";
   <?php if(Request::segment(2) == 'assessment_products_doctor'): ?>
   var request_by = 'doctors' ;
   <?php else: ?>
   var request_by = 'delegates' ;
   <?php endif; ?>
   
   $('#tree_category').hide();
   $('#tree_mother_products').hide(); 
   $('#tree_products').show();

   $.ajax({
    beforeSend: function(){
        $('#imageLoading').show();
    },
    complete: function(){
        $('#imageLoading').hide();
    },
    success:function(){
    $('#tree_products').load('<?php echo e(URL::to(config("settings.BackendPath")."/tree_products")); ?>/'+category_id + '/' +  customer_id + '/' + request_by  ) ;
    }

    });



  });

//On Click Main Category


//Price
$(document).on('change','#quantity',function(e)
{
e.preventDefault();
var product_id = $(this).attr('product_id');
var quantity =  $(this).val();
var unit =  $("#unit_id_" + product_id ).val();
if ( quantity > 0) {
$("#price_" + product_id).prop('required',true);
$("#estimate_consumption_" + product_id).prop('required',true);
$("#quantity_" + product_id).prop('required',true);
} else {
$("#price_" + product_id).prop('required',false);
$("#estimate_consumption_" + product_id).prop('required',false);
$("#quantity_" + product_id).prop('required',false);
}
$.ajax(
        {
         url: "<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/products/get_consumer_price/1/" + unit + "/" + quantity,
         type: 'GET',

       }).done( 

       function(data) {
        $("#price_" + product_id).val(data.customer_price);
        
        });

});
//Price







});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>