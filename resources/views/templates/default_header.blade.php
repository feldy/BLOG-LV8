<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="description" content="Developed By Dispusip DKI Jakarta">
<meta name="author" content="dispusip">
<meta name="keywords" content="Artikel, Archive, Dosir, Dossier, Dispusip">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="img/favicon.ico">

<title>Dosir Dispusip</title>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
<link href="{{ asset('assets/plugins/socicon/socicon.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/bootstrap-social/bootstrap-social.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/animate/animate.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN: BASE PLUGINS  -->
<link href="{{ asset('assets/plugins/revo-slider/css/settings.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/cubeportfolio/css/cubeportfolio.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/owl-carousel/owl.theme.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/owl-carousel/owl.transitions.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/fancybox/jquery.fancybox.css') }}" rel="stylesheet" type="text/css"/>
<!-- END: BASE PLUGINS -->
<!-- BEGIN THEME STYLES -->
<link href="{{ asset('assets/base/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/base/css/components.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/base/css/themes/default.css') }}" rel="stylesheet" id="style_theme" type="text/css"/>
<link href="{{ asset('assets/base/css/custom.css') }}" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
{{-- custom --}}
{{--<link href="{{ asset('css/custom.css') }} " rel="stylesheet">--}}
@yield('stylesheets')
