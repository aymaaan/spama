@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
  <div class="content-body">
    <section class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-head">
            <div class="card-header">
              <h4 class="card-title"> <B>   {{ __('backend.customers') }}    </B></h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
              @can('create_customers')
              <div class="heading-elements">

<a data-toggle="modal" data-target="#exampleModal" href="#">
<button class="btn btn-info btn">
  <i class="la la-plus-square-o"></i> {{ __('backend.quick_add_customers') }}</button>
</a> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('backend.quick_add_customers') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     

{!! Form::open([ 'route' => 'customers.store', 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}  
<div class="row">
<div class="col-12">
<div class="col-md-6">
<div class="form-group">
  <label for="projectinput1">  {{ __('backend.name') }} </label>

  {!! Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> ' الاسم'] ) !!}
 
</div>
</div>

<div class="col-md-6">
<div class="form-group">
  <label for="projectinput1">  {{__('backend.phone')}}     </label>

  {!! Form::number('phone' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: 01008939750'] ) !!}

</div>

</div>

<div class="col-md-6">
<div class="form-group">
  <label for="projectinput1">  {{ __('backend.email') }}      </label>

  {!! Form::email('email' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: info@google.com'] ) !!}

</div>

</div> 
</div> </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      {!!Form::close()!!}

    </div>
  </div>
</div>



                <a href="{{url('')}}/{{config('settings.BackendPath')}}/customers/create">


                  <button class="btn btn-primary btn">
                    <i class="la la-plus-square-o"></i> {{ __('backend.add_customers') }}</button>




</a> 

<a href="{{ url('') }}/{{config('settings.BackendPath')}}/export_excel/export_customers" >
<button  class="btn btn-warning btn">
<i class="la la-cloud-download"></i>   {{ __('backend.export') }} 
</button>
</a>




<button  data-toggle="modal" data-target="#importModal" class="btn btn-success btn">
<i class="la la-cloud-upload"></i> {{ __('backend.import') }}</button>


 
                  
                  </div> 


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



   <form method="post" enctype="multipart/form-data" action="{{ url('') }}/{{config('settings.BackendPath')}}/import_excel/import_customers">
    {{ csrf_field() }}
  
    <div class="col-md-6">
  <div class="form-group">
    <label for="projectinput3">{{ __('backend.choose_customers_file') }}</label>

  <input type="file" name="select_file" />

  </div>
</div>



      </div>
        <div class="modal-footer">
        <button  id='importFileClose'  type="button" class="btn btn-secondary" data-dismiss="modal"> {{ __('backend.close') }} </button>

        <img style="display: none;"  id="importFileLoading" src="{{url('')}}/assets/animated-loader.gif" alt="Loading ... ">
        <button id='importFile' type="submit" class="btn btn-primary"> {{ __('backend.import') }} </button>

         </form>


      </div>
    </div>
  </div>
</div>



              @endcan


                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <!-- Task List table -->
                  @include('backend.includes.errors')
                  <table id="users-contacts" style='width:100%;' class="table datatable table-hover table-responsive">
                    <thead>
                      <tr>
                        
                        <th> {{ __('backend.name') }}  </th>
                        
                        <th> {{ __('backend.register_date') }}  </th>
                        <!--<th> {{ __('backend.customer_case') }}  </th>-->
                        <th> {{ __('backend.customer_type') }}  </th>
                        <th> {{ __('backend.options') }}  </th>
                        
                        
                        
                      </tr>
                    </thead>
                    <tbody>

                      @foreach ( $data as $row )

                      <tr>
                        
                        <td >{{ $row->name ? : $row->facility_name }}</td>
                        
                        <td >{{$row->created_at}}</td>
                        <!--<td >{{$row->customer_case['title']}}</td>-->
                        <td >{{ $row->customer_type  ? __('backend.'.$row->customer_type) :  '' }}</td>
 
                        <td>

                          @can('delete_customers') 
                          <a title="Delete Post" href="{{url(config('settings.BackendPath').'/customers/'.$row->id.'/delete')}}" class="badge badge badge-danger float-right"><i class="la la-trash"></i> </a>
                          @endcan

                          @can('update_customers') 
                          @if($row->status == 1 )
                          <a title='Block customers' href="{{url(config('settings.BackendPath').'/customers/approve/'.$row->id.'/0')}}" class="badge badge badge-success float-right"><i class="la la-check"></i> </a>
                          @else
                          <a title='Publish customers' href="{{url(config('settings.BackendPath').'/customers/approve/'.$row->id.'/1')}}" class="badge badge badge-danger float-right"><i class="la la-ban "></i> </a>
                          @endif
                          @endcan

                          
                          
                          @can('update_customers') 
                              <a href="{{url('')}}/{{config('settings.BackendPath')}}/customers/{{$row->id}}/edit" class="badge badge badge-info float-right"><i class="la la-pencil"></i>  </a>
                           @endcan


                           @can('update_customers') 
                              <a href="{{url('')}}/{{config('settings.BackendPath')}}/customers/details/{{$row->id}}" class="badge badge badge-info float-right"><i class="la la-eye"></i>    </a>
                           @endcan



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

      <title> {{ __('backend.customers') }} | {{config('settings.sitename')}}</title>

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