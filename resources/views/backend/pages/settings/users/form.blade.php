
                      <div class="form-body">

                        @include('backend.includes.errors') 




        <ul class="nav nav-tabs nav-topline">

          <li class="nav-item">
                        <a style="width: 200px;" class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" aria-controls="home2"
                        aria-expanded="true">{{ __('backend.basic_information') }}</a>
            </li>



            <li class="nav-item">
            <a style="width: 200px;"  class="nav-link" id="administrative_information-tab2" data-toggle="tab" href="#administrative_information" aria-controls="photos_properties"
            aria-expanded="false">{{ __('backend.administrative_information') }}</a>
          </li>


          <li class="nav-item">
            <a style="width: 200px;"  class="nav-link" id="files-tab2" data-toggle="tab" href="#files" aria-controls="files"
            aria-expanded="false">{{ __('backend.files') }}</a>
          </li>



          <li class="nav-item">
            <a style="width: 200px;"  class="nav-link" id="photos_properties-tab2" data-toggle="tab" href="#photos_properties" aria-controls="photos_properties"
            aria-expanded="false">{{ __('backend.login_information') }}</a>
          </li>

          </ul>



<div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">





<div role="tabpanel" class="tab-pane active" id="home2" aria-labelledby="home-tab2" aria-expanded="true">

</br>

                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">  {{__('backend.personal_photo')}}   </label>

               @if(isset($user))
               <div class="card-body">

                    <img  class="card-img img-fluid mb-1" src="{{url('')}}/uploads/employees/files/{{$user->data['serial']}}/{{$user->data['photo']}}" alt="Card image cap">
  
               </div>
               @endif

                              {!! Form::file('personal_photo', null , ['class' => 'form-control' , 'placeholder'=> __('backend.personal_photo')] ) !!}
                           
                            </div>
                          </div>
                          </div>


                          
                          <div class="row">


                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="projectinput3">  {{__('backend.first_name')}}   </label>

                              {!! Form::text('name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.first_name')] ) !!}
                           
                            </div>
                          </div>


                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="projectinput3">  {{__('backend.last_name')}}   </label>

                              {!! Form::text('last_name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.last_name')] ) !!}
                           
                            </div>
                          </div>


                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="projectinput3">  {{__('backend.father_name')}}   </label>

                              {!! Form::text('father_name', null , ['class' => 'form-control' , 'placeholder'=> __('backend.father_name')] ) !!}
                           
                            </div>
                          </div>

                          


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.name_english')}}   </label>

    {!! Form::text('name_english', null , ['class' => 'form-control' , 'placeholder'=> __('backend.name_english')] ) !!}
 
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.education')}}   </label>

    {!! Form::select('education', [ 'before_high_school'=>__('backend.before_high_school') ,  'high_school'=>__('backend.high_school')  ,  'university'=>__('backend.university') ,  'after_university'=>__('backend.after_university') ] , null , ['class' => 'form-control' , 'placeholder'=> __('backend.education')] ) !!}
 
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.gender')}}   </label>

    {!! Form::select('gender', [ 'male'=>__('backend.male') ,  'female'=>__('backend.female')  ] , null , ['class' => 'form-control' , 'placeholder'=> __('backend.gender')] ) !!}
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.social_status')}}   </label>

    {!! Form::select('social_status', [ 'unmarried'=>__('backend.unmarried') ,  'married'=>__('backend.married') ,  'absolute'=>__('backend.absolute') ,  'widower'=>__('backend.widower')  ] , null , ['class' => 'form-control' , 'placeholder'=> __('backend.social_status')] ) !!}
 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.number_childrens')}}   </label>

    {!! Form::number('number_childrens', null , ['class' => 'form-control' , 'placeholder'=> __('backend.number_childrens')] ) !!}
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.number_escorts')}}   </label>

    {!! Form::number('number_escorts', null , ['class' => 'form-control' , 'placeholder'=> __('backend.number_escorts')] ) !!}
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.nationality')}}   </label>

    {!! Form::select('nationality' , $nationaliies , null , ['class' => 'form-control' , 'placeholder'=> __('backend.nationality')] ) !!}
 
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.mobile')}}   </label>
    {!! Form::number('phone', null , ['class' => 'form-control' , 'placeholder'=> __('backend.mobile')] ) !!}

  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.mobile_work')}}   </label>

    {!! Form::number('mobile_work', null , ['class' => 'form-control' , 'placeholder'=> __('backend.mobile_work')] ) !!}
 
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.shunt_work')}}   </label>

    {!! Form::text('shunt_work', null , ['class' => 'form-control' , 'placeholder'=> __('backend.shunt_work')] ) !!}
 
  </div>
