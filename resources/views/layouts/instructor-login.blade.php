<html>
    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>

        <meta name="theme-color" content="#4285f4">

        <meta name="description" content="A description of the page">
      
        <meta property="fb:app_id" content="123456789">
        <meta property="og:url" content="http://example.com/page.html">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Content Title">
        <meta property="og:image" content="http://example.com/image.jpg">
        <meta property="og:description" content="Description Here">
        <meta property="og:site_name" content="Site Name">
        <meta property="og:locale" content="en_US">
        <meta property="article:author" content="">
      
      
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@site_account">
        <meta name="twitter:creator" content="@individual_account">
        <meta name="twitter:url" content="http://example.com/page.html">
        <meta name="twitter:title" content="Content Title">
        <meta name="twitter:description" content="Content description less than 200 characters">
        <meta name="twitter:image" content="http://example.com/image.jpg">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.24.1/sweetalert2.min.css">

        <link href="{{ asset('/admin/css/admin-app.css') }}" rel="stylesheet">
    
        @yield('links')

    </head>
    <body class="kill-padding">

                    @yield('content')

            
                    <script
                    src="https://code.jquery.com/jquery-3.3.1.min.js"
                    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                    crossorigin="anonymous"></script>
                  
                    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.24.1/sweetalert2.min.js"></script>

                  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js"></script>

                  <script type="text/javascript" src="{{asset('/admin/js/admin-vendor.js')}}"></script>
                  <script type="text/javascript" src="{{asset('/admin/js/main-admin.js')}}"></script>
            
        @yield('scripts')


    </body>
</html>