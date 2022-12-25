<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" >
    @yield('styles')
    <style>
        a {
            text-decoration: none !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('frontend.partials.navbar')
    <div class="content">
        @yield('content')
    </div>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal({
                title: "Done",
                text: "{{ session('status') }}",
                icon: "success",
                button: "OK",
            });
        </script> @endif
    @yield('scripts')
</body>

</html>
