<?php $__env->startSection('content'); ?>

<div class="app-content content">
  <div class="content-body">
    <section class="row">

    

      <div class="col-12">
        <div class="card">
          <div class="card-head">

<br>
<a style=" float: left;" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/products/<?php echo e($product->id); ?>/edit">
    <button class="btn btn-info btn">
    <i class="icon-pencil"></i>  تعديل   </button>
    </a>


            <div class="card-header">
              <h4 class="card-title">   <B>  SKU: <?php echo e($product->sku); ?>   </B></h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              
              


                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <!-- Task List table -->


                  <div  class="card-body px-0">



                    <h4 class="card-title"> <?php echo e($product->title_en); ?> </h4>
                    <h4 class="card-title"> <?php echo e($product->title_ar); ?></h4>

                     

<?php if($product->title_en_old): ?>
                    <h4 style="color:red;" class="card-title"> Old : </h4>

                    <h4 class="card-title"> <?php echo e($product->title_en_old); ?> </h4>
                    <h4 class="card-title"> <?php echo e($product->title_ar_old); ?></h4>


<?php endif; ?>


<div class="row">

         <div class="col-12 col-md-6">

                    <ul class="list-group">


                    <li class="list-group-item">
                         <?php echo e($product->sku_old); ?>  <strong style="color:red;">: Old SKU</strong> </li>



                      <li class="list-group-item">
                         <?php echo e($product->sku); ?>  <strong>:SKU</strong> </li>

                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.type')); ?>:</strong> <?php echo e($product->type['title']); ?> </li>
                      <li class="list-group-item">
                        <strong><?php echo e(__('backend.category')); ?>:</strong> 
                        <br>
                        <?php echo e($product->category['title']); ?> <br>
                         <?php echo e($product->category['title_en']); ?> 
                        </li>
                      <li class="list-group-item">
                        <strong> <?php echo e(__('backend.brand')); ?>:</strong> <?php echo e($product->brand['title']); ?></li>
                      
                      
                      <li class="list-group-item">
                        <strong><?php echo e(__('backend.mother_product')); ?>:</strong> <br> <?php echo e($product->mother_product['title']); ?> <br>  <?php echo e($product->mother_product['title_en']); ?> </li>



                        <li class="list-group-item">
                        <strong><?php echo e(__('backend.expiration_date')); ?>:</strong> <br>
                         <?php echo e($product->expiration_date); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.production_date')); ?>:</strong> <br>
                         <?php echo e($product->production_date); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.loot_number')); ?>:</strong> <br>
                         <?php echo e($product->loot_number); ?>  </li>

                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.product_package_dimensions')); ?>:</strong> <br>
                         <?php echo e($product->product_package_dimensions_x); ?> * <?php echo e($product->product_package_dimensions_y); ?> * <?php echo e($product->product_package_dimensions_z); ?>   </li>

                         

                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.sku_supplier')); ?>:</strong> <br>
                         <?php echo e($product->sku_supplier); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.total_quantity')); ?>:</strong> <br>
                         <?php echo e($product->total_quantity); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.minimum_total_quantity')); ?>:</strong> <br>
                         <?php echo e($product->minimum_total_quantity); ?>  </li>



                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.maximum_total_quantity')); ?>:</strong> <br>
                         <?php echo e($product->maximum_total_quantity); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.total_demand_limit')); ?>:</strong> <br>
                         <?php echo e($product->total_demand_limit); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.delivery_period_main_repository')); ?>:</strong> <br>
                         <?php echo e($product->delivery_period_main_repository); ?>  </li>




                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.special_price_realted_by_another_product')); ?>:</strong> <br>
                         <?php echo e($product->special_price_realted_by_another_product); ?>  </li>

                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.cost_price')); ?>:</strong> <br>
                         <?php echo e($product->cost_price); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.price_related_by_quantity')); ?>:</strong> <br>
                         <?php echo e($product->price_related_by_quantity); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.additional_costs_related_by_product')); ?>:</strong> <br>
                         <?php echo e($product->additional_costs_related_by_product); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.shipping_charges')); ?>:</strong> <br>
                         <?php echo e($product->shipping_charges); ?>  </li>

                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.cod_charges')); ?>:</strong> <br>
                         <?php echo e($product->cod_charges); ?>  </li>






<?php $__currentLoopData = $product->unit_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<li style="background-color:#e5f8ff" class="list-group-item">
<strong><?php echo e(__('backend.unit')); ?>:</strong> <?php echo e($unit_price->unit['title']); ?><?php echo e($unit_price['unit_text']); ?></li>


<li class="list-group-item">
<strong><?php echo e(__('backend.customer_price')); ?>:</strong> <?php echo e($unit_price['customer_price']); ?> </li>


