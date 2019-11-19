<?php $__env->startSection('content'); ?>

<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-head">
            <div class="card-header">
              <h4 class="card-title"> <B>   <?php echo e(__('backend.brands')); ?>    </B></h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_brands')): ?>
              <div class="heading-elements">
                <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/brands/create">


                  <button class="btn btn-primary btn">
                    <i class="la la-plus-square-o"></i>   <?php echo e(__('backend.add_brand')); ?>      </button>


                  </a> </div> 
              <?php endif; ?>


                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <!-- Task List table -->
                  <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                  <table class="table table-striped table-bordered default-ordering">
                    <thead>
                      <tr>
                        <th> ID </th>
                        <?php if( Auth::user()->display_content_ar == 1 ): ?>
                        <th><?php echo e(__('backend.arabic_title')); ?></th>
                        <?php endif; ?>
                        <?php if( Auth::user()->display_content_en == 1 ): ?>
                      <th><?php echo e(__('backend.english_title')); ?></th>
                      <?php endif; ?>
                        <th> <?php echo e(__('backend.options')); ?>  </th>
                        
                        
                        
                      </tr>
                    </thead>
                    <tbody>

                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <tr>
                        <td><?php echo e($row->serial); ?></td>
                        <?php if( Auth::user()->display_content_ar == 1 ): ?>
                        <td><?php echo e($row->title); ?></td>
                        <?php endif; ?>
                        <?php if( Auth::user()->display_content_en == 1 ): ?>
                         <td style="text-align:left;"><?php echo e($row->title_en); ?></td>
                         <?php endif; ?>
 
                        <td>


                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_brands')): ?> 
                          <a title="Delete Post" href="<?php echo e(url(config('settings.BackendPath').'/brands/'.$row->id.'/delete')); ?>" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                          <?php endif; ?>



                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_brands')): ?> 
                          <?php if($row->status == 1 ): ?>
                          <a title='Block brands' href="<?php echo e(url(config('settings.BackendPath').'/brands/approve/'.$row->id.'/0')); ?>" class="badge badge badge-success float-right"><i class="la la-check"></i> </a>
                          <?php else: ?>
                          <a title='Publish brands' href="<?php echo e(url(config('settings.BackendPath').'/brands/approve/'.$row->id.'/1')); ?>" class="badge badge badge-danger float-right"><i class="la la-ban "></i> </a>
                          <?php endif; ?>
                          <?php endif; ?>


                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_brands')): ?> 
                              <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/brands/<?php echo e($row->id); ?>/edit" class="badge badge badge-info float-right"><i class="la la-pencil"></i> </a>
                           <?php endif; ?>


                        </td>


                      </tr>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </table>
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>


      <?php $__env->stopSection(); ?>


      <?php $__env->startSection('head'); ?>

      <title> <?php echo e(__('backend.brands')); ?>  | <?php echo e(config('settings.sitename')); ?></title>

      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
      rel="stylesheet">
      
      
      <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/vendors.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/tables/datatable/datatables.min.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/app.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/custom-rtl.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/css/style-rtl.css">
  <!-- END Custom CSS-->


      <?php $__env->stopSection(); ?>

      <?php $__env->startSection('scripts'); ?>

   

    <script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/scripts/tables/datatables/datatable-basic.js"
  type="text/javascript"></script>



      <?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>