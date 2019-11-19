
                      <div class="form-body">

                        <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>     <?php echo e(__('backend.basic_information')); ?>      </h4>


                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.arabic_title')); ?>  </label>

                              <?php echo Form::text('title', null , ['required' => 'required' ,'class' => 'form-control' , 'placeholder'=> __('backend.arabic_title')] ); ?>

                             
                            </div>
                          </div>


                       
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.english_title')); ?>  </label>

                              <?php echo Form::text('title_en', null , ['required' => 'required' , 'class' => 'form-control' , 'placeholder'=> __('backend.english_title')] ); ?>

                             
                            </div>
                          </div>


                        </div>




                        <h4 class="form-section"><i class="la la-commenting"></i>    <?php echo e(__('backend.fields_properties_products')); ?>  </h4>





<?php if( isset($data)): ?>


<?php $__currentLoopData = $data->fields->where('section' , 'product'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



<div class="row">

<div class="col-md-3">


                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.type')); ?>      </label>

                              <?php echo Form::select('field_type[]', [ 'text'=>'Text' , 'number'=>'Number' , 'textarea'=>'Textarea','select'=>'Select' , 'checkbox'=>'Checkbox','options'=>'Options' , 'files'=>'Files' , 'images'=>'Images'] , $field->field_type , ['id' =>'field_type','class' => 'form-control' , 'placeholder'=> '----'] ); ?>

                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.arabic_title')); ?>      </label>

                              <?php echo Form::text('label_ar[]', $field->label_ar , ['class' => 'form-control' , 'placeholder'=> __('backend.arabic_title')] ); ?>

                           
                            </div>
                          </div>


                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.english_title')); ?>      </label>

                              <?php echo Form::text('label_en[]', $field->label_en , ['class' => 'form-control' , 'placeholder'=> __('backend.english_title')] ); ?>

                           
                            </div>
                          </div>



                          <div id="selected_options"  class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.selected_options')); ?>      </label>

                              <?php echo Form::text('selected_options[]', $field->selected_options , ['class' => 'form-control' , 'placeholder'=> 'اترك فاصلة بعد كل كلمة'] ); ?>

                           
                            </div>
                          </div>










                          <div class="col-md-1">
                            <div class="form-group">
                               <label  for="projectinput3">       </label>

                               <br>

                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_websites')): ?> 
                              <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/websites_fields/<?php echo e($field->id); ?>/delete" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                               <?php endif; ?>
                             
                           
                            </div>
                          </div>
                          
                         

 </div>


 <hr><br><br>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>




<div class="row">

<div class="col-md-3">


                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.type')); ?>      </label>

                              <?php echo Form::select('field_type[]', [ 'text'=>'Text' , 'number'=>'Number' , 'textarea'=>'Textarea','select'=>'Select' , 'checkbox'=>'Checkbox','options'=>'Options' , 'files'=>'Files' , 'images'=>'Images'] , null , ['class' => 'form-control' , 'placeholder'=> '----'] ); ?>

                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.arabic_title')); ?>      </label>

                              <?php echo Form::text('label_ar[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.arabic_title')] ); ?>

                           
                            </div>
                          </div>


                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.english_title')); ?>      </label>

                              <?php echo Form::text('label_en[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.english_title')] ); ?>

                           
                            </div>
                          </div>


                          <div id="selected_options" class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.selected_options')); ?>      </label>

                              <?php echo Form::text('selected_options[]', null , ['class' => 'form-control' , 'placeholder'=> 'اترك فاصلة بعد كل كلمة'] ); ?>



                           
                            </div>
                          </div>

                          <hr>
                          


                          <hr><br><br>
 </div>



 <button id='repeat_div' class="btn btn-success">  <?php echo e(__('backend.add_new')); ?> </button>




                          
                        </div>
                       

<br><br>
















                        <h4 class="form-section"><i class="la la-commenting"></i>    <?php echo e(__('backend.fields_properties_categories')); ?>  </h4>





<?php if( isset($data)): ?>


<?php $__currentLoopData = $data->fields->where('section' , 'categories'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



<div class="row">

<div class="col-md-3">


                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.type')); ?>      </label>

                              <?php echo Form::select('field_type_categories[]', [ 'text'=>'Text' , 'number'=>'Number' , 'textarea'=>'Textarea','select'=>'Select' , 'checkbox'=>'Checkbox','options'=>'Options' , 'files'=>'Files' , 'images'=>'Images'] , $field->field_type , ['id' =>'field_type','class' => 'form-control' , 'placeholder'=> '----'] ); ?>

                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.arabic_title')); ?>      </label>

                              <?php echo Form::text('label_ar_categories[]', $field->label_ar , ['class' => 'form-control' , 'placeholder'=> __('backend.arabic_title')] ); ?>

                           
                            </div>
                          </div>


                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.english_title')); ?>      </label>

                              <?php echo Form::text('label_en_categories[]', $field->label_en , ['class' => 'form-control' , 'placeholder'=> __('backend.english_title')] ); ?>

                           
                            </div>
                          </div>



                          <div id="selected_options"  class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.selected_options')); ?>      </label>

                              <?php echo Form::text('selected_options_categories[]', $field->selected_options , ['class' => 'form-control' , 'placeholder'=> 'اترك فاصلة بعد كل كلمة'] ); ?>

                           
                            </div>
                          </div>










                          <div class="col-md-1">
                            <div class="form-group">
                               <label  for="projectinput3">       </label>

                               <br>

                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_websites')): ?> 
                              <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/websites_fields/<?php echo e($field->id); ?>/delete" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                               <?php endif; ?>
                             
                           
                            </div>
                          </div>
                          
                         

 </div>


 <hr><br><br>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>




<div class="row">

<div class="col-md-3">


                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.type')); ?>      </label>

                              <?php echo Form::select('field_type_categories[]', [ 'text'=>'Text' , 'number'=>'Number' , 'textarea'=>'Textarea','select'=>'Select' , 'checkbox'=>'Checkbox','options'=>'Options' , 'files'=>'Files' , 'images'=>'Images'] , null , ['class' => 'form-control' , 'placeholder'=> '----'] ); ?>

                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.arabic_title')); ?>      </label>

                              <?php echo Form::text('label_ar_categories[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.arabic_title')] ); ?>

                           
                            </div>
                          </div>


                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.english_title')); ?>      </label>

                              <?php echo Form::text('label_en_categories[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.english_title')] ); ?>

                           
                            </div>
                          </div>


                          <div id="selected_options" class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.selected_options')); ?>      </label>

                              <?php echo Form::text('selected_options_categories[]', null , [ 'class' => 'form-control' , 'placeholder'=> 'اترك فاصلة بعد كل كلمة'] ); ?>

                           
                            </div>
                          </div>

                          <hr>
                          


                          <hr><br><br>
 </div>



 <button id='repeat_cat_div' class="btn btn-success">  <?php echo e(__('backend.add_new')); ?> </button>




                   



                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i>  <?php echo e(__('backend.save')); ?> 
                        </button>
                      </div>
                    
