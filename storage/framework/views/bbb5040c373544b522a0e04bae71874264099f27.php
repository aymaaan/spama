<?php $__env->startSection('content'); ?>

<div class="app-content content">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title"> <?php echo e(__('backend.suppliers')); ?></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                      
                    <div class="heading-elements">


                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Local_Suppliers')): ?>

                     <a href="<?php echo e(url(config('settings.BackendPath').'/suppliers?t=local')); ?>">
                      <?php if( isset($_GET['t']) && $_GET['t'] == 'local' ): ?>
                      <button class="btn btn-danger btn">
                        <?php else: ?>
                        <button class="btn btn-success btn">
                        <?php endif; ?>
                      <i class="la la-plus-square-o"></i> <?php echo e(__('backend.local_suppliers')); ?>  </button>
                      </a>

                       <?php endif; ?>


                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Foreign_Suppliers')): ?>

                      <a href="<?php echo e(url(config('settings.BackendPath').'/suppliers?t=foreign')); ?>">
                      <?php if( isset($_GET['t']) && $_GET['t'] == 'foreign' ): ?>
                      <button class="btn btn-danger btn">
                        <?php else: ?>
                        <button class="btn btn-success btn">
                        <?php endif; ?>
                      <i class="la la-plus-square-o"></i>  <?php echo e(__('backend.foreign_suppliers')); ?>     </button>
                      </a>

                      <?php endif; ?>
  
<button  data-toggle="modal" data-target="#importModal" class="btn btn-danger btn">
<i class="la la-cloud-upload"></i> <?php echo e(__('backend.import')); ?>    </button>


                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create_suppliers')): ?>

                      <a href="<?php echo e(url(config('settings.BackendPath').'/suppliers/create')); ?>">
                      <button class="btn btn-primary btn">
                      <i class="la la-plus-square-o"></i>  <?php echo e(__('backend.add_supplier')); ?>    </button>
                      </a>

                      <?php endif; ?>


                       </div> 
                      
                  </div>
                </div>





<!-- Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('backend.import')); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



   <form method="post" enctype="multipart/form-data" action="<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/import_excel/import_suppliers">
    <?php echo e(csrf_field()); ?>


     <div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3"> <?php echo e(__('backend.choose_file')); ?></label>

  <input type="file" name="select_file" />

  </div>
</div>



      </div>
        <div class="modal-footer">
<button  id='importFileClose'  type="button" class="btn btn-secondary" data-dismiss="modal"> إغلاق </button>
<img style="display: none;"  id="importFileLoading" src="<?php echo e(url('')); ?>/assets/animated-loader.gif" alt="Loading ... ">
<button id='importFile' type="submit" class="btn btn-primary"> <?php echo e(__('backend.import')); ?> </button>


         </form>


      </div>
    </div>
  </div>
</div>


                <div class="card-content">
                  <div class="card-body">
                    <!-- Task List table -->
                    <?php echo $__env->make('backend.includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php if( Gate::allows(['Local_Suppliers']) ||  Gate::allows(['Foreign_Suppliers'])  ): ?>  

                  <table class="table table-striped table-bordered table-responsive" id="data_list">
                  <thead>

                  <th>  #ID </th>
                  <th> <?php echo e(__('backend.arabic_title')); ?> </th>
                  <th>  <?php echo e(__('backend.type')); ?>  </th>
                  <th width="5%" >  <?php echo e(__('backend.credit_limit')); ?>    </th>
                  <th width="5%">  <?php echo e(__('backend.credit_term')); ?>    </th>
                  <th>  <?php echo e(__('backend.email')); ?> </th>
                  <th>  <?php echo e(__('backend.address')); ?> </th>
                  <th >  <?php echo e(__('backend.options')); ?> </th>

   
                    </thead>        
               </table>

<?php endif; ?> 
                      
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('head'); ?>

<title> <?php echo e(__('backend.suppliers')); ?> | <?php echo e(config('settings.sitename')); ?></title>

  <!-- datatables -->
<script src="<?php echo e(url('')); ?>/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  
  
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('')); ?>/assets/app-assets/vendors/css/tables/datatable/datatables.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">


  <style type="text/css" class="init">
  
  </style>
  <script type="text/javascript" src="/media/js/site.js?_=994321fabf3873df746bb8bbccd1886a"></script>
  <script type="text/javascript" src="/media/js/dynamic.php?comments-page=extensions%2Fbuttons%2Fexamples%2Finitialisation%2Fexport.html" async></script>
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#data_list').DataTable({
         
            "processing": true,
            "serverSide": true,
            "dom": 'Bfrtip',
            
            "scrollX": true,
            "lengthMenu": [
            [ 10, 25, 50, 100 , 200 , 400 , 600 , 1000 ],
            [ '10 rows', '25 rows', '50 rows', '100 rows' , '200 rows' , '400 rows' ,'600 rows' , '1000 rows' ]
        ],
            "buttons": [
            'copy', 'csv', 'excel', 'print','pageLength'
            ],
            "ajax":{
                     "url": "<?php echo e(url('')); ?>/<?php echo e(config('settings.BackendPath')); ?>/all_suppliers?t=<?php echo e(isset($_GET['t']) ? $_GET['t'] : ''); ?>",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "<?php echo e(csrf_token()); ?>"}
                   },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "supplier_type" },
                
                { "data": "credit_limit" },
                { "data": "credit_term" },
               
                { "data": "website" },
                { "data": "address" },
                { "data": "options" }

                


            ]  

        });
    });
</script>
<!-- datatables -->



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

              

<script>

$('#importFile').click(function() {

$('#importFile').hide();
$('#importFileClose').hide();

$('#importFileLoading').show();
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>