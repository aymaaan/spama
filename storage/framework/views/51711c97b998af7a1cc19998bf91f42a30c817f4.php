<?php $__env->startSection('content'); ?>

<div class="app-content content">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title">  <?php echo e(__('backend.products')); ?> </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <!-- Task List table -->
    
<?php echo Form::open([ 'route' => 'products.store', 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]); ?>  
  

<div class="form-body">

  <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

                    <ul class="nav nav-tabs nav-topline">
					
					
                      <li class="nav-item">
                        <a style="width: 200px;" class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" aria-controls="home2"
                        aria-expanded="true"><?php echo e(__('backend.basic_information')); ?></a>
                      </li>
					  
					  
                      <li class="nav-item">
                        <a style="width: 200px;"  class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" aria-controls="profile2"
                        aria-expanded="false"><?php echo e(__('backend.general_properties')); ?></a>
                      </li>


                      <li class="nav-item">
                        <a style="width: 200px;"  class="nav-link" id="websites_properties-tab2" data-toggle="tab" href="#websites_properties" aria-controls="websites_properties"
                        aria-expanded="false"><?php echo e(__('backend.websites_properties')); ?></a>
                      </li>

                      <li class="nav-item">
                        <a style="width: 200px;"  class="nav-link" id="photos_properties-tab2" data-toggle="tab" href="#photos_properties" aria-controls="photos_properties"
                        aria-expanded="false"><?php echo e(__('backend.photos')); ?></a>
                      </li>
					  
					  
					  
                    </ul>



                    <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">



                    <div class="tab-pane" id="photos_properties" role="tabpanel" aria-labelledby="photos_properties-tab2"
                      aria-expanded="false">




 


<div class="row">

<div class="col-md-3">
    <div class="form-group">
      <label for="projectinput3">  <?php echo e(__('backend.choose_photo')); ?>  </label>

      <input type="file" multiple  id="product_photos" name="product_photos[]" >

    </div>
  </div>

</div>

					  
</div>
                 
					
<div role="tabpanel" class="tab-pane active" id="home2" aria-labelledby="home-tab2" aria-expanded="true">
                        
                    
<h4 class="form-section"><i class="la la-commenting"></i><?php echo e(__('backend.basic_information')); ?></h4>

  <div class="row">


  
