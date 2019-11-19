<div class="form-body">

    <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('backend.basic_information')); ?>      </h4>


    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.date')); ?> </label>

                <?php echo Form::date('date', null , ['class' => 'form-control form-group-style' , 'placeholder'=> __('backend.to_time')] ); ?>


            </div>

        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.city')); ?> </label>

                <?php echo Form::select('city_id',$cities, null , ['class' => 'form-control' , 'placeholder'=> '-- Choose City --'] ); ?>


            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.driver')); ?> </label>

                <?php echo Form::select('driver_id',$drivers, null , ['class' => 'form-control' , 'placeholder'=> __('backend.driver')] ); ?>


            </div>

        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.from_time')); ?> </label>

                <?php echo Form::select('from_time',['01:00'=>'1','02:00'=>'2','03:00'=>'3','04:00'=>'4','05:00'=>'5','06:00'=>'6','07:00'=>'7','08:00'=>'8','09:00'=>'9','10:00'=>'10','11:00'=>'11','12:00'=>'12',], null , ['class' => 'form-control' , 'placeholder'=> __('backend.from_time')] ); ?>


            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.time')); ?> </label>

                <?php echo Form::select('from',['AM'=>'صباحا','PM'=>'مساءا'], null , ['class' => 'form-control' , 'placeholder'=> '-- choose Time -- '] ); ?>


            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.to_time')); ?> </label>

                <?php echo Form::select('to_time',['01:00'=>'1','02:00'=>'2','03:00'=>'3','04:00'=>'4','05:00'=>'5','06:00'=>'6','07:00'=>'7','08:00'=>'8','09:00'=>'9','10:00'=>'10','11:00'=>'11','12:00'=>'12',], null , ['class' => 'form-control' , 'placeholder'=> __('backend.to_time')] ); ?>


            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.time')); ?> </label>

                <?php echo Form::select('to',['AM'=>'صباحا','PM'=>'مساءا'], null , ['class' => 'form-control' , 'placeholder'=>'-- choose Time -- '] ); ?>


            </div>
        </div>


    </div>
    <h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('backend.starting')); ?>      </h4>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.from')); ?> </label>

                <?php echo Form::select('branch_start',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ); ?>


            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.customer')); ?> </label>

                <?php echo Form::text('customer', null , ['class' => 'form-control' ,'id'=>'customer', 'placeholder'=> __('backend.other')] ); ?>

                <input type="hidden" name="customer_start" id="te">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.other')); ?> </label>

                <?php echo Form::text('other_start', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ); ?>


            </div>

        </div>

    </div>
    <h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('backend.stops')); ?>      </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.from')); ?> </label>

                <?php echo Form::select('branch_stop',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ); ?>


            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.other')); ?> </label>

                <?php echo Form::text('other_stop', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ); ?>


            </div>

        </div>
        <div class="col-md-6">
            
            

            
            
            
            <div class="form-group">
                <select name="customer_stop[]" class="my-select form-control">
                    <option value="0" >----</option>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($customer->id); ?>">

                            <?php echo e($customer->name); ?>


                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
            </div>
        </div>
    </div>
    <button id='repeat_div' class="btn btn-success"><?php echo e(__('backend.add_stops')); ?></button>
    <h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('backend.destinations')); ?>      </h4>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.from')); ?> </label>

                <?php echo Form::select('branch_des',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ); ?>


            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.customer')); ?> </label>

                <?php echo Form::text('customer', null , ['class' => 'form-control' ,'id'=>'customer', 'placeholder'=> __('backend.other')] ); ?>

                <input type="hidden" name="customer_des" id="te">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput1"> <?php echo e(__('backend.other')); ?> </label>

                <?php echo Form::text('other_des', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ); ?>


            </div>

        </div>

    </div>

</div>


<div class="form-actions">

    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i> <?php echo e(__('backend.save')); ?>

    </button>
</div>
                    