</div>




<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.personal_email')}}   </label>

    {!! Form::email('personal_email', null , ['class' => 'form-control' , 'placeholder'=> __('backend.personal_email')] ) !!}
 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.work_email')}}   </label>

    {!! Form::email('work_email', null , ['class' => 'form-control' , 'placeholder'=> __('backend.work_email')] ) !!}
 
  </div>
</div>




<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.birth_date')}}   </label>

    {!! Form::date('birth_date', null , ['class' => 'form-control' , 'placeholder'=> __('backend.birth_date')] ) !!}

 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.birth_place')}}   </label>

    {!! Form::text('birth_place', null , ['class' => 'form-control' , 'placeholder'=> __('backend.birth_place')] ) !!}
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.national_address')}}   </label>

    {!! Form::text('national_address', null , ['class' => 'form-control' , 'placeholder'=> __('backend.national_address')] ) !!}
 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.identification_number')}}   </label>

    {!! Form::text('identification_number', null , ['class' => 'form-control' , 'placeholder'=> __('backend.identification_number')] ) !!}
 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.identification_expiry')}}   </label>

    {!! Form::date('identification_expiry', null , ['class' => 'form-control' , 'placeholder'=> __('backend.identification_expiry')] ) !!}
 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.passport_number')}}   </label>

    {!! Form::text('passport_number', null , ['class' => 'form-control' , 'placeholder'=> __('backend.passport_number')] ) !!}
 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.passport_expiry')}}   </label>

    {!! Form::date('passport_expiry', null , ['class' => 'form-control' , 'placeholder'=> __('backend.passport_expiry')] ) !!}
 
  </div>
</div>







<div class="col-md-12">
  <div class="form-group">
   
  <h4  class="form-section">{{__('backend.close_persons')}}</h4>
   
<div class="row">


@if(isset($user))


@forelse( $user->close_persons as $person)



<div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  {{ __('backend.name') }}      </label>

                              {!! Form::text('close_names[]', $person->name, ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ) !!}
                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  {{ __('backend.phone') }}      </label>

                              {!! Form::text('close_phones[]', $person->mobile , ['class' => 'form-control' , 'placeholder'=> __('backend.phone')] ) !!}
                           
                            </div>
                          </div>


@empty


@endforelse


@endif






                   <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  {{ __('backend.name') }}      </label>

                              {!! Form::text('close_names[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.name')] ) !!}
                           
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  {{ __('backend.phone') }}      </label>

                              {!! Form::text('close_phones[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.phone')] ) !!}
                           
                            </div>
                          </div>

                  


 </div>



 <button id='repeat_div' class="btn btn-success">  {{ __('backend.new') }} </button>
   
 
  </div>
</div>



</div> 











</div>











<div class="tab-pane" id="administrative_information" role="tabpanel" aria-labelledby="administrative_information-tab2"
                      aria-expanded="false">

     
