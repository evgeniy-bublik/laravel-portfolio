@extends('layouts.main')

@section('content')

    <!-- page title -->
    <section class="page-title">
        <div class="container">
            <div class="bread-crumb">
                <div class="left-content">Мои контакты</div>
                <div class="right-content"><a href="{{ route('index') }}">Главная &nbsp;<i class="fa fa-angle-right"></i></a> &nbsp;Контакты</div>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- contact info -->
    <section class="contact-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 contact-column">
                    <div class="single-item">
                        <div class="icon-box"><i class="flaticon-placeholder"></i></div>
                        <div class="text">г. Чернигов</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 contact-column">
                    <div class="single-item">
                        <div class="icon-box"><i class="flaticon-technology"></i></div>
                        <div class="text">+380935994767</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 contact-column">
                    <div class="single-item">
                        <div class="icon-box"><i class="flaticon-e-mail-envelope"></i></div>
                        <div class="text">evgeniy.bublik1992@gmail.com</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact info end -->
    <!-- google map -->
    <section class="google-map-section">
        <div class="container">
            <div id="google-map-area" style="height: 400px">
            </div>
        </div>
    </section>
    <!-- google map end -->
    <!-- contact section -->
    <section class="contact-section">
        <div class="container">
            <div class="sec-title centred">
                <h2>Keep In Touch</h2></div>
            <div class="form-area">
                <form id="contact-form" name="contact_form" class="default-form" action="inc/sendmail.php" method="post">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <input type="text" name="form_name" value="" placeholder="Your Name" required="">
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <input type="email" name="form_email" value="" placeholder="Your Email" required="">
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <input type="text" name="form_Subject" value="" placeholder="Website" required="">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="form_Phone" value="" placeholder="Subject" required="">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <textarea placeholder="Type Your Message Here . . ." name="form_message" required=""></textarea>
                        </div>
                    </div>
                    <div class="contact-btn centred">
                        <button type="submit" class="btn-one" data-loading-text="Please wait...">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- contact section end -->

    @include('layouts.parts.extended_footer')

@stop

@section('js')

    @parent

    <script>
        function map() {
            // The location of Uluru
            var chernigov = {lat: 51.493847, lng: 31.294741};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('google-map-area'), {zoom: 15, center: chernigov});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: chernigov, map: map});
      }

    </script>
    <script async defer src='https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=map'></script>

@stop