<?php $__env->startSection('content'); ?>

<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-head">
            <div class="card-header">
              <h4 class="card-title"> <B>   <?php echo e(__('backend.coupons')); ?>     </B></h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_coupons')): ?>
              <div class="heading-elements">
                <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/coupons/create">


                  <button class="btn btn-primary btn">
                    <i class="la la-plus-square-o"></i>    <?php echo e(__('backend.add_coupons')); ?> / <?php echo e(__('backend.campaign')); ?>   </button>


                  </a> </div> 
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
                      
                        <th>  <?php echo e(__('backend.title')); ?>  </th>
                        <th>  <?php echo e(__('backend.discount_amount')); ?>  </th>
                        <th>  <?php echo e(__('backend.discount_type')); ?>  </th>
                        <th>  <?php echo e(__('backend.start_date')); ?>  </th>
                        <th>  <?php echo e(__('backend.end_date')); ?>  </th>
                                             
                      </tr>
                    </thead>
                    <tbody>

                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <tr>
                        
                        <td> <a  href="<?php echo e(url(config('settings.BackendPath').'/coupons/list/'.str_replace(' ' , '-' , $row->title ))); ?>" > <?php echo e($row->title); ?> </a></td>

                        <td><?php echo e($row->amount); ?></td>
                        <td> <?php echo e(__('backend.'.$row->type)); ?>  </td>
                        <td><?php echo e($row->start_date); ?></td>
                        <td><?php echo e($row->end_date); ?></td>
                        


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

      <title> <?php echo e(__('backend.coupons')); ?> | <?php echo e(config('settings.sitename')); ?></title>

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

      <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>