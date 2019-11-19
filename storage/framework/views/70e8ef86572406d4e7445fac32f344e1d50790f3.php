

<?php $__env->startSection('content'); ?>

  <div class="app-content content">
    <div class="content-body">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-head">
              <div class="card-header">
                <h4 class="card-title"> <?php echo e(__('backend.drivers')); ?>   </h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

              </div>
            </div>
            <div class="card-content">
              <div class="card-body">
                <!-- Task List table -->

                <?php echo Form::model( $data[0] ,[ 'url' =>  config('settings.BackendPath').'/drivers/'.$data[0]->user_id, 'method'=>'PATCH' ,  'class' => 'form' ,  'files' => 'true' ]); ?>



                <div class="form-body">

                  <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                  <ul class="nav nav-tabs nav-topline">


                    <li class="nav-item">
                      <a style="width: 200px;" class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" aria-controls="home2"
                         aria-expanded="true"><?php echo e(__('backend.basic_information')); ?></a>
                    </li>




                  </ul>



                  <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">



                    <div class="tab-pane" id="photos_properties" role="tabpanel" aria-labelledby="photos_properties-tab2"
                         aria-expanded="false">











               


                    </div>


                    <div role="tabpanel" class="tab-pane active" id="home2" aria-labelledby="home-tab2" aria-expanded="true">


                      <h4 class="form-section"><i class="la la-commenting"></i><?php echo e(__('backend.basic_information')); ?></h4>

                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="projectinput1"> <?php echo e(__('backend.name')); ?> </label>

                            <?php echo Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ); ?>


                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="projectinput1">  <?php echo e(__('backend.phone')); ?>     </label>

                            <?php echo Form::number('phone' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: 05008939750'] ); ?>


                          </div>

                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="projectinput1">  <?php echo e(__('backend.bod')); ?>     </label>

                            <?php echo Form::date('BOD' , null , ['class' => 'form-control' , 'placeholder'=> ''] ); ?>


                          </div>

                        </div>
                        <div class="col-md-6">
                          <div id="custom-search-input">
                            <label for="projectinput1">  <?php echo e(__('backend.address')); ?>     </label>
                            <div class="input-group">

                              <input id="autocomplete_search" name="autocomplete_search" type="text" class="form-control" placeholder="Search" />
                              <input type="hidden" name="lat">
                              <input type="hidden" name="long">
                            </div>
                          </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="projectinput1">  <?php echo e(__('backend.city')); ?>     </label>

                            <?php echo Form::select('city_id' , $city , null , ['class' => 'form-control' , 'placeholder'=> '-- City  --'] ); ?>


                          </div>

                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="projectinput1">  <?php echo e(__('backend.nationality')); ?>     </label>

                            <?php echo Form::select('nationality_id' , $nationality , null , ['class' => 'form-control' , 'placeholder'=> '-- nationality --'] ); ?>


                          </div>

                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="projectinput1"> <?php echo e(__('backend.idnumber')); ?> </label>

                            <?php echo Form::text('id_number', null , ['class' => 'form-control' , 'placeholder'=> __('backend.id_number')] ); ?>


                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="projectinput1">  <?php echo e(__('backend.language')); ?>     </label>

                            <?php echo Form::select('language' , $language , null , ['class' => 'form-control' , 'placeholder'=> '-- language  --'] ); ?>


                          </div>

                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="projectinput1">  <?php echo e(__('backend.work_type')); ?>     </label>

                            <?php echo Form::select('work_type' , ['دوام جزئي','دوام كامل'] , null , ['class' => 'form-control','placeholder'=> __('backend.work_type')] ); ?>


                          </div>


                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="projectinput1"> <?php echo e(__('backend.from')); ?> </label>

                            <?php echo Form::time('from_time', null , ['class' => 'form-control' , 'placeholder'=> __('backend.from_time')] ); ?>


                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="projectinput1"> <?php echo e(__('backend.to')); ?> </label>

                            <?php echo Form::time('to_time', null , ['class' => 'form-control' , 'placeholder'=> __('backend.to_time')] ); ?>


                          </div>
                        </div>
                      </div>
                      <h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.days_work')); ?>    </h4>

                      <div class="row">
                        <div class="col-md-1">
                          <div class="form-group">
                            <label for="projectinput3">  <?php echo e(__('backend.Saturday')); ?>   </label>

                            <?php echo Form::checkbox('days_work', 'Saturday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ); ?>


                          </div>

                        </div>

                        <div class="col-md-1">
                          <div class="form-group">
                            <label for="projectinput3">  <?php echo e(__('backend.Sunday')); ?>   </label>

                            <?php echo Form::checkbox('days_work', 'Sunday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ); ?>


                          </div>

                        </div>

                        <div class="col-md-1">
                          <div class="form-group">
                            <label for="projectinput3">  <?php echo e(__('backend.Monday')); ?>   </label>

                            <?php echo Form::checkbox('days_work', 'Monday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ); ?>


                          </div>

                        </div>
                        <div class="col-md-1">
                          <div class="form-group">
                            <label for="projectinput3">  <?php echo e(__('backend.Tuesday')); ?>   </label>

                            <?php echo Form::checkbox('days_work', 'Tuesday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ); ?>


                          </div>

                        </div>
                        <div class="col-md-1">
                          <div class="form-group">
                            <label for="projectinput3">  <?php echo e(__('backend.Wednesday')); ?>   </label>

                            <?php echo Form::checkbox('days_work', 'Wednesday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ); ?>


                          </div>

                        </div>
                        <div class="col-md-1">
                          <div class="form-group">
                            <label for="projectinput3">  <?php echo e(__('backend.Thursday')); ?>   </label>

                            <?php echo Form::checkbox('days_work', 'Thursday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ); ?>


                          </div>

                        </div>
                        <div class="col-md-1">
                          <div class="form-group">
                            <label for="projectinput3">  <?php echo e(__('backend.Friday')); ?>   </label>

                            <?php echo Form::checkbox('days_work', 'Friday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ); ?>


                          </div>

                        </div>


                      </div>


                      <h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.login_information')); ?>    </h4>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="projectinput3">  <?php echo e(__('backend.email')); ?>   </label>

                            <?php echo Form::text('email', null , ['class' => 'form-control' , 'placeholder'=> __('backend.email')] ); ?>


                          </div>
                        </div>








                      </div>




                      <h4 class="form-section"><i class="la la-commenting"></i>  <?php echo e(__('backend.photos')); ?>    </h4>

                      <div class="row">



                        <?php $__currentLoopData = $data2->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>




                          <div class="col-md-3">
                            <div class="form-group">



                              <a data-toggle="modal" data-target="#photoModal<?php echo e($photo->id); ?>" href="#">
                                <img src="<?php echo e(url('')); ?>/uploads/drivers_photos/<?php echo e($data[0]->id); ?>/<?php echo e($photo->photo_name); ?>"   width="150">
                              </a>

                              <br>

                              <a target="_blank" href="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/drivers/photos/delete/<?php echo e($photo->id); ?>" style="color:#fff;" type="button" class="btn btn-danger" data-dismiss="modal">Delete</a>

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

                                  <img src="<?php echo e(url('')); ?>/uploads/drivers_photos/<?php echo e($data[0]->id); ?>/<?php echo e($photo->photo_name); ?>"   width="100%">


                                  <hr>




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


                      <div class="row">

                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="projectinput3">  <?php echo e(__('backend.choose_photo')); ?>  </label>

                            <input type="file" multiple id="product_photos" name="driver_photos[]" >

                          </div>
                        </div>

                      </div>




                    </div>




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

  <title> drivers | <?php echo e(config('settings.sitename')); ?></title>

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




  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>