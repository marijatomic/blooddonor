<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300, 400, 700" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets1/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/css/jquery.timepicker.css')}}">

    <link rel="stylesheet" href="{{asset('assets1/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets1/fonts/flaticon/font/flaticon.css')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets1/css/style.css')}}">
</head>
<body>
    <div id="app">



        <main class="py-4">



            @yield('content')
        </main>
    </div>
    <script src="{{asset('assets1/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets1/js/popper.min.js')}}"></script>
    <script src="{{asset('assets1/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets1/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets1/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets1/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('assets1/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets1/js/main.js')}}"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
        });
    </script>

    @stack('scripts')
</body>
</html>