<div class="col-md-3">
    <div class="form-group">
      <label for="projectinput3">  <?php echo e(__('backend.type')); ?>  </label>

      
      <?php echo Form::select('type_id', $types ,  null , ['id'=>'categories', 'class' => 'form-control' , 'placeholder'=> '-- Type  --' ] ); ?>



    </div>
  </div>


  <div class="col-md-4">
    <div class="form-group">
      <label for="projectinput3">  <?php echo e(__('backend.category')); ?>  </label>

      
      <?php echo Form::select('category_id', $categories ,  null , ['id'=>'categories', 'class' => 'form-control' , 'placeholder'=> '-- Category  --' ] ); ?>



    </div>
  </div>


  <div class="col-md-3">
    <div class="form-group">
      <label for="projectinput1"> <?php echo e(__('backend.brand')); ?>    </label>




      <select  id="brand_id" name="brand_id" required  class="form-control">


        <option title_ar="" title_en="" serial="" value=""> -- <?php echo e(__('backend.brand')); ?> -- </option>
        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option title_ar ="<?php echo e($brand->title); ?>" title_en ="<?php echo e($brand->title_en); ?>" serial="<?php echo e($brand->serial); ?>"  value="<?php echo e($brand->serial); ?>"><?php echo e($brand->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      </select>




    </div>
  </div>


  <div   class="col-md-4">
    <div class="form-group">
      <label for="projectinput1"><?php echo e(__('backend.mother_product')); ?></label>



      <select  id="mother_product_id" required name="mother_product_id" class="form-control">


        <option serial="" value=""> -- <?php echo e(__('backend.mother_product')); ?> -- </option>


      </select>

    </div>

  </div>



  <div class="col-md-4">
    <div class="form-group">
      <label for="projectinput1"><?php echo e(__('backend.first_name')); ?></label>

      <select id="first_name"  required name="first_name" class="form-control">


        <option title_ar="" title_en ="" serial="" value=""> -- <?php echo e(__('backend.product_names')); ?> -- </option>


      </select>

    </div>

  </div>





</div>




<h4 class="form-section"><i class="la la-commenting"></i>   <?php echo e(__('backend.features')); ?>   </h4>



<div id="features_div" class="row">


 <div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.feature')); ?> 1 </label>

    <select id="feature_1" name="feature_1" required  class="form-control">


      <option title_ar="" title_en ="" serial="" value=""> -- <?php echo e(__('backend.feature')); ?> 1 -- </option>


    </select>

  </div>
</div>


<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.feature')); ?> 2 </label>

    <select  id="feature_2" name="feature_2" required  class="form-control">


      <option title_ar="" title_en ="" serial="" value=""> -- <?php echo e(__('backend.feature')); ?> 2 -- </option>


    </select>

  </div>
</div>



<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.feature')); ?> 3 </label>

    <select id="feature_3" name="feature_3" required  class="form-control">


      <option  title_ar="" title_en ="" serial="" value=""> -- <?php echo e(__('backend.feature')); ?> 3 -- </option>


    </select>

  </div>
</div>



</div>


<h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.names')); ?> &  SKU </h4>



<div id="features_div" class="row">

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">   <?php echo e(__('backend.product_name_ar')); ?>       </label>

    <?php echo Form::text('title_ar', null , ['id'=>'title_ar', 'class' => 'form-control' , 'placeholder'=>  __('backend.arabic_title')   ] ); ?>


  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"><?php echo e(__('backend.product_name_en')); ?></label>

    <?php echo Form::text('title_en', null , ['id'=>'title_en', 'class' => 'form-control' , 'placeholder'=>  __('backend.english_title')   ] ); ?>


  </div>
</div>



<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3">SKU </label>

    <?php echo Form::text('sku', null , ['id'=>'sku', 'class' => 'form-control' , 'placeholder'=> 'SKU' ] ); ?>




  </div>
</div>



</div>


<h4 style="color:red;" class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.old_names')); ?> &  SKU </h4>

<div id="features_div" class="row">

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">   <?php echo e(__('backend.product_name_ar')); ?>   السابق    </label>

    <?php echo Form::text('title_ar_old', null , ['id'=>'title_ar', 'class' => 'form-control' , 'placeholder'=>  __('backend.arabic_title')   ] ); ?>


  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"><?php echo e(__('backend.product_name_en')); ?> السابق </label>

    <?php echo Form::text('title_en_old', null , ['id'=>'title_en', 'class' => 'form-control' , 'placeholder'=>  __('backend.english_title')   ] ); ?>


  </div>
</div>

<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> SKU السابق </label>

    <?php echo Form::text('sku_old', null , ['id'=>'sku', 'class' => 'form-control' , 'placeholder'=> 'SKU' ] ); ?>


  </div>
</div>



</div>






<h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('backend.units')); ?> & <?php echo e(__('backend.prices')); ?>        </h4>

<div class="row">

<div class="col-md-2">
    <div class="form-group">
      <label for="projectinput3">  <?php echo e(__('backend.unit')); ?>  </label>
      <?php echo Form::select('unit_id[]', $units ,  null , ['id'=>'unit_id', 'class' => 'form-control' , 'placeholder'=> __('backend.unit') ] ); ?>

    </div>
  </div>

  <div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">   <?php echo e(__('backend.unit')); ?>      </label>

    <?php echo Form::text('unit_text[]', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> 'Unit Free Text' ] ); ?>


  </div>
</div>



