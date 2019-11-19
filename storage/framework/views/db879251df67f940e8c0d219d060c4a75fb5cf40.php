
<div class="form-body">

                        <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 






<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.basic_information')); ?>     </h4>
     


     <div class="row">

     <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.customer_type')); ?>     </label>

           <?php echo Form::select('customer_type' , ['individual'=>__('backend.individual'),'corporate'=>__('backend.corporate')]  , null , ['id'=>'customer_type','class' => 'form-control' , 'placeholder'=> '----'] ); ?>


         </div>
       
         </div>


       <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.customer_case')); ?>     </label>

           <?php echo Form::select('customer_case_id' , $customers_cases , null , ['class' => 'form-control' , 'placeholder'=> '----'] ); ?>


         </div>
       
         </div>

<div class="col-md-3">
<div class="form-group">
<label for="projectinput1">  <?php echo e(__('backend.sales_channel')); ?>     </label>

<?php echo Form::select('sales_channel_id' , $sales_channels , null , ['class' => 'form-control' , 'placeholder'=> '----'] ); ?>


</div>

</div>



<div class="col-md-3">
<div class="form-group">
<label for="projectinput3"> <?php echo e(__('backend.followed_delegate')); ?>  </label>

<select id="followed_delegate_id" name="followed_delegate_id"  class="form-control">


<option > ---- </option>


</select>

</div>
</div>