<div class="row">



                        
<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.private_situation')}}   </label>

    {!! Form::select('private_situation', [ 'special_arrival'=>__('backend.special_arrival') ,  'disabled'=>__('backend.disabled') ,  'chronic_disease'=>__('backend.chronic_disease')   ] , null , ['class' => 'form-control' , 'placeholder'=> __('backend.private_situation')] ) !!}
 
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.work_place')}}   </label>

    {!! Form::text('work_place', null , ['class' => 'form-control' , 'placeholder'=> __('backend.work_place')] ) !!}
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.work_start_at')}}   </label>

    {!! Form::date('work_start_at', null , ['class' => 'form-control' , 'placeholder'=> __('backend.work_start_at')] ) !!}
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.job')}}   </label>

    {!! Form::text('job', null , ['class' => 'form-control' , 'placeholder'=> __('backend.job')] ) !!}
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.job_type')}}   </label>

    {!! Form::select('job_type', [ 'full_time'=>__('backend.full_time') ,  'part_time'=>__('backend.part_time') ] , null , ['class' => 'form-control' , 'placeholder'=> __('backend.job')] ) !!}
 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.department')}}   </label>

    {!! Form::select('department_id', $departments  , null , ['class' => 'form-control' , 'placeholder'=> __('backend.department')] ) !!}
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.direct_manager')}}   </label>

    {!! Form::select('direct_manager', $managers  , null , ['class' => 'form-control' , 'placeholder'=> __('backend.direct_manager')] ) !!}
 
  </div>
</div>


<div class="col-md-12">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.work_days')}}   </label>

<input type="checkbox" name="work_days[]" value="Friday" @if( isset($user->work_days) && in_array('Friday' , json_decode($user->work_days, true))) checked @endif > {{__('backend.Friday')}} |
<input type="checkbox" name="work_days[]" value="Saturday" @if(isset($user->work_days) && in_array('Saturday' , json_decode($user->work_days, true))) checked @endif > {{__('backend.Saturday')}}  |   
<input type="checkbox" name="work_days[]" value="Sunday" @if(isset($user->work_days) && in_array('Sunday' , json_decode($user->work_days, true))) checked @endif > {{__('backend.Sunday')}}   |
<input type="checkbox" name="work_days[]" value="Monday" @if(isset($user->work_days) && in_array('Monday' , json_decode($user->work_days, true))) checked @endif > {{__('backend.Monday')}}   |
<input type="checkbox" name="work_days[]" value="Tuesday" @if(isset($user->work_days) && in_array('Tuesday' , json_decode($user->work_days, true))) checked @endif > {{__('backend.Tuesday')}}   |
<input type="checkbox" name="work_days[]" value="Wednesday" @if(isset($user->work_days) && in_array('Wednesday' , json_decode($user->work_days, true))) checked @endif > {{__('backend.Wednesday')}}   |
<input type="checkbox" name="work_days[]" value="Thursday" @if(isset($user->work_days) && in_array('Thursday' , json_decode($user->work_days, true))) checked @endif > {{__('backend.Thursday')}}  

  </div>
</div>



<div class="col-md-12">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.work_time')}}   </label>

<div class="row">

<div class="col-md-2">
  <div class="form-group">
 
   