<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">   <?php echo e(__('backend.customer_price')); ?>    </label>

    <?php echo Form::text('customer_price[]', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.customer_price') ] ); ?>


  </div>
</div>


<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3"><?php echo e(__('backend.wholesale_price')); ?></label>

    <?php echo Form::text('wholesale_price[]', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.wholesale_price') ] ); ?>


  </div>
</div>


<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3"><?php echo e(__('backend.semi_wholesale_price')); ?></label>

    <?php echo Form::text('semi_wholesale_price[]', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.semi_wholesale_price') ] ); ?>


  </div>
</div>


<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  EAN </label>

    <?php echo Form::text('ean[]', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> 'EAN' ] ); ?>


  </div>
</div>


</div>


<button id='repeat_div' class="btn btn-success"><?php echo e(__('backend.add_unit')); ?></button>


<br>
<br>

<div class="row">


<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"><?php echo e(__('backend.last_purchase_price')); ?></label>

    <?php echo Form::text('last_purchase_price', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.last_purchase_price') ] ); ?>


  </div>
</div>


<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.average_purchase_price')); ?></label>

    <?php echo Form::text('average_purchase_price', null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.average_purchase_price') ] ); ?>


  </div>
</div>


<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.value_added')); ?>  </label>

    <?php echo Form::select('value_added', ['Yes'=>'Yes' , 'No'=>'No'] , null , ['id'=>'units', 'class' => 'form-control' , 'placeholder'=> __('backend.value_added') ] ); ?>


  </div>
</div>


</div>


<h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('backend.local_suppliers')); ?> </h4>
<div class="row">
<div class="form-group  col-md-8">

                    
                   
     <select  name='local_suppliers_id[]' class="select2 form-control" multiple="multiple">
                      
                   <?php $__currentLoopData = $suppliers->where('supplier_type' , 'داخلى'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option <?php if(isset($data->products_local_suppliers)): ?>
                  <?php $__currentLoopData = $data->products_local_suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($supplier->id == $row->id): ?> selected <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  <?php endif; ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                      
                    </select>
</div>
</div>





<h4 class="form-section"><i class="la la-commenting"></i><?php echo e(__('backend.foreign_suppliers')); ?></h4>


<div class="row">
<div class="form-group  col-md-8">

                    
                   
     <select  name='foreign_suppliers_id[]' class="select2 form-control" multiple="multiple">
                      
                   <?php $__currentLoopData = $suppliers->where('supplier_type' , 'خارجى'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option <?php if(isset($data->products_foreign_suppliers)): ?>
                  <?php $__currentLoopData = $data->products_foreign_suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($supplier->id == $row->id): ?> selected <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  <?php endif; ?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                      
                    </select>
</div>
</div>





<h4 class="form-section"><i class="la la-commenting"></i><?php echo e(__('backend.notes')); ?></h4>


<div class="row">
<div class="col-md-12">
  <div class="form-group">
   
    

    <?php echo Form::text('notes', null , ['id'=>'notes', 'class' => 'form-control' , 'placeholder'=> ' Notes' ] ); ?>


  </div>
</div>
</div>


                      </div>
					  
					  
					  
                      <div class="tab-pane" id="profile2" role="tabpanel" aria-labelledby="profile-tab2"
                      aria-expanded="false">




 
<div  class="row">

<div class="col-md-12">
  <div class="form-group">
    <label for="projectinput3">   <?php echo e(__('backend.complementary_products')); ?>       </label>

    <select  style="width:100%" required name='complementary_products[]' class="select2 form-control" multiple="multiple">
                      
                      <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option  value="<?php echo e($row->id); ?>"><?php echo e($row->title_ar); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                         
                       </select>


  </div>
</div>




</div>                      
                        

<div  class="row">



<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3">   <?php echo e(__('backend.expiration_date')); ?>       </label>

    <?php echo Form::date('expiration_date', null , ['id'=>'expiration_date', 'class' => 'form-control' , 'placeholder'=>  __('backend.expiration_date')   ] ); ?>


  </div>
</div>





<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3">   <?php echo e(__('backend.production_date')); ?>       </label>

    <?php echo Form::date('production_date', null , ['id'=>'production_date', 'class' => 'form-control' , 'placeholder'=>  __('backend.production_date')   ] ); ?>


  </div>
</div>




<div class="col-md-3">
  <div class="form-group">
    <label for="projectinput3">   <?php echo e(__('backend.loot_number')); ?>       </label>

    <?php echo Form::number('loot_number', null , ['id'=>'loot_number', 'class' => 'form-control' , 'placeholder'=>  __('backend.loot_number')   ] ); ?>


  </div>
</div>


<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3">   <?php echo e(__('backend.product_package_dimensions')); ?>       </label>

<div class="row">
  <div class="col-sm-2"><?php echo Form::text('product_package_dimensions_x', null , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=>  'X'  ] ); ?></div>
  <div class="col-sm-2"><?php echo Form::text('product_package_dimensions_y', null , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=>  'Y'   ] ); ?></div>
  <div class="col-sm-2"><?php echo Form::text('product_package_dimensions_z', null , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=> 'Z'   ] ); ?></div>
</div>

  </div>
</div>



</div>




<div class="row">

<div class="col-md-12">
<h4 class="form-section"><i class="la la-commenting"></i> <?php echo e(__('backend.add_repository')); ?>       </h4>
</div>



<div class="col-md-3">
    <div class="form-group">
      <label for="projectinput3">  <?php echo e(__('backend.repository')); ?>  </label>

      
      <?php echo Form::select('repositories[]', $repositories ,  null , ['id'=>'repositories', 'class' => 'form-control' , 'placeholder'=> '------' ] ); ?>



    </div>
  </div>


  
  

<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  <?php echo e(__('backend.quantity_each_repository')); ?> </label>

    <?php echo Form::text('quantity_each_repository[]', null , ['id'=>'quantity_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'  ] ); ?>


  </div>
</div>





<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  <?php echo e(__('backend.minimum_quantity_each_repository')); ?> </label>

    <?php echo Form::text('minimum_quantity_each_repository[]', null , ['id'=>'minimum_quantity_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'   ] ); ?>


  </div>
</div>


<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  <?php echo e(__('backend.maximum_quantity_each_repository')); ?> </label>

    <?php echo Form::text('maximum_quantity_each_repository[]', null , ['id'=>'maximum_quantity_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'   ] ); ?>


  </div>
</div>




<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  <?php echo e(__('backend.delivery_period_each_repository')); ?> </label>

    <?php echo Form::text('delivery_period_each_repository[]', null , ['id'=>'delivery_period_each_repository', 'class' => 'form-control' , 'placeholder'=>  '------'   ] ); ?>


  </div>
</div>







<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3">   <?php echo e(__('backend.product_place')); ?>       </label>

<div class="row">
  <div class="col-sm-2"><?php echo Form::text('product_place_x[]', null , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=>  'X'  ] ); ?></div>
  <div class="col-sm-2"><?php echo Form::text('product_place_y[]', null , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=>  'Y'   ] ); ?></div>
  <div class="col-sm-2"><?php echo Form::text('product_place_z[]', null , ['id'=>'product_package_dimensions', 'class' => 'form-control' , 'placeholder'=> 'Z'   ] ); ?></div>
