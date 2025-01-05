<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <!-- Tambahkan di bagian <head> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('') }}admin/assets/css/remixicon.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/assets/css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/assets/css/sidebar-menu.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/assets/css/simplebar.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/assets/css/apexcharts.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/assets/css/prism.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/assets/css/rangeslider.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/assets/css/sweetalert.min.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/assets/css/quill.snow.css">
    <link rel="stylesheet" href="{{ asset('') }}admin/assets/css/style.css">

    <link rel="icon" type="image/png" href="{{ asset('') }}admin/assets/images/logopgcandibaru.png">

    <title>admin</title>
</head>

<body>
    <!-- Tambahkan sebelum </body> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <div class="preloader" id="preloader">
        <div class="preloader">
            <div class="waviy position-relative">
                <span class="d-inline-block">P</span>
                <span class="d-inline-block">G</span>
                <span class="d-inline-block">.</span>
                <span class="d-inline-block">C</span>
                <span class="d-inline-block">A</span>
                <span class="d-inline-block">N</span>
                <span class="d-inline-block">D</span>
                <span class="d-inline-block">I</span>
                <span class="d-inline-block">B</span>
                <span class="d-inline-block">A</span>
                <span class="d-inline-block">R</span>
                <span class="d-inline-block">U</span>
            </div>
        </div>
    </div>


    @include('layout.sidebar')
    @include('layout.header')

    @yield('content')

    </div>
    </div>


    <footer class="footer-area bg-white text-center rounded-top-10">
        <p class="fs-14">© <span class="text-primary">IT</span> anak magang <a href="https://hibootstrap.com/"
                target="_blank" class="text-decoration-none">PG.CANDI BARU</a></p>
    </footer>

    </div>
    </div>


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}admin/assets/js/sidebar-menu.js"></script>
    <script src="{{ asset('') }}admin/assets/js/dragdrop.js"></script>
    <script src="{{ asset('') }}admin/assets/js/rangeslider.min.js"></script>
    <script src="{{ asset('') }}admin/assets/js/sweetalert.js"></script>
    <script src="{{ asset('') }}admin/assets/js/quill.min.js"></script>
    <script src="{{ asset('') }}admin/assets/js/data-table.js"></script>
    <script src="{{ asset('') }}admin/assets/js/prism.js"></script>
    <script src="{{ asset('') }}admin/assets/js/clipboard.min.js"></script>
    <script src="{{ asset('') }}admin/assets/js/feather.min.js"></script>
    <script src="{{ asset('') }}admin/assets/js/simplebar.min.js"></script>
    <script src="{{ asset('') }}admin/assets/js/apexcharts.min.js"></script>
    <script src="{{ asset('') }}admin/assets/js/amcharts.js"></script>
    <script src="{{ asset('') }}admin/assets/js/custom/ecommerce-chart.js"></script>
    <script src="{{ asset('') }}admin/assets/js/custom/custom.js"></script>
</body>

</html>