<select name="work_time_from_1" class="select2 form-control" >
<option value="">{{ __('backend.from') }}</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '00:00' ) selected @endif @if( old('work_time_from_1') == '00:00' ) selected  @endif value="00:00">12:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '01:00' ) selected @endif @if( old('work_time_from_1') == '01:00' ) selected  @endif value="01:00">01:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '02:00' ) selected @endif @if( old('work_time_from_1') == '02:00' ) selected  @endif value="02:00">02:00 AM</option> 
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '03:00' ) selected @endif @if( old('work_time_from_1') == '03:00' ) selected  @endif value="03:00">03:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '04:00' ) selected @endif @if( old('work_time_from_1') == '04:00' ) selected  @endif value="04:00">04:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '05:00' ) selected @endif @if( old('work_time_from_1') == '05:00' ) selected  @endif value="05:00">05:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '06:00' ) selected @endif @if( old('work_time_from_1') == '06:00' ) selected  @endif value="06:00">06:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '07:00' ) selected @endif @if( old('work_time_from_1') == '07:00' ) selected  @endif value="07:00">07:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '08:00' ) selected @endif @if( old('work_time_from_1') == '08:00' ) selected  @endif value="08:00">08:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '09:00' ) selected @endif @if( old('work_time_from_1') == '09:00' ) selected  @endif value="09:00">09:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '10:00' ) selected @endif @if( old('work_time_from_1') == '10:00' ) selected  @endif value="10:00">10:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '11:00' ) selected @endif @if( old('work_time_from_1') == '11:00' ) selected  @endif value="11:00">11:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '12:00' ) selected @endif @if( old('work_time_from_1') == '12:00' ) selected  @endif value="12:00">12:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '13:00' ) selected @endif @if( old('work_time_from_1') == '13:00' ) selected  @endif value="13:00">01:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '14:00' ) selected @endif @if( old('work_time_from_1') == '14:00' ) selected  @endif value="14:00">02:00 PM</option> 
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '15:00' ) selected @endif @if( old('work_time_from_1') == '15:00' ) selected  @endif value="15:00">03:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '16:00' ) selected @endif @if( old('work_time_from_1') == '16:00' ) selected  @endif value="16:00">04:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '17:00' ) selected @endif @if( old('work_time_from_1') == '17:00' ) selected  @endif value="17:00">05:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '18:00' ) selected @endif @if( old('work_time_from_1') == '18:00' ) selected  @endif value="18:00">06:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '19:00' ) selected @endif @if( old('work_time_from_1') == '19:00' ) selected  @endif value="19:00">07:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '20:00' ) selected @endif @if( old('work_time_from_1') == '20:00' ) selected  @endif value="20:00">08:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '21:00' ) selected @endif @if( old('work_time_from_1') == '21:00' ) selected  @endif value="20:00">09:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '22:00' ) selected @endif @if( old('work_time_from_1') == '22:00' ) selected  @endif value="21:00">10:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_1'] == '23:00' ) selected @endif @if( old('work_time_from_1') == '23:00' ) selected  @endif value="23:00">11:00 PM</option>
</select>  
 
  </div>
</div>




<div class="col-md-2">
  <div class="form-group">
 
   
<select name="work_time_to_1" class="select2 form-control" >
<option value="">{{ __('backend.to') }}</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '00:00' ) selected @endif @if( old('work_time_to_1') == '00:00' ) selected  @endif value="00:00">12:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '01:00' ) selected @endif @if( old('work_time_to_1') == '01:00' ) selected  @endif value="01:00">01:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '02:00' ) selected @endif @if( old('work_time_to_1') == '02:00' ) selected  @endif value="02:00">02:00 AM</option> 
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '03:00' ) selected @endif @if( old('work_time_to_1') == '03:00' ) selected  @endif value="03:00">03:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '04:00' ) selected @endif @if( old('work_time_to_1') == '04:00' ) selected  @endif value="04:00">04:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '05:00' ) selected @endif @if( old('work_time_to_1') == '05:00' ) selected  @endif value="05:00">05:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '06:00' ) selected @endif @if( old('work_time_to_1') == '06:00' ) selected  @endif value="06:00">06:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '07:00' ) selected @endif @if( old('work_time_to_1') == '07:00' ) selected  @endif value="07:00">07:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '08:00' ) selected @endif @if( old('work_time_to_1') == '08:00' ) selected  @endif value="08:00">08:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '09:00' ) selected @endif @if( old('work_time_to_1') == '09:00' ) selected  @endif value="09:00">09:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '10:00' ) selected @endif @if( old('work_time_to_1') == '10:00' ) selected  @endif value="10:00">10:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '11:00' ) selected @endif @if( old('work_time_to_1') == '11:00' ) selected  @endif value="11:00">11:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '12:00' ) selected @endif @if( old('work_time_to_1') == '12:00' ) selected  @endif value="12:00">12:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '13:00' ) selected @endif @if( old('work_time_to_1') == '13:00' ) selected  @endif value="13:00">01:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '14:00' ) selected @endif @if( old('work_time_to_1') == '14:00' ) selected  @endif value="14:00">02:00 PM</option> 
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '15:00' ) selected @endif @if( old('work_time_to_1') == '15:00' ) selected  @endif value="15:00">03:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '16:00' ) selected @endif @if( old('work_time_to_1') == '16:00' ) selected  @endif value="16:00">04:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '17:00' ) selected @endif @if( old('work_time_to_1') == '17:00' ) selected  @endif value="17:00">05:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '18:00' ) selected @endif @if( old('work_time_to_1') == '18:00' ) selected  @endif value="18:00">06:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '19:00' ) selected @endif @if( old('work_time_to_1') == '19:00' ) selected  @endif value="19:00">07:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '20:00' ) selected @endif @if( old('work_time_to_1') == '20:00' ) selected  @endif value="20:00">08:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '21:00' ) selected @endif @if( old('work_time_to_1') == '21:00' ) selected  @endif value="20:00">09:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '22:00' ) selected @endif @if( old('work_time_to_1') == '22:00' ) selected  @endif value="21:00">10:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_1'] == '23:00' ) selected @endif @if( old('work_time_to_1') == '23:00' ) selected  @endif value="23:00">11:00 PM</option>
</select> 

 
  </div>