</div>

  </div>
</div>




</div>



<button id='repeat_repository_div' class="btn btn-success"><?php echo e(__('backend.add_repository')); ?></button>


<br>
<br>




<hr>







<div  class="row">



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  <?php echo e(__('backend.sku_supplier')); ?> </label>

    <?php echo Form::text('sku_supplier', null , ['id'=>'package_unit', 'class' => 'form-control' , 'placeholder'=>  __('backend.sku_supplier')   ] ); ?>


  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  <?php echo e(__('backend.total_quantity')); ?> </label>

    <?php echo Form::text('total_quantity', null , ['id'=>'package_unit', 'class' => 'form-control' , 'placeholder'=>  __('backend.total_quantity')   ] ); ?>


  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  <?php echo e(__('backend.minimum_total_quantity')); ?> </label>

    <?php echo Form::text('minimum_total_quantity', null , ['id'=>'package_unit', 'class' => 'form-control' , 'placeholder'=>  __('backend.minimum_total_quantity')   ] ); ?>


  </div>
</div>





<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  <?php echo e(__('backend.maximum_total_quantity')); ?> </label>

    <?php echo Form::text('maximum_total_quantity', null , ['id'=>'package_unit', 'class' => 'form-control' , 'placeholder'=>  __('backend.maximum_total_quantity')   ] ); ?>


  </div>
