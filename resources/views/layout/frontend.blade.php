<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <title>Dashboard - Maulidina</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('template/dist/css/app.css') }}" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
      
        <div class="flex">
            
            
           @yield('content')

        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ asset('template/dist/js/app.js') }}"></script>
        
        <!-- END: JS Assets-->
    </body>
</html>