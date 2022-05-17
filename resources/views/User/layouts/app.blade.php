<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title') - IT CKC</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../user/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="../../user/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="../../user/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../../user/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../../user/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="../../user/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="../../user/plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="../../user/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="../../user/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="../../user/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="../../user/css/style.css" rel="stylesheet">

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{route('user.home')}}">
                    <b class="logo-abbr"><h4 style="color: white;">IT</h4> </b>
                    <span class="logo-compact"><h4 style="color: white;">IT CKC</h4></span>
                    <span class="brand-title">
                        <h4 style="color: white;">IT CKC</h4>
                    </span>
                </a>
            </div>
            
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('user.layouts.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('user.layouts.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">BaoTriCaoThang</a> 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="../../user/plugins/common/common.min.js"></script>
    <script src="../../user/js/custom.min.js"></script>
    <script src="../../user/js/settings.js"></script>
    <script src="../../user/js/gleek.js"></script>
    <script src="../../user/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="../../user/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="../../user/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="../../user/plugins/d3v3/index.js"></script>
    <script src="../../user/plugins/topojson/topojson.min.js"></script>
    <script src="../../plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="../../user/plugins/raphael/raphael.min.js"></script>
    <script src="../../user/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="../../user/plugins/moment/moment.min.js"></script>
    <script src="../../user/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="../../user/plugins/chartist/js/chartist.min.js"></script>
    <script src="../../user/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <script src="../../user/js/dashboard/dashboard-1.js"></script>

    <!-- Clock -->
    <script src="../../user/plugins/moment/moment.js"></script>
    <script src="../../user/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="../../user/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="../../user/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="../../user/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="../../user/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="../../user/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="../../user/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../../user/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="../../user/js/plugins-init/form-pickers-init.js"></script>
    <!-- /Clock -->

</body>

</html>