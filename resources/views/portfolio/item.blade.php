@extends('layouts.main')

@section('content')

    <!-- page title -->
    <section class="page-title">
        <div class="container">
            <div class="bread-crumb">
                <div class="left-content">Детали портфолио</div>
                <div class="right-content"><a href="{{ route('index') }}">Главная &nbsp;<i class="fa fa-angle-right"></i></a> &nbsp;Детали портфолио</div>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- portfolio details -->
    <section class="portfolio-details portfolio-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="portfolio-details-content">
                        <div class="img-box">
                            <figure><img src="images/gallery/details.jpg" alt=""></figure>
                        </div>
                        <div class="title">Home interior decoration</div>
                        <div class="text">
                            <p>Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheetsStandard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets</p>
                            <p>Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets</p>
                            <p>Standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
                        </div>
                        <div class="post-share">
                            <div class="share">Share :</div>
                            <ul class="post-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="portfolio-sidebar">
                        <div class="sidebar-content">
                            <div class="title">
                                <h5>Project Details</h5></div>
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-social"></i></div>
                                <div class="text">Client:</div>
                                <p>Index, INC</p>
                            </div>
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-calendar-with-spring-binder-and-date-blocks"></i></div>
                                <div class="text">Date:</div>
                                <p>November, 15 2016</p>
                            </div>
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-location"></i></div>
                                <div class="text">Location:</div>
                                <p>Melbourne VIC 3000 city</p>
                            </div>
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-agenda"></i></div>
                                <div class="text">Category:</div>
                                <p>Designing / Branding</p>
                            </div>
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-shapes"></i></div>
                                <div class="text">Share:</div>
                                <p>Facebook, Twitter</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- portfolio details -->

    @include('layouts.parts.extended_footer')

@stop