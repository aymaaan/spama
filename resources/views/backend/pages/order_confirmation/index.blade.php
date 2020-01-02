@extends('backend.layouts.default')

@section('content')

    <div class="app-content content">
        <div class="content-body">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="card-header">
                                <h4 class="card-title"><B>   {{__('backend.order_confirmation')}}     </B></h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                @can('create_order_confirmation')
                                    <div class="heading-elements">
                                        <a href="{{url('')}}/{{config('settings.BackendPath')}}/order_confirmation/create">


                                            <button class="btn btn-primary btn">
                                                <i class="la la-plus-square-o"></i> {{__('backend.add_order_confirmation')}}
                                            </button>


                                        </a></div>
                                @endcan


                            </div>
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
                                        <th>  {{__('backend.city')}}  </th>

                                        <th>  {{__('backend.from_time')}}  </th>
                                        <th>  {{__('backend.status')}}  </th>
                                        <th>  {{__('backend.option')}}  </th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                    <script src="{{url('')}}/assets/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
                                    @foreach ( $data as $k=>$row )
<input type="hidden" id="order_id{{ $row->id }}" value="{{ $row->id }}">
                                        <tr>
                                            <td >{{$k+1}}</td>

                                            <td>{{$row->date}}</td>
                                            <td>
                                                @php
                                                    $userName =  \App\User::find($row->user_id)->first()
                                                @endphp
                          {{$userName->name}}
                                            </td>
                                            <td>
                                                @php
                                                    $city =  \App\City::find($row->city_id)->first()
                                                @endphp
                                                {{$city->title_en}}
                                            </td>
                                            <td>{{date('h:i A', strtotime($row->from_time))}}</td>

                                            <td>


                                                <select  class="bs-select form-control input-small status{{$row->id}}" data-style="blue" style="background:<?php
//                                                if($row->order_status == 1){echo '#e67e22';}
                                                if($row->order_status == 1){echo 'white';}
                                                if($row->order_status == 2){echo '#2ecc71';}
                                                if($row->order_status == 3){echo '#e74c3c';}
                                                ?>">

                                                    {{--<option>{{\App\Status::where('id',$item->status_id )->get()->implode('name_en')}}</option>--}}
                                                    @foreach($statuses as $status)


                                                        <option id="op{{$status->id}}" @if($status->id == $row->order_status ) selected
                                                                @endif value="{{$status->id}}">{{$status->name}}</option>
                                                    @endforeach
                                                </select>
                                                <script>
                                                    $(function () {
                                                        $('.status{{$row->id}}').change(function () {

                                                            $.ajaxSetup({
                                                                headers: {
                                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                }
                                                            });

                                                            $.ajax({
                                                                url: "{{url('')}}/{{config('settings.BackendPath')}}/statusChange",
                                                                type: "GET",
                                                                data: {
                                                                    status_id: $('.status{{$row->id}}').val(),
                                                                    id: $('#order_id{{$row->id}}').val()
                                                                },
                                                                success: function (result) {
                                                                    $('.status{{$row->id}}').css({'background': result});


                                                                }
                                                            })

                                                        })
                                                    })
                                                </script>
                                            </td>
                                            <td>






{{--                                                @can('update_order_confirmation')--}}
{{--                                                    @if($row->status == 1 )--}}
{{--                                                        <a title='Block order_confirmation'--}}
{{--                                                           href="{{url(config('settings.BackendPath').'/order_confirmation/approve/'.$row->id.'/0')}}"--}}
{{--                                                           class="badge badge badge-success float-right"><i--}}
{{--                                                                    class="la la-check"></i> </a>--}}
{{--                                                    @else--}}
{{--                                                        <a title='Publish order_confirmation'--}}
{{--                                                           href="{{url(config('settings.BackendPath').'/order_confirmation/approve/'.$row->id.'/1')}}"--}}
{{--                                                           class="badge badge badge-danger float-right"><i--}}
{{--                                                                    class="la la-ban "></i> </a>--}}
{{--                                                    @endif--}}
{{--                                                @endcan--}}


{{--                                                @can('update_order_confirmation')--}}
                                                    <a href="{{url('')}}/{{config('settings.BackendPath')}}/order_confirmation/{{$row->id}}/edit"
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

    <title> {{__('backend.order_confirmation')}} | {{config('settings.sitename')}}</title>

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
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{url('')}}/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{url('')}}/assets/app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

@endsection