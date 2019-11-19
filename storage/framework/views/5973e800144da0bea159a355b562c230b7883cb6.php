
<div class="form-body">

<?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
              
 <h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.basic_information')); ?>     </h4>
     


                        <div class="row">


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.type')); ?>   </label>


                              <select id="supplier_type" required name="supplier_type" class="form-control">

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['Local_Suppliers','Foreign_Suppliers'])): ?>

                                <option value=""> --- </option>


                                <?php endif; ?>



                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Local_Suppliers')): ?>

                                <option value="داخلى"  <?php if( isset($data) && $data->supplier_type == 'داخلى' ): ?> <?php echo e('selected'); ?> <?php endif; ?> > داخلى </option>

                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Foreign_Suppliers')): ?>

                                <option value="خارجى" <?php if( isset($data) && $data->supplier_type == 'خارجى' ): ?> <?php echo e('selected'); ?> <?php endif; ?>> خارجى </option>


                                <?php endif; ?>



                              </select>

                           
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  <?php echo e(__('backend.facility_name')); ?> </label>

                              <?php echo Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.facility_name')] ); ?>

                             
                            </div>
                          </div>


                           <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  <?php echo e(__('backend.website')); ?>       </label>

                              <?php echo Form::text('website' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: www.google.com'] ); ?>


                            </div>
                            
                            </div>
                            
                     
                     
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  <?php echo e(__('backend.email')); ?>      </label>

                              <?php echo Form::text('email' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: info@google.com'] ); ?>


                            </div>
                          
                            </div>



                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">   <?php echo e(__('backend.address')); ?>   </label>

                              <?php echo Form::text('address', null , ['class' => 'form-control' , 'placeholder'=> __('backend.address')  ] ); ?>

                           
                            </div>
                          </div>

                        </div>



                        <div class="row">



                        <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  <?php echo e(__('backend.supplying_duration')); ?>       </label>

                              <?php echo Form::text('supplying_duration' , null , ['class' => 'form-control' , 'placeholder'=> __('backend.supplying_duration')] ); ?>


                            </div>
                            
                            </div>

                            <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  <?php echo e(__('backend.payment_method')); ?>       </label>

                              <?php echo Form::select('payment_method' , [__('backend.cash_money')=>__('backend.cash_money') , __('backend.pay_later')=>__('backend.pay_later')  ] , null , ['class' => 'form-control' ] ); ?>


                            </div>
                            
                            </div>



                            </div>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Local_Suppliers')): ?>

<div id="credit_div">
<h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('backend.credit_information')); ?></h4>
<div class="row">
      

<div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.credit_limit')); ?>   </label>

                              <?php echo Form::text('credit_limit', null , ['class' => 'form-control' , 'placeholder'=> __('backend.credit_limit')] ); ?>

                           
                            </div>
                          </div>






<div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">   <?php echo e(__('backend.credit_term')); ?>    </label>

                              <?php echo Form::text('credit_term', null , ['class' => 'form-control' , 'placeholder'=> __('backend.credit_term') ] ); ?>

                           
                            </div>
                          </div>





 </div>



    </div>
<?php endif; ?>

<h4 class="form-section"><i class="la la-commenting"></i>    <?php echo e(__('backend.delegates')); ?>  </h4>


<?php if( isset($data)): ?>


<?php $__currentLoopData = $data->delegates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delegates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="row">

<div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.name')); ?>     </label>

                              <?php echo Form::text('delegate_names[]', $delegates->name , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ); ?>

                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">   <?php echo e(__('backend.phone')); ?>      </label>

                              <?php echo Form::text('delegate_phones[]', $delegates->phone , ['class' => 'form-control' , 'placeholder'=> __('backend.phone')] ); ?>

                           
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  <?php echo e(__('backend.email')); ?> </label>

                              <?php echo Form::text('delegate_emails[]' , $delegates->email , ['class' => 'form-control' , 'placeholder'=> 'ex: info@google.com'] ); ?>


                            </div>
                          
                            </div>






                          <div class="col-md-1">
                            <div class="form-group">
                               <label  for="projectinput3">       </label>

                               <br>

                              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_users')): ?> 
                              <a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/delegates/<?php echo e($delegates->id); ?>/delete" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                               <?php endif; ?>
                             
                           
                            </div>
                          </div>



 </div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>


<div class="row">

<div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.name')); ?>      </label>

                              <?php echo Form::text('delegate_names[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ); ?>

                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  <?php echo e(__('backend.phone')); ?>      </label>

                              <?php echo Form::text('delegate_phones[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.phone')] ); ?>

                           
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  <?php echo e(__('backend.email')); ?> </label>

                              <?php echo Form::text('delegate_emails[]' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: info@google.com'] ); ?>


                            </div>
                          
                            </div>


 </div>



 <button id='repeat_div' class="btn btn-success">  <?php echo e(__('backend.add_delegate')); ?> </button>




                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> <?php echo e(__('backend.save')); ?>

                        </button>
                      </div>
                    
