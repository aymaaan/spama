﻿<div class="form-body">

    @include('backend.includes.errors')


    <h4 class="form-section"><i class="la la-commenting"></i> {{__('backend.basic_information')}}      </h4>


    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.date')}} </label>

                {!! Form::date('date', null , ['class' => 'form-control form-group-style' , 'placeholder'=> __('backend.to_time')] ) !!}

            </div>

        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.city')}} </label>

                {!! Form::select('city_id',$cities, null , ['class' => 'form-control' , 'placeholder'=> '-- Choose City --'] ) !!}

            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.driver')}} </label>

                {!! Form::select('driver_id',$drivers, null , ['class' => 'form-control' , 'placeholder'=> __('backend.driver')] ) !!}

            </div>

        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.from_time')}} </label>

                {!! Form::time('from_time', null , ['class' => 'form-control' , 'placeholder'=> __('backend.from_time')] ) !!}

            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.to_time')}} </label>

                {!! Form::time('to_time', null , ['class' => 'form-control' , 'placeholder'=> __('backend.to_time')] ) !!}

            </div>
        </div>


    </div>
    <h4 class="form-section"><i class="la la-commenting"></i> {{__('backend.starting')}}      </h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <Select id="colorselector" class="form-control">
                    <option value="0">----</option>
                    <option value="red">{{__('backend.from')}}</option>
                    <option value="yellow">{{__('backend.customer')}}</option>
                    <option value="blue">{{__('backend.other')}}</option>
                </Select>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="red" class="col-md-4 colors" style="display:none">
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.from')}} </label>

                {!! Form::select('branch_start',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

            </div>
        </div>
        <div id="yellow" class="col-md-4 colors" style="display:none">
            <div class="form-group">
                <select name="customer_start" class="select2 form-control" style="width: 330px !important;">
                    <option value="0">----</option>
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}">

                            {{$customer->name}}

                        </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div id="blue" class="col-md-4 colors" style="display:none">
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.other')}} </label>

                {!! Form::text('other_start', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

            </div>

        </div>

    </div>
    <div>
    <h4 class="form-section"><i class="la la-commenting"></i> {{__('backend.stops')}}      </h4>
    <ul class="nav nav-tabs nav-topline">


        <li class="nav-item">
            <a style="width: 200px;" class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2"
               aria-controls="home2"
               aria-expanded="true">{{ __('backend.branch') }}</a>
        </li>


        <li class="nav-item">
            <a style="width: 200px;" class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2"
               aria-controls="profile2"
               aria-expanded="false">{{ __('backend.customer') }}</a>
        </li>


        <li class="nav-item">
            <a style="width: 200px;" class="nav-link" id="websites_properties-tab2" data-toggle="tab"
               href="#websites_properties" aria-controls="websites_properties"
               aria-expanded="false">{{ __('backend.other') }}</a>
        </li>




    </ul>
    <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
        <div role="tabpanel" class="tab-pane active" id="home2" aria-labelledby="home-tab2" aria-expanded="true">


            <div class="row">

                <div id="red1" class="col-md-4 colors1">
                    <div class="form-group">
                        <label for="projectinput1"> {{__('backend.from')}} </label>

                        {!! Form::select('branch_stop[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

                    </div>
                </div>
            </div>


        </div>
        <div class="tab-pane" id="profile2" role="tabpanel" aria-labelledby="profile-tab2"
             aria-expanded="false">
            <div class="row">
                <div id="yellow1" class="col-md-4 colors1">
                    <div class="form-group">
                        <label for="projectinput1"> {{__('backend.customer')}} </label>
                        <select name="customer_stop[]" class="select2 form-control" style="width: 330px !important;">
                            <option value="0">----</option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}">

                                    {{$customer->name}}

                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>

            </div>
            <button id='repeat_div1' class="btn btn-success">{{ __('backend.add_stops') }}</button>
        </div>
        <div class="tab-pane" id="websites_properties" role="tabpanel" aria-labelledby="websites_properties-tab2"
             aria-expanded="false">
            <div class="row">
                <div id="blue1" class="col-md-4 colors1">
                    <div class="form-group">
                        <label for="projectinput1"> {{__('backend.other')}} </label>

                        {!! Form::text('other_stop[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

                    </div>
                </div>
            </div>
            <button id='repeat_div2' class="btn btn-success">{{ __('backend.add_stops') }}</button>
        </div>

    </div>
        <div id="theCount_1" style="display: none">
            <ul class="nav nav-tabs nav-topline">


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3"
                       aria-controls="home2"
                       aria-expanded="true">{{ __('backend.branch') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3"
                       aria-controls="profile2"
                       aria-expanded="false">{{ __('backend.customer') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="websites_properties-tab3" data-toggle="tab"
                       href="#websites_properties3" aria-controls="websites_properties"
                       aria-expanded="false">{{ __('backend.other') }}</a>
                </li>




            </ul>
            <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                <div role="tabpanel" class="tab-pane active" id="home3" aria-labelledby="home-tab3" aria-expanded="true">


                    <div class="row">

                        <div id="red1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('branch_stop[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="profile3" role="tabpanel" aria-labelledby="profile-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="yellow1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="customer_stop[]" class="select2 form-control" style="width: 330px !important;">
                                    <option value="0">----</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">

                                            {{$customer->name}}

                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-pane" id="websites_properties3" role="tabpanel" aria-labelledby="websites_properties-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="blue1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('other_stop[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div id="theCount_2" style="display: none">
            <ul class="nav nav-tabs nav-topline">


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link active" id="home-tab3" data-toggle="tab" href="#home4"
                       aria-controls="home2"
                       aria-expanded="true">{{ __('backend.branch') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile4"
                       aria-controls="profile4"
                       aria-expanded="false">{{ __('backend.customer') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="websites_properties-tab3" data-toggle="tab"
                       href="#websites_properties4" aria-controls="websites_properties"
                       aria-expanded="false">{{ __('backend.other') }}</a>
                </li>




            </ul>
            <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                <div role="tabpanel" class="tab-pane active" id="home4" aria-labelledby="home-tab3" aria-expanded="true">


                    <div class="row">

                        <div id="red1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('branch_stop[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="profile4" role="tabpanel" aria-labelledby="profile-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="yellow1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="customer_stop[]" class="select2 form-control" style="width: 330px !important;">
                                    <option value="0">----</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">

                                            {{$customer->name}}

                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-pane" id="websites_properties4" role="tabpanel" aria-labelledby="websites_properties-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="blue1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('other_stop[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div id="theCount_3" style="display: none">
            <ul class="nav nav-tabs nav-topline">


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link active" id="home-tab3" data-toggle="tab" href="#home5"
                       aria-controls="home2"
                       aria-expanded="true">{{ __('backend.branch') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile5"
                       aria-controls="profile2"
                       aria-expanded="false">{{ __('backend.customer') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="websites_properties-tab3" data-toggle="tab"
                       href="#websites_properties5" aria-controls="websites_properties"
                       aria-expanded="false">{{ __('backend.other') }}</a>
                </li>




            </ul>
            <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                <div role="tabpanel" class="tab-pane active" id="home5" aria-labelledby="home-tab3" aria-expanded="true">


                    <div class="row">

                        <div id="red1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('branch_stop[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="profile5" role="tabpanel" aria-labelledby="profile-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="yellow1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="customer_stop[]" class="select2 form-control" style="width: 330px !important;">
                                    <option value="0">----</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">

                                            {{$customer->name}}

                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-pane" id="websites_properties5" role="tabpanel" aria-labelledby="websites_properties-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="blue1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('other_stop[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div id="theCount_4" style="display: none">
            <ul class="nav nav-tabs nav-topline">


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link active" id="home-tab3" data-toggle="tab" href="#home6"
                       aria-controls="home2"
                       aria-expanded="true">{{ __('backend.branch') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile6"
                       aria-controls="profile2"
                       aria-expanded="false">{{ __('backend.customer') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="websites_properties-tab3" data-toggle="tab"
                       href="#websites_properties6" aria-controls="websites_properties"
                       aria-expanded="false">{{ __('backend.other') }}</a>
                </li>




            </ul>
            <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                <div role="tabpanel" class="tab-pane active" id="home6" aria-labelledby="home-tab3" aria-expanded="true">


                    <div class="row">

                        <div id="red1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('branch_stop[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="profile6" role="tabpanel" aria-labelledby="profile-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="yellow1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="customer_stop[]" class="select2 form-control" style="width: 330px !important;">
                                    <option value="0">----</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">

                                            {{$customer->name}}

                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-pane" id="websites_properties6" role="tabpanel" aria-labelledby="websites_properties-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="blue1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('other_stop[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div id="theCount_5" style="display: none">
            <ul class="nav nav-tabs nav-topline">


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link active" id="home-tab3" data-toggle="tab" href="#home7"
                       aria-controls="home2"
                       aria-expanded="true">{{ __('backend.branch') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile7"
                       aria-controls="profile2"
                       aria-expanded="false">{{ __('backend.customer') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="websites_properties-tab3" data-toggle="tab"
                       href="#websites_properties7" aria-controls="websites_properties"
                       aria-expanded="false">{{ __('backend.other') }}</a>
                </li>




            </ul>
            <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                <div role="tabpanel" class="tab-pane active" id="home7" aria-labelledby="home-tab3" aria-expanded="true">


                    <div class="row">

                        <div id="red1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('branch_stop[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="profile7" role="tabpanel" aria-labelledby="profile-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="yellow1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="customer_stop[]" class="select2 form-control" style="width: 330px !important;">
                                    <option value="0">----</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">

                                            {{$customer->name}}

                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-pane" id="websites_properties7" role="tabpanel" aria-labelledby="websites_properties-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="blue1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('other_stop[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div id="theCount_6" style="display: none">
            <ul class="nav nav-tabs nav-topline">


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link active" id="home-tab3" data-toggle="tab" href="#home8"
                       aria-controls="home2"
                       aria-expanded="true">{{ __('backend.branch') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile8"
                       aria-controls="profile2"
                       aria-expanded="false">{{ __('backend.customer') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="websites_properties-tab3" data-toggle="tab"
                       href="#websites_properties8" aria-controls="websites_properties"
                       aria-expanded="false">{{ __('backend.other') }}</a>
                </li>




            </ul>
            <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                <div role="tabpanel" class="tab-pane active" id="home8" aria-labelledby="home-tab3" aria-expanded="true">


                    <div class="row">

                        <div id="red1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('branch_stop[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="profile8" role="tabpanel" aria-labelledby="profile-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="yellow1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="customer_stop[]" class="select2 form-control" style="width: 330px !important;">
                                    <option value="0">----</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">

                                            {{$customer->name}}

                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-pane" id="websites_properties8" role="tabpanel" aria-labelledby="websites_properties-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="blue1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('other_stop[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div id="theCount_7" style="display: none">
            <ul class="nav nav-tabs nav-topline">


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link active" id="home-tab3" data-toggle="tab" href="#home9"
                       aria-controls="home2"
                       aria-expanded="true">{{ __('backend.branch') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile9"
                       aria-controls="profile2"
                       aria-expanded="false">{{ __('backend.customer') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="websites_properties-tab3" data-toggle="tab"
                       href="#websites_properties9" aria-controls="websites_properties"
                       aria-expanded="false">{{ __('backend.other') }}</a>
                </li>




            </ul>
            <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                <div role="tabpanel" class="tab-pane active" id="home9" aria-labelledby="home-tab3" aria-expanded="true">


                    <div class="row">

                        <div id="red1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('branch_stop[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="profile9" role="tabpanel" aria-labelledby="profile-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="yellow1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="customer_stop[]" class="select2 form-control" style="width: 330px !important;">
                                    <option value="0">----</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">

                                            {{$customer->name}}

                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-pane" id="websites_properties9" role="tabpanel" aria-labelledby="websites_properties-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="blue1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('other_stop[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div id="theCount_8" style="display: none">
            <ul class="nav nav-tabs nav-topline">


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link active" id="home-tab3" data-toggle="tab" href="#home10"
                       aria-controls="home2"
                       aria-expanded="true">{{ __('backend.branch') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile10"
                       aria-controls="profile2"
                       aria-expanded="false">{{ __('backend.customer') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="websites_properties-tab3" data-toggle="tab"
                       href="#websites_properties10" aria-controls="websites_properties"
                       aria-expanded="false">{{ __('backend.other') }}</a>
                </li>




            </ul>
            <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                <div role="tabpanel" class="tab-pane active" id="home10" aria-labelledby="home-tab3" aria-expanded="true">


                    <div class="row">

                        <div id="red1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('branch_stop[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="profile10" role="tabpanel" aria-labelledby="profile-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="yellow1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="customer_stop[]" class="select2 form-control" style="width: 330px !important;">
                                    <option value="0">----</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">

                                            {{$customer->name}}

                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-pane" id="websites_properties10" role="tabpanel" aria-labelledby="websites_properties-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="blue1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('other_stop[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div id="theCount_9" style="display: none">
            <ul class="nav nav-tabs nav-topline">


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link active" id="home-tab3" data-toggle="tab" href="#home11"
                       aria-controls="home2"
                       aria-expanded="true">{{ __('backend.branch') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile11"
                       aria-controls="profile2"
                       aria-expanded="false">{{ __('backend.customer') }}</a>
                </li>


                <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="websites_properties-tab3" data-toggle="tab"
                       href="#websites_properties11" aria-controls="websites_properties"
                       aria-expanded="false">{{ __('backend.other') }}</a>
                </li>




            </ul>
            <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                <div role="tabpanel" class="tab-pane active" id="home11" aria-labelledby="home-tab3" aria-expanded="true">


                    <div class="row">

                        <div id="red1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('branch_stop[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

                            </div>
                        </div>
                    </div>


                </div>
                <div class="tab-pane" id="profile11" role="tabpanel" aria-labelledby="profile-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="yellow1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="customer_stop[]" class="select2 form-control" style="width: 330px !important;">
                                    <option value="0">----</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">

                                            {{$customer->name}}

                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="tab-pane" id="websites_properties11" role="tabpanel" aria-labelledby="websites_properties-tab3"
                     aria-expanded="false">
                    <div class="row">
                        <div id="blue1" class="col-md-4 colors1">
                            <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('other_stop[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <button id='addMe' class="btn btn-success">{{ __('backend.add_stops') }}</button>
</div>



    {{--    <div><div class="row">--}}
    {{--            <div class="col-md-4">--}}
    {{--                <div class="form-group">--}}
    {{--                    <Select id="colorselector1" class="form-control">--}}
    {{--                        <option value="0" >----</option>--}}
    {{--                        <option value="red1">{{__('backend.from')}}</option>--}}
    {{--                        <option value="yellow1">{{__('backend.customer')}}</option>--}}
    {{--                        <option value="blue1">{{__('backend.other')}}</option>--}}
    {{--                    </Select>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="row">--}}


    {{--            <div id="yellow1" class="col-md-4 colors1" style="display:none">--}}
    {{--                <div  class="form-group">--}}
    {{--                    <select name="customer_stop"  class="select2 form-control"  style="width: 330px !important;">--}}
    {{--                        <option value="0" >----</option>--}}
    {{--                        @foreach($customers as $customer)--}}
    {{--                            <option value="{{$customer->id}}">--}}

    {{--                                {{$customer->name}}--}}

    {{--                            </option>--}}
    {{--                        @endforeach--}}

    {{--                    </select>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div id="blue1" class="col-md-4 colors1" style="display:none">--}}
    {{--                <div class="form-group">--}}
    {{--                    <label for="projectinput1"> {{__('backend.other')}} </label>--}}

    {{--                    {!! Form::text('other_stop', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}--}}

    {{--                </div>--}}

    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </div>--}}

    <h4 class="form-section"><i class="la la-commenting"></i> {{__('backend.destinations')}}      </h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <Select id="colorselector2" class="form-control">
                    <option value="0">----</option>
                    <option value="red2">{{__('backend.from')}}</option>
                    <option value="yellow2">{{__('backend.customer')}}</option>
                    <option value="blue2">{{__('backend.other')}}</option>
                </Select>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="red2" class="col-md-4 colors2" style="display:none">
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.from')}} </label>

                {!! Form::select('branch_des',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

            </div>
        </div>
        <div id="yellow2" class="col-md-4 colors2" style="display:none">
            <div class="form-group">
                <select name="customer_des" class="select2 form-control" style="width: 330px !important;">
                    <option value="0">----</option>
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}">

                            {{$customer->name}}

                        </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div id="blue2" class="col-md-4 colors2" style="display:none">
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.other')}} </label>

                {!! Form::text('other_des', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

            </div>

        </div>

    </div>

</div>


<div class="form-actions">

    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i> {{__('backend.save')}}
    </button>
</div>
                    
