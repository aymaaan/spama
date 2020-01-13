@extends('backend.layouts.default')

@section('content')

    <div class="app-content content">
        <div class="content-body">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="card-header">
                                <h4 class="card-title"><B>   {{__('backend.pending_orders')}}     </B></h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                @can('create_pending')
                                    <div class="heading-elements">
                                        <a href="{{url('')}}/{{config('settings.BackendPath')}}/pending/create">

                                            f
                                            <button class="btn btn-primary btn">
                                                <i class="la la-plus-square-o"></i> {{__('backend.add_pending')}}
                                            </button>


                                        </a></div>
                                @endcan


                            </div>
                        </div>
                        <div class="card-content">

                            <form action="{{url(config('settings.BackendPath').'/orderPending')}}" method="GET">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="projectinput1"> {{__('backend.date_from')}} </label>

                                            {!! Form::date('date_from', null , ['class' => 'form-control form-group-style' , 'placeholder'=> __('backend.date_from')] ) !!}

                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="projectinput1"> {{__('backend.date_to')}} </label>

                                            {!! Form::date('date_to', null , ['class' => 'form-control form-group-style' , 'placeholder'=> __('backend.date_to')] ) !!}

                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="projectinput1"> {{__('backend.from_time')}} </label>

                                            <select name="from_time" class="select2 form-control">
                                                <option value="">{{ __('backend.to') }}</option>
                                                <option value="00:00">12:00 AM</option>
                                                <option value="00:15">12:15 AM</option>
                                                <option value="00:30">12:30 AM</option>
                                                <option value="00:45">12:45 AM</option>
                                                <option value="01:00">01:00 AM</option>
                                                <option value="01:15">01:15 AM</option>
                                                <option value="01:30">01:30 AM</option>
                                                <option value="01:45">01:45 AM</option>
                                                <option value="02:00">02:00 AM</option>
                                                <option value="02:15">02:15 AM</option>
                                                <option value="02:30">02:30 AM</option>
                                                <option value="02:45">02:45 AM</option>
                                                <option value="03:00">03:00 AM</option>
                                                <option value="03:15">03:15 AM</option>
                                                <option value="03:30">03:30 AM</option>
                                                <option value="03:45">03:45 AM</option>
                                                <option value="04:00">04:00 AM</option>
                                                <option value="04:15">04:15 AM</option>
                                                <option value="04:30">04:30 AM</option>
                                                <option value="04:45">04:45 AM</option>
                                                <option value="05:00">05:00 AM</option>
                                                <option value="05:15">05:15 AM</option>
                                                <option value="05:30">05:30 AM</option>
                                                <option value="05:45">05:45 AM</option>
                                                <option value="06:00">06:00 AM</option>
                                                <option value="06:15">06:15 AM</option>
                                                <option value="06:30">06:30 AM</option>
                                                <option value="06:45">06:45 AM</option>
                                                <option value="07:00">07:00 AM</option>
                                                <option value="07:15">07:15 AM</option>
                                                <option value="07:30">07:30 AM</option>
                                                <option value="07:45">07:45 AM</option>
                                                <option value="08:00">08:00 AM</option>
                                                <option value="08:15">08:15 AM</option>
                                                <option value="08:30">08:30 AM</option>
                                                <option value="08:45">08:45 AM</option>
                                                <option value="09:00">09:00 AM</option>
                                                <option value="09:15">09:15 AM</option>
                                                <option value="09:30">09:30 AM</option>
                                                <option value="09:45">09:45 AM</option>
                                                <option value="10:00">10:00 AM</option>
                                                <option value="10:15">10:15 AM</option>
                                                <option value="10:30">10:30 AM</option>
                                                <option value="10:45">10:45 AM</option>
                                                <option value="11:00">11:00 AM</option>
                                                <option value="11:15">11:15 AM</option>
                                                <option value="11:30">11:30 AM</option>
                                                <option value="11:45">11:45 AM</option>
                                                <option value="12:00">12:00 PM</option>
                                                <option value="12:15">12:15 PM</option>
                                                <option value="12:30">12:30 PM</option>
                                                <option value="12:45">12:45 PM</option>
                                                <option value="13:00">01:00 PM</option>
                                                <option value="13:15">01:15 PM</option>
                                                <option value="13:30">01:30 PM</option>
                                                <option value="13:45">01:45 PM</option>
                                                <option value="14:00">02:00 PM</option>
                                                <option value="14:15">02:15 PM</option>
                                                <option value="14:30">02:30 PM</option>
                                                <option value="14:45">02:45 PM</option>
                                                <option value="15:00">03:00 PM</option>
                                                <option value="15:15">03:15 PM</option>
                                                <option value="15:30">03:30 PM</option>
                                                <option value="15:45">03:45 PM</option>
                                                <option value="16:00">04:00 PM</option>
                                                <option value="16:15">04:15 PM</option>
                                                <option value="16:30">04:30 PM</option>
                                                <option value="16:45">04:45 PM</option>
                                                <option value="17:00">05:00 PM</option>
                                                <option value="17:15">05:15 PM</option>
                                                <option value="17:30">05:30 PM</option>
                                                <option value="17:45">05:45 PM</option>
                                                <option value="18:00">06:00 PM</option>
                                                <option value="18:15">06:15 PM</option>
                                                <option value="18:30">06:30 PM</option>
                                                <option value="18:45">06:45 PM</option>
                                                <option value="19:00">07:00 PM</option>
                                                <option value="19:15">07:15 PM</option>
                                                <option value="19:30">07:30 PM</option>
                                                <option value="19:45">07:45 PM</option>
                                                <option value="20:00">08:00 PM</option>
                                                <option value="20:15">08:15 PM</option>
                                                <option value="20:30">08:30 PM</option>
                                                <option value="20:45">08:45 PM</option>
                                                <option value="21:00">09:00 PM</option>
                                                <option value="21:15">09:15 PM</option>
                                                <option value="21:30">09:30 PM</option>
                                                <option value="21:45">09:45 PM</option>
                                                <option value="22:00">10:00 PM</option>
                                                <option value="22:30">10:30 PM</option>
                                                <option value="22:45">10:45 PM</option>
                                                <option value="23:00">11:00 PM</option>
                                                <option value="23:30">11:30 PM</option>
                                                <option value="23:45">11:45 PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="projectinput1"> {{__('backend.to_time')}} </label>

                                            <select name="to_time" class="select2 form-control">
                                                <option value="">{{ __('backend.to') }}</option>
                                                <option value="00:00">12:00 AM</option>
                                                <option value="00:15">12:15 AM</option>
                                                <option value="00:30">12:30 AM</option>
                                                <option value="00:45">12:45 AM</option>
                                                <option value="01:00">01:00 AM</option>
                                                <option value="01:15">01:15 AM</option>
                                                <option value="01:30">01:30 AM</option>
                                                <option value="01:45">01:45 AM</option>
                                                <option value="02:00">02:00 AM</option>
                                                <option value="02:15">02:15 AM</option>
                                                <option value="02:30">02:30 AM</option>
                                                <option value="02:45">02:45 AM</option>
                                                <option value="03:00">03:00 AM</option>
                                                <option value="03:15">03:15 AM</option>
                                                <option value="03:30">03:30 AM</option>
                                                <option value="03:45">03:45 AM</option>
                                                <option value="04:00">04:00 AM</option>
                                                <option value="04:15">04:15 AM</option>
                                                <option value="04:30">04:30 AM</option>
                                                <option value="04:45">04:45 AM</option>
                                                <option value="05:00">05:00 AM</option>
                                                <option value="05:15">05:15 AM</option>
                                                <option value="05:30">05:30 AM</option>
                                                <option value="05:45">05:45 AM</option>
                                                <option value="06:00">06:00 AM</option>
                                                <option value="06:15">06:15 AM</option>
                                                <option value="06:30">06:30 AM</option>
                                                <option value="06:45">06:45 AM</option>
                                                <option value="07:00">07:00 AM</option>
                                                <option value="07:15">07:15 AM</option>
                                                <option value="07:30">07:30 AM</option>
                                                <option value="07:45">07:45 AM</option>
                                                <option value="08:00">08:00 AM</option>
                                                <option value="08:15">08:15 AM</option>
                                                <option value="08:30">08:30 AM</option>
                                                <option value="08:45">08:45 AM</option>
                                                <option value="09:00">09:00 AM</option>
                                                <option value="09:15">09:15 AM</option>
                                                <option value="09:30">09:30 AM</option>
                                                <option value="09:45">09:45 AM</option>
                                                <option value="10:00">10:00 AM</option>
                                                <option value="10:15">10:15 AM</option>
                                                <option value="10:30">10:30 AM</option>
                                                <option value="10:45">10:45 AM</option>
                                                <option value="11:00">11:00 AM</option>
                                                <option value="11:15">11:15 AM</option>
                                                <option value="11:30">11:30 AM</option>
                                                <option value="11:45">11:45 AM</option>
                                                <option value="12:00">12:00 PM</option>
                                                <option value="12:15">12:15 PM</option>
                                                <option value="12:30">12:30 PM</option>
                                                <option value="12:45">12:45 PM</option>
                                                <option value="13:00">01:00 PM</option>
                                                <option value="13:15">01:15 PM</option>
                                                <option value="13:30">01:30 PM</option>
                                                <option value="13:45">01:45 PM</option>
                                                <option value="14:00">02:00 PM</option>
                                                <option value="14:15">02:15 PM</option>
                                                <option value="14:30">02:30 PM</option>
                                                <option value="14:45">02:45 PM</option>
                                                <option value="15:00">03:00 PM</option>
                                                <option value="15:15">03:15 PM</option>
                                                <option value="15:30">03:30 PM</option>
                                                <option value="15:45">03:45 PM</option>
                                                <option value="16:00">04:00 PM</option>
                                                <option value="16:15">04:15 PM</option>
                                                <option value="16:30">04:30 PM</option>
                                                <option value="16:45">04:45 PM</option>
                                                <option value="17:00">05:00 PM</option>
                                                <option value="17:15">05:15 PM</option>
                                                <option value="17:30">05:30 PM</option>
                                                <option value="17:45">05:45 PM</option>
                                                <option value="18:00">06:00 PM</option>
                                                <option value="18:15">06:15 PM</option>
                                                <option value="18:30">06:30 PM</option>
                                                <option value="18:45">06:45 PM</option>
                                                <option value="19:00">07:00 PM</option>
                                                <option value="19:15">07:15 PM</option>
                                                <option value="19:30">07:30 PM</option>
                                                <option value="19:45">07:45 PM</option>
                                                <option value="20:00">08:00 PM</option>
                                                <option value="20:15">08:15 PM</option>
                                                <option value="20:30">08:30 PM</option>
                                                <option value="20:45">08:45 PM</option>
                                                <option value="21:00">09:00 PM</option>
                                                <option value="21:15">09:15 PM</option>
                                                <option value="21:30">09:30 PM</option>
                                                <option value="21:45">09:45 PM</option>
                                                <option value="22:00">10:00 PM</option>
                                                <option value="22:30">10:30 PM</option>
                                                <option value="22:45">10:45 PM</option>
                                                <option value="23:00">11:00 PM</option>
                                                <option value="23:30">11:30 PM</option>
                                                <option value="23:45">11:45 PM</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"> {{__('backend.driver')}} </label>

                                            {!! Form::select('driver',$drivers, null , ['class' => 'form-control' , 'placeholder'=> __('backend.driver')] ) !!}

                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="projectinput1"> {{__('backend.name_order')}} </label>

                                            {!! Form::select('customer',$customers, null , ['class' => 'form-control' , 'placeholder'=> __('backend.name_order')] ) !!}

                                        </div>

                                    </div>
                                    <div class="form-actions">

                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> {{__('backend.browse')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-content">

                            <div class="card-body">
                                <!-- Task List table -->
                                @include('backend.includes.errors')
                                <table id="users-contacts" style='width:100%;'
                                       class="table datatable table-hover table-responsive">
                                    <thead>
                                    <tr>
                                        <th> #ID</th>
                                        <th>  {{__('backend.date')}}  </th>
                                        <th>  {{__('backend.name_order')}}  </th>
                                        <th>  {{__('backend.employee_s_n')}}  </th>
                                        <th>  {{__('backend.driver')}}  </th>
                                        <th>  {{__('backend.employee_s_n')}}  </th>
                                        <th>  {{__('backend.city')}}  </th>

                                        <th>  {{__('backend.from_time')}}  </th>
                                        <th>  {{__('backend.to_time')}}  </th>
                                        {{--                                        <th>  {{__('backend.status')}}  </th>--}}
                                        <th>  {{__('backend.options')}}  </th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                    <script src="{{url('')}}/assets/app-assets/js/core/libraries/jquery.min.js"
                                            type="text/javascript"></script>
                                    @foreach ( $data as $k=>$row )
                                        <input type="hidden" id="order_id{{ $row->id }}" value="{{ $row->id }}">
                                        <tr>
                                            <td>{{$row->id}}</td>

                                            <td>{{$row->date}}</td>
                                            <td>
                                                @php
                                                    $userName =  \App\User::find($row->user_id);

                                                @endphp
                                                {{$userName->name}}
                                            </td>
                                            <td>
                                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="{{$userName->name}}">
{{$userName->data['serial']}}
</span>
                                            </td>
                                            <td>
                                                @php
                                                    $driverName =  \App\User::find($row->driver_id);
                                                @endphp
                                                {{$driverName->name}}

                                            </td>
                                            <td>
                                                                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="{{$driverName->name}}">
{{$driverName->data['serial']}}
</span>

                                            </td>
                                            <td>
                                                @php
                                                    $city =  \App\City::find($row->city_id)->first()
                                                @endphp
                                                {{$city->title_en}}
                                            </td>
                                            <td>{{date('h:i A', strtotime($row->from_time))}}</td>
                                            <td>{{date('h:i A', strtotime($row->to_time))}}</td>

                                            <td>


                                                {{--                                                @can('update_pending')--}}
                                                {{--                                                    @if($row->status == 1 )--}}
                                                {{--                                                        <a title='Block pending'--}}
                                                {{--                                                           href="{{url(config('settings.BackendPath').'/pending/approve/'.$row->id.'/0')}}"--}}
                                                {{--                                                           class="badge badge badge-success float-right"><i--}}
                                                {{--                                                                    class="la la-check"></i> </a>--}}
                                                {{--                                                    @else--}}
                                                {{--                                                        <a title='Publish pending'--}}
                                                {{--                                                           href="{{url(config('settings.BackendPath').'/pending/approve/'.$row->id.'/1')}}"--}}
                                                {{--                                                           class="badge badge badge-danger float-right"><i--}}
                                                {{--                                                                    class="la la-ban "></i> </a>--}}
                                                {{--                                                    @endif--}}
                                                {{--                                                @endcan--}}

                                                {{--                                                @can('delete_orders')--}}
                                                <a title="Delete Post"
                                                   href="{{url(config('settings.BackendPath').'/orders/'.$row->id.'/delete')}}"
                                                   class="badge badge badge-danger float-right"><i
                                                            class="la la-trash"></i> </a>
                                                {{--                                                @endcan--}}
                                                {{--                                                @can('update_pending')--}}
                                                <a href="{{url('')}}/{{config('settings.BackendPath')}}/orders/{{$row->id}}/edit?t=pending"
                                                   class="badge badge badge-info float-right"><i
                                                            class="la la-pencil"></i> </a>
                                                {{--                                                @endcan--}}


                                            </td>


                                        </tr>

                                    @endforeach


                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


@endsection


@section('head')

    <title> {{__('backend.pending_orders')}} | {{config('settings.sitename')}}</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/vendors.css">
    <link rel="stylesheet" type="text/css"
          href="{{url('')}}/assets/app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css"
          href="{{url('')}}/assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/app.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/custom-rtl.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{url('')}}/assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css"
          href="{{url('')}}/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css"
          href="{{url('')}}/assets/app-assets/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/pages/timeline.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style-rtl.css">
    <!-- END Custom CSS-->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- END Custom CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{url('')}}/assets/app-assets/vendors/css/forms/selects/select2.min.css">
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
    <script src="{{url('')}}/assets/app-assets/vendors/js/timeline/horizontal-timeline.js"
            type="text/javascript"></script>
    <script src="{{url('')}}/assets/app-assets/vendors/js/forms/select/select2.full.min.js"
            type="text/javascript"></script>

    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{url('')}}/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{url('')}}/assets/app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <script src="{{url('')}}/assets/app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#users-contacts').DataTable({
                dom: 'Bfrtip',
                "searching": false,
                "order": [[3, "desc"]],
                buttons: [
                    'copy', 'excel', 'print'
                ]
            });
        });
    </script>
@endsection