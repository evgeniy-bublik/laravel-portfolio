@extends('layouts.main')

@section('content')

    <!-- page title -->
    <section class="page-title">
        <div class="container">
            <div class="bread-crumb">
                <div class="left-content">Портфолио</div>
                <div class="right-content"><a href="{{ route('index') }}">Главная &nbsp;<i class="fa fa-angle-right"></i></a> &nbsp;Портфолио</div>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- gallery section -->
    <section class="gallery-section centred portfolio-page gallery-style-two">
        <div class="container">
            <ul class="post-filter centred ">
                <li class="active" data-filter=".filter-item">
                    <span>All</span>
                </li>
                <li data-filter=".Consulting">
                    <span>Digital</span>
                </li>
                <li data-filter=".Finance">
                    <span>Barnding</span>
                </li>
                <li data-filter=".Marketing">
                    <span>Marketing</span>
                </li>
                <li data-filter=".Growth">
                    <span>Video</span>
                </li>
            </ul>
            <div class="row masonary-layout filter-layout">
                <div class="col-md-4 col-sm-6 col-xs-12 filter-item">
                    <div class="single-item">
                        <div class="single-item-overlay">
                            <div class="img-box">
                                <img src="images/gallery/g1.jpg" alt="">
                                <div class="overlay">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="title">Home Decoration</div>
                                            <div class="text">Branding</div>
                                            <ul>
                                                <li><a href="{{ route('portfolio.item') }}"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 filter-item Consulting Finance Growth">
                    <div class="single-item">
                        <div class="single-item-overlay">
                            <div class="img-box">
                                <img src="images/gallery/g2.jpg" alt="">
                                <div class="overlay">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="title">Home Decoration</div>
                                            <div class="text">Branding</div>
                                            <ul>
                                                <li><a href="{{ route('portfolio.item') }}"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 filter-item Finance Growth Marketing">
                    <div class="single-item">
                        <div class="single-item-overlay">
                            <div class="img-box">
                                <img src="images/gallery/g3.jpg" alt="">
                                <div class="overlay">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="title">Home Decoration</div>
                                            <div class="text">Branding</div>
                                            <ul>
                                                <li><a href="{{ route('portfolio.item') }}"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 filter-item Consulting Marketing Finance">
                    <div class="single-item">
                        <div class="single-item-overlay">
                            <div class="img-box">
                                <img src="images/gallery/g6.jpg" alt="">
                                <div class="overlay">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="title">Home Decoration</div>
                                            <div class="text">Branding</div>
                                            <ul>
                                                <li><a href="{{ route('portfolio.item') }}"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 filter-item Consulting Marketing">
                    <div class="single-item">
                        <div class="single-item-overlay">
                            <div class="img-box">
                                <img src="images/gallery/g4.jpg" alt="">
                                <div class="overlay">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="title">Home Decoration</div>
                                            <div class="text">Branding</div>
                                            <ul>
                                                <li><a href="{{ route('portfolio.item') }}"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 filter-item Consulting Finance Marketing video">
                    <div class="single-item">
                        <div class="single-item-overlay">
                            <div class="img-box">
                                <img src="images/gallery/g5.jpg" alt="">
                                <div class="overlay">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="title">Home Decoration</div>
                                            <div class="text">Branding</div>
                                            <ul>
                                                <li><a href="{{ route('portfolio.item') }}"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 filter-item Marketing video">
                    <div class="single-item">
                        <div class="single-item-overlay">
                            <div class="img-box">
                                <img src="images/gallery/g9.jpg" alt="">
                                <div class="overlay">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="title">Home Decoration</div>
                                            <div class="text">Branding</div>
                                            <ul>
                                                <li><a href="{{ route('portfolio.item') }}"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 filter-item Marketing video">
                    <div class="single-item">
                        <div class="single-item-overlay">
                            <div class="img-box">
                                <img src="images/gallery/g7.jpg" alt="">
                                <div class="overlay">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="title">Home Decoration</div>
                                            <div class="text">Branding</div>
                                            <ul>
                                                <li><a href="{{ route('portfolio.item') }}"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 filter-item Marketing video">
                    <div class="single-item">
                        <div class="single-item-overlay">
                            <div class="img-box">
                                <img src="images/gallery/g8.jpg" alt="">
                                <div class="overlay">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="title">Home Decoration</div>
                                            <div class="text">Branding</div>
                                            <ul>
                                                <li><a href="{{ route('portfolio.item') }}"><i class="fa fa-link"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="link-btn">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li><a href="#" class="active">2</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>
    </section>
    <!-- gallery section end -->

    @include('layouts.parts.extended_footer')

@stop