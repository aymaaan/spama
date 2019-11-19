

  <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
 
        <br>
        
        <li class=" nav-item  <?php echo e(( Request::is(config('settings.BackendPath')) ? 'active open' : '' )); ?>"><a href="<?php echo e(url(config('settings.BackendPath'))); ?>"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.footers.main"> <?php echo e(__('backend.home')); ?> </span></a>
          
        </li>

<?php $__currentLoopData = $sidebar_menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($menu->name)): ?>
<li class=" nav-item <?php echo e(( Request::is(config('settings.BackendPath').'/'.$menu->name , config('settings.BackendPath').'/'.$menu->name.'/*') ? 'active open' : '' )); ?>"><a href="<?php echo e(url(config('settings.BackendPath').'/'.$menu->name)); ?>"><i class="<?php echo e($menu->icon); ?>">
</i><span class="menu-title" data-i18n="nav.footers.main"><?php echo e(__('backend.'.$menu->name)); ?> </span></a></li>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



      </ul>
    </div>
  </div>