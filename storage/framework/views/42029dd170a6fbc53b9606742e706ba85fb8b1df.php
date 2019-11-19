<?php $__env->startSection('content'); ?>

<div class="app-content content"> 
    <div class="content-wrapper">

      <div class="content-header row">
           

      </div>


      <div class="content-body">
        <!-- eCommerce statistic -->

     
        <div class="row">


<div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="<?php echo e(url(config('settings.BackendPath'))); ?>/products/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> <?php echo e($totalProducts); ?> </h3>
                      <h5> <?php echo e(__('backend.add_product')); ?> </h5>
                    </div>
                    <div>
                      <i class="icon-basket-loaded info font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>



<div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="<?php echo e(url(config('settings.BackendPath'))); ?>/mother-products/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> <?php echo e($totalMotherProducts); ?> </h3>
                      <h5><?php echo e(__('backend.add_mother_product')); ?></h5>
                    </div>
                    <div>
                      <i class="icon-basket-loaded info font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>


<div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="<?php echo e(url(config('settings.BackendPath'))); ?>/suppliers/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> <?php echo e($totalSuppliers); ?> </h3>
                      
                      <h5><?php echo e(__('backend.add_supplier')); ?></h5>
                    </div>
                    <div>
                      <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>



<div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="<?php echo e(url(config('settings.BackendPath'))); ?>/categories/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> <?php echo e($totalCategories); ?> </h3>
                     
                      <h5><?php echo e(__('backend.add_category')); ?></h5>
                      
                    </div>
                    <div>
                      <i class="icon-pie-chart warning font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>

<div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="<?php echo e(url(config('settings.BackendPath'))); ?>/brands/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> <?php echo e($totalBrands); ?>  </h3>
                      <h5><?php echo e(__('backend.add_brand')); ?></h5>
                    </div>
                    <div>
                      <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>

          

          <div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="<?php echo e(url(config('settings.BackendPath'))); ?>/coupons/create">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> <?php echo e(count($totalCoupons)); ?> </h3>
                      
                      <h5><?php echo e(__('backend.add_coupons')); ?></h5>
                    </div>
                    <div>
                      <i class="icon-screen-tablet success font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-3 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="<?php echo e(url(config('settings.BackendPath'))); ?>/assessment">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info"> <?php echo e(count($totalAssessment)); ?> </h3>
                      
                      <h5><?php echo e(__('backend.assessment')); ?></h5>
                    </div>
                    <div>
                      <i class="icon-book-open success font-large-2 float-right"></i>
                    </div>
                  </div>
                  
                </div>
              </a>
              </div>
            </div>
          </div>

        </div>

        <!--/ eCommerce statistic -->
      
        <!--/ Products sell and New Orders -->
        <!-- Recent Transactions -->
        
        <div class="row">
        
          <div id="recent-transactions" class="col-12">
          <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><?php echo e(__('backend.latest_products')); ?></h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                
                
                
              </div>
              <div class="card-content">
                <div class="table-responsive">

 <table id="users-contacts" style='width:100%;' class="table datatable table-hover ">
                        <thead>


                          <tr>


                            <th>SKU</th>
                           <?php if( Auth::user()->display_content_ar == 1 ): ?>
                            <th><?php echo e(__('backend.arabic_title')); ?></th>
                            <?php endif; ?>
                            <?php if( Auth::user()->display_content_en == 1 ): ?>
                            <th><?php echo e(__('backend.english_title')); ?></th>
                            <?php endif; ?>
                             <th><?php echo e(__('backend.category')); ?></th>
                             <th><?php echo e(__('backend.brand')); ?></th>
                             <th><?php echo e(__('backend.mother_product')); ?></th>

                          </tr>

                        </thead>
                        <tbody>


<?php $__currentLoopData = $products_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>

                            <td> <?php echo e($row->sku); ?> </td>
                            <?php if( Auth::user()->display_content_ar == 1 ): ?>
                            <td> <?php echo e($row->title_ar); ?> </td>
                            <?php endif; ?>
                            <?php if( Auth::user()->display_content_en == 1 ): ?>
                            <td style="text-align:left;"> <?php echo e($row->title_en); ?> </td>
                            <?php endif; ?>

                            <td> 
                            <?php if( Auth::user()->display_content_ar == 1 ): ?>
                            <?php echo e($row->category['title']); ?> <br>
                            <?php endif; ?>
                            <?php if( Auth::user()->display_content_en == 1 ): ?> 
                            <div style="text-align:left;"> <?php echo e($row->category['title_en']); ?> </div>
                            <?php endif; ?>
                             </td>

                            <td>
                            <?php if( Auth::user()->display_content_ar == 1 ): ?>
                            <?php echo e($row->brand['title']); ?> <br>
                            <?php endif; ?>
                            <?php if( Auth::user()->display_content_en == 1 ): ?> 
                            <?php echo e($row->brand['title_en']); ?>

                            <?php endif; ?> 
                            
                            </td>
                            
                            <td>

                            <?php if( Auth::user()->display_content_ar == 1 ): ?>
                            <?php echo e($row->mother_product['title']); ?> <br>
                            <?php endif; ?>
                            <?php if( Auth::user()->display_content_en == 1 ): ?> 
                            <?php echo e($row->mother_product['title_en']); ?>

                            <?php endif; ?> 
  
                              </td>
         
                          </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        
                      </table>
                      

                </div>  
              </div> 
            </div> 

          </div> 
        </div>
        
        <!--/ Recent Transactions -->
        <!--Recent Orders & Monthly Sales -->
       
        <!--/Recent Orders & Monthly Sales -->
        <!-- Basic Horizontal Timeline -->
        
        <!--/ Basic Horizontal Timeline -->
      </div>
    </div>
  </div>




<?php $__env->stopSection(); ?>


<?php $__env->startSection('head'); ?>

        <title><?php echo e(config('settings.sitename')); ?></title>

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