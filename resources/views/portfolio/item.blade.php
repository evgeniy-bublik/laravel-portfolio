@extends('layouts.main')

@section('title')

{{ $work->meta_title }}

@stop
@section('keywords')

{{ $work->meta_keywords }}

@stop
@section('description')

{{ $work->meta_description }}

@stop

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
                            <figure><img src="{{ asset($work->imageUrl) }}" alt="{{ $work->name }}"></figure>
                        </div>
                        <div class="title">{{ $work->name }}</div>
                        <div class="text">{{ $work->description }}</div>
                        <div class="post-share">
                            <div class="share">Поделиться :</div>
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
                            <div class="title"><h5>Детали работы</h5></div>
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-calendar-with-spring-binder-and-date-blocks"></i></div>
                                <div class="text">Дата:</div>
                                <p>{{ $work->humanDate }}</p>
                            </div>
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-layers"></i></div>
                                <div class="text">Категория:</div>
                                <p>{{ $work->category->name }}</p>
                            </div>
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-technology"></i></div>
                                <div class="text">Технологии:</div>
                                <p>{{ $work->technologies }}</p>
                            </div>
                            <div class="single-item">
                                <div class="icon-box"><i class="flaticon-shapes"></i></div>
                                <div class="text">Ссылка на сайт:</div>
                                <p><a href="{{ $work->url }}" target="_blank">{{ $work->name }}</a></p>
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