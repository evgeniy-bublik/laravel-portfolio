<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ryazan | Responsive HTML 5 Template</title>
    <!-- Stylesheets -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/responsive.css" rel="stylesheet">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
</head>
<!-- page wrapper -->

<body class="page-wrapper">
    <!-- .preloader -->
    <div class="preloader"></div>

    @include('layouts.parts.header')

    <!-- Hidden Bar -->
    <section class="hidden-bar right-align">
        <div class="hidden-bar-closer">
            <button class="btn"><i class="fa fa-close"></i></button>
        </div>
        <div class="hidden-bar-wrapper">
            <!-- .logo -->
            <div class="logo-box centerd">
                <a href="index.html"></a>
            </div>
            <div class="about-hidden-box">
                <div class="title">
                    <h4>About Us</h4></div>
                <div class="text">We must explain to you how all seds this mistakens idea off denouncing pleasures and praising pain was born and I will give you a completed accounts off the system and expound the actually teaching of the great explorer ut of the truth, the master builder of human happiness.</div>
                <a href="#" class="btn-one btn-bg">More About</a>
            </div>
            <div class="contact-hidden-box">
                <div class="title">
                    <h4>Contact Info</h4></div>
                <div class="single-item">
                    <div class="icon-box"><i class="fa fa-map-marker"></i></div>
                    <div class="text">68 Smithfield Avenue,
                        <br /> Broadwalk</div>
                </div>
                <div class="single-item">
                    <div class="icon-box"><i class="fa fa-phone"></i></div>
                    <div class="text">+ (01) 735 264 9870</div>
                </div>
                <div class="single-item">
                    <div class="icon-box"><i class="fa fa-envelope"></i></div>
                    <div class="text">ryazan@gmail.com</div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Hidden Bar end -->

    @yield('content')

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-angle-up"></span></div>
    <!--jquery js -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="/js/validation.js"></script>
    <script src="/js/isotope.js"></script>
    <script src="/js/jquery.fancybox.pack.js"></script>
    <script src="/js/SmoothScroll.js"></script>
    <script src="/js/jquery.appear.js"></script>
    <script src="/js/jquery.countTo.js"></script>
    <!-- revolution -->
    <script src="/js/revolution.min.js"></script>
    <script src="/js/script.js"></script>
    <!-- End of .page_wrapper -->

    @yield('js')

</body>

</html>