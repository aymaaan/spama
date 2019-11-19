<?php $__env->startSection('content'); ?>

<div class="app-content content">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title">   <?php echo e(__('backend.assessment')); ?> | <?php echo e($customer->name); ?>   </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    


                   
                  </div>

                         

                          


                </div>
                <div class="card-content">

                
                  <div class="card-body">
                    <!-- Task List table -->

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('make_assessment')): ?> 
                              <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/assessment_products_doctor/<?php echo e($customer->id); ?>" class="btn btn-success btn"> <?php echo e(__('backend.assessment_products_by_doctor')); ?>  </a>
                     <?php endif; ?>

                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('make_assessment')): ?> 
                              <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/assessment_products_delegate/<?php echo e($customer->id); ?>" class="btn btn-success btn"> <?php echo e(__('backend.assessment_products_by_delegate')); ?>  </a>
                          <?php endif; ?>

                          

                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('make_assessment')): ?> 
                              <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/assessment_pricing/<?php echo e($customer->id); ?>" class="btn btn-danger btn"> <?php echo e(__('backend.pricing')); ?>  </a>
                          <?php endif; ?>

                          <hr>
    
<?php echo Form::model( $customer ,[ 'url' =>  config('settings.BackendPath').'/assessment/'.$customer->id, 'method'=>'post' ,  'class' => 'form' ,  'files' => 'true' ]); ?>  


<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.assessment_questions')); ?>     </h4>
    
     <div class="row">

     <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.weight')); ?>     </label>

           <?php echo Form::number('assessment_weight' , null , ['id'=>'weight','class' => 'form-control' , 'placeholder'=> '----'] ); ?>


         </div>
       
         </div>


         <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.length')); ?>     </label>

           <?php echo Form::number('assessment_length' , null , ['id'=>'length','class' => 'form-control' , 'placeholder'=> '----'] ); ?>


         </div>
       
         </div>

         <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.purchase_ability')); ?>     </label>

           <?php echo Form::select('assessment_purchase_ability' , [ 'weak'=> __('backend.weak') , 'medium'=> __('backend.medium') ,  'good'=> __('backend.good')] , null , ['id'=>'purchase_ability','class' => 'form-control' , 'placeholder'=> '----'] ); ?>


         </div>
       
         </div>


         </div>

<?php $__currentLoopData = $assessment_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <div class="row">

         <div class="col-md-12">
         <div class="form-group"><h4> 
           <label for="projectinput1">  <?php echo e($questions->title); ?>   </label>
            
           <input  type="radio"  name="q<?php echo e($questions->id); ?>" value="yes" <?php if( $questions->question_answer == 'yes'): ?> checked <?php endif; ?> > نعم 

           <input type="radio"  name="q<?php echo e($questions->id); ?>" value="no" <?php if( $questions->question_answer == 'no'): ?> checked <?php endif; ?>> لا 
           </h4> 

         </div>
       
         </div>

         </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> <?php echo e(__('backend.save')); ?>

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

        <title><?php echo e(__('backend.assessment')); ?>  | <?php echo e(config('settings.sitename')); ?></title>

  <link rel="stylesheet" href="<?php echo e(url('')); ?>/assets/tree/treeview.css" />
    
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/vendors.css">
  
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
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/css/style-rtl.css">
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
  
$(document).ready(function(){

$('select[name="sales_channel_id"]').on('change', function() {
var sales_channel_id = $(this).val();
         
         $.ajax({

           beforeSend: function() {
              $("#loading-image").show();              
           },
           
             success: function() {
             $('#followed_delegate_id').load("<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/customers/get_followed_delegate_ajax/"+ sales_channel_id );
             $("#loading-image").hide();

           }
      });
      
  
        });

    
  $('#corporate_div').hide();
  $('#individual_div').hide();
  $('#is_sick').hide();
  

$('#customer_type').change(function(){

  $type = $(this).val();


        if($type == 'individual') {

            $('#individual_div').show();
            $('#corporate_div').hide();
          }



       if($type == 'corporate') {
           $('#corporate_div').show();
           $('#individual_div').hide();
          }
    });


 $('#is_consumer').change(function(){

$type = $(this).val();


      if($type == '0') {

          $('#consumer_div').show();
          $('#is_sick').hide();
          
         
        }

     if($type == '1') {
         
         $('#consumer_div').hide();
         $('#is_sick').show();
        }
  });

    });

$(function () {
    $("#repeat_div").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        $self.before($self.prev('div').clone());
        //$self.remove();
    });
});

</script>


<script src="<?php echo e(url('')); ?>/assets/tree/treeview.js"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>