<li class="list-group-item">
<strong><?php echo e(__('backend.wholesale_price')); ?>:</strong> <?php echo e($unit_price['wholesale_price']); ?> </li>


<li class="list-group-item">
<strong><?php echo e(__('backend.semi_wholesale_price')); ?>:</strong> <?php echo e($unit_price['semi_wholesale_price']); ?> </li>



<li class="list-group-item">
<strong> EAN   :</strong> <?php echo e($unit_price['ean']); ?> </li>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          


 
                
                </div>


                
         <div class="col-12 col-md-6">


          <ul class="list-group">

<li class="list-group-item">
                      <strong><?php echo e(__('backend.last_purchase_price')); ?>:</strong> <?php echo e($product['last_purchase_price']); ?> </li>
                       <li class="list-group-item">
                          <strong><?php echo e(__('backend.average_purchase_price')); ?>:</strong> <?php echo e($product['average_purchase_price']); ?> </li>
             
                          <li class="list-group-item">
                               <strong> <?php echo e(__('backend.value_added')); ?> :</strong> <?php echo e($product['value_added']); ?> </li>
                                       <li class="list-group-item">
                                               <strong> <?php echo e(__('backend.notes')); ?>:</strong> <?php echo e($product['notes']); ?> </li>
               
</ul>


<br>       
   
      
   <ul class="list-group">
           <li style="background-color:#e5f8ff" class="list-group-item">
               <strong>  <?php echo e(__('backend.coupons')); ?> </strong> </li>

<?php $__currentLoopData = $product->products_complementary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complementary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a target="_blank" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/product/<?php echo e($complementary->id); ?>" >
<li class="list-group-item">
<strong>  <?php echo e($complementary['title_ar']); ?> </br>   <?php echo e($complementary['title_en']); ?>  </strong> </li>
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

             
     </ul>

       <br>







   <br>       
   
      
                <ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong>  <?php echo e(__('backend.complementary_products')); ?> </strong> </li>

<?php $__currentLoopData = $product->products_complementary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complementary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a target="_blank" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/product/<?php echo e($complementary->id); ?>" >
                        <li class="list-group-item">
                          <strong>  <?php echo e($complementary['title_ar']); ?> </br>   <?php echo e($complementary['title_en']); ?>  </strong> </li>
</a>
                
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          
                  </ul>

                    <br>
					
					
	

                    <ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong>  <?php echo e(__('backend.repositories')); ?> </strong> </li>

