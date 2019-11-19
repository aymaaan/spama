<?php $__env->startSection('content'); ?>

<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-head">
            <div class="card-header">
              <h4 class="card-title"> <B>   <?php echo e(__('backend.customers')); ?>    </B></h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_customers')): ?>
              <div class="heading-elements">
                <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/customers/create">


                  <button class="btn btn-primary btn">
                    <i class="la la-plus-square-o"></i> <?php echo e(__('backend.add_customers')); ?></button>




</a> 

<a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/export_excel/export_customers" >
<button  class="btn btn-warning btn">
<i class="la la-cloud-download"></i>   <?php echo e(__('backend.export')); ?> 
</button>
</a>




<button  data-toggle="modal" data-target="#importModal" class="btn btn-success btn">
<i class="la la-cloud-upload"></i> <?php echo e(__('backend.import')); ?></button>


 
                  
                  </div> 


<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('backend.import')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



   <form method="post" enctype="multipart/form-data" action="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/import_excel/import_customers">
    <?php echo e(csrf_field()); ?>

  
    <div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3"><?php echo e(__('backend.choose_customers_file')); ?></label>

  <input type="file" name="select_file" />

  </div>
</div>



      </div>
        <div class="modal-footer">
        <button  id='importFileClose'  type="button" class="btn btn-secondary" data-dismiss="modal"> <?php echo e(__('backend.close')); ?> </button>

        <img style="display: none;"  id="importFileLoading" src="<?php echo e(url('')); ?>/assets/animated-loader.gif" alt="Loading ... ">
        <button id='importFile' type="submit" class="btn btn-primary"> <?php echo e(__('backend.import')); ?> </button>

         </form>


      </div>
    </div>
  </div>
</div>



              <?php endif; ?>


                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <!-- Task List table -->
                  <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <table id="users-contacts" style='width:100%;' class="table datatable table-hover table-responsive">
                    <thead>
                      <tr>
                        
                        <th> <?php echo e(__('backend.name')); ?>  </th>
                        
                        <th> <?php echo e(__('backend.register_date')); ?>  </th>
                        <!--<th> <?php echo e(__('backend.customer_case')); ?>  </th>-->
                        <th> <?php echo e(__('backend.customer_type')); ?>  </th>
                        <th> <?php echo e(__('backend.options')); ?>  </th>
                        
                        
                        
                      </tr>
                    </thead>
                    <tbody>

                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <tr>
                        
                        <td ><?php echo e($row->name ? : $row->facility_name); ?></td>
                        
                        <td ><?php echo e($row->created_at); ?></td>
                        <!--<td ><?php echo e($row->customer_case['title']); ?></td>-->
                        <td ><?php echo e($row->customer_type  ? __('backend.'.$row->customer_type) :  ''); ?></td>
 
                        <td>

                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_customers')): ?> 
                          <a title="Delete Post" href="<?php echo e(url(config('settings.BackendPath').'/customers/'.$row->id.'/delete')); ?>" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                          <?php endif; ?>

                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_customers')): ?> 
                          <?php if($row->status == 1 ): ?>
                          <a title='Block customers' href="<?php echo e(url(config('settings.BackendPath').'/customers/approve/'.$row->id.'/0')); ?>" class="badge badge badge-success float-right"><i class="la la-check"></i> </a>
                          <?php else: ?>
                          <a title='Publish customers' href="<?php echo e(url(config('settings.BackendPath').'/customers/approve/'.$row->id.'/1')); ?>" class="badge badge badge-danger float-right"><i class="la la-ban "></i> </a>
                          <?php endif; ?>
                          <?php endif; ?>

                          
                          
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_customers')): ?> 
                              <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/customers/<?php echo e($row->id); ?>/edit" class="badge badge badge-info float-right"><i class="la la-pencil"></i>  </a>
                           <?php endif; ?>



                        </td>


                      </tr>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </table>

                    <?php echo e($data->links()); ?>

                    
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>


      <?php $__env->stopSection(); ?>


      <?php $__env->startSection('head'); ?>

      <title> <?php echo e(__('backend.customers')); ?> | <?php echo e(config('settings.sitename')); ?></title>

      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
      rel="stylesheet">
      <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
      rel="stylesheet">
      <!-- BEGIN VENDOR CSS-->
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/vendors.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/weather-icons/climacons.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/fonts/meteocons/style.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/charts/morris.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/charts/chartist.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
      <!-- END VENDOR CSS-->
      <!-- BEGIN MODERN CSS-->
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/app.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/custom-rtl.css">
      <!-- END MODERN CSS-->
      <!-- BEGIN Page Level CSS-->
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/fonts/simple-line-icons/style.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/pages/timeline.css">
      <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/pages/dashboard-ecommerce.css">
      <!-- END Page Level CSS-->
      <!-- BEGIN Custom CSS-->
      <link rel="stylesheet" type="text/css" href="assets/css/style-rtl.css">
      <!-- END Custom CSS-->

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

        

<script>

$('#importFile').click(function() {

$('#importFile').hide();
$('#importFileClose').hide();

$('#importFileLoading').show();
});

</script>

      <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>