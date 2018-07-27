<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta-description', '')">
    <meta name="keywords" content="@yield('meta-keywords', '')">
    <title>@yield('title', '')</title>
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
                    <h4>Обо мне</h4></div>
                <div class="text">{{ $aboutMe[ 'full_about_me' ] }}</div>
            </div>
            <div class="contact-hidden-box">
                <div class="title">
                    <h4>Контактная информация</h4></div>
                <div class="single-item">
                    <div class="icon-box"><i class="fa fa-map-marker"></i></div>
                    <div class="text">{{ $aboutMe[ 'location' ] }}</div>
                </div>
                <div class="single-item">
                    <div class="icon-box"><i class="fa fa-phone"></i></div>

                    @foreach (json_decode($aboutMe[ 'phones' ]) as $phone)

                        <div class="text"><a href="callto:{{ $phone }}">{{ $phone }}</a></div>

                    @endforeach

                </div>
                <div class="single-item">
                    <div class="icon-box"><i class="fa fa-envelope"></i></div>

                    @foreach (json_decode($aboutMe[ 'emails' ]) as $email)

                        <div class="text"><a href="mailto:{{ $email }}">{{ $email }}</a></div>

                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- / Hidden Bar end -->

    @yield('content')

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-angle-up"></span></div>

    <div id="dynamic-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            </div>
        </div>
    </div>

    <!--jquery js -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="/js/isotope.js"></script>
    <script src="/js/jquery.fancybox.pack.js"></script>
    <script src="/js/SmoothScroll.js"></script>
    <script src="/js/jquery.appear.js"></script>
    <script src="/js/jquery.countTo.js"></script>
    <!-- revolution -->
    <script src="/js/revolution.min.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/main.js"></script>
    <!-- End of .page_wrapper -->

    @yield('js')

</body>

</html>