<?php $__currentLoopData = $product->products_repositories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repository): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="#" >
                        <li style="background-color:#efefef" class="list-group-item">
                          <strong> <?php echo e($repository->id); ?>  <?php echo e($repository->repository['title_ar']); ?>   <?php echo e($repository->repository['title_en']); ?> </strong> </li>

                          <li class="list-group-item">
                        <strong><?php echo e(__('backend.quantity_each_repository')); ?>:</strong>
                         <?php echo e($repository->quantity_each_repository); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.minimum_quantity_each_repository')); ?>:</strong> 
                         <?php echo e($repository->minimum_quantity_each_repository); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.maximum_quantity_each_repository')); ?>:</strong>
                         <?php echo e($repository->maximum_quantity_each_repository); ?>  </li>

                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.total_demand_limit_each_repository')); ?>:</strong> 
                         <?php echo e($repository->maximum_quantity_each_repository - $repository->minimum_quantity_each_repository); ?>  </li>


                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.delivery_period_each_repository')); ?>:</strong> 
                         <?php echo e($repository->delivery_period_each_repository); ?>  </li>

                         <li class="list-group-item">
                        <strong><?php echo e(__('backend.product_place')); ?>:</strong> 
                         <?php echo e($repository->product_place_x); ?> * <?php echo e($repository->product_place_y); ?> * <?php echo e($repository->product_place_z); ?>   </li>


                
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          
                  </ul>

                    <br>
					



					
					
					
					
					
					

   
     
      
                <ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong>  <?php echo e(__('backend.local_suppliers')); ?> </strong> </li>

                        <?php $__currentLoopData = $product->suppliers->where('supplier_type' , 'داخلى'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="#"  data-toggle="modal" data-target="#exampleModal<?php echo e($supplier['id']); ?>">
                        <li     class="list-group-item">
                          <strong>  <?php echo e($supplier['name']); ?>  </strong> </li>

                          </a>




<!-- Modal -->
<div class="modal fade"  id="exampleModal<?php echo e($supplier['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e($supplier['name']); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
     

<ul class="list-group">



                          <li class="list-group-item">
                                <strong> <?php echo e(__('backend.website')); ?>: <?php echo e($supplier['website']); ?>  </strong> </li>

                                <li class="list-group-item">
                                        <strong> <?php echo e(__('backend.email')); ?>: <?php echo e($supplier['email']); ?>  </strong> </li>

                                        <li class="list-group-item">
                                                <strong> <?php echo e(__('backend.address')); ?>: <?php echo e($supplier['address']); ?>  </strong> </li>

                                                <li class="list-group-item">
                                                        <strong><?php echo e(__('backend.credit_limit')); ?>: <?php echo e($supplier['credit_limit']); ?>  </strong> </li>


<li class="list-group-item">

<strong>    <?php echo e(__('backend.credit_term')); ?>: <?php echo e($supplier['credit_term']); ?>  </strong> </li>

<li  style="background-color:#edeaea" class="list-group-item">

<strong>  <?php echo e(__('backend.delegates')); ?> </strong> </li>

<?php $__currentLoopData = $supplier->delegates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delegate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

<li class="list-group-item">

        <strong> <?php echo e($delegate['name']); ?>  </strong> -    <?php echo e(__('backend.phone')); ?>:  <?php echo e($delegate['phone']); ?>  </li>
                      
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                    
                 


</ul>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.close')); ?></button>
        
      </div>
    </div>
  </div>
</div>


     
                      
                      
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          
                  </ul>

                    <br>


                  <ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong><?php echo e(__('backend.foreign_suppliers')); ?>  </strong> </li>

                        <?php $__currentLoopData = $product->suppliers->where('supplier_type' , 'خارجى'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="#"  data-toggle="modal" data-target="#exampleModal<?php echo e($supplier['id']); ?>">
                        <li  class="list-group-item">
                          <strong> <?php echo e($supplier['name']); ?>  </strong> </li>

</a>


<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo e($supplier['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <?php echo e($supplier['name']); ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        

<ul class="list-group">

                  
                  <li class="list-group-item">
                                <strong> <?php echo e(__('backend.website')); ?>: <?php echo e($supplier['website']); ?>  </strong> </li>

                                <li class="list-group-item">
                                        <strong> <?php echo e(__('backend.email')); ?>: <?php echo e($supplier['email']); ?>  </strong> </li>

                                        <li class="list-group-item">
                                                <strong> <?php echo e(__('backend.address')); ?>: <?php echo e($supplier['address']); ?>  </strong> </li>


<li style="background-color:#edeaea" class="list-group-item">

<strong>  <?php echo e(__('backend.delegates')); ?> </strong> </li>

<?php $__currentLoopData = $supplier->delegates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delegate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    

<li class="list-group-item">

        <strong> <?php echo e($delegate['name']); ?>  </strong> -     <?php echo e(__('backend.phone')); ?>:  <?php echo e($delegate['phone']); ?>  </li>
                      
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</ul>


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('backend.close')); ?></button>
        
      </div>
    </div>
  </div>
</div>


                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          
                  </ul>
 
         <br>

                  <ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong>  <?php echo e(__('backend.websites_properties')); ?>  </strong> </li>

                        
                        
<li  class="list-group-item">

<strong><?php $__currentLoopData = $websites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $website): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <a  href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/websites_properties/export?website=<?php echo e($website->id); ?>&product=<?php echo e($product->id); ?>" class="btn btn-success btn" href="" > 

<?php echo e($website->title); ?>  </a>     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></strong> </li>

</ul>



<?php if(count($product->photos)): ?>

<ul class="list-group">
                        <li style="background-color:#e5f8ff" class="list-group-item">
                            <strong>  <?php echo e(__('backend.photos')); ?>  </strong>

</li>

                        
                        
<li  class="list-group-item">

<strong>

<?php $__currentLoopData = $product->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  

<a data-toggle="modal" data-target="#photoModal<?php echo e($photo->id); ?>" href="#">
<img src="<?php echo e(url('')); ?>/uploads/products_photos/<?php echo e($product->id); ?>/<?php echo e($photo->photo_name); ?>"   width="150">
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</strong>

<a href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/products/photos/<?php echo e($product->id); ?>">
<button class="btn btn-info btn">
  <i class="la la-download"></i>    <?php echo e(__('backend.download_photos')); ?>   </button>
</a> 

 </li>

</ul>

<?php $__currentLoopData = $product->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
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

      <img src="<?php echo e(url('')); ?>/uploads/products_photos/<?php echo e($product->id); ?>/<?php echo e($photo->photo_name); ?>"   width="100%">


<hr>

<p style="color:black;">

<?php echo e($photo->photo_width); ?> عرض  -  <?php echo e($photo->photo_height); ?> طول
<br>
 <?php echo e($product->title_en); ?>  
 <br>
  <?php echo e($product->title_ar); ?>

 

</p>


      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>


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

      <title><?php echo e(config('settings.sitename')); ?></title>

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