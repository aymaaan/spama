<?php $__env->startSection('content'); ?>

<div class="app-content content">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title">  بيانات العميل   </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">


                  <ul class="nav nav-tabs nav-topline">
					
					
          <li class="nav-item">
            <a style="width: 200px;" class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" aria-controls="home2"
            aria-expanded="true"><?php echo e(__('backend.basic_information')); ?></a>
          </li>


          <li class="nav-item">
            <a style="width: 200px;"  class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" aria-controls="profile2"
            aria-expanded="false"><?php echo e(__('backend.activity')); ?></a>
          </li>



        </ul>



<div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">

				
<div role="tabpanel" class="tab-pane active" id="home2" aria-labelledby="home-tab2" aria-expanded="true">
  

<div class="col-md-12">


                   
<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.basic_information')); ?>     </h4>
   
<br>
<div class="row">

<div class="col-md-3">
    <div class="form-group">
    
     
      <?php echo e(__('backend.customer_type')); ?>  : <?php echo e(__('backend.'.$customer->customer_type)); ?>



    </div>
  
    </div>


  <div class="col-md-3">
    <div class="form-group">
      <label for="projectinput1">     </label>

   
      <?php echo e(__('backend.customer_case')); ?>   : <?php echo e($customer->customer_case['title']); ?>



    </div>
  
    </div>

<div class="col-md-3">
<div class="form-group">


<?php echo e(__('backend.sales_channel')); ?> : <?php echo e($customer->sales_channel['title']); ?>


</div>

</div>

<div class="col-md-3">
<div class="form-group">
<label for="projectinput3">   </label>

<?php echo e(__('backend.followed_delegate')); ?>  : <?php echo e($customer->followed_delegate['name']); ?>


</div>
</div>

</div>


<div class="row">

         <div class="col-md-3">
         <div class="form-group">
           

           <?php echo e(__('backend.name')); ?> : <?php echo e($customer->name); ?>

          
         </div>
       </div>

       <div class="col-md-3">
         <div class="form-group">
           

           <?php echo e(__('backend.phone')); ?> : <?php echo e($customer->phone); ?>


         </div>
       
         </div>

       <div class="col-md-3">
         <div class="form-group">
   
           <?php echo e(__('backend.email')); ?> : <?php echo e($customer->email); ?>


         </div>
       
         </div>


         
         <div class="col-md-3">
         <div class="form-group">

           <?php echo e(__('backend.gender')); ?> : <?php echo e($customer->gender); ?>


         </div>
       
         </div>

         <div class="col-md-3">
         <div class="form-group">

           <?php echo e(__('backend.age_group')); ?> : <?php echo e($customer->age_group_title['title']); ?> 


         </div>
       
         </div>

<?php if($customer->address): ?>

       <div class="col-md-3">
         <div class="form-group">
          
           <?php echo e(__('backend.address')); ?> : <?php echo e($customer->address); ?>

          
        
         </div>
       </div>

<?php endif; ?>


       


       <div class="col-md-3">
         <div class="form-group">
         

           <?php echo e(__('backend.continuity')); ?> : <?php echo e(__('backend.'.$customer->continuity)); ?>


           
         </div>
       </div>



         <div class="col-md-3">
         <div class="form-group">
          
           <?php echo e(__('backend.type')); ?> : <?php if($customer->is_consumer == 0  ): ?> <?php echo e(__('backend.customer_not_consumer')); ?> <?php else: ?> <?php echo e(__('backend.customer_is_consumer')); ?>  <?php endif; ?>

         </div>
       
         </div>



         <div id="is_sick" class="col-md-3">
         <div class="form-group">
          
           <?php echo e(__('backend.is_sick')); ?> : <?php if($customer->is_sick == 'sick'  ): ?> <?php echo e(__('backend.sick')); ?> <?php else: ?> <?php echo e(__('backend.not_sick')); ?>  <?php endif; ?>

         </div>
       </div>


         <div class="col-md-3">
         <div class="form-group">
           

           <?php echo e(__('backend.disease_type')); ?> : <?php echo e($customer->diseases['title']); ?>



         </div>
       
         </div>
        

         <div class="col-md-3">
         <div class="form-group">
         

           <?php echo e(__('backend.delivery_schedule')); ?> : <?php echo e($customer->delivery_schedule); ?> يوم

        
         </div>
       </div>



       <div class="col-md-3">
         <div class="form-group">
          

           <?php echo e(__('backend.doctor')); ?> : <?php echo e($customer->doctors['name']); ?>


         </div>
       
         </div>


         <div class="col-md-3">
         <div class="form-group">
           

           <?php echo e(__('backend.consumer_relationship')); ?> : <?php echo e($customer->consumer_relationship); ?>

          
         </div>
</div>



         </div>


 


<?php if($customer->is_consumer == 0  ): ?>


<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.consumer_information')); ?>     </h4>