</div>




<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  <?php echo e(__('backend.total_demand_limit')); ?> </label>

    <?php echo Form::text('total_demand_limit', null , ['id'=>'total_demand_limit', 'class' => 'form-control' , 'placeholder'=>  __('backend.total_demand_limit')   ] ); ?>


  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  <?php echo e(__('backend.delivery_period_main_repository')); ?> </label>

    <?php echo Form::number('delivery_period_main_repository', null , ['id'=>'delivery_period_main_repository', 'class' => 'form-control' , 'placeholder'=>  __('backend.delivery_period_main_repository')   ] ); ?>


  </div>
</div>








<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.special_price_realted_by_another_product')); ?>   </label>

    <?php echo Form::text('special_price_realted_by_another_product', null , ['id'=>'special_price_realted_by_another_product', 'class' => 'form-control'  , 'placeholder'=>  __('backend.special_price_realted_by_another_product')     ] ); ?>


  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.cost_price')); ?>   </label>

    <?php echo Form::text('cost_price', null , ['id'=>'cost_price', 'class' => 'form-control'  , 'placeholder'=>  __('backend.cost_price')     ] ); ?>


  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.price_related_by_quantity')); ?>   </label>


    <select   name='price_related_by_quantity' class="form-control">
    <option  >-----</option>
                      <?php $__currentLoopData = $quantity_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option  value="<?php echo e($row->price); ?>">Quantity : <?php echo e($row->quantity); ?> - Price : <?php echo e($row->price); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                         
                       </select>


   

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.additional_costs_related_by_product')); ?>   </label>

    <?php echo Form::text('additional_costs_related_by_product', null , ['id'=>'additional_costs_related_by_product', 'class' => 'form-control'  , 'placeholder'=>  __('backend.additional_costs_related_by_product')     ] ); ?>


  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.shipping_charges')); ?>   </label>

    <?php echo Form::text('shipping_charges', null , ['id'=>'shipping_charges', 'class' => 'form-control'  , 'placeholder'=>  __('backend.shipping_charges')     ] ); ?>


  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.cod_charges')); ?>   </label>

    <?php echo Form::text('cod_charges', null , ['id'=>'cod_charges', 'class' => 'form-control'  , 'placeholder'=>  __('backend.cod_charges')     ] ); ?>


  </div>
