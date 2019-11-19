
                      <div class="form-body">

                        <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>    <?php echo e(__('backend.basic_information')); ?>  </h4>


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"><?php echo e(__('backend.arabic_title')); ?></label>

                              <?php echo Form::text('title', null , ['class' => 'form-control' , 'placeholder'=> 'Arabic Title'] ); ?>

                             
                            </div>
                          </div>


                        </div>



                          
                        </div>
                        
                        
                        
                        
                        
                 <div class="row">        
                        
                        
                        
 <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"><?php echo e(__('backend.english_title')); ?></label>

                              <?php echo Form::text('title_en', null , ['class' => 'form-control' , 'placeholder'=> 'English Title'] ); ?>

                             
                            </div>
                          </div>


                        </div>




                 
<h4 class="form-section"><i class="la la-commenting"></i>    <?php echo e(__('backend.photos')); ?>  </h4>



<?php if(isset($data->photos) ): ?>

<div class="row">

<?php $__currentLoopData = $data->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

<div class="col-md-3">
    <div class="form-group">
     


<a data-toggle="modal" data-target="#photoModal<?php echo e($photo->id); ?>" href="#">
<img src="<?php echo e(url('')); ?>/uploads/categories_photos/<?php echo e($data->id); ?>/<?php echo e($photo->photo_name); ?>"   width="150">
</a> 

<br>

<a target="_blank" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/categories/photos/delete/<?php echo e($photo->id); ?>" style="color:#fff;" type="button" class="btn btn-danger" data-dismiss="modal">Delete</a>

    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="photoModal<?php echo e($photo->id); ?>" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel<?php echo e($photo->id); ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Photo | <?php echo e($photo->photo_name); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <img src="<?php echo e(url('')); ?>/uploads/categories_photos/<?php echo e($data->id); ?>/<?php echo e($photo->photo_name); ?>"   width="100%">


<hr>

<p style="color:black;">

<?php echo e($photo->photo_width); ?> عرض  -  <?php echo e($photo->photo_height); ?> طول
<br>
 <?php echo e($data->title_en); ?>  
 <br>
  <?php echo e($data->title_ar); ?>

 

</p>


      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>



<hr>

<br>


<?php endif; ?>



<div class="row">

<div class="col-md-3">
    <div class="form-group">
      <label for="projectinput3">  <?php echo e(__('backend.choose_photo')); ?>  </label>

      <input type="file" multiple  id="product_photos" name="product_photos[]" >

    </div>
  </div>

</div>




                    
<h4 class="form-section"><i class="la la-commenting"></i>    <?php echo e(__('backend.websites_properties')); ?>  </h4>



                        <div class="tab-pane" id="websites_properties" role="tabpanel" aria-labelledby="websites_properties-tab2"
                      aria-expanded="false">


        <ul class="nav nav-tabs nav-topline">
					
        


        <?php $__currentLoopData = $websites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$website): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="nav-item">
            <a style="width: 200px;" class="nav-link <?php if($k == 0): ?> <?php echo e('active'); ?> <?php endif; ?>" id="websites_tab_properties-tab2<?php echo e($website->id); ?>" data-toggle="tab" href="#websites_tab_properties<?php echo e($website->id); ?>" aria-controls="websites_tab_properties"
            aria-expanded="true"><?php echo e($website->title); ?></a>
          </li>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </ul>
        <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">






        <?php $__currentLoopData = $websites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$website): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


        <div role="tabpanel" class="tab-pane <?php if($k == 0): ?> <?php echo e('active'); ?> <?php endif; ?>" id="websites_tab_properties<?php echo e($website->id); ?>" aria-labelledby="home-tab2<?php echo e($website->id); ?>" aria-expanded="true">
                        
                      

                       
                        
                          <div class="row">
                          <?php $__currentLoopData = $website->fields->where('section' , 'categories'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          

                          
                          <?php if( $field->field_type  == 'textarea' || $field->field_type  == 'checkbox' || $field->field_type  == 'options'  || $field->field_type  == 'files' ): ?>
                          <div class="col-md-12">
                          <?php else: ?>
                          <div class="col-md-4">
                          <?php endif; ?>


                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e($field->label_ar); ?>  </label>

                              <?php if($field->field_type  == 'number'): ?>

                              <?php echo Form::number(  $field->name , null , ['class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ); ?>


                              <?php elseif($field->field_type  == 'textarea'): ?>

                              <?php echo Form::textarea(  $field->name , null , [ 'rows' => '3' ,'class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ); ?>

                         
                              <?php elseif($field->field_type  == 'select'): ?>


<select name="<?php echo e($field->name); ?>" class="form-control">

  <option value="">---</option>

<?php $__currentLoopData = explode(',',$field->selected_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $select_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <option value="<?php echo e($select_option); ?>"><?php echo e($select_option); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  
</select>





<?php elseif($field->field_type  == 'checkbox'): ?>
<?php echo Form::checkbox(  $field->name , null , ['class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ); ?>

<?php elseif($field->field_type  == 'options'): ?>


<?php $__currentLoopData = explode(',',$field->selected_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $select_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
  <input type="radio" name="<?php echo e($field->name); ?>" value="<?php echo e($select_option); ?>"><?php echo e($select_option); ?>  

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  
<?php elseif( $field->field_type  == 'files' || $field->field_type  == 'images' ): ?>

<input type="file" multiple="multiple" name="<?php echo e($field->name); ?>[]"  />



                              <?php else: ?>


                              <?php echo Form::text(  $field->name , $field->category_value($cat_id) , ['class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ); ?>


                             <?php endif; ?>

                            </div>
                        
                          </div>

                          




                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </div>
                        
                        
       
                                              </div>
                                    
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>

                     


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> <?php echo e(__('backend.save')); ?>

                        </button>
                      </div>