<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Marks Dessert Queen') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/company_logo.png') }}">

    <!-- plugin css -->
    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.min.css">
    <link href="{{ asset('assets/css/lightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>

    @include('includes.alertmessages')

    <div id="layout-wrapper">

        @yield('topbar_content')
        @yield('leftsidebar_content')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @yield('footer_content')
        </div>
    </div>

    @yield('rightsidebar_content')


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <!-- pace js -->
    <script src="{{ asset('assets/libs/pace-js/pace.min.js') }}"></script>
    {{-- icon --}}
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script  src="{{ asset('/assets/js/jquery-ui.min.js') }}"  type="text/javascript" ></script>
    <script src="{{ asset('/assets/js/select2.min.js') }}" type="text/javascript" ></script>
    <script  src="{{ asset('/assets/js/lightbox.min.js') }}"  type="text/javascript" ></script>

    <script>
        $('.select2').select2({
            placeholder: {
                id: '',
                text: '--Select--'
            },
            allowClear: true,
            language: {
                noResults: function (params) {
                    return "No Data Found!";
                }
            },
        });

        $( ".datepicker" ).datepicker(
            {
                dateFormat: 'yy-mm-dd'
            }
        );

        $( ".datepickerDMY" ).datepicker(
            {
                dateFormat: 'dd-mm-yy'
            }
        );
    </script>

    @stack('custom_scripts')

</body>
</html>
