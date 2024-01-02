<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GIS Sekolah</title>

    <link rel="stylesheet" href="{{ asset('assets/admin/css/nucleo-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/nucleo-svg.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/argon-dashboard.css?v=2.0.4') }}" id="pagestyle" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Plus+Jakarta+Sans:wght@700;800&display=swap">
    <link href="{{ asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/custom-style.css') }}" rel="stylesheet">

    {{-- datatables link --}}
    <link href="{{ asset('assets/admin/vendor/datatables.net-bs-5/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'DM Sans', sans-serif;
        }
    </style>

</head>

<body class="g-sidenav-show">

    <main class="main-content position-relative border-radius-lg">
        @yield('navbar')
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/global/js/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/chartjs.min.js') }}"></script>

    <script src="{{ asset('assets/admin/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables.net-bs-5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/helpers/datatables.js') }}"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
    <script src="{{ asset('assets/global/js/helpers/alert.js') }}"></script>
    <script src="{{ asset('assets/global/js/helpers/global.js') }}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/admin/js/argon-dashboard.min.js?v=2.0.4') }}"></script>

    @stack('script')

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
</body>

</html>