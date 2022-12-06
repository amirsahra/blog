<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>@yield('title')</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="{{asset('panel/dist/img/favicon.ico')}}" type="image/x-icon">

    <!-- livewire -->
    @livewireStyles

    <!-- vector map CSS -->
    <link href="{{asset('panel/vendors/vectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="{{asset('panel/vendors/jquery-toggles/css/toggles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('panel/vendors/jquery-toggles/css/themes/toggles-light.css')}}" rel="stylesheet" type="text/css">

    <!-- Toastr CSS -->
    <link href="{{asset('panel/vendors/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{asset('panel/dist/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Preloader -->
<div class="preloader-it">
    <div class="loader-pendulums"></div>
</div>
<!-- /Preloader -->

<!-- HK Wrapper -->
<div class="hk-wrapper hk-vertical-nav">

    <!-- Top Navbar -->
    @include('partials.panel.top-navbar')
    <!-- /Top Navbar -->

    <!-- Vertical Nav -->
    @include('partials.panel.vertical-navbar')
    <!-- /Vertical Nav -->

    <!-- Setting Panel -->

    <!-- /Setting Panel -->
    @include('partials.panel.setting-panel')
    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container mt-xl-50 mt-sm-30 mt-15">
            <!-- Row -->
            <div class="row">
                <div class="col-xl-12">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /Container -->

        <!-- Footer -->
        @include('partials.panel.footer')
        <!-- /Footer -->
    </div>
    <!-- /Main Content -->

</div>
<!-- /HK Wrapper -->

<!-- jQuery -->
<script src="{{asset('panel/vendors/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('panel/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('panel/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{asset('panel/dist/js/jquery.slimscroll.js')}}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{asset('panel/dist/js/dropdown-bootstrap-extended.js')}}"></script>

<!-- FeatherIcons JavaScript -->
<script src="{{asset('panel/dist/js/feather.min.js')}}"></script>

<!-- Toggles JavaScript -->
<script src="{{asset('panel/vendors/jquery-toggles/toggles.min.js')}}"></script>
<script src="{{asset('panel/dist/js/toggle-data.js')}}"></script>

<!-- Counter Animation JavaScript -->
<script src="{{asset('panel/vendors/waypoints/lib/jquery.waypoints.min.js')}}}"></script>
<script src="{{asset('panel/vendors/jquery.counterup/jquery.counterup.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{asset('panel/vendors/raphael/raphael.min.js')}}"></script>
<script src="{{asset('panel/vendors/morris.js/morris.min.js')}}"></script>

<!-- EChartJS JavaScript -->
<script src="{{asset('panel/vendors/echarts/dist/echarts-en.min.js')}}"></script>

<!-- Sparkline JavaScript -->
<script src="{{asset('panel/vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>

<!-- Vector Maps JavaScript -->
<script src="{{asset('panel/vendors/vectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script src="{{asset('panel/vendors/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('panel/dist/js/vectormap-data.js')}}"></script>

<!-- Owl JavaScript -->
<script src="{{asset('panel/vendors/owl.carousel/dist/owl.carousel.min.js')}}"></script>

<!-- Toastr JS -->
<script src="{{asset('panel/vendors/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>

<!-- Tinymce JavaScript -->
<script src="{{asset('panel/vendors/tinymce/tinymce.min.js/')}}"></script>

<!-- Tinymce Wysuhtml5 Init JavaScript -->
<script src="{{asset('panel/dist/js/tinymce-data.js')}}"></script>

<!-- Init JavaScript -->
<script src="{{asset('panel/dist/js/init.js')}}"></script>
<script src="{{asset('panel/dist/js/dashboard-data.js')}}"></script>

<!-- livewire JavaScript -->
@livewireScripts


</body>

</html>
