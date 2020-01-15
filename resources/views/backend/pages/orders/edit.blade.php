@extends('backend.layouts.default')

@section('content')

  <div class="app-content content">
    <div class="content-body">
      <section class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-head">
              <div class="card-header">
                <h4 class="card-title">  {{__('backend.orders')}}    </h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

              </div>
            </div>
            <div class="card-content">
              <div class="card-body">
                <!-- Task List table -->
                <h4><span>{{__('backend.name_order')}}  </span> : {{ $user->name}}</h4>
                {!! Form::model( $data ,[ 'url' =>  config('settings.BackendPath').'/orders/'.$data->id, 'method'=>'PATCH' ,  'class' => 'form' ,  'files' => 'true' ]) !!}
                <input type="hidden" name="cat" value="{{ $inputs }}">
                <div class="form-body">

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

                        <select name="from_time" class="form-control" >
                          <option value="{{$data->from_time}}">{{$data->from_time}}</option>
                          <option  value="00:00">12:00 AM</option>
                          <option  value="00:15">12:15 AM</option>
                          <option  value="00:30">12:30 AM</option>
                          <option  value="00:45">12:45 AM</option>
                          <option  value="01:00">01:00 AM</option>
                          <option  value="01:15">01:15 AM</option>
                          <option  value="01:30">01:30 AM</option>
                          <option  value="01:45">01:45 AM</option>
                          <option  value="02:00">02:00 AM</option>
                          <option  value="02:15">02:15 AM</option>
                          <option  value="02:30">02:30 AM</option>
                          <option  value="02:45">02:45 AM</option>
                          <option  value="03:00">03:00 AM</option>
                          <option  value="03:15">03:15 AM</option>
                          <option  value="03:30">03:30 AM</option>
                          <option  value="03:45">03:45 AM</option>
                          <option  value="04:00">04:00 AM</option>
                          <option  value="04:15">04:15 AM</option>
                          <option  value="04:30">04:30 AM</option>
                          <option  value="04:45">04:45 AM</option>
                          <option  value="05:00">05:00 AM</option>
                          <option  value="05:15">05:15 AM</option>
                          <option  value="05:30">05:30 AM</option>
                          <option  value="05:45">05:45 AM</option>
                          <option  value="06:00">06:00 AM</option>
                          <option  value="06:15">06:15 AM</option>
                          <option  value="06:30">06:30 AM</option>
                          <option  value="06:45">06:45 AM</option>
                          <option  value="07:00">07:00 AM</option>
                          <option  value="07:15">07:15 AM</option>
                          <option  value="07:30">07:30 AM</option>
                          <option  value="07:45">07:45 AM</option>
                          <option value="08:00">08:00 AM</option>
                          <option value="08:15">08:15 AM</option>
                          <option  value="08:30">08:30 AM</option>
                          <option  value="08:45">08:45 AM</option>
                          <option  value="09:00">09:00 AM</option>
                          <option  value="09:15">09:15 AM</option>
                          <option  value="09:30">09:30 AM</option>
                          <option  value="09:45">09:45 AM</option>
                          <option  value="10:00">10:00 AM</option>
                          <option  value="10:15">10:15 AM</option>
                          <option  value="10:30">10:30 AM</option>
                          <option  value="10:45">10:45 AM</option>
                          <option  value="11:00">11:00 AM</option>
                          <option  value="11:15">11:15 AM</option>
                          <option  value="11:30">11:30 AM</option>
                          <option  value="11:45">11:45 AM</option>
                          <option  value="12:00">12:00 PM</option>
                          <option  value="12:15">12:15 PM</option>
                          <option  value="12:30">12:30 PM</option>
                          <option  value="12:45">12:45 PM</option>
                          <option  value="13:00">01:00 PM</option>
                          <option  value="13:15">01:15 PM</option>
                          <option  value="13:30">01:30 PM</option>
                          <option  value="13:45">01:45 PM</option>
                          <option  value="14:00">02:00 PM</option>
                          <option  value="14:15">02:15 PM</option>
                          <option  value="14:30">02:30 PM</option>
                          <option  value="14:45">02:45 PM</option>
                          <option  value="15:00">03:00 PM</option>
                          <option  value="15:15">03:15 PM</option>
                          <option  value="15:30">03:30 PM</option>
                          <option  value="15:45">03:45 PM</option>
                          <option  value="16:00">04:00 PM</option>
                          <option  value="16:15">04:15 PM</option>
                          <option  value="16:30">04:30 PM</option>
                          <option  value="16:45">04:45 PM</option>
                          <option  value="17:00">05:00 PM</option>
                          <option  value="17:15">05:15 PM</option>
                          <option  value="17:30">05:30 PM</option>
                          <option  value="17:45">05:45 PM</option>
                          <option  value="18:00">06:00 PM</option>
                          <option  value="18:15">06:15 PM</option>
                          <option  value="18:30">06:30 PM</option>
                          <option  value="18:45">06:45 PM</option>
                          <option  value="19:00">07:00 PM</option>
                          <option  value="19:15">07:15 PM</option>
                          <option  value="19:30">07:30 PM</option>
                          <option  value="19:45">07:45 PM</option>
                          <option  value="20:00">08:00 PM</option>
                          <option  value="20:15">08:15 PM</option>
                          <option  value="20:30">08:30 PM</option>
                          <option  value="20:45">08:45 PM</option>
                          <option  value="21:00">09:00 PM</option>
                          <option  value="21:15">09:15 PM</option>
                          <option  value="21:30">09:30 PM</option>
                          <option  value="21:45">09:45 PM</option>
                          <option  value="22:00">10:00 PM</option>
                          <option  value="22:30">10:30 PM</option>
                          <option  value="22:45">10:45 PM</option>
                          <option  value="23:00">11:00 PM</option>
                          <option  value="23:30">11:30 PM</option>
                          <option  value="23:45">11:45 PM</option>
                        </select>

                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="projectinput1"> {{__('backend.to_time')}} </label>

                        <select name="to_time" class="form-control" >
                          <option value="{{$data->to_time}}">{{$data->to_time}}</option>
                          <option  value="00:00">12:00 AM</option>
                          <option  value="00:15">12:15 AM</option>
                          <option  value="00:30">12:30 AM</option>
                          <option  value="00:45">12:45 AM</option>
                          <option  value="01:00">01:00 AM</option>
                          <option  value="01:15">01:15 AM</option>
                          <option  value="01:30">01:30 AM</option>
                          <option  value="01:45">01:45 AM</option>
                          <option  value="02:00">02:00 AM</option>
                          <option  value="02:15">02:15 AM</option>
                          <option  value="02:30">02:30 AM</option>
                          <option  value="02:45">02:45 AM</option>
                          <option  value="03:00">03:00 AM</option>
                          <option  value="03:15">03:15 AM</option>
                          <option  value="03:30">03:30 AM</option>
                          <option  value="03:45">03:45 AM</option>
                          <option  value="04:00">04:00 AM</option>
                          <option  value="04:15">04:15 AM</option>
                          <option  value="04:30">04:30 AM</option>
                          <option  value="04:45">04:45 AM</option>
                          <option  value="05:00">05:00 AM</option>
                          <option  value="05:15">05:15 AM</option>
                          <option  value="05:30">05:30 AM</option>
                          <option  value="05:45">05:45 AM</option>
                          <option  value="06:00">06:00 AM</option>
                          <option  value="06:15">06:15 AM</option>
                          <option  value="06:30">06:30 AM</option>
                          <option  value="06:45">06:45 AM</option>
                          <option  value="07:00">07:00 AM</option>
                          <option  value="07:15">07:15 AM</option>
                          <option  value="07:30">07:30 AM</option>
                          <option  value="07:45">07:45 AM</option>
                          <option value="08:00">08:00 AM</option>
                          <option value="08:15">08:15 AM</option>
                          <option  value="08:30">08:30 AM</option>
                          <option  value="08:45">08:45 AM</option>
                          <option  value="09:00">09:00 AM</option>
                          <option  value="09:15">09:15 AM</option>
                          <option  value="09:30">09:30 AM</option>
                          <option  value="09:45">09:45 AM</option>
                          <option  value="10:00">10:00 AM</option>
                          <option  value="10:15">10:15 AM</option>
                          <option  value="10:30">10:30 AM</option>
                          <option  value="10:45">10:45 AM</option>
                          <option  value="11:00">11:00 AM</option>
                          <option  value="11:15">11:15 AM</option>
                          <option  value="11:30">11:30 AM</option>
                          <option  value="11:45">11:45 AM</option>
                          <option  value="12:00">12:00 PM</option>
                          <option  value="12:15">12:15 PM</option>
                          <option  value="12:30">12:30 PM</option>
                          <option  value="12:45">12:45 PM</option>
                          <option  value="13:00">01:00 PM</option>
                          <option  value="13:15">01:15 PM</option>
                          <option  value="13:30">01:30 PM</option>
                          <option  value="13:45">01:45 PM</option>
                          <option  value="14:00">02:00 PM</option>
                          <option  value="14:15">02:15 PM</option>
                          <option  value="14:30">02:30 PM</option>
                          <option  value="14:45">02:45 PM</option>
                          <option  value="15:00">03:00 PM</option>
                          <option  value="15:15">03:15 PM</option>
                          <option  value="15:30">03:30 PM</option>
                          <option  value="15:45">03:45 PM</option>
                          <option  value="16:00">04:00 PM</option>
                          <option  value="16:15">04:15 PM</option>
                          <option  value="16:30">04:30 PM</option>
                          <option  value="16:45">04:45 PM</option>
                          <option  value="17:00">05:00 PM</option>
                          <option  value="17:15">05:15 PM</option>
                          <option  value="17:30">05:30 PM</option>
                          <option  value="17:45">05:45 PM</option>
                          <option  value="18:00">06:00 PM</option>
                          <option  value="18:15">06:15 PM</option>
                          <option  value="18:30">06:30 PM</option>
                          <option  value="18:45">06:45 PM</option>
                          <option  value="19:00">07:00 PM</option>
                          <option  value="19:15">07:15 PM</option>
                          <option  value="19:30">07:30 PM</option>
                          <option  value="19:45">07:45 PM</option>
                          <option  value="20:00">08:00 PM</option>
                          <option  value="20:15">08:15 PM</option>
                          <option  value="20:30">08:30 PM</option>
                          <option  value="20:45">08:45 PM</option>
                          <option  value="21:00">09:00 PM</option>
                          <option  value="21:15">09:15 PM</option>
                          <option  value="21:30">09:30 PM</option>
                          <option  value="21:45">09:45 PM</option>
                          <option  value="22:00">10:00 PM</option>
                          <option  value="22:30">10:30 PM</option>
                          <option  value="22:45">10:45 PM</option>
                          <option  value="23:00">11:00 PM</option>
                          <option  value="23:30">11:30 PM</option>
                          <option  value="23:45">11:45 PM</option>
                        </select>

                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="projectinput1"> {{__('backend.status')}} </label>

                        <select  class="bs-select form-control input-small status" data-style="blue" name="order_status" >
                          @foreach($statuses as $status)


                            <option  @if($status->id == $data->order_status ) selected
                                     @endif value="{{$status->id}}">{{$status->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                  </div>
                  <h4 class="form-section"><i class="la la-commenting"></i> {{__('backend.starting')}}      </h4>
                  <ul class="nav nav-tabs nav-topline">


                    <li class="nav-item">
                      <a style="width: 200px;" class="nav-link active" id="home-tabx" data-toggle="tab" href="#homex"
                         aria-controls="homex"
                         aria-expanded="true">{{ __('backend.branch') }}</a>
                    </li>


                    <li class="nav-item">
                      <a style="width: 200px;" class="nav-link" id="profile-tabx" data-toggle="tab" href="#profilex"
                         aria-controls="profilex"
                         aria-expanded="false">{{ __('backend.customer') }}</a>
                    </li>


                    <li class="nav-item">
                      <a style="width: 200px;" class="nav-link" id="websites_properties-tabx" data-toggle="tab"
                         href="#websites_propertiesx" aria-controls="websites_propertiesx"
                         aria-expanded="false">{{ __('backend.other') }}</a>
                    </li>




                  </ul>
                  <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                    <div role="tabpanel" class="tab-pane active" id="homex" aria-labelledby="home-tabx" aria-expanded="true">


                      <div class="row">

                        <div id="red" class="col-md-4 colors1">
                          <div class="form-group">
                            <label for="projectinput1"> {{__('backend.from')}} </label>

                            {!! Form::select('branch_start',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                            <input type="hidden" value="branch" name="stop_type[]">
                          </div>
                        </div>
                      </div>


                    </div>
                    <div class="tab-pane" id="profilex" role="tabpanel" aria-labelledby="profile-tabx"
                         aria-expanded="false">
                      <div class="row">
                        <div id="yellow" class="col-md-4 colors1">
                          <div class="form-group">
                            <label for="projectinput1"> {{__('backend.customer')}} </label>
                            <select name="customer_start" class="select2 form-control" style="width: 330px !important;">
                              <option value="0">----</option>
                              @foreach($customers as $customer)
                                <option value="{{$customer->id}}">

                                  {{$customer->name}}

                                </option>
                              @endforeach

                            </select>
{{--                            <input type="hidden" value="customer" name="stop_type[]">--}}
                          </div>
                        </div>

                      </div>

                    </div>
                    <div class="tab-pane" id="websites_propertiesx" role="tabpanex" aria-labelledby="websites_properties-tabx"
                         aria-expanded="false">
                      <div class="row">
                        <div id="blue" class="col-md-4 colors1">
                          <div class="form-group">
                            <label for="projectinput1"> {{__('backend.other')}} </label>

                            {!! Form::text('other_start', $data->other_start , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                            {{--                                                        <input type="hidden" value="other" name="stop_type[]">--}}
                          </div>
                        </div>
                      </div>

                    </div>

                  </div>
                  {{--                  <div class="row">--}}
{{--                    <div class="col-md-4">--}}
{{--                      <div class="form-group">--}}
{{--                        <Select id="colorselector" class="form-control">--}}
{{--                          <option value="0">----</option>--}}
{{--                          <option value="red">{{__('backend.from')}}</option>--}}
{{--                          <option value="yellow">{{__('backend.customer')}}</option>--}}
{{--                          <option value="blue">{{__('backend.other')}}</option>--}}
{{--                        </Select>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                  <div class="row">--}}
{{--                    <div id="red" class="col-md-4 colors" style="display:none">--}}
{{--                      <div class="form-group">--}}
{{--                        <label for="projectinput1"> {{__('backend.from')}} </label>--}}

{{--                        {!! Form::select('branch_start',$branches, $data->branch_start , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}--}}

{{--                      </div>--}}
{{--                    </div>--}}
{{--                    <div id="yellow" class="col-md-4 colors" style="display:none">--}}
{{--                      <div class="form-group">--}}
{{--                        <select name="customer_start" class="select2 form-control" style="width: 330px !important;">--}}
{{--                          <option value="0">----</option>--}}
{{--                          @foreach($customers as $customer)--}}
{{--                            <option value="{{$customer->id}}">--}}

{{--                              {{$customer->name}}--}}

{{--                            </option>--}}
{{--                          @endforeach--}}

{{--                        </select>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                    <div id="blue" class="col-md-4 colors" style="display:none">--}}
{{--                      <div class="form-group">--}}
{{--                        <label for="projectinput1"> {{__('backend.other')}} </label>--}}

{{--                        {!! Form::text('other_start', $data->other_start , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}--}}

{{--                      </div>--}}

{{--                    </div>--}}

{{--                  </div>--}}
{{--                  <div>--}}
                    <h4 class="form-section"><i class="la la-commenting"></i> {{__('backend.stops')}}      </h4>
                      <div id="theCount">
                          <ul class="nav nav-tabs nav-topline">


                              <li class="nav-item">
                                  <a style="width: 200px;" class="nav-link active" id="home-tab3" data-toggle="tab" href="#home31"
                                     aria-controls="home31"
                                     aria-expanded="true">{{ __('backend.branch') }}</a>
                              </li>


                              <li class="nav-item">
                                  <a style="width: 200px;" class="nav-link" id="profile-tab31" data-toggle="tab" href="#profile31"
                                     aria-controls="profile3"
                                     aria-expanded="false">{{ __('backend.customer') }}</a>
                              </li>


                              <li class="nav-item">
                                  <a style="width: 200px;" class="nav-link" id="websites_properties-tab31" data-toggle="tab"
                                     href="#websites_properties31" aria-controls="websites_properties"
                                     aria-expanded="false">{{ __('backend.other') }}</a>
                              </li>




                          </ul>
                          <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                              <div role="tabpanel" class="tab-pane active" id="home31" aria-labelledby="home-tab31" aria-expanded="true">
                                @foreach($branchStop as $branch)
                                  <div class="row">

                                      <div id="red1" class="col-md-4 colors1">
                                          <div class="form-group">
                                              <label for="projectinput1"> {{__('backend.from')}} </label>

                                              {!! Form::select('stop_value[]',$branches, $branch->stop_value , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                                              <input type="hidden" value="branch" name="stop_type[]">
                                            <input type="hidden" value="{{$branch->id}}" name="order_id[]">
                                          </div>
                                      </div>
                                    <div class="col-md-3">
                                      <a href="{{url(config('settings.BackendPath').'/orders/'.$branch->id.'/delete/stop')}}"  class="btn btn-danger">{{ __('backend.remove') }}</a>
                                    </div>
                                  </div>

@endforeach
                              </div>
                              <div class="tab-pane" id="profile31" role="tabpanel" aria-labelledby="profile-tab31"
                                   aria-expanded="false">
                                @foreach($customerStop as $cust)
                                  <div class="row">
                                      <div id="yellow1" class="col-md-4 colors1">
                                          <div class="form-group">
                                              <label for="projectinput1"> {{__('backend.customer')}} </label>
                                              <select name="stop_value[]" class="select2 form-control" style="width: 330px !important;">@php $name = \App\Customers::find($cust->stop_value)->first();@endphp
                                                <option value="{{$cust->stop_value}}">{{$name->name}}</option>
                                                  @foreach($customers as $customer)
                                                      <option value="{{$customer->id}}">

                                                          {{$customer->name}}

                                                      </option>
                                                  @endforeach

                                              </select>
                                              <input type="hidden" value="customer" name="stop_type[]">
                                            <input type="hidden" value="{{$cust->id}}" name="order_id[]">
                                          </div>
                                      </div>
                                    <div class="col-md-3">
                                      <a href="{{config('settings.BackendPath').'/orders/'.$cust->id.'/delete/stop'}}"  class="btn btn-danger">{{ __('backend.remove') }}</a>
                                    </div>
                                  </div>
                                @endforeach
                              </div>
                              <div class="tab-pane" id="websites_properties31" role="tabpanel" aria-labelledby="websites_properties-tab31"
                                   aria-expanded="false">
                                @foreach($otherStop as $other)
                                  <div class="row">
                                      <div id="blue1" class="col-md-4 colors1">
                                          <div class="form-group">
                                              <label for="projectinput1"> {{__('backend.other')}} </label>

                                              {!! Form::text('stop_value[]', $other->stop_value , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                                              <input type="hidden" value="other" name="stop_type[]">
                                            <input type="hidden" value="{{$other->id}}" name="order_id[]">
                                          </div>
                                      </div>
                                    <div class="col-md-3">
                                      <a href="{{config('settings.BackendPath').'/orders/'.$other->id.'/delete/stop'}}"  class="btn btn-danger">{{ __('backend.remove') }}</a>
                                    </div>
                                  </div>
                                @endforeach
                              </div>

                          </div>
                      </div>
{{--                @php $count = 0; @endphp--}}
{{--                    @foreach($dataStop as $stop)--}}
{{--                        <div id="upd_{{$count}}">--}}
{{--                    <ul class="nav nav-tabs nav-topline">--}}

{{--                      {{$count}}--}}
{{--                      <li class="nav-item">--}}
{{--                        <a style="width: 200px;" class="nav-link @if ($stop->stop_type == 'branch') active @endif" id="home-tab_{{$count}}" data-toggle="tab" href="#home_.{{$count}}"--}}
{{--                           aria-controls="home2"--}}
{{--                           aria-expanded="true">{{ __('backend.branch') }}</a>--}}
{{--                      </li>--}}


{{--                      <li class="nav-item">--}}
{{--                        <a style="width: 200px;" class="nav-link @if ($stop->stop_type == 'customer') active @endif" id="profile-tab_{{$count}}" data-toggle="tab" href="#profile_.{{$count}}"--}}
{{--                           aria-controls="profile2"--}}
{{--                           aria-expanded="false">{{ __('backend.customer') }}</a>--}}
{{--                      </li>--}}


{{--                      <li class="nav-item">--}}
{{--                        <a style="width: 200px;" class="nav-link @if ($stop->stop_type == 'other') active @endif"  id="websites_properties-tab_{{$count}}" data-toggle="tab"--}}
{{--                           href="#websites_properties_{{$count}}" aria-controls="websites_properties"--}}
{{--                           aria-expanded="false">{{ __('backend.other') }}</a>--}}
{{--                      </li>--}}

{{--                      <li class="nav-item">--}}
{{--                       <button href="{{config('settings.BackendPath').'/orders/'.$stop->id.'/delete/stop'}}" class="btn btn-danger">{{ __('backend.remove') }}</button>--}}

{{--                      </li>--}}

{{--                      <input type="hidden" value="{{$stop->id}}" name="order_id[]">--}}
{{--                    </ul>--}}
{{--                    <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">--}}
{{--                      <div role="tabpanel" class="tab-pane active" id="home2" aria-labelledby="home-tab" aria-expanded="true">--}}

{{--                        @foreach($branchStop as $branch)--}}
{{--                        <div class="row">--}}

{{--                          <div id="red1" class="col-md-3 colors1">--}}
{{--                            <div class="form-group">--}}
{{--                              <label for="projectinput1"> {{__('backend.from')}} </label>--}}

{{--                              {!! Form::select('stop_value[]',$branches,$branch, ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}--}}
{{--                              <input type="hidden" value="branch" name="stop_type[]">--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                          <div class="col-md-1">                              <button href="{{config('settings.BackendPath').'/orders/'.$branch->id.'/delete/stop'}}" class="btn btn-danger">X</button>--}}
{{--                          </div>--}}
{{--                        </div>--}}

{{--@endforeach--}}
{{--                      </div>--}}
{{--                      <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab"--}}
{{--                           aria-expanded="false">--}}
{{--                        @foreach($branchStop as $branch)--}}
{{--                        <div class="row">--}}
{{--                          <div id="yellow1" class="col-md-4 colors1">--}}
{{--                            <div class="form-group">--}}
{{--                              <label for="projectinput1"> {{__('backend.customer')}} </label>--}}
{{--                              <select name="stop_value[]" class="select2 form-control" style="width: 330px !important;">--}}
{{--                                <option value="0">----</option>--}}
{{--                                @foreach($customers as $customer)--}}
{{--                                  <option value="{{$customer->id}}">--}}

{{--                                    {{$customer->name}}--}}

{{--                                  </option>--}}
{{--                                @endforeach--}}

{{--                              </select>--}}
{{--                              <input type="hidden" value="customer" name="stop_type[]">--}}
{{--                            </div>--}}
{{--                          </div>--}}

{{--                        </div>--}}
{{--                          @foreach($branchStop as $branch)--}}
{{--                      </div>--}}
{{--                      <div class="tab-pane" id="websites_properties" role="tabpanel" aria-labelledby="websites_properties-tab"--}}
{{--                           aria-expanded="false">--}}
{{--                        <div class="row">--}}
{{--                          <div id="blue1" class="col-md-4 colors1">--}}
{{--                            <div class="form-group">--}}
{{--                              <label for="projectinput1"> {{__('backend.other')}} </label>--}}

{{--                              {!! Form::text('stop_value[]', null, ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}--}}
{{--                              <input type="hidden" value="other" name="stop_type[]">--}}
{{--                            </div>--}}
{{--                          </div>--}}
{{--                        </div>--}}

{{--                      </div>--}}

{{--                    </div>--}}

{{--@endforeach--}}
{{--                        </div>--}}
                    <div id="theCount_1" style="display: none">
                      <ul class="nav nav-tabs nav-topline">


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3"
                             aria-controls="home3"
                             aria-expanded="true">{{ __('backend.branch') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3"
                             aria-controls="profile3"
                             aria-expanded="false">{{ __('backend.customer') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="websites_properties-tab3" data-toggle="tab"
                             href="#websites_properties3" aria-controls="websites_properties"
                             aria-expanded="false">{{ __('backend.other') }}</a>
                        </li>

                        <li class="nav-item">
                          <button id='Remove_1' class="btn btn-danger">{{ __('backend.remove') }}</button>

                        </li>


                      </ul>
                      <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                        <div role="tabpanel" class="tab-pane active" id="home3" aria-labelledby="home-tab3" aria-expanded="true">

                          <div class="row">

                            <div id="red1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('stop_value[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                                <input type="hidden" value="branch" name="stop_type[]">
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
                                <select name="stop_value[]" class="select2 form-control" style="width: 330px !important;">
                                  <option value="0">----</option>
                                  @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">

                                      {{$customer->name}}

                                    </option>
                                  @endforeach

                                </select>
                                <input type="hidden" value="customer" name="stop_type[]">
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

                                {!! Form::text('stop_value[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                                <input type="hidden" value="other" name="stop_type[]">
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    <div id="theCount_2" style="display: none">
                      <ul class="nav nav-tabs nav-topline">


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4"
                             aria-controls="home2"
                             aria-expanded="true">{{ __('backend.branch') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4"
                             aria-controls="profile4"
                             aria-expanded="false">{{ __('backend.customer') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="websites_properties-tab4" data-toggle="tab"
                             href="#websites_properties4" aria-controls="websites_properties"
                             aria-expanded="false">{{ __('backend.other') }}</a>
                        </li>
                        <li class="nav-item">
                          <button id='Remove_2' class="btn btn-danger">{{ __('backend.remove') }}</button>

                        </li>



                      </ul>
                      <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                        <div role="tabpanel" class="tab-pane active" id="home4" aria-labelledby="home-tab4" aria-expanded="true">


                          <div class="row">

                            <div id="red1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('stop_value[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                                <input type="hidden" value="branch" name="stop_type[]">
                              </div>
                            </div>
                          </div>


                        </div>
                        <div class="tab-pane" id="profile4" role="tabpanel" aria-labelledby="profile-tab4"
                             aria-expanded="false">
                          <div class="row">
                            <div id="yellow1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="stop_value[]" class="select2 form-control" style="width: 330px !important;">
                                  <option value="0">----</option>
                                  @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">

                                      {{$customer->name}}

                                    </option>
                                  @endforeach

                                </select>
                                <input type="hidden" value="customer" name="stop_type[]">
                              </div>
                            </div>

                          </div>

                        </div>
                        <div class="tab-pane" id="websites_properties4" role="tabpanel" aria-labelledby="websites_properties-tab4"
                             aria-expanded="false">
                          <div class="row">
                            <div id="blue1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('stop_value[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                                <input type="hidden" value="other" name="stop_type[]">
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    <div id="theCount_3" style="display: none">
                      <ul class="nav nav-tabs nav-topline">


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link active" id="home-tab5" data-toggle="tab" href="#home5"
                             aria-controls="home2"
                             aria-expanded="true">{{ __('backend.branch') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="profile-tab5" data-toggle="tab" href="#profile5"
                             aria-controls="profile2"
                             aria-expanded="false">{{ __('backend.customer') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="websites_properties-tab5" data-toggle="tab"
                             href="#websites_properties5" aria-controls="websites_properties5"
                             aria-expanded="false">{{ __('backend.other') }}</a>
                        </li>

                        <li class="nav-item">
                          <button id='Remove_3' class="btn btn-danger">{{ __('backend.remove') }}</button>

                        </li>


                      </ul>
                      <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                        <div role="tabpanel" class="tab-pane active" id="home5" aria-labelledby="home-tab5" aria-expanded="true">


                          <div class="row">

                            <div id="red1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('stop_value[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                                <input type="hidden" value="branch" name="stop_type[]">
                              </div>
                            </div>
                          </div>


                        </div>
                        <div class="tab-pane" id="profile5" role="tabpanel" aria-labelledby="profile-tab5"
                             aria-expanded="false">
                          <div class="row">
                            <div id="yellow1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="stop_value[]" class="select2 form-control" style="width: 330px !important;">
                                  <option value="0">----</option>
                                  @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">

                                      {{$customer->name}}

                                    </option>
                                  @endforeach

                                </select>
                                <input type="hidden" value="customer" name="stop_type[]">
                              </div>
                            </div>

                          </div>

                        </div>
                        <div class="tab-pane" id="websites_properties5" role="tabpanel" aria-labelledby="websites_properties-tab5"
                             aria-expanded="false">
                          <div class="row">
                            <div id="blue1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('stop_value[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                                <input type="hidden" value="other" name="stop_type[]">
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    <div id="theCount_4" style="display: none">
                      <ul class="nav nav-tabs nav-topline">


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link active" id="home-tab6" data-toggle="tab" href="#home6"
                             aria-controls="home2"
                             aria-expanded="true">{{ __('backend.branch') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="profile-tab6" data-toggle="tab" href="#profile6"
                             aria-controls="profile2"
                             aria-expanded="false">{{ __('backend.customer') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="websites_properties-tab6" data-toggle="tab"
                             href="#websites_properties6" aria-controls="websites_properties6"
                             aria-expanded="false">{{ __('backend.other') }}</a>
                        </li>

                        <li class="nav-item">
                          <button id='Remove_4' class="btn btn-danger">{{ __('backend.remove') }}</button>

                        </li>


                      </ul>
                      <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                        <div role="tabpanel" class="tab-pane active" id="home6" aria-labelledby="home-tab6" aria-expanded="true">


                          <div class="row">

                            <div id="red1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('stop_value[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                                <input type="hidden" value="branch" name="stop_type[]">
                              </div>
                            </div>
                          </div>


                        </div>
                        <div class="tab-pane" id="profile6" role="tabpanel" aria-labelledby="profile-tab6"
                             aria-expanded="false">
                          <div class="row">
                            <div id="yellow1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="stop_value[]" class="select2 form-control" style="width: 330px !important;">
                                  <option value="0">----</option>
                                  @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">

                                      {{$customer->name}}

                                    </option>
                                  @endforeach

                                </select>
                                <input type="hidden" value="customer" name="stop_type[]">
                              </div>
                            </div>

                          </div>

                        </div>
                        <div class="tab-pane" id="websites_properties6" role="tabpanel" aria-labelledby="websites_properties-tab6"
                             aria-expanded="false">
                          <div class="row">
                            <div id="blue1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('stop_value[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                                <input type="hidden" value="other" name="stop_type[]">stop_value
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    <div id="theCount_5" style="display: none">
                      <ul class="nav nav-tabs nav-topline">


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link active" id="home-tab7" data-toggle="tab" href="#home7"
                             aria-controls="home2"
                             aria-expanded="true">{{ __('backend.branch') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="profile-tab7" data-toggle="tab" href="#profile7"
                             aria-controls="profile2"
                             aria-expanded="false">{{ __('backend.customer') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="websites_properties-tab7" data-toggle="tab"
                             href="#websites_properties7" aria-controls="websites_properties7"
                             aria-expanded="false">{{ __('backend.other') }}</a>
                        </li>
                        <li class="nav-item">
                          <button id='Remove_5' class="btn btn-danger">{{ __('backend.remove') }}</button>

                        </li>



                      </ul>
                      <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                        <div role="tabpanel" class="tab-pane active" id="home7" aria-labelledby="home-tab7" aria-expanded="true">


                          <div class="row">

                            <div id="red1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('stop_value[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                                <input type="hidden" value="branch" name="stop_type[]">
                              </div>
                            </div>
                          </div>


                        </div>
                        <div class="tab-pane" id="profile7" role="tabpanel" aria-labelledby="profile-tab7"
                             aria-expanded="false">
                          <div class="row">
                            <div id="yellow1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="stop_value[]" class="select2 form-control" style="width: 330px !important;">
                                  <option value="0">----</option>
                                  @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">

                                      {{$customer->name}}

                                    </option>
                                  @endforeach

                                </select>
                                <input type="hidden" value="customer" name="stop_type[]">
                              </div>
                            </div>

                          </div>

                        </div>
                        <div class="tab-pane" id="websites_properties7" role="tabpanel" aria-labelledby="websites_properties-tab7"
                             aria-expanded="false">
                          <div class="row">
                            <div id="blue1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('stop_value[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                                <input type="hidden" value="other" name="stop_type[]">
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    <div id="theCount_6" style="display: none">
                      <ul class="nav nav-tabs nav-topline">


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link active" id="home-tab8" data-toggle="tab" href="#home8"
                             aria-controls="home2"
                             aria-expanded="true">{{ __('backend.branch') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="profile-tab8" data-toggle="tab" href="#profile8"
                             aria-controls="profile2"
                             aria-expanded="false">{{ __('backend.customer') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="websites_properties-tab8" data-toggle="tab"
                             href="#websites_properties8" aria-controls="websites_properties"
                             aria-expanded="false">{{ __('backend.other') }}</a>
                        </li>

                        <li class="nav-item">
                          <button id='Remove_6' class="btn btn-danger">{{ __('backend.remove') }}</button>

                        </li>


                      </ul>
                      <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                        <div role="tabpanel" class="tab-pane active" id="home8" aria-labelledby="home-tab8" aria-expanded="true">


                          <div class="row">

                            <div id="red1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('stop_value[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                                <input type="hidden" value="branch" name="stop_type[]">
                              </div>
                            </div>
                          </div>


                        </div>
                        <div class="tab-pane" id="profile8" role="tabpanel" aria-labelledby="profile-tab8"
                             aria-expanded="false">
                          <div class="row">
                            <div id="yellow1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="stop_value[]" class="select2 form-control" style="width: 330px !important;">
                                  <option value="0">----</option>
                                  @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">

                                      {{$customer->name}}

                                    </option>
                                  @endforeach

                                </select>
                                <input type="hidden" value="customer" name="stop_type[]">
                              </div>
                            </div>

                          </div>

                        </div>
                        <div class="tab-pane" id="websites_properties8" role="tabpanel" aria-labelledby="websites_properties-tab8"
                             aria-expanded="false">
                          <div class="row">
                            <div id="blue1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('stop_value[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                                <input type="hidden" value="other" name="stop_type[]">
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    <div id="theCount_7" style="display: none">
                      <ul class="nav nav-tabs nav-topline">


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link active" id="home-tab9" data-toggle="tab" href="#home9"
                             aria-controls="home2"
                             aria-expanded="true">{{ __('backend.branch') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="profile-tab9" data-toggle="tab" href="#profile9"
                             aria-controls="profile2"
                             aria-expanded="false">{{ __('backend.customer') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="websites_properties-tab9" data-toggle="tab"
                             href="#websites_properties9" aria-controls="websites_properties9"
                             aria-expanded="false">{{ __('backend.other') }}</a>
                        </li>

                        <li class="nav-item">
                          <button id='Remove_7' class="btn btn-danger">{{ __('backend.remove') }}</button>

                        </li>


                      </ul>
                      <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                        <div role="tabpanel" class="tab-pane active" id="home9" aria-labelledby="home-tab9" aria-expanded="true">


                          <div class="row">

                            <div id="red1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('stop_value[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                                <input type="hidden" value="branch" name="stop_type[]">
                              </div>
                            </div>
                          </div>


                        </div>
                        <div class="tab-pane" id="profile9" role="tabpanel" aria-labelledby="profile-tab9"
                             aria-expanded="false">
                          <div class="row">
                            <div id="yellow1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="stop_value[]" class="select2 form-control" style="width: 330px !important;">
                                  <option value="0">----</option>
                                  @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">

                                      {{$customer->name}}

                                    </option>
                                  @endforeach

                                </select>
                                <input type="hidden" value="customer" name="stop_type[]">
                              </div>
                            </div>

                          </div>

                        </div>
                        <div class="tab-pane" id="websites_properties9" role="tabpanel" aria-labelledby="websites_properties-tab9"
                             aria-expanded="false">
                          <div class="row">
                            <div id="blue1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('stop_value[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                                <input type="hidden" value="other" name="stop_type[]">
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    <div id="theCount_8" style="display: none">
                      <ul class="nav nav-tabs nav-topline">


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link active" id="home-tab10" data-toggle="tab" href="#home10"
                             aria-controls="home9"
                             aria-expanded="true">{{ __('backend.branch') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="profile-tab10" data-toggle="tab" href="#profile10"
                             aria-controls="profile2"
                             aria-expanded="false">{{ __('backend.customer') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="websites_properties-tab10" data-toggle="tab"
                             href="#websites_properties10" aria-controls="websites_properties"
                             aria-expanded="false">{{ __('backend.other') }}</a>
                        </li>
                        <li class="nav-item">
                          <button id='Remove_8' class="btn btn-danger">{{ __('backend.remove') }}</button>

                        </li>



                      </ul>
                      <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                        <div role="tabpanel" class="tab-pane active" id="home10" aria-labelledby="home-tab10" aria-expanded="true">


                          <div class="row">

                            <div id="red1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('stop_value[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                                <input type="hidden" value="branch" name="stop_type[]">
                              </div>
                            </div>
                          </div>


                        </div>
                        <div class="tab-pane" id="profile10" role="tabpanel" aria-labelledby="profile-tab10"
                             aria-expanded="false">
                          <div class="row">
                            <div id="yellow1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="stop_value[]" class="select2 form-control" style="width: 330px !important;">
                                  <option value="0">----</option>
                                  @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">

                                      {{$customer->name}}

                                    </option>
                                  @endforeach

                                </select>
                                <input type="hidden" value="customer" name="stop_type[]">
                              </div>
                            </div>

                          </div>

                        </div>
                        <div class="tab-pane" id="websites_properties10" role="tabpanel" aria-labelledby="websites_properties-tab10"
                             aria-expanded="false">
                          <div class="row">
                            <div id="blue1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('stop_value[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                                <input type="hidden" value="other" name="stop_type[]">
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                    <div id="theCount_9" style="display: none">
                      <ul class="nav nav-tabs nav-topline">


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link active" id="home-tab11" data-toggle="tab" href="#home11"
                             aria-controls="home11"
                             aria-expanded="true">{{ __('backend.branch') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="profile-tab11" data-toggle="tab" href="#profile11"
                             aria-controls="profile11"
                             aria-expanded="false">{{ __('backend.customer') }}</a>
                        </li>


                        <li class="nav-item">
                          <a style="width: 200px;" class="nav-link" id="websites_properties-tab11" data-toggle="tab"
                             href="#websites_properties11" aria-controls="websites_properties"
                             aria-expanded="false">{{ __('backend.other') }}</a>
                        </li>
                        <li class="nav-item">
                          <button id='Remove_9' class="btn btn-danger">{{ __('backend.remove') }}</button>

                        </li>



                      </ul>
                      <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                        <div role="tabpanel" class="tab-pane active" id="home11" aria-labelledby="home-tab11" aria-expanded="true">


                          <div class="row">

                            <div id="red1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.from')}} </label>

                                {!! Form::select('stop_value[]',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                                <input type="hidden" value="branch" name="stop_type[]">
                              </div>
                            </div>
                          </div>


                        </div>
                        <div class="tab-pane" id="profile11" role="tabpanel" aria-labelledby="profile-tab11"
                             aria-expanded="false">
                          <div class="row">
                            <div id="yellow1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.customer')}} </label>
                                <select name="stop_value[]" class="select2 form-control" style="width: 330px !important;">
                                  <option value="0">----</option>
                                  @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">

                                      {{$customer->name}}

                                    </option>
                                  @endforeach

                                </select>
                                <input type="hidden" value="customer" name="stop_type[]">
                              </div>
                            </div>

                          </div>

                        </div>
                        <div class="tab-pane" id="websites_properties11" role="tabpanel" aria-labelledby="websites_properties-tab11"
                             aria-expanded="false">
                          <div class="row">
                            <div id="blue1" class="col-md-4 colors1">
                              <div class="form-group">
                                <label for="projectinput1"> {{__('backend.other')}} </label>

                                {!! Form::text('stop_value[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                                <input type="hidden" value="other" name="stop_type[]">
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

                <ul class="nav nav-tabs nav-topline">


                  <li class="nav-item">
                    <a style="width: 200px;" class="nav-link active" id="home-tabz" data-toggle="tab" href="#homez"
                       aria-controls="homez"
                       aria-expanded="true">{{ __('backend.branch') }}</a>
                  </li>


                  <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="profile-tabz" data-toggle="tab" href="#profilez"
                       aria-controls="profilez"
                       aria-expanded="false">{{ __('backend.customer') }}</a>
                  </li>


                  <li class="nav-item">
                    <a style="width: 200px;" class="nav-link" id="websites_properties-tabz" data-toggle="tab"
                       href="#websites_propertiesz" aria-controls="websites_propertiesz"
                       aria-expanded="false">{{ __('backend.other') }}</a>
                  </li>




                </ul>
                <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                  <div role="tabpanel" class="tab-pane active" id="homez" aria-labelledby="home-tabz" aria-expanded="true">


                    <div class="row">

                      <div id="red2" class="col-md-4 colors1">
                        <div class="form-group">
                          <label for="projectinput1"> {{__('backend.from')}} </label>

                          {!! Form::select('branch_des',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}
                          <input type="hidden" value="branch" name="stop_type[]">
                        </div>
                      </div>
                    </div>


                  </div>
                  <div class="tab-pane" id="profilez" role="tabpanel" aria-labelledby="profile-tabz"
                       aria-expanded="false">
                    <div class="row">
                      <div id="yellow2" class="col-md-4 colors1">
                        <div class="form-group">
                          <label for="projectinput1"> {{__('backend.customer')}} </label>
                          <select name="customer_des" class="select2 form-control" style="width: 330px !important;">
                            <option value="0">----</option>
                            @foreach($customers as $customer)
                              <option value="{{$customer->id}}">

                                {{$customer->name}}

                              </option>
                            @endforeach

                          </select>
                          <input type="hidden" value="customer" name="stop_type[]">
                        </div>
                      </div>

                    </div>

                  </div>
                  <div class="tab-pane" id="websites_propertiesz" role="tabpanez" aria-labelledby="websites_properties-tabz"
                       aria-expanded="false">
                    <div class="row">
                      <div id="blue2" class="col-md-4 colors1">
                        <div class="form-group">
                          <label for="projectinput1"> {{__('backend.other')}} </label>

                          {!! Form::text('other_des', $data->other_des , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}
                          {{--                                                        <input type="hidden" value="other" name="stop_type[]">--}}
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                  {{--                  <div class="row">--}}
{{--                    <div class="col-md-4">--}}
{{--                      <div class="form-group">--}}
{{--                        <Select id="colorselector2" class="form-control">--}}
{{--                          <option value="0">----</option>--}}
{{--                          <option value="red2">{{__('backend.from')}}</option>--}}
{{--                          <option value="yellow2">{{__('backend.customer')}}</option>--}}
{{--                          <option value="blue2">{{__('backend.other')}}</option>--}}
{{--                        </Select>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                  <div class="row">--}}
{{--                    <div id="red2" class="col-md-4 colors2" style="display:none">--}}
{{--                      <div class="form-group">--}}
{{--                        <label for="projectinput1"> {{__('backend.from')}} </label>--}}

{{--                        {!! Form::select('branch_des',$branches, $data->branch_des , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}--}}

{{--                      </div>--}}
{{--                    </div>--}}
{{--                    <div id="yellow2" class="col-md-4 colors2" style="display:none">--}}
{{--                      <div class="form-group">--}}
{{--                        <select name="customer_des" class="select2 form-control" style="width: 330px !important;">--}}
{{--                          <option value="0">----</option>--}}
{{--                          @foreach($customers as $customer)--}}
{{--                            <option value="{{$customer->id}}">--}}

{{--                              {{$customer->name}}--}}

{{--                            </option>--}}
{{--                          @endforeach--}}

{{--                        </select>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                    <div id="blue2" class="col-md-4 colors2" style="display:none">--}}
{{--                      <div class="form-group">--}}
{{--                        <label for="projectinput1"> {{__('backend.other')}} </label>--}}

{{--                        {!! Form::text('other_des', $data->other_des , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}--}}

{{--                      </div>--}}

{{--                    </div>--}}

{{--                  </div>--}}

                </div>


                <div class="form-actions">

                  <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> {{__('backend.save')}}
                  </button>
                </div>



                {!!Form::close()!!}







              </div>
            </div>
          </div>


    </section>
  </div>
  </div>


@endsection


@section('head')

  <title> {{__('backend.orders')}} | {{config('settings.sitename')}}</title>

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

    $(document).ready(function(){
      $(function() {
        var counter = 0;
        $("#addMe").click(function(event)
        {
          event.preventDefault(); // cancel default behavior
          counter++;

          $('#theCount_'+counter).show();
          //... rest of add logic
        });
        $("#Remove_1").click(function(event)
        {
          event.preventDefault(); // cancel default behavior

          $('#theCount_1').remove();
        });
        $("#Remove_2").click(function(event)
        {
          event.preventDefault(); // cancel default behavior

          $('#theCount_2').remove();
        });
        $("#Remove_3").click(function(event)
        {
          event.preventDefault(); // cancel default behavior

          $('#theCount_3').remove();
        });
        $("#Remove_4").click(function(event)
        {
          event.preventDefault(); // cancel default behavior

          $('#theCount_4').remove();
        });
        $("#Remove_5").click(function(event)
        {
          event.preventDefault(); // cancel default behavior

          $('#theCount_5').remove();
        });
        $("#Remove_6").click(function(event)
        {
          event.preventDefault(); // cancel default behavior

          $('#theCount_6').remove();
        });
        $("#Remove_7").click(function(event)
        {
          event.preventDefault(); // cancel default behavior

          $('#theCount_7').remove();
        });
        $("#Remove_8").click(function(event)
        {
          event.preventDefault(); // cancel default behavior

          $('#theCount_8').remove();
        });
        $("#Remove_9").click(function(event)
        {
          event.preventDefault(); // cancel default behavior

          $('#theCount_9').remove();
        });
        $("#Remove_10").click(function(event)
        {
          event.preventDefault(); // cancel default behavior

          $('#theCount_10').remove();
        });
        //
      });
      $(function() {
        $('#colorselector').change(function(){
          $('.colors').hide();
          $('#' + $(this).val()).show();
        });
      });

      $(function() {
        $('#colorselector1').change(function(){
          $('.colors1').hide();
          $('#' + $(this).val()).show();
        });
      });
      $(function() {
        $('#colorselector2').change(function(){
          $('.colors2').hide();
          $('#' + $(this).val()).show();
        });
      });
      $('#supplier_type').change(function(){

        $type = $(this).val();



        if($type == 'داخلى')
          $('#credit_div').show();
        else
          $('#credit_div').hide();
      });

    });




    $(function () {
      $("#repeat_div").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        $self.before($self.prev('div').clone());
        //$self.remove();
      });
    });







  </script>
@endsection