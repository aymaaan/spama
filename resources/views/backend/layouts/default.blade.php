<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>

 @yield('head')

<link rel="apple-touch-icon" sizes="57x57" href="{{url('/assets/favicon/apple-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="60x60" href="{{url('/assets/favicon/apple-icon-60x60.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{url('/assets/favicon/apple-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="76x76" href="{{url('/assets/favicon/apple-icon-76x76.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{url('/assets/favicon/apple-icon-114x114.png')}}">
<link rel="apple-touch-icon" sizes="120x120" href="{{url('/assets/favicon/apple-icon-120x120.png')}}">
<link rel="apple-touch-icon" sizes="144x144" href="{{url('/assets/favicon/apple-icon-144x144.png')}}">
<link rel="apple-touch-icon" sizes="152x152" href="{{url('/assets/favicon/apple-icon-152x152.png')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{url('/assets/favicon/apple-icon-180x180.png')}}">
<link rel="icon" type="image/png" sizes="192x192"  href="{{url('/assets/favicon/android-icon-192x192.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{url('/assets/favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{url('/assets/favicon/favicon-96x96.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{url('/assets/favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{url('/assets/favicon/manifest.json')}}">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{url('/assets/favicon/ms-icon-144x144.png')}}">
<meta name="theme-color" content="#ffffff">
<link href="http://spama.com/image/catalog/spama 16-01-01.png" rel="icon" />

</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">

@include('backend.includes.header')
@include('backend.includes.sidebar')
@yield('content')
@include('backend.includes.footer')
@yield('scripts')




<script type="text/javascript" src="{{ url('') }}/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="{{ url('') }}/tinymce/tinymce_editor.js"></script>

<script type="text/javascript">
editor_config.selector = "textarea.body_editor";
editor_config.path_absolute = "{{ url('') }}/";
tinymce.init(editor_config);
</script>




</body>
</html>
