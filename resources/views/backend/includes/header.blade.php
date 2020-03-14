

<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="la la-bars"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="{{url('')}}">
              <img style="width: 100%;" class="brand-logo"  alt="modern admin logo" src="{{url(config('settings.logo'))}}">
              
            </a>
          </li>
          
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">


          
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">مرحبا ,
                  <span class="user-name text-bold-700">{{ strstr(Auth::user()->name, ' ', true) }} </span>
                </span>
                <span class="avatar avatar-online">
                  <img style='width:36px;height:36px;'  src="{{url('')}}/assets/backend/users/images/default.png" alt="avatar"><i></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{url('/logout')}}"><i class="lnr lnr-lock"></i> الخروج </a>
              </div>
            </li>



            <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"><i class="la la-globe"></i><span class="selected-language"></span></a>
              <div class="dropdown-menu" aria-labelledby="dropdown-flag">

              @foreach($AppLanguagesHeader as $AppLanguage)
              <a class="dropdown-item" href="{{url('')}}/language/{{$AppLanguage->code}}"> {{$AppLanguage->title}} </a>
              @endforeach
                
               
               
              </div>
            </li>




            <li class="dropdown dropdown-language nav-item"><a  data-toggle="modal" data-target="#settings_user" class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="la la-cog"></i><span class="selected-language"></span>
              </a>
            </li>





          </ul>



          <ul class="nav navbar-nav mr-auto float-left">
 
          <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">وصول سريع</a>
            <ul class="mega-dropdown-menu dropdown-menu row">

            <li class="col-md-2">

              @can('roles')
                <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> 
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/roles">
                الصلاحيات
               </a>
              </h6> 
              @endcan



              <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> 
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/">
                عنصر جديد
               </a>
              </h6>


              <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> 
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/">
                عنصر جديد
               </a>
              </h6>



              <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> 
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/">
                عنصر جديد
               </a>
              </h6>

              </li>


              <li class="col-md-2">


              <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> 
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/">
                عنصر جديد
               </a>
              </h6>


              <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> 
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/">
                عنصر جديد
               </a>
              </h6>



              <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> 
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/">
                عنصر جديد
               </a>
              </h6>

              </li>







              <li class="col-md-2">


              <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> 
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/">
                عنصر جديد
               </a>
              </h6>


              <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> 
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/">
                عنصر جديد
               </a>
              </h6>



              <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="la la-newspaper-o"></i> 
                <a href="{{url('')}}/{{config('settings.BackendPath')}}/">
                عنصر جديد
               </a>
              </h6>

              </li>

             
            </ul>
          </li>
         
        </ul>
        </div>
      </div>
    </div>

    <a href="{{ url()->previous() }}">
    <button class="btn btn-success btn">
    <i class="icon-action-undo"></i>   {{ __('backend.back') }}      </button>
    </a>


  </nav>



  <!-- Modal -->
<div class="modal fade" id="settings_user" tabindex="-1" role="dialog" aria-labelledby="settings_user" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="settings_user">{{ __('backend.settings') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



{!! Form::open([ 'url' => config('settings.BackendPath').'/user/update_settings', 'role' => 'form' , 'class' => 'form' ,  'files' => 'true' ]) !!}  

<div class="form-body">



<div class="row">
                          
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="projectinput1"> <B> {{ __('backend.display_arabic_content') }}  </B>   </label>

<input @if( Auth::user()->display_content_ar == 1 ) checked @endif name='display_content_ar' value='1' type="checkbox"  class="input-chk" data-checkbox="icheckbox_square-purple">

                             
                            </div>
                          </div>

                          </div>

</div>

<div class="row">
                          
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="projectinput1"> <B> {{ __('backend.display_english_content') }}  </B>   </label>

<input @if( Auth::user()->display_content_en == 1 ) checked @endif name='display_content_en' value='1' type="checkbox"  class="input-chk" data-checkbox="icheckbox_square-purple">

                             
                            </div>
                          </div>

                          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('backend.close') }}</button>
        <button type="submit" type="button" class="btn btn-primary"> {{ __('backend.save') }}  </button>
      </div>

      {!!Form::close()!!}


    </div>


  </div>
</div>