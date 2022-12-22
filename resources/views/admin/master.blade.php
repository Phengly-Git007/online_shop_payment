<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('admin.partials.navbar')

        @include('admin.partials.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0 text-primary">@yield('header')</h5>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item">@yield('action')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>

        @include('admin.partials.footer')

    </div>

    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/sparklines/sparkline.js') }}"></script>
    {{-- <script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    <script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
    {{-- <script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('message'))
        <script>
            // swal("{{ session('status') }}")
            swal({
                title: "Done",
                text: "{{ session('message') }}",
                icon: "success",
                button: "OK",
            });
        </script>
    @endif
    @yield('scripts')
</body>

</html>
