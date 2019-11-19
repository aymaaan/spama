<?php $__env->startSection('content'); ?>

<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-content">
            <div class="card-body">
              <!-- Task List table -->


              <?php echo Form::open([ 'url' => config('settings.BackendPath').'/settings', 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]); ?>  


              <div class="form-body">

                <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


                <h4 class="form-section"><i class="la la-pencil-square"></i>  <?php echo e(__('backend.settings')); ?>  </h4>



                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4">  اسم الشركة او المؤسسة  </label>

                      <?php echo Form::text('sitename', config('settings.sitename') ,['class' => 'form-control' , 'placeholder'=> ' Application Name   '] ); ?>


                    </div>
                  </div>
                </div>


                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4"> رابط الموقع </label>

                      <?php echo Form::text('siteurl', config('settings.siteurl') ,['class' => 'form-control' , 'placeholder'=> 'URL'] ); ?>


                    </div>
                  </div>
                </div>




                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4"> بريد الموقع </label>

                      <?php echo Form::text('site_email', config('settings.site_email') ,['class' => 'form-control' , 'placeholder'=> 'EMAIL'] ); ?>


                    </div>
                  </div>
                </div>
                
                
               
                
                
                




                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput1">  الدعم الفني  </label>

                      <?php echo Form::text('createdby', config('settings.createdby') , ['class' => 'form-control','placeholder'=> 'Created by'] ); ?>


                    </div>
                  </div>

                </div>


<hr>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="projectinput4">
                        الشعار  فى لوحة التحكم  

                      </br>
                     340 عرض * 60 طول
                       
                      </label>

                      <?php echo Form::file('logo' ,['class' => 'form-control'  ] ); ?>


                    </div>

                  </div>  

                  <img width="340px" src="<?php echo e(url(config('settings.logo'))); ?>">

                </div>


                <div class="form-actions">

                  <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> Update  
                  </button>
                </div>


                <?php echo Form::close(); ?>



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

<title> <?php echo e(config('settings.sitename')); ?> </title>

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