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
                    <option value="0" >----</option>
                    <option value="red">{{__('backend.from')}}</option>
                    <option value="yellow">{{__('backend.customer')}}</option>
                    <option value="blue">{{__('backend.other')}}</option>
                </Select>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="red" class="col-md-4 colors" style="display:none" >
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.from')}} </label>

                {!! Form::select('branch_start',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

            </div>
        </div>
        <div id="yellow" class="col-md-4 colors" style="display:none">
            <div  class="form-group">
                <select name="customer_start"  class="select2 form-control"  style="width: 330px !important;">
                    <option value="0" >----</option>
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
    <h4 class="form-section"><i class="la la-commenting"></i> {{__('backend.stops')}}      </h4>
   <div><div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <Select id="colorselector1" class="form-control">
                    <option value="0" >----</option>
                    <option value="red1">{{__('backend.from')}}</option>
                    <option value="yellow1">{{__('backend.customer')}}</option>
                    <option value="blue1">{{__('backend.other')}}</option>
                </Select>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="red1" class="col-md-4 colors1" style="display:none">
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.from')}} </label>

                {!! Form::select('branch_stop',$branches, null , ['class' => 'form-control' , 'placeholder'=>'-- Choose Branch --'] ) !!}

            </div>
        </div>

        <div id="yellow1" class="col-md-4 colors1" style="display:none">
            <div  class="form-group">
                <select name="customer_stop"  class="select2 form-control"  style="width: 330px !important;">
                    <option value="0" >----</option>
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}">

                            {{$customer->name}}

                        </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div id="blue1" class="col-md-4 colors1" style="display:none">
            <div class="form-group">
                <label for="projectinput1"> {{__('backend.other')}} </label>

                {!! Form::text('other_stop', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other')] ) !!}

            </div>

        </div>

    </div>
</div>
    <button id='repeat_div' class="btn btn-success">{{ __('backend.add_stops') }}</button>
    <h4 class="form-section"><i class="la la-commenting"></i> {{__('backend.destinations')}}      </h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <Select id="colorselector2" class="form-control">
                    <option value="0" >----</option>
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
            <div  class="form-group">
                <select name="customer_des"  class="select2 form-control"  style="width: 330px !important;">
                    <option value="0" >----</option>
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
                    