<div class="row">




<div class="col-md-3">
         <div class="form-group">
          

           <?php echo e(__('backend.name')); ?> : <?php echo e($customer->consumer_name); ?>

          
         </div>
       </div>

       <div class="col-md-3">
         <div class="form-group">
       
           <?php echo e(__('backend.phone')); ?> : <?php echo e($customer->consumer_phone); ?>

          
         </div>
       
         </div>

       <div class="col-md-3">
         <div class="form-group">
          
           <?php echo e(__('backend.email')); ?> :  <?php echo e($customer->consumer_email); ?>


         </div>
       
         </div>

       <div class="col-md-6">
         <div class="form-group">
        
           <?php echo e(__('backend.address')); ?> : <?php echo e($customer->consumer_address); ?>

         </div>
       </div>


       </div>

<?php endif; ?>       

<?php if($customer->customer_type == 'corporate'): ?>
       
<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.corporate_information')); ?>     </h4>

<div class="row">

         <div class="col-md-6">
         <div class="form-group">
           <?php echo e(__('backend.facility_name')); ?> : <?php echo e($customer->facility_name); ?> 
         </div>
       </div>



       <div class="col-md-3">
         <div class="form-group">
          
           <?php echo e(__('backend.commercial_activities')); ?> : <?php echo e($customer->commercial_activities_id); ?> 
         </div>
       
         </div>


         
        <div class="col-md-3">
         <div class="form-group">
           
           <?php echo e(__('backend.website')); ?> : <?php echo e($customer->facility_website); ?>

         </div>
         
         </div>
         
  
  



       <div class="col-md-6">
         <div class="form-group">
        
           <?php echo e(__('backend.address')); ?> : <?php echo e($customer->facility_address); ?>

          
         </div>
       </div>




         </div>



   
<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.managers_information')); ?>     </h4>


<?php $__currentLoopData = $customer->managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row">

<div class="col-md-3">
        <div class="form-group">
        
          <?php echo e(__('backend.manager_name')); ?> : <?php echo e($manager->name); ?>


        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
         
 <?php echo e(__('backend.phone')); ?> : <?php echo e($manager->phone); ?>

        
        </div>
      
        </div>

        
      <div class="col-md-3">
        <div class="form-group">
         
    
          <?php echo e(__('backend.email')); ?> : <?php echo e($manager->email); ?>


        </div>
      
        </div>

        
<div class="col-md-3">
        <div class="form-group">
         
          <?php echo e(__('backend.job')); ?> : <?php echo e($manager->job); ?>

       
        </div>
      </div>


</div>   
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>










                 
<?php endif; ?>








</div>

			  
</div>



				
<div role="tabpanel" class="tab-pane" id="profile2" aria-labelledby="profile2-tab2" aria-expanded="true">
  
    
<div class="col-md-12">
        

<table id="example" class="table table-striped table-bordered zero-configuration dataTable">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">النشاط</th>
     
      <th scope="col">التاريخ</th>
      <th scope="col">بواسطة</th>
      
    </tr>
  </thead>
  <tbody>

    <tr>
      <th> 1 </th>
      <th> تسجيل العميل </th>
      <th><?php echo e($customer->created_at); ?></th>
      <th>  -- </th>
    </tr>


<?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th> <?php echo e($k + 2); ?></th>
      <th>
      <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/assessment_products/details/<?php echo e($activity->serial); ?>">
      <?php if($activity->request_by == 'delegates'): ?> التقييم <?php else: ?> إحالة من طبيب <?php endif; ?>  رقم ( <?php echo e($activity->serial); ?> )  </th>
      </a>
      <th> <?php echo e($activity->created_at); ?></th>
      <th> <?php echo e($activity->user[0]['name']); ?></th>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

   

  </tbody>
</table>


</div>


</div>   
		  
</div>















	  
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

        <title> <?php echo e(__('backend.customers')); ?>  | <?php echo e(config('settings.sitename')); ?></title>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/forms/selects/select2.min.css">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/vendors.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/weather-icons/climacons.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/fonts/meteocons/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/charts/chartist.css">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
  <!-- END VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/css-rtl/plugins/forms/checkboxes-radios.css">
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
  <script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
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
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
 <!-- BEGIN PAGE LEVEL JS-->
 <script src="<?php echo e(url('')); ?>/assets/app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->


<script>


$(document).ready(function(){

$('select[name="customer"]').on('change', function() {
var customer = $(this).val();
if(customer != 0){
$("#new_registration").hide();
$("#tools").show();

$("#assessment_products_doctor").attr("href","<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/assessment_products_doctor/"+customer);

$("#assessment_products_delegate").attr("href","<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/assessment_products_delegate/"+customer);

$("#pricing").attr("href","<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/assessment_pricing/"+customer);

} else {
  $("#new_registration").show(); 
  $("#tools").hide();
}
  
        });

      });
  
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>