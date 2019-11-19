<?php $__env->startSection('content'); ?>

<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-head">
            <div class="card-header">
              <h4 class="card-title"> <B>   <?php echo e(__('backend.coupons')); ?> | <?php echo e($coupoun_name); ?> </B></h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_coupons')): ?>



              <div class="heading-elements">
                <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/coupons/create?campaign_title=<?php echo e(str_replace(' ','-', $coupoun_name)); ?>">


                  <button class="btn btn-primary btn">
                    <i class="la la-plus-square-o"></i>    <?php echo e(__('backend.add_coupons')); ?>    </button>


                  </a> 


                
<a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/coupons/qr/<?php echo e($coupoun_name); ?>">


<button class="btn btn-info btn">
  <i class="la la-download"></i>    <?php echo e(__('backend.download_qr')); ?>    </button>


</a> 

                  
                  
                 
<a target="_blank" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/coupons/print/<?php echo e(str_replace(' ','-', $coupoun_name)); ?>">


<button class="btn btn-info btn">
  <i class="la la-print"></i>    <?php echo e(__('backend.print')); ?>    </button>


</a> 




<a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/export_excel/export_coupons/<?php echo e($coupoun_name); ?>" >
<button  class="btn btn-warning btn">
<i class="la la-cloud-download"></i>   <?php echo e(__('backend.export')); ?> 
</button>
</a>
                  
                  
                  
                  
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
                        
                        
                        <th>  <?php echo e(__('backend.code')); ?>  </th>
                        <th>  <?php echo e(__('backend.discount_amount')); ?>  </th>
                        <th>  <?php echo e(__('backend.discount_type')); ?>  </th>
                        <th>  <?php echo e(__('backend.products')); ?>  </th>
                        
                        <th>  <?php echo e(__('backend.start_date')); ?>  </th>
                        <th>  <?php echo e(__('backend.end_date')); ?>  </th>
                        <th>  <?php echo e(__('backend.options')); ?>  </th>
                        
                        
                        
                      </tr>
                    </thead>
                    <tbody>

                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <tr>
                        
                       
                        <td>

                        
                         <a data-toggle="modal" data-target="#QrModal<?php echo e($row->id); ?>" href="#"> <?php echo e($row->code); ?> </a></td>
                        <td><?php echo e($row->amount); ?></td>
                        <td> <?php echo e(__('backend.'.$row->type)); ?>  </td>
                        <td>
                        
                        
                        <?php if($row->all_products == 1): ?> 
<button class="btn btn-success btn">
     <?php echo e(__('backend.all_products')); ?>  </button>
                        <?php else: ?> 
                 <a data-toggle="modal" data-target="#exampleModal<?php echo e($row->id); ?>" href="#">
                  <button class="btn btn-info btn">
                     <?php echo e(__('backend.products')); ?> 
                     <span class="badge badge badge-dark  badge-pill float-right mr-2"><?php echo e(count($row->products)); ?></span>
                      </button>
                  </a>

                

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo e($row->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo e($row->id); ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel<?php echo e($row->id); ?>"> <?php echo e(__('backend.products')); ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<ul>
<?php $__currentLoopData = $row->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li>
<a target="_blank" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/product/<?php echo e($row->id); ?>"> <?php echo e($product->product['sku']); ?> </a> - <?php echo e($product->product['title_ar']); ?> 
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


                        <?php endif; ?>                       
                        </td>



<!-- Modal -->
<div class="modal fade" id="QrModal<?php echo e($row->id); ?>" tabindex="-1" role="dialog" aria-labelledby="QrModal<?php echo e($row->id); ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="QrModal<?php echo e($row->id); ?>"> <?php echo e(__('backend.qr_code')); ?> | <?php echo e($row->code); ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="text-align:center" class="modal-body">

      <?php echo QrCode::size(250)->generate($row->code);; ?>


    <h3 style="text-align:center"> <?php echo e($row->code); ?></h3>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>



<td><?php echo e($row->start_date); ?></td>
<td><?php echo e($row->end_date); ?></td>
                        <td>


                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_coupons')): ?> 
                          <a title="Delete coupons" href="<?php echo e(url(config('settings.BackendPath').'/coupons/'.$row->id.'/delete')); ?>" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                          <?php endif; ?>



                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_coupons')): ?> 
                          <?php if($row->status == 1 ): ?>
                          <a title='Block coupons' href="<?php echo e(url(config('settings.BackendPath').'/coupons/approve/'.$row->id.'/0')); ?>" class="badge badge badge-success float-right"><i class="la la-check"></i> </a>
                          <?php else: ?>
                          <a title='Publish coupons' href="<?php echo e(url(config('settings.BackendPath').'/coupons/approve/'.$row->id.'/1')); ?>" class="badge badge badge-danger float-right"><i class="la la-ban "></i> </a>
                          <?php endif; ?>
                          <?php endif; ?>


                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_coupons')): ?> 
                              <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/coupons/<?php echo e($row->id); ?>/edit" class="badge badge badge-info float-right"><i class="la la-pencil"></i> </a>
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