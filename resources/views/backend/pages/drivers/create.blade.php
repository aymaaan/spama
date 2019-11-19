@extends('backend.layouts.default')

@section('content')

    <div class="app-content content">
        <div class="content-body">
            <section class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="card-header">
                                <h4 class="card-title">  {{ __('backend.drivers') }} </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- Task List table -->

                                {!! Form::open([ 'route' => 'drivers.store', 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}


                                <div class="form-body">

                                    @include('backend.includes.errors')

                                    <ul class="nav nav-tabs nav-topline">


                                        <li class="nav-item">
                                            <a style="width: 200px;" class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" aria-controls="home2"
                                               aria-expanded="true">{{ __('backend.basic_information') }}</a>
                                        </li>






                                    </ul>



                                    <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">



                                        <div class="tab-pane" id="photos_properties" role="tabpanel" aria-labelledby="photos_properties-tab2"
                                             aria-expanded="false">










                                        </div>


                                        <div role="tabpanel" class="tab-pane active" id="home2" aria-labelledby="home-tab2" aria-expanded="true">


                                            <h4 class="form-section"><i class="la la-commenting"></i> {{__('backend.basic_information')}}</h4>



                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{__('backend.name')}} </label>

                                                        {!! Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ) !!}

                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  {{__('backend.phone')}}     </label>

                                                        {!! Form::number('phone' , null , ['class' => 'form-control' , 'placeholder'=> 'ex: 05008939750'] ) !!}

                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  {{__('backend.bod')}}     </label>

                                                        {!! Form::date('BOD' , null , ['class' => 'form-control' , 'placeholder'=> ''] ) !!}

                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div id="custom-search-input">
                                                        <label for="projectinput1">  {{__('backend.address')}}     </label>
                                                        <div class="input-group">

                                                            <input id="autocomplete_search" name="autocomplete_search" type="text" class="form-control" placeholder="Search" />
                                                            <input type="hidden" name="lat">
                                                            <input type="hidden" name="long">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  {{__('backend.city')}}     </label>

                                                        {!! Form::select('city_id' , $city , null , ['class' => 'form-control' , 'placeholder'=> '-- City  --'] ) !!}

                                                    </div>

                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  {{__('backend.nationality')}}     </label>

                                                        {!! Form::select('nationality_id' , $nationality , null , ['class' => 'form-control' , 'placeholder'=> '-- nationality --'] ) !!}

                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{__('backend.idnumber')}} </label>

                                                        {!! Form::number('id_number', null , ['class' => 'form-control' , 'placeholder'=> __('backend.id_number')] ) !!}

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  {{__('backend.language')}}     </label>

                                                        {!! Form::select('language' , $language , null , ['class' => 'form-control' , 'placeholder'=> '-- language  --'] ) !!}

                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  {{__('backend.work_type')}}     </label>

                                                        {!! Form::select('work_type' , ['دوام جزئي','دوام كامل'] , null , ['class' => 'form-control','placeholder'=> __('backend.work_type')] ) !!}

                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{__('backend.from')}} </label>

                                                        {!! Form::time('from_time', null , ['class' => 'form-control' , 'placeholder'=> __('backend.from_time')] ) !!}

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> {{__('backend.to')}} </label>

                                                        {!! Form::time('to_time', null , ['class' => 'form-control' , 'placeholder'=> __('backend.to_time')] ) !!}

                                                    </div>
                                                </div>
                                            </div>
                                            <h4 class="form-section"><i class="la la-commenting"></i>  {{__('backend.days_work')}}    </h4>
                                           
                                            <div class="row">
                                                
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="projectinput3">  {{__('backend.Saturday')}}   </label>

                                                        {!! Form::checkbox('days_work[]', 'Saturday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ) !!}

                                                    </div>

                                                </div>

                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="projectinput3">  {{__('backend.Sunday')}}   </label>

                                                        {!! Form::checkbox('days_work[]', 'Sunday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ) !!}

                                                    </div>

                                                </div>

                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="projectinput3">  {{__('backend.Monday')}}   </label>

                                                        {!! Form::checkbox('days_work[]', 'Monday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ) !!}

                                                    </div>

                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="projectinput3">  {{__('backend.Tuesday')}}   </label>

                                                        {!! Form::checkbox('days_work[]', 'Tuesday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ) !!}

                                                    </div>

                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="projectinput3">  {{__('backend.Wednesday')}}   </label>

                                                        {!! Form::checkbox('days_work[]', 'Wednesday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ) !!}

                                                    </div>

                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="projectinput3">  {{__('backend.Thursday')}}   </label>

                                                        {!! Form::checkbox('days_work[]', 'Thursday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ) !!}

                                                    </div>

                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="projectinput3">  {{__('backend.Friday')}}   </label>

                                                        {!! Form::checkbox('days_work[]', 'Friday' , null,['class' => 'form-control' , 'placeholder'=> __('backend.days_work')] ) !!}

                                                    </div>

                                                </div>


                                            </div>
                                            <h4 class="form-section"><i class="la la-commenting"></i>  {{__('backend.login_information')}}    </h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput3">  {{__('backend.email')}}   </label>

                                                        {!! Form::text('email', null , ['class' => 'form-control' , 'placeholder'=> __('backend.email')] ) !!}

                                                    </div>
                                                </div>


                                                @if(!isset($user))
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{ __('backend.password')}}    </label>

                                                            {!! Form::password('password', ['class' => 'form-control' , 'placeholder'=> __('backend.password')] ) !!}

                                                        </div>

                                                    </div>
                                                @endif






                                            </div>
                                            <h4 class="form-section"><i class="la la-commenting"></i>  {{ __('backend.photos') }}    </h4>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">

                                                        <label for="projectinput3">  {{ __('backend.photo_drive') }}  </label>

                                                        <input type="file"   id="driver_photo" name="photo" >

                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <p><strong>{{ __('backend.notes_photo') }}</strong></p>


                                                        <input type="file" multiple  id="driver_photos" name="driver_photos[]" >

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



                            {!!Form::close()!!}



                        </div>
                    </div>
                </div>
        </div>
    </div>
    </section>
    </div>
    </div>


@endsection


@section('head')

    <title> drivers | {{config('settings.sitename')}}</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/forms/selects/select2.min.css">

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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

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
    <script src="{{url('')}}/assets/app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{url('')}}/assets/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/app-assets/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{url('')}}/assets/app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>

    <script src="{{url('')}}/assets/app-assets/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7n99W41rc00c8Fmp4nHrr6aLE-G88e5E&amp;libraries=places"></script>

    <script>
        google.maps.event.addDomListener(window, 'load', initialize);
        function initialize() {
            var input = document.getElementById('autocomplete_search');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();

                // place variable will have all the information you are looking for.
                $('#lat').val(place.geometry['location'].lat());
                $('#long').val(place.geometry['location'].lng());

                console.log(lat);

            });
        }
    </script>
    <script>





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








    </script>
@endsection