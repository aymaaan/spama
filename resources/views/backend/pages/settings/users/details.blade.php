@extends('backend.layouts.default')

@section('content')

<div class="app-content content">
        <div class="content-body">
          <section class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-head">
                  <div class="card-header">
                    <h4 class="card-title"> {{__('backend.employees')}} - {{$user->name}} {{$user->data['last_name']}}  </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">


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
            <a style="width: 200px;"  class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" aria-controls="profile2"
            aria-expanded="false">{{ __('backend.files') }}</a>
          </li>


          <li class="nav-item">
            <a style="width: 200px;"  class="nav-link" id="custodies-tab2" data-toggle="tab" href="#custodies" aria-controls="photos_properties"
            aria-expanded="false">{{ __('backend.custodies') }}</a>
          </li>

        


        </ul>



<div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">

				
<div role="tabpanel" class="tab-pane active" id="home2" aria-labelledby="home-tab2" aria-expanded="true">
  
<div class="row">
                         
                         
                         
                          <div class="col-md-3">
                            <div class="form-group">
                            

               <div class="card-body">
                    <img  class="card-img img-fluid mb-1" src="{{url('')}}/uploads/employees/files/{{$user->data['serial']}}/{{$user->data['photo']}}" alt="Card image cap">
                    

               </div>
                           
                            </div>
                          </div>

                         


                          </div>


                          
<div class="row">


<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.full_name')}}   </label>
    <h4 class="card-title"> {{$user->name}}  {{$user->data['father_name']}} {{$user->data['last_name']}} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.name_english')}}   </label>
    <h4 class="card-title">{{$user->data['name_english']}} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3"> {{__('backend.employee_s_n')}}  </label>
    <h4 class="card-title">{{$user->data['serial']}} </h4>

  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.education')}}   </label>
    <h4 class="card-title">{{ __('backend.'.$user->data['education']) }} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.gender')}}   </label>
    <h4 class="card-title">{{ __('backend.'.$user->data['gender']) }} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.social_status')}}   </label>
    <h4 class="card-title">{{ __('backend.'.$user->data['social_status']) }} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.number_escorts')}}   </label>
    <h4 class="card-title">{{$user->data['number_escorts']}} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.nationality')}}   </label>
    <h4 class="card-title">{{$user->data->nationality_info['title'] ?? ''}} </h4>

  </div>
</div>




<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.mobile')}}   </label>
    <h4 class="card-title">{{$user->phone}} </h4>

  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.mobile_work')}}   </label>
    <h4 class="card-title">{{$user->data['mobile_work']}} </h4>

  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.shunt_work')}}   </label>
    <h4 class="card-title">{{$user->data['shunt_work']}} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.personal_email')}}   </label>
    <h4 class="card-title">{{$user->data['personal_email']}} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.work_email')}}   </label>
    <h4 class="card-title">{{$user->data['work_email']}} </h4>

  </div>
</div>




<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.birth_date')}}   </label>
    <h4 class="card-title">{{$user->data['birth_date']}} </h4>

  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.age')}}   </label>
    <h4 class="card-title"> {{\Carbon\Carbon::parse($user->data['birth_date'])->age}}  </h4>

  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.birth_place')}}   </label>
    <h4 class="card-title">{{$user->data['country_birth_place']['country_name_ar']}} </h4>

  </div>
</div>


<div class="col-md-12">
  <div class="form-group">
  
  <label for="projectinput3">
  <B>{{__('backend.national_address')}}:</B> </br>
    {{__('backend.national_address_building_number')}}: {{$user->data['national_address_building_number']}} - {{__('backend.national_address_street')}}: {{$user->data['national_address_street']}} - {{__('backend.national_address_district')}}: {{$user->data['national_address_district']}} - {{__('backend.national_address_city')}}: {{$user->data['national_address_city']}} - {{__('backend.national_address_zip')}}: {{$user->data['national_address_zip']}} - {{__('backend.national_address_additional')}}: {{$user->data['national_address_additional']}} - {{__('backend.national_address_unit')}}: {{$user->data['national_address_unit']}}
    
    
    
    </label>

  </div>
