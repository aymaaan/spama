<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>

 <?php echo $__env->yieldContent('head'); ?>

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(url('/assets/favicon/apple-icon-57x57.png')); ?>">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(url('/assets/favicon/apple-icon-60x60.png')); ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(url('/assets/favicon/apple-icon-72x72.png')); ?>">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(url('/assets/favicon/apple-icon-76x76.png')); ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(url('/assets/favicon/apple-icon-114x114.png')); ?>">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(url('/assets/favicon/apple-icon-120x120.png')); ?>">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(url('/assets/favicon/apple-icon-144x144.png')); ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(url('/assets/favicon/apple-icon-152x152.png')); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(url('/assets/favicon/apple-icon-180x180.png')); ?>">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo e(url('/assets/favicon/android-icon-192x192.png')); ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(url('/assets/favicon/favicon-32x32.png')); ?>">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(url('/assets/favicon/favicon-96x96.png')); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('/assets/favicon/favicon-16x16.png')); ?>">
<link rel="manifest" href="<?php echo e(url('/assets/favicon/manifest.json')); ?>">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo e(url('/assets/favicon/ms-icon-144x144.png')); ?>">
<meta name="theme-color" content="#ffffff">
<link href="http://spama.com/image/catalog/spama 16-01-01.png" rel="icon" />

</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">

<?php echo $__env->make('backend.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('backend.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('backend.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('scripts'); ?>




<script type="text/javascript" src="<?php echo e(url('')); ?>/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo e(url('')); ?>/tinymce/tinymce_editor.js"></script>

<script type="text/javascript">
editor_config.selector = "textarea.body_editor";
editor_config.path_absolute = "<?php echo e(url('')); ?>/";
tinymce.init(editor_config);
</script>




</body>
</html>
