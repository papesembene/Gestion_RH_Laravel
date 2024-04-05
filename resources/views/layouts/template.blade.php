
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Meta -->

    <link rel="shortcut icon" href="{{asset('assets/images/favicon.svg')}}" />

    <!-- Title -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

    <!-- *************
        ************ Common Css Files *************
    ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />

    <!-- Bootstrap font icons css -->
    <link rel="stylesheet" href="{{asset('assets/fonts/bootstrap/bootstrap-icons.css')}}" />

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}" />

    <!-- *************
        ************ Vendor Css Files *************
    ************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/overlay-scroll/OverlayScrollbars.min.css')}}" />
</head>

<body>

<!-- Page wrapper start -->
<div class="page-wrapper">

    <!-- Page header starts -->
    @include('layouts.topbar')
    <!-- Page header ends -->

    <!-- Main container start -->
    <div class="main-container">

        <!-- Sidebar wrapper start -->
        <nav class="sidebar-wrapper">

            <!-- Sidebar brand starts -->
            <div class="brand">
    <a href="#" class="logo" style="color: white; text-decoration: none; font-weight: bold; font-size: 24px;">
        RH SYSTEM
    </a>
</div>

            <!-- Sidebar brand ends -->

            <!-- Sidebar menu starts -->
            @include('layouts.sidebar')
            <!-- Sidebar menu ends -->

        </nav>
        <!-- Sidebar wrapper end -->

        <!-- Content wrapper scroll start -->
        <div class="content-wrapper-scroll">

            <!-- Main header starts -->
            <div class="main-header d-flex align-items-center justify-content-between position-relative">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="page-icon">
                        <i class="bi bi-house"></i>
                    </div>
                    <div class="page-title d-none d-md-block">
                        <h5>Welcome back, {{Auth::user()->name}}</h5>
                    </div>
                </div>
                <!-- Live updates start -->
                <ul class="updates d-flex align-items-end flex-column overflow-hidden" id="updates">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="bi bi-envelope-paper text-red font-1x me-2"></i>
                            <span>12 emails from David Michaiah.</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="bi bi-bar-chart text-blue font-1x me-2"></i>
                            <span>15 new features updated successfully.</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="bi bi-folder-check text-yellow font-1x me-2"></i>
                            <span>The media folder is created successfully.</span>
                        </a>
                    </li>
                </ul>
                <!-- Live updates end -->
            </div>
            <!-- Main header ends -->

            <!-- Content wrapper start -->
            <div class="content-wrapper">
            @yield('content')
                <!-- Row start -->


            </div>
            <!-- Content wrapper end -->

        </div>
        <!-- Content wrapper scroll end -->

        <!-- App Footer start -->
        <div class="app-footer">
            <span>© M. SEM'S </span>
        </div>
        <!-- App footer end -->

    </div>
    <!-- Main container end -->

</div>
<!-- Page wrapper end -->

<!-- *************
    ************ Required JavaScript Files *************
************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/modernizr.js')}}"></script>
<script src="{{asset('assets/js/moment.js')}}"></script>

<!-- *************
    ************ Vendor Js Files *************
************* -->

<!-- Overlay Scroll JS -->
<script src="{{asset('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('assets/vendor/overlay-scroll/custom-scrollbar.js')}}"></script>

<!-- News ticker -->
<script src="{{asset('assets/vendor/newsticker/newsTicker.min.js')}}"></script>
<script src="{{asset('assets/vendor/newsticker/custom-newsTicker.js')}}"></script>

<!-- Apex Charts -->
<script src="{{asset('assets/vendor/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/vendor/apex/custom/dash2/revenue.js')}}"></script>
<script src="{{asset('assets/vendor/apex/custom/dash2/analytics.js')}}"></script>
<script src="{{asset('assets/vendor/apex/custom/dash2/sparkline.js')}}"></script>
<script src="{{asset('assets/vendor/apex/custom/dash2/sales.js')}}"></script>
<script src="{{asset('assets/vendor/apex/custom/dash2/reports.js')}}"></script>

<!-- Vector Maps -->
<script src="{{asset('assets/vendor/jvectormap/jquery-jvectormap-2.0.5.min.js')}}"></script>
<script src="{{asset('assets/vendor/jvectormap/world-mill-en.js')}}"></script>
<script src="{{asset('assets/vendor/jvectormap/gdp-data.js')}}"></script>
<script src="{{asset('assets/vendor/jvectormap/continents-mill.js')}}"></script>
<script src="{{asset('assets/vendor/jvectormap/custom/world-map-markers4.js')}}"></script>

<!-- Rating JS -->
<script src="{{asset('assets/vendor/rating/raty.js')}}"></script>
<script src="{{asset('assets/vendor/rating/raty-custom.js')}}"></script>

<!-- Main Js Required -->
<script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
