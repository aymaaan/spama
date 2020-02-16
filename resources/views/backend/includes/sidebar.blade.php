

  <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
 
        <br>
        
        <li class=" nav-item  {{ ( Request::is(config('settings.BackendPath')) ? 'active open' : '' ) }}"><a href="{{url(config('settings.BackendPath'))}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.footers.main"> {{ __('backend.home') }} </span></a>
          
 
@foreach( $sidebar_menus as $main_menu)
@can($main_menu->name)
        <li class=" nav-item"><a href="#"><i class="la la-server"></i><span class="menu-title" data-i18n="nav.components.main">{{ __('backend.'.$main_menu->name) }}</span></a>
          <ul class="menu-content">
            
@foreach( $main_menu->menus as $menu)
@can($menu->name)

<li class=" menu-item {{ ( Request::is(config('settings.BackendPath').'/'.$menu->name , config('settings.BackendPath').'/'.$menu->name.'/*') ? 'active open' : '' ) }}"><a href="{{url(config('settings.BackendPath').'/'.$menu->name)}}"><i class="{{$menu->icon}}">
</i><span class="menu-title" data-i18n="nav.footers.main">{{ __('backend.'.$menu->name) }} </span></a></li>
@endcan
@endforeach


          </ul>
        </li>
@endcan
@endforeach
      
      
      
      </li>






      </ul>
    </div>
  </div>