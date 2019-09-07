<html>


<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title')</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#01273f">
    <meta name="msapplication-TileColor" content="#01273f">
    <meta name="theme-color" content="#01273f">


    <meta name="description" content="Zidni Islamic Institute">

    <!-- Force IE 8/9/10 to use its latest rendering engine -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta property="og:image:width" content="1418">
    <meta property="og:image:height" content="742">
    <meta property="og:description" content="An Accredited Branch of the Islamic University of Minnesota">
    <meta property="og:title" content="Zidni Islamic Institute">
    <meta property="og:url" content="https://zidniaccess.com/">
    <meta property="og:image" content="/og-image.jpg">


    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@site_account">
    <meta name="twitter:creator" content="@individual_account">
    <meta name="twitter:url" content="https://zidniaccess.com/">
    <meta name="twitter:title" content="Zidni Islamic Institute">
    <meta name="twitter:description" content="An Accredited Branch of the Islamic University of Minnesota">
    <meta name="twitter:image" content="/og-image.jpg">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
        integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.24.1/sweetalert2.min.css">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">


    @if (($locale = App::getLocale()) === 'ar')
        <link href="{{asset('/css/ar-university.css')}}" rel="stylesheet">
    @endif



    @yield('links')




</head>

<body>

    


    @include('university.components.navbar')




    @yield('contant')




    
    @include('university.components.footer')




    @yield('scripts')


</body>

</html>