<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <!-- seo -->
     <meta name="description" content="@yield('description')">
    <meta name="keywords" content="singing, photoshoot,modelling,talent search">
    <meta name="author" content="curiouzmindTech">
    <!-- core css -->
    {{--<link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}">
    <!-- plugins css -->

    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="http://27colours.com/img/logo.png"/>

    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/owl.transition.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/AudioPlayer/css/audioplayer.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/videoplayer/video.css')}}">
    <link rel="stylesheet" href="{{asset('js/jcrop/jquery.Jcrop.min.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/jackedup.css')}}" media="screen"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/selectize.css')}}"/>


    <!-- custom global css -->
    {{--<link rel="stylesheet" href="{{asset('css/style.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.1.0/css/font-awesome.css')}}">
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:500,300,700,400' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('header')
</head>