</div>











                      </div>
					  
					  
                    </div>




                 
  

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



                          <?php $__currentLoopData = $website->fields->where('section' , 'product'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          
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

                              <?php echo Form::text(  $field->name , null , ['class' => 'form-control' , 'placeholder'=>  $field->label_ar ] ); ?>


                             <?php endif; ?>

                            </div>
                        
                          </div>

                          




                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </div>
                        
                        
       
                                              </div>
                                    
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>








        </div>

                      </div>
					  
					  
                    </div>

















                   


<div class="form-actions">

  <button type="submit" class="btn btn-primary">
    <i class="la la-check-square-o"></i> حفظ
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

        <title> Products | <?php echo e(config('settings.sitename')); ?></title>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/forms/selects/select2.min.css">

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
  <script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

  <script src="<?php echo e(url('')); ?>/assets/app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->


<script>

$(document).click(function() {
    
//Check Product Serial
      var len_sku = $('#sku').val();
      if( len_sku.length == 12 ) {

        $.ajax(
        {
         url: "<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/products/get_product_serial_ajax/" + len_sku,
         type: 'GET',

       }).done( 

       function(data) {
        $('#sku').val(data.serial)
        });
     }
//End Check

});



$(document).ready(function(){

$('select[name="category_id"]').on('change', function() {
var category_id = $(this).val();
         
         $.ajax({

           beforeSend: function() {
              $("#loading-image").show();              
           },
           
             success: function() {
             $('#mother_product_id').load("<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/products/get_mother_products_ajax/"+ category_id );
             $("#loading-image").hide();

             
             
           }
      });
      
  
        });


$('select[name="mother_product_id"]').on('change', function() {
var category_id = $(this).val();
var serial_product = "<?php echo e($last_serial); ?>";
var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");
$('#sku').val(mother_product_serial + brand_serial + firstname + '000' + serial_product); 


         $.ajax({

           beforeSend: function() {
              $("#loading-image").show();              
           },
           
             success: function() {
             $('#first_name').load("<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/products/get_names_products_ajax/"+ category_id );
             $("#loading-image").hide();
             
             
           }
      });
      
  
        });

$('select[name="brand_id"]').on('change', function() {

//Change Product Name

//Arabic
var brand_title_ar = $('select[name="brand_id"]').find('option:selected').attr("title_ar");
var firstname_title_ar = $('select[name="first_name"]').find('option:selected').attr("title_ar");
var feature_1_title_ar = $('select[name="feature_1"]').find('option:selected').attr("title_ar");
var feature_2_title_ar = $('select[name="feature_2"]').find('option:selected').attr("title_ar");
var feature_3_title_ar = $('select[name="feature_3"]').find('option:selected').attr("title_ar");

$('#title_ar').val(brand_title_ar + ' ' + firstname_title_ar + ' ' + feature_1_title_ar + ' ' + feature_2_title_ar + ' ' + feature_3_title_ar);

//English
var brand_title_en = $('select[name="brand_id"]').find('option:selected').attr("title_en");
var firstname_title_en = $('select[name="first_name"]').find('option:selected').attr("title_en");
var feature_1_title_en = $('select[name="feature_1"]').find('option:selected').attr("title_en");
var feature_2_title_en = $('select[name="feature_2"]').find('option:selected').attr("title_en");
var feature_3_title_en = $('select[name="feature_3"]').find('option:selected').attr("title_en");


$('#title_en').val(brand_title_en + ' ' + firstname_title_en + ' ' + feature_1_title_en + ' ' + feature_2_title_en + ' '  + feature_3_title_en);


//End Change Product Name



//Change SKU 
var serial_product =  "<?php echo e($last_serial); ?>";
var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");
var feature_1 = $('select[name="feature_1"]').find('option:selected').attr("serial");
var feature_2 = $('select[name="feature_2"]').find('option:selected').attr("serial");
var feature_3 = $('select[name="feature_3"]').find('option:selected').attr("serial");
if(!feature_3 || feature_1.length == 2 ) var feature_3 = '';
$('#sku').val(mother_product_serial + brand_serial + firstname + feature_1  + feature_2 + feature_3 + serial_product);

//END Change SKU 


});


$('select[name="first_name"]').on('change', function() {

//Change SKU

var category_id = $(this).val();
var element = $(this).find('option:selected'); 
var title_en = element.attr("title_en");
var title_ar = element.attr("title_ar"); 
$('#title_ar').val(title_ar); 
$('#title_en').val(title_en); 

var serial_product =  "<?php echo e($last_serial); ?>";
var mother_product_serial = $('select[name="mother_product_id"]').find('option:selected').attr("serial");
var brand_serial = $('select[name="brand_id"]').find('option:selected').attr("serial");
var firstname = $('select[name="first_name"]').find('option:selected').attr("serial");




$('#sku').val(mother_product_serial + brand_serial + firstname + '000' + serial_product ); 

//END Change SKU


         $.ajax({

           beforeSend: function() {
              $("#loading-image").show();              
           },
           
             success: function() {
             $('#features_div').load("<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/products/get_features_products_ajax/"+ category_id );
             $("#loading-image").hide();

             


             
             
           }
      });
      
  
});




        

    });




$(function () {
    $("#repeat_div").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        $self.before($self.prev('div').clone());
        
    });
});

$(function () {
    $("#repeat_repository_div").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        $self.before($self.prev('div').clone());
        
    });
});


$(function () {
    $("#repeat_photo_div").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        $self.before($self.prev('div').clone());
        
    });
});





</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>