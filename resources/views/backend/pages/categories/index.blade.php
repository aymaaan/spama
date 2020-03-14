@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-head">
            <div class="card-header">
              <h4 class="card-title">   <B> {{ __('backend.categories') }}   </B></h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              @can('create_categories')
              <div class="heading-elements">
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/categories/create">
                  <button class="btn btn-primary btn">
                    <i class="la la-plus-square-o"></i> {{ __('backend.add_category') }}     </button>
                  </a> 
              @endcan

              
<button  data-toggle="modal" data-target="#importModal" class="btn btn-success btn">
<i class="la la-cloud-upload"></i> {{ __('backend.import') }}    </button>


<a href="{{ url('') }}/{{config('settings.BackendPath')}}/export_excel/export_categories" >
<button  class="btn btn-warning btn">
<i class="la la-cloud-download"></i>   {{ __('backend.export') }} 
</button>
</a>






<!-- Modal -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('backend.import') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



   <form method="post" enctype="multipart/form-data" action="{{ url('') }}/{{config('settings.BackendPath')}}/import_excel/import_categories">
    {{ csrf_field() }}



     <div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3"> {{ __('backend.choose_categories_file') }}</label>

  <input type="file" name="select_file" />

  </div>
</div>





<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.choose_mother_products_file') }}</label>

  <input type="file" name="select_file_mother" />

  </div>
</div>




<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.choose_names_file') }}</label>

  <input type="file" name="select_file_names" />

  </div>
</div>



<div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3"> {{ __('backend.choose_features_file') }}</label>

  <input type="file" name="select_file_features" />

  </div>
</div>



      </div>
        <div class="modal-footer">
<button  id='importFileClose'  type="button" class="btn btn-secondary" data-dismiss="modal"> إغلاق </button>
<img style="display: none;"  id="importFileLoading" src="{{url('')}}/assets/animated-loader.gif" alt="Loading ... ">
<button id='importFile' type="submit" class="btn btn-primary"> {{ __('backend.import') }} </button>


         </form>


      </div>
    </div>
  </div>
</div>


</div> 
                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <!-- Task List table -->
                  

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif


                  @include('backend.includes.errors')
                  <table id="users-contacts" style='width:100%;' class="table datatable table-hover table-responsive">
                    <thead>
                      <tr>
                        <th> Serial </th>
                        @if( Auth::user()->display_content_ar == 1 )
                        <th>{{ __('backend.arabic_title') }}</th>
                        @endif
                        @if( Auth::user()->display_content_en == 1 )
                      <th>{{ __('backend.english_title') }}</th>
                      @endif
                        <th> {{ __('backend.options') }} </th>
                        
                        
                        
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ( $data as $k => $row )

                      <tr>
                        <td>{{$row->serial }}</td>
                        @if( Auth::user()->display_content_ar == 1 )
                        <td>{{$row->title}}</td>
                        @endif
                        @if( Auth::user()->display_content_en == 1 )
                         <td>{{$row->title_en}}</td>
                         @endif


                        <td>


                          @can('delete_categories') 
                          <a title="Delete Post" href="{{url(config('settings.BackendPath').'/categories/'.$row->id.'/delete')}}" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                          @endcan



                          @can('update_categories') 
                          @if($row->status == 1 )
                          <a title='Block categories' href="{{url(config('settings.BackendPath').'/categories/approve/'.$row->id.'/0')}}" class="badge badge badge-success float-right"><i class="la la-check"></i> </a>
                          @else
                          <a title='Publish categories' href="{{url(config('settings.BackendPath').'/categories/approve/'.$row->id.'/1')}}" class="badge badge badge-danger float-right"><i class="la la-ban "></i> </a>
                          @endif
                          @endcan


                          @can('update_categories') 
                              <a href="{{url('')}}/{{config('settings.BackendPath')}}/categories/{{$row->id}}/edit" class="badge badge badge-info float-right"><i class="la la-pencil"></i> </a>
                           @endcan


                 @can('mother_products') 

                  <a href="{{url('')}}/{{config('settings.BackendPath')}}/mother-products?cat={{$row->id}}">
                  <button class="btn btn-success btn">
                  {{ __('backend.mother_products') }}   <span class="badge badge badge-dark  badge-pill float-right mr-2">{{count( $row->mother_products )}}</span></button>
                  </a> 


                  @endcan



                  <a data-toggle="modal" data-target="#exampleModal" href="#">
                  <button class="btn btn-info btn">
                  {{ __('backend.websites_properties') }}   </button>
                  </a> 



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('backend.websites_properties') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

<li  class="list-group-item">


<strong>

@foreach ( $websites as $website)  

<a  href="{{url('')}}/{{config('settings.BackendPath')}}/websites_categories/export?website={{$website->id}}&categories={{$row->id}}" class="btn btn-success btn"  > 

{{$website->title}}  </a>    

 @endforeach</strong> </li>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>







                           
                           
                           
                           
 

                          


                        </td>
                        
                        
                        
                        
                                                  




                      </tr>

                      @endforeach


                    </table>

                    {{$data->links()}}
                    
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>


      @endsection


      @section('head')

      <title>{{config('settings.sitename')}}</title>

      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
      rel="stylesheet">
      <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
      rel="stylesheet">
      <!-- BEGIN VENDOR CSS-->
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/vendors.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/weather-icons/climacons.min.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/fonts/meteocons/style.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/morris.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/chartist.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
      <!-- END VENDOR CSS-->
      <!-- BEGIN MODERN CSS-->
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/app.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/custom-rtl.css">
      <!-- END MODERN CSS-->
      <!-- BEGIN Page Level CSS-->
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/fonts/simple-line-icons/style.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/pages/timeline.css">
      <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/pages/dashboard-ecommerce.css">
      <!-- END Page Level CSS-->
      <!-- BEGIN Custom CSS-->
      <link rel="stylesheet" type="text/css" href="assets/css/style-rtl.css">
      <!-- END Custom CSS-->

      @endsection

      @section('scripts')

      <!-- BEGIN VENDOR JS-->
      <script src="{{url('')}}/assets/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
      <!-- BEGIN VENDOR JS-->
      <!-- BEGIN PAGE VENDOR JS-->
      <script src="{{url('')}}/assets/app-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"
      type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
      <!-- END PAGE VENDOR JS-->
      <!-- BEGIN MODERN JS-->
      <script src="{{url('')}}/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/js/core/app.js" type="text/javascript"></script>
      <script src="{{url('')}}/assets/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
      <!-- END MODERN JS-->
      <!-- BEGIN PAGE LEVEL JS-->
      <script src="{{url('')}}/assets/app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
      <!-- END PAGE LEVEL JS-->


           

<script>

$('#importFile').click(function() {

$('#importFile').hide();
$('#importFileClose').hide();

$('#importFileLoading').show();
});

</script>

      @endsection