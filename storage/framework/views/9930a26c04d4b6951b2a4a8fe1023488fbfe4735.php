
                      <div class="form-body">

                        <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 


                       
 <h4 class="form-section"><i class="la la-commenting"></i>     <?php echo e(__('backend.basic_information')); ?>      </h4>


                        <div class="row">

                        <?php if( isset($_GET['campaign_title']) ): ?>
                          
                        
                              <?php echo Form::hidden('title', str_replace('-', ' ', $_GET['campaign_title']) , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.campaign_title')] ); ?>

                            

                          <?php else: ?>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.campaign_title')); ?>  </label>

                              <?php echo Form::text('title', null , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.campaign_title')] ); ?>

                             
                            </div>
                          </div>

                          <?php endif; ?>


                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.numbers_of_coupons')); ?>  </label>

                              <?php echo Form::number('numbers_of_coupons', 1 , ['required' => 'required','class' => 'form-control' ,'id'=>'numbers_of_coupons' , 'placeholder'=> __('backend.amount')] ); ?>

                             
                            </div>
                          </div>


                          <div id="code" class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.code')); ?>  </label>

                              <?php echo Form::text('code', $coupoun , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.code')] ); ?>

                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.discount_type')); ?>  </label>

                              <?php echo Form::select('type', [ 'fixed'=> __('backend.fixed') ,  'percent'=> __('backend.percent')] , null , ['class' => 'form-control' ] ); ?>

                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.discount')); ?>  </label>

                              <?php echo Form::text('discount', null , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.discount')] ); ?>

                             
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.total_amount')); ?>  </label>

                              <?php echo Form::text('amount', null , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.total_amount')] ); ?>

                             
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.uses_per_coupon')); ?>  </label>

                              <?php echo Form::text('uses_per_coupon', null , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.uses_per_coupon')] ); ?>

                             
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.uses_per_customer')); ?>  </label>

                              <?php echo Form::text('uses_per_customer', null , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.uses_per_customer')] ); ?>

                             
                            </div>
                          </div>


                        


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.start_date')); ?>  </label>

                              <?php echo Form::date('start_date', null , ['class' => 'form-control' ] ); ?>

                             
                            </div>
                          </div>


                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.end_date')); ?>  </label>

                              <?php echo Form::date('end_date', null , ['class' => 'form-control' ] ); ?>

                             
                            </div>
                          </div>


                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1"> <?php echo e(__('backend.qr_width')); ?>  </label>

                              <?php echo Form::text('qr_width', 500 , ['required' => 'required','class' => 'form-control' , 'placeholder'=> __('backend.qr_width')] ); ?>

                             
                            </div>
                          </div>





<div class="col-md-12">
<h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('backend.products')); ?>       </h4>
</div>





<div class="col-md-12">
  <div class="form-group">
    

<br>

<input id="checked_all_products" checked name='checked_all_products' value='1' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple"> <B> <?php echo e(__('backend.all_products')); ?></B> 
   
<div id="checked_custom_products"  <?php if( isset($data) && $data->all_products == 1): ?>  style="display:none" <?php endif; ?>>
<br>
<h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('backend.add_product')); ?>       </h4>


    <select  style="width:100%;"  name='products[]' class="select2 form-control" multiple="multiple">
                      
                      <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option  value="<?php echo e($row->id); ?>"><?php echo e($row->title_ar); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                         
                       </select>
                       </div>


  </div>
</div>








                        </div>


                          
                        </div>
                       


                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i>  <?php echo e(__('backend.save')); ?> 
                        </button>
                      </div>