</div>






<div class="col-md-2">
  <div class="form-group">
 
   
<select name="work_time_from_2" class="select2 form-control" >

<option value="">{{ __('backend.from') }}</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '00:00' ) selected @endif @if( old('work_time_from_2') == '00:00' ) selected  @endif value="00:00">12:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '01:00' ) selected @endif @if( old('work_time_from_2') == '01:00' ) selected  @endif value="01:00">01:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '02:00' ) selected @endif @if( old('work_time_from_2') == '02:00' ) selected  @endif value="02:00">02:00 AM</option> 
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '03:00' ) selected @endif @if( old('work_time_from_2') == '03:00' ) selected  @endif value="03:00">03:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '04:00' ) selected @endif @if( old('work_time_from_2') == '04:00' ) selected  @endif value="04:00">04:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '05:00' ) selected @endif @if( old('work_time_from_2') == '05:00' ) selected  @endif value="05:00">05:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '06:00' ) selected @endif @if( old('work_time_from_2') == '06:00' ) selected  @endif value="06:00">06:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '07:00' ) selected @endif @if( old('work_time_from_2') == '07:00' ) selected  @endif value="07:00">07:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '08:00' ) selected @endif @if( old('work_time_from_2') == '08:00' ) selected  @endif value="08:00">08:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '09:00' ) selected @endif @if( old('work_time_from_2') == '09:00' ) selected  @endif value="09:00">09:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '10:00' ) selected @endif @if( old('work_time_from_2') == '10:00' ) selected  @endif value="10:00">10:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '11:00' ) selected @endif @if( old('work_time_from_2') == '11:00' ) selected  @endif value="11:00">11:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '12:00' ) selected @endif @if( old('work_time_from_2') == '12:00' ) selected  @endif value="12:00">12:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '13:00' ) selected @endif @if( old('work_time_from_2') == '13:00' ) selected  @endif value="13:00">01:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '14:00' ) selected @endif @if( old('work_time_from_2') == '14:00' ) selected  @endif value="14:00">02:00 PM</option> 
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '15:00' ) selected @endif @if( old('work_time_from_2') == '15:00' ) selected  @endif value="15:00">03:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '16:00' ) selected @endif @if( old('work_time_from_2') == '16:00' ) selected  @endif value="16:00">04:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '17:00' ) selected @endif @if( old('work_time_from_2') == '17:00' ) selected  @endif value="17:00">05:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '18:00' ) selected @endif @if( old('work_time_from_2') == '18:00' ) selected  @endif value="18:00">06:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '19:00' ) selected @endif @if( old('work_time_from_2') == '19:00' ) selected  @endif value="19:00">07:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '20:00' ) selected @endif @if( old('work_time_from_2') == '20:00' ) selected  @endif value="20:00">08:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '21:00' ) selected @endif @if( old('work_time_from_2') == '21:00' ) selected  @endif value="20:00">09:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '22:00' ) selected @endif @if( old('work_time_from_2') == '22:00' ) selected  @endif value="21:00">10:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['from_2'] == '23:00' ) selected @endif @if( old('work_time_from_2') == '23:00' ) selected  @endif value="23:00">11:00 PM</option>

</select> 
 
  </div>
</div>



<div class="col-md-2">
  <div class="form-group">
 
   
 <select name="work_time_to_2" class="select2 form-control" >

<option value="">{{ __('backend.to') }}</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '00:00' ) selected @endif @if( old('work_time_to_2') == '00:00' ) selected  @endif value="00:00">12:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '01:00' ) selected @endif @if( old('work_time_to_2') == '01:00' ) selected  @endif value="01:00">01:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '02:00' ) selected @endif @if( old('work_time_to_2') == '02:00' ) selected  @endif value="02:00">02:00 AM</option> 
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '03:00' ) selected @endif @if( old('work_time_to_2') == '03:00' ) selected  @endif value="03:00">03:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '04:00' ) selected @endif @if( old('work_time_to_2') == '04:00' ) selected  @endif value="04:00">04:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '05:00' ) selected @endif @if( old('work_time_to_2') == '05:00' ) selected  @endif value="05:00">05:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '06:00' ) selected @endif @if( old('work_time_to_2') == '06:00' ) selected  @endif value="06:00">06:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '07:00' ) selected @endif @if( old('work_time_to_2') == '07:00' ) selected  @endif value="07:00">07:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '08:00' ) selected @endif @if( old('work_time_to_2') == '08:00' ) selected  @endif value="08:00">08:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '09:00' ) selected @endif @if( old('work_time_to_2') == '09:00' ) selected  @endif value="09:00">09:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '10:00' ) selected @endif @if( old('work_time_to_2') == '10:00' ) selected  @endif value="10:00">10:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '11:00' ) selected @endif @if( old('work_time_to_2') == '11:00' ) selected  @endif value="11:00">11:00 AM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '12:00' ) selected @endif @if( old('work_time_to_2') == '12:00' ) selected  @endif value="12:00">12:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '13:00' ) selected @endif @if( old('work_time_to_2') == '13:00' ) selected  @endif value="13:00">01:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '14:00' ) selected @endif @if( old('work_time_to_2') == '14:00' ) selected  @endif value="14:00">02:00 PM</option> 
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '15:00' ) selected @endif @if( old('work_time_to_2') == '15:00' ) selected  @endif value="15:00">03:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '16:00' ) selected @endif @if( old('work_time_to_2') == '16:00' ) selected  @endif value="16:00">04:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '17:00' ) selected @endif @if( old('work_time_to_2') == '17:00' ) selected  @endif value="17:00">05:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '18:00' ) selected @endif @if( old('work_time_to_2') == '18:00' ) selected  @endif value="18:00">06:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '19:00' ) selected @endif @if( old('work_time_to_2') == '19:00' ) selected  @endif value="19:00">07:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '20:00' ) selected @endif @if( old('work_time_to_2') == '20:00' ) selected  @endif value="20:00">08:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '21:00' ) selected @endif @if( old('work_time_to_2') == '21:00' ) selected  @endif value="20:00">09:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '22:00' ) selected @endif @if( old('work_time_to_2') == '22:00' ) selected  @endif value="21:00">10:00 PM</option>
<option @if( isset($user) && json_decode($user->work_times, true)['to_2'] == '23:00' ) selected @endif @if( old('work_time_to_2') == '23:00' ) selected  @endif value="23:00">11:00 PM</option>

</select> 
 
  </div>
</div>



</div>
  </div>
</div>




<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.total_salary')}}   </label>

    {!! Form::text('total_salary', null , ['class' => 'form-control' , 'placeholder'=> __('backend.total_salary')] ) !!}
 
  </div>
</div>

<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.basic_salary')}}   </label>

    {!! Form::text('basic_salary', null , ['class' => 'form-control' , 'placeholder'=> __('backend.basic_salary')] ) !!}
 
  </div>
</div>



<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.housing_allowance')}}   </label>

    {!! Form::text('housing_allowance', null , ['class' => 'form-control' , 'placeholder'=> __('backend.housing_allowance')] ) !!}
 
  </div>
</div>



<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.transportation_allowance')}}   </label>

    {!! Form::text('transportation_allowance', null , ['class' => 'form-control' , 'placeholder'=> __('backend.transportation_allowance')] ) !!}
 
  </div>
</div>




<div class="col-md-2">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.other_allowance')}}   </label>

    {!! Form::text('other_allowance', null , ['class' => 'form-control' , 'placeholder'=> __('backend.other_allowance')] ) !!}
 
  </div>
</div>
  
</div>



</div>






<div class="tab-pane" id="files" role="tabpanel" aria-labelledby="files-tab2"
                      aria-expanded="false">

@if(isset($user))     
@forelse( $user->employee_files as $file)

<h4 class="card-title"> - <a target="_blank" href="{{url('')}}/uploads/employees/files/{{$user->data['serial']}}/{{$file->file_name}}">  {{$file->file_title}} </h4>

@empty

لا توجد ملفات

@endforelse

<hr>
@endif
                      <div class="row">




                         
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  {{ __('backend.file_name') }}     </label>

                              {!! Form::text('file_name[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.file_name')] ) !!}
                           
                            </div>
                          </div>



                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput3">  {{ __('backend.choose_file') }}     </label>

                              {!! Form::file('personal_files[]', null , ['class' => 'form-control' , 'placeholder'=> __('backend.choose_file')] ) !!}
                           
                            </div>
                          </div>



                          



                            
                   </div>


                   <button id='repeat_div_file' class="btn btn-success">  {{ __('backend.new') }} </button>

                      

</div>





<div class="tab-pane" id="photos_properties" role="tabpanel" aria-labelledby="photos_properties-tab2"
                      aria-expanded="false">

     
                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">  {{__('backend.email')}}   </label>

                              {!! Form::text('email', null , ['class' => 'form-control' , 'placeholder'=> __('backend.email')] ) !!}
                           
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="projectinput1">  {{ __('backend.password')}}    </label>

                              {!! Form::password('password', ['class' => 'form-control' , 'placeholder'=> __('backend.password')] ) !!}

                            </div>
                          
                            </div>


                          



                            
                            </div>

<h4 class="form-section"><i class="la la-key"></i> {{ __('backend.roles')}}    </h4>

<div class="row">

                   
                             

@foreach ($roles as $role)

<div class="form-group  col-md-2">
<label>

<input             @if(isset($user->roles)) @foreach ( $user->roles as $current_role )
                    @if ($current_role->id == $role->id) checked @endif
                    @endforeach @endif
                     name='role_id[]' value='{{$role->id}}' type="checkbox"  class="icheck" data-checkbox="icheckbox_square-purple"> <B 
                     title='@foreach($role->permissions as $permission ){{$permission->label}} | @endforeach' > {{$role->title}}</B> 

</label>
</div>					

@endforeach


 </div>

                      <div class="form-actions">
                        
                        <button type="submit" class="btn btn-primary">
                          <i class="la la-check-square-o"></i> {{ __('backend.save')}}
                        </button>
                      </div>

</div>




</div>






                    
                  