</div>



       <div class="row">

         <div class="col-md-12" id="individual_div"> 

         <div class="row">

         <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.name')); ?> </label>

           <?php echo Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> ' الاسم'] ); ?>

          
         </div>
       </div>

       <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.phone')); ?>     </label>

           <?php echo Form::number('phone' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: 01008939750'] ); ?>


         </div>
       
         </div>

       <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.email')); ?>      </label>

           <?php echo Form::text('email' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: info@google.com'] ); ?>


         </div>
       
         </div>


         
         <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.gender')); ?>     </label>

           <?php echo Form::select('gender' , ['male'=>__('backend.male'),'female'=>__('backend.female')]  , null , ['class' => 'form-control' , 'placeholder'=> '----'] ); ?>


         </div>
       
         </div>

         <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.age_group')); ?>     </label>

           <?php echo Form::select('age_group' , $ages , null , ['class' => 'form-control' , 'placeholder'=> __('backend.age_group')] ); ?>


         </div>
       
         </div>





       <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput3">   <?php echo e(__('backend.address')); ?>   </label>

           <?php echo Form::text('address', null , ['class' => 'form-control' , 'placeholder'=> __('backend.address')  ] ); ?>

        
         </div>
       </div>


       <div class="col-md-6">
         <div class="form-group">
           <label for="projectinput3">   <?php echo e(__('backend.google_map')); ?>   </label>

           <?php echo Form::text('google_map', null , ['class' => 'form-control' , 'placeholder'=> __('backend.google_map')  ] ); ?>

        
         </div>
       </div>



       <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput3">   <?php echo e(__('backend.continuity')); ?>   </label>

           <?php echo Form::select('continuity', [
            'continuous_client'=> __('backend.continuous_client'),
           'one_time_client'=>__('backend.one_time_client')] , null , ['class' => 'form-control'  ] ); ?>

        
         </div>
       </div>



         <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.type')); ?>     </label>

           <?php echo Form::select('is_consumer' , [
            '0'=>__('backend.customer_not_consumer'),
           '1'=>__('backend.customer_is_consumer')]  , null , ['id'=>'is_consumer','class' => 'form-control' ] ); ?>


         </div>
       
         </div>



         <div id="is_sick" class="col-md-3">
         <div class="form-group">
           <label for="projectinput3">   <?php echo e(__('backend.is_sick')); ?>   </label>

           <?php echo Form::select('is_sick', [
            'sick'=> __('backend.sick'),
           'not_sick'=>__('backend.not_sick')] , null , ['class' => 'form-control'  ] ); ?>

        
         </div>
       </div>


         <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.disease_type')); ?>     </label>

           <?php echo Form::select('disease_type' , $diseases , null , ['class' => 'form-control' , 'placeholder'=> __('backend.disease_type')] ); ?>


         </div>
       
         </div>
        

         <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput3">   <?php echo e(__('backend.delivery_schedule')); ?>   </label>

           <?php echo Form::number('delivery_schedule', null , ['class' => 'form-control' , 'placeholder'=> __('backend.delivery_schedule')  ] ); ?>

        
         </div>
       </div>



       <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.doctor')); ?>     </label>

           <?php echo Form::select('doctor_id' , $doctors , null , ['class' => 'form-control' , 'placeholder'=> '----'] ); ?>


         </div>
       
         </div>



         </div>

<div id="consumer_div" >

  
<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.consumer_information')); ?>     </h4>


<div class="row">


<div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.consumer_relationship')); ?> </label>

           <?php echo Form::text('consumer_relationship', null , ['class' => 'form-control' ] ); ?>

          
         </div>
       </div>




<div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.name')); ?> </label>

           <?php echo Form::text('consumer_name', null , ['class' => 'form-control' , 'placeholder'=> ' الاسم'] ); ?>

          
         </div>
       </div>

       <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.phone')); ?>     </label>

           <?php echo Form::number('consumer_phone' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: 01008939750'] ); ?>


         </div>
       
         </div>

       <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.email')); ?>      </label>

           <?php echo Form::text('consumer_email' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: info@google.com'] ); ?>


         </div>
       
         </div>

       <div class="col-md-6">
         <div class="form-group">
           <label for="projectinput3">   <?php echo e(__('backend.address')); ?>   </label>

           <?php echo Form::text('consumer_address', null , ['class' => 'form-control' , 'placeholder'=> __('backend.address')  ] ); ?>

        
         </div>
       </div>


       </div>



       </div>



         </div>

          <div  class="col-md-12" id="corporate_div"> 
          <div class="row">





         <div class="col-md-6">
         <div class="form-group">
           <label for="projectinput3">   <?php echo e(__('backend.facility_name')); ?>   </label>

           <?php echo Form::text('facility_name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.facility_name')  ] ); ?>

        
         </div>
       </div>



       <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.commercial_activities')); ?>     </label>

           <?php echo Form::select('commercial_activities_id' , $commercial_activities , null , ['class' => 'form-control' , 'placeholder'=> '----'] ); ?>


         </div>
       
         </div>


         
        <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.website')); ?>       </label>

           <?php echo Form::text('facility_website' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: www.google.com'] ); ?>


         </div>
         
         </div>
         
  
  



       <div class="col-md-6">
         <div class="form-group">
           <label for="projectinput3">   <?php echo e(__('backend.address')); ?>   </label>

           <?php echo Form::text('facility_address', null , ['class' => 'form-control' , 'placeholder'=> __('backend.address')  ] ); ?>

        
         </div>
       </div>


       <div class="col-md-6">
         <div class="form-group">
           <label for="projectinput3">   <?php echo e(__('backend.google_map')); ?>   </label>

           <?php echo Form::text('google_map', null , ['class' => 'form-control' , 'placeholder'=> __('backend.google_map')  ] ); ?>

        
         </div>
       </div>


         </div>



        
<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.managers_information')); ?>     </h4>

<?php if( isset($data)): ?>
<?php $__currentLoopData = $data->managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row">

<div class="col-md-3">
        <div class="form-group">
          <label for="projectinput1">  <?php echo e(__('backend.manager_name')); ?> </label>

          <?php echo Form::text('facility_manager_name[]', $manager->name , ['class' => 'form-control' ] ); ?>

         
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label for="projectinput1">  <?php echo e(__('backend.phone')); ?>     </label>

          <?php echo Form::number('facility_manager_phone[]' , $manager->phone , ['class' => 'form-control' ] ); ?>


        </div>
      
        </div>

        
      <div class="col-md-3">
        <div class="form-group">
          <label for="projectinput1">  <?php echo e(__('backend.email')); ?>      </label>

          <?php echo Form::text('facility_manager_email[]' , $manager->email , ['class' => 'form-control' ] ); ?>


        </div>
      
        </div>

        
<div class="col-md-3">
        <div class="form-group">
          <label for="projectinput1">  <?php echo e(__('backend.job')); ?> </label>

          <?php echo Form::text('facility_manager_job[]', $manager->job , ['class' => 'form-control' ] ); ?>

         
        </div>
      </div>


</div>   
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>




<div class="row">


<div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.manager_name')); ?> </label>

           <?php echo Form::text('facility_manager_name[]', null , ['class' => 'form-control' , 'placeholder'=> ' الاسم'] ); ?>

          
         </div>
       </div>

       <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.phone')); ?>     </label>

           <?php echo Form::number('facility_manager_phone[]' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: 01008939750'] ); ?>


         </div>
       
         </div>

         
       <div class="col-md-3">
         <div class="form-group">
           <label for="projectinput1">  <?php echo e(__('backend.email')); ?>      </label>

           <?php echo Form::text('facility_manager_email[]' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: info@google.com'] ); ?>


         </div>
       
         </div>


         <div class="col-md-3">
        <div class="form-group">
          <label for="projectinput1">  <?php echo e(__('backend.job')); ?> </label>

          <?php echo Form::text('facility_manager_job[]', null , ['class' => 'form-control' ] ); ?>

         
        </div>
      </div>


</div>   


<button id='repeat_div' class="btn btn-success">  <?php echo e(__('backend.add_facility_manager')); ?> </button>

         </div>


     </div>

                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> <?php echo e(__('backend.save')); ?>

                        </button>
                      </div>