</div>



</div>
</br>
<div class="row">

<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.identification_number')}}   </label>
    <h4 class="card-title">{{$user->data['identification_number']}} </h4>

  </div>
</div>




<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.identification_expiry')}}   </label>
    <h4 class="card-title">{{$user->data['identification_expiry']}} </h4>

  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.passport_number')}}   </label>
    <h4 class="card-title">{{$user->data['passport_number']}} </h4>

  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.passport_expiry')}}   </label>
    <h4 class="card-title">{{$user->data['passport_expiry']}} </h4>

  </div>
</div>

</div>



<div class="row">

<h4  class="form-section">{{__('backend.close_persons')}}</h4>

<div class="col-md-12">
  <div class="form-group">
   

   
<div class="row">


@forelse( $user->close_persons as $person)
@if( $person->name )

<div class="col-md-12">
  <div class="form-group">
 
    <h4 class="card-title"> {{__('backend.name')}}: {{$person->name}} -  {{__('backend.phone')}}:  {{$person->mobile}}  </h4>

  </div>
</div>
@endif

@empty

<div class="col-md-12">
  <div class="form-group">
 
    <h4 class="card-title"> لا يوجد  </h4>

  </div>
</div>

@endforelse

 </div>


   
 
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
    <h4 class="card-title">{{ __('backend.'.$user->data['private_situation']) }} </h4>

  </div>
</div>




<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.work_place')}}   </label>
    <h4 class="card-title">{{ $user->data['work_country']['country_name_ar'] }} - {{ $user->data['work_city']['title'] }}</h4>

  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.work_start_at')}}   </label>
    <h4 class="card-title">{{ $user->data['work_start_at'] }} </h4>

  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.job')}}   </label>
    <h4 class="card-title">{{ $user->data['job'] }} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.job_type')}}   </label>
    <h4 class="card-title">{{ __('backend.'.$user->data['job_type']) }} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.department')}}   </label>
    
    @if(isset($user->data->department['title']))

    <h4 class="card-title">{{ $user->data->department['title'] }} </h4>
    
    @endif
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.direct_manager')}}   </label>
@if(isset($user->data->manager['name']))
    <h4 class="card-title">{{ $user->data->manager['name'] }} </h4>
 @endif
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.work_days')}}  </label>

    <h4 class="card-title">

@if(isset($user->data->work_days))
    @foreach( json_decode($user->data->work_days, true)   as $day  )
    -  {{ __('backend.'.$day)  }} 
    @endforeach
@endif
    </h4>
 
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.work_time')}}   </label>

    <h4 class="card-title">

    
@if(isset($user->data->work_times))
    @foreach( json_decode($user->data->work_times, true)   as $k=>$time  )
    @if( $k == 'from_2')
     </br>
   @endif

     {{ __('backend.'.str_replace('_1','', str_replace('_2','', $k ) )) }} : {{ $time  }} 

    @endforeach

    </h4>
 
  </div>
</div>

@php
$from_1 = \Carbon\Carbon::createFromFormat('H:s', json_decode($user->data->work_times, true)['from_1'] ?? '00:00');
$to_1 = \Carbon\Carbon::createFromFormat('H:s', json_decode($user->data->work_times, true)['to_1'] ?? '00:00');
$from_2 = \Carbon\Carbon::createFromFormat('H:s', json_decode($user->data->work_times, true)['from_2'] ?? '00:00');
$to_2 = \Carbon\Carbon::createFromFormat('H:s', json_decode($user->data->work_times, true)['to_2'] ?? '00:00');
$diff_in_hours = $to_1->diffInHours($from_1) + $to_2->diffInHours($from_2);
@endphp

@endif

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.total_working_hours_daily')}}   </label>

    <h4 class="card-title"> {{ $diff_in_hours ?? '' }}  </h4>
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.total_working_hours_weelky')}}   </label>
@if(isset($user->data->work_days))
    <h4 class="card-title"> {{ $diff_in_hours * count(json_decode($user->data->work_days, true)) }}  </h4>
@endif
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.total_salary')}}   </label>

    <h4 class="card-title">{{ $user->data['total_salary'] }} </h4>
 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.basic_salary')}}   </label>

    <h4 class="card-title">{{ $user->data['basic_salary'] }} </h4>
 
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.housing_allowance')}}   </label>

    <h4 class="card-title">{{ $user->data['housing_allowance'] }} </h4>
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.transportation_allowance')}}   </label>

    <h4 class="card-title">{{ $user->data['transportation_allowance'] }} </h4>
 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.other_allowance')}}   </label>

    <h4 class="card-title">{{ $user->data['other_allowance'] }} </h4>
 
  </div>
</div>






  
</div>

</div>   











<div role="tabpanel" class="tab-pane" id="profile2" aria-labelledby="profile2-tab2" aria-expanded="true">
  


<div class="col-md-4">
  <div class="form-group">

   
   @forelse( $user->employee_files as $file)

    <h4 class="card-title"> - <a target="_blank" href="{{url('')}}/uploads/employees/files/{{$user->data['serial']}}/{{$file->file_name}}">  {{$file->file_title}} </a> </h4>

    @empty

    لا توجد ملفات

    @endforelse
 
  </div>
</div>



</div>   







<div class="tab-pane" id="administrative_information" role="tabpanel" aria-labelledby="administrative_information-tab2"
                      aria-expanded="false">

<div class="row">




<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.private_situation')}}   </label>
    <h4 class="card-title">{{ __('backend.'.$user->data['private_situation']) }} </h4>

  </div>
</div>




<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.work_place')}}   </label>
    <h4 class="card-title">{{ $user->data['work_country']['country_name_ar'] }} - {{ $user->data['work_city']['title'] }}</h4>

  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.work_start_at')}}   </label>
    <h4 class="card-title">{{ $user->data['work_start_at'] }} </h4>

  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.job')}}   </label>
    <h4 class="card-title">{{ $user->data['job'] }} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
  <label for="projectinput3">  {{__('backend.job_type')}}   </label>
    <h4 class="card-title">{{ __('backend.'.$user->data['job_type']) }} </h4>

  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.department')}}   </label>
@if(isset($user->data->department['title']))
    <h4 class="card-title">{{ $user->data->department['title'] }} </h4>
 @endif
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.direct_manager')}}   </label>
@if(isset($user->data->manager['name']))
    <h4 class="card-title">{{ $user->data->manager['name'] }} </h4>
  @endif
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.work_days')}}  </label>

    <h4 class="card-title">
@if(isset($user->data->work_days))
    @foreach( json_decode($user->data->work_days, true)   as $day  )
    -  {{ __('backend.'.$day)  }} 
    @endforeach
 @endif
    </h4>
 
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{ __('backend.work_time')}}   </label>

    <h4 class="card-title">

    
@if(isset($user->data->work_times))
    @foreach( json_decode($user->data->work_times, true)   as $k=>$time  )
    @if( $k == 'from_2')
     </br>
     @endif

     {{ __('backend.'.str_replace('_1','', str_replace('_2','', $k ) )) }} : {{ $time  }} 

    @endforeach
@endif
    </h4>
 
  </div>
</div>
@if(isset($user->data->work_times))
@php
$from_1 = \Carbon\Carbon::createFromFormat('H:s', json_decode($user->data->work_times, true)['from_1'] ?? '00:00');
$to_1 = \Carbon\Carbon::createFromFormat('H:s', json_decode($user->data->work_times, true)['to_1'] ?? '00:00');
$from_2 = \Carbon\Carbon::createFromFormat('H:s', json_decode($user->data->work_times, true)['from_2'] ?? '00:00');
$to_2 = \Carbon\Carbon::createFromFormat('H:s', json_decode($user->data->work_times, true)['to_2'] ?? '00:00');
$diff_in_hours = $to_1->diffInHours($from_1) + $to_2->diffInHours($from_2);
@endphp
@endif

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.total_working_hours_daily')}}   </label>

    <h4 class="card-title"> {{ $diff_in_hours ?? '' }}  </h4>
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.total_working_hours_weelky')}}   </label>
@if(isset($user->data->work_days))
    <h4 class="card-title"> {{ $diff_in_hours * count(json_decode($user->data->work_days, true)) }}  </h4>
 @endif
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.total_salary')}}   </label>

    <h4 class="card-title">{{ $user->data['total_salary'] }} </h4>
 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.basic_salary')}}   </label>

    <h4 class="card-title">{{ $user->data['basic_salary'] }} </h4>
 
  </div>
</div>



<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.housing_allowance')}}   </label>

    <h4 class="card-title">{{ $user->data['housing_allowance'] }} </h4>
 
  </div>
</div>

<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.transportation_allowance')}}   </label>

    <h4 class="card-title">{{ $user->data['transportation_allowance'] }} </h4>
 
  </div>
</div>


<div class="col-md-4">
  <div class="form-group">
    <label for="projectinput3">  {{__('backend.other_allowance')}}   </label>

    <h4 class="card-title">{{ $user->data['other_allowance'] }} </h4>
 
  </div>
</div>






  
</div>

</div>   



 


<div class="tab-pane" id="custodies" role="tabpanel" aria-labelledby="custodies-tab2"
                      aria-expanded="false">

<div class="row">

<table id="users-contacts" style='width:100%;' class="table datatable table-hover table-responsive">
                        <thead>
                          <tr>

                          
                            <th>  {{__('backend.custody')}}  </th>
                            <th>  {{__('backend.custody_type')}} </th>
                            <th> {{__('backend.custody_expiry_date')}}   </th>
                            <th> {{__('backend.custody_note')}}  </th>

                          </tr>
                        </thead>
                        <tbody>


@foreach( $user->employee_custodies as $custody)

                          <tr>
                          <td>{{$custody->custody['title']}}</td>
                          <td>{{ __('backend.'.$custody->custody_type) }}</td>
                          <td>{{$custody->custody_expiry_date}} </td>
                          <td>{{$custody->custody_note}}</td>
                            
                            

                          </tr>

@endforeach


                        
                      </table>


</div>


</div>  










		  
</div>















	  
</div>


















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

        <title> {{ __('backend.employees') }}  | {{config('settings.sitename')}}</title>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/forms/selects/select2.min.css">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/vendors.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/weather-icons/climacons.min.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/fonts/meteocons/style.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/chartist.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
  <!-- END VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/app-assets/css-rtl/plugins/forms/checkboxes-radios.css">
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
  <script src="{{url('')}}/assets/app-assets/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
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
  <script src="{{url('')}}/assets/app-assets/js/scripts/forms/checkbox-radio.js" type="text/javascript"></script>
 <!-- BEGIN PAGE LEVEL JS-->
 <script src="{{url('')}}/assets/app-assets/js/scripts/forms/select/form-select2.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->


<script>


$(document).ready(function(){

$('select[name="customer"]').on('change', function() {
var customer = $(this).val();
if(customer != 0){
$("#new_registration").hide();
$("#tools").show();

$("#assessment_products_doctor").attr("href","{{url('')}}/{{config('settings.BackendPath')}}/assessment_products_doctor/"+customer);

$("#assessment_products_delegate").attr("href","{{url('')}}/{{config('settings.BackendPath')}}/assessment_products_delegate/"+customer);

$("#pricing").attr("href","{{url('')}}/{{config('settings.BackendPath')}}/assessment_pricing/"+customer);

} else {
  $("#new_registration").show(); 
  $("#tools").hide();
}
  
        });

      });
  
</script>

@endsection