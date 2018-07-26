@extends('layouts.main')

@section('title')

{{ $metaTitle }}

@stop
@section('meta-keywords')

{{ $metaKeywords }}

@stop
@section('meta-description')

{{ $metaDescription }}

@stop

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
                        <div class="text">{{ $aboutMe[ 'location' ] }}</div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 contact-column">
                    <div class="single-item">
                        <div class="icon-box"><i class="flaticon-technology"></i></div>

                        @foreach (json_decode($aboutMe[ 'phones' ]) as $phone)

                            <div class="text"><a href="callto:{{ $phone }}">{{ $phone }}</a></div>

                        @endforeach

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 contact-column">
                    <div class="single-item">
                        <div class="icon-box"><i class="flaticon-e-mail-envelope"></i></div>

                        @foreach (json_decode($aboutMe[ 'emails' ]) as $email)

                            <div class="text"><a href="mailto:{{ $email }}">{{ $email }}</a></div>

                        @endforeach

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

    @include('contact_form')

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