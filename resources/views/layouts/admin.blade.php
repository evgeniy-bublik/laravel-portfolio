<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Droopy I Fast build Admin dashboard for any platform</title>
        <meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
        <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
        <meta name="author" content="hencework"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link href="/admin-assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">

        @yield('css')

        <!-- Custom CSS -->
        <link href="/admin-assets/dist/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->
        <div class="wrapper  theme-3-active pimary-color-green">

            @include('layouts.parts.admin.top_nav')

            @include('layouts.parts.admin.sidebar_left')

            @include('layouts.parts.admin.sidebar_right')

            <!-- Main Content -->
            <div class="page-wrapper">

                @yield('content')

                <!-- Footer -->
                <footer class="footer container-fluid pl-30 pr-30">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>2018 &copy; Droopy. Pampered by Hencework</p>
                        </div>
                    </div>
                </footer>
                <!-- /Footer -->
            </div>
            <!-- /Main Content -->
        </div>
        <!-- /#wrapper -->
        <!-- JavaScript -->
        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="/admin-assets/dist/js/bootstrap.min.js"></script>
        <!-- Counter Animation JavaScript -->
        <script src="/admin-assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="/admin-assets/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
        <!-- Data table JavaScript -->
        <script src="/admin-assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="/admin-assets/dist/js/productorders-data.js"></script>
        <!-- Owl JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <!-- Switchery JavaScript -->
        <script src="/admin-assets/vendors/bower_components/switchery/dist/switchery.min.js"></script>
        <!-- Slimscroll JavaScript -->
        <script src="/admin-assets/dist/js/jquery.slimscroll.js"></script>
        <!-- Fancy Dropdown JS -->
        <script src="/admin-assets/dist/js/dropdown-bootstrap-extended.js"></script>
        <!-- Sparkline JavaScript -->
        <script src="/admin-assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- EChartJS JavaScript -->
        <script src="/admin-assets/vendors/bower_components/echarts/dist/echarts-en.min.js"></script>
        <!-- Init JavaScript -->
        <script src="/admin-assets/dist/js/init.js"></script>

        @yield('js')

    </body>
</html>