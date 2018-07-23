@extends('layouts.main')

@section('content')

    <!-- page title -->
    <section class="page-title">
        <div class="container">
            <div class="bread-crumb">
                <div class="left-content">Блог</div>
                <div class="right-content"><a href="{{ route('index') }}">Главная &nbsp;<i class="fa fa-angle-right"></i></a> &nbsp;Блог</div>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- blog classic -->
    <section class="blog-classic news-section blog-page sidebar-page-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 content-side">
                    <div class="blog-classic-content">
                        <div class="single-item">
                            <div class="single-item-overlay">
                                <div class="img-box">
                                    <img src="/images/news/4.jpg" alt="">
                                    <div class="overlay">
                                        <div class="inner-box">
                                            <div class="content">
                                                <a href="{{ route('posts.item') }}"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="title"><a href="{{ route('posts.item') }}">DESIGNS THAT CHANGED THE WORLD FOR GOOD</a></div>
                                <div class="text">
                                    <p>Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. </p>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <ul class="meta">
                                    <li class="img-box">
                                        <figure><img src="/images/news/4.png" alt=""></figure>
                                    </li>
                                    <li>By : David Warner</li>
                                    <li>Mar 25, 2017</li>
                                </ul>
                                <ul class="meta meta-right">
                                    <li><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;&nbsp; 17 Comments</li>
                                    <li><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp; 50</li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="single-item-overlay">
                                <div class="img-box">
                                    <img src="/images/news/5.jpg" alt="">
                                    <div class="overlay">
                                        <div class="inner-box">
                                            <div class="content">
                                                <a href="{{ route('posts.item') }}"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="title"><a href="{{ route('posts.item') }}">ASPECT RATIO AND LIGHTENING IN PHOTO PRESENTATIONS</a></div>
                                <div class="text">
                                    <p>Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. </p>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <ul class="meta">
                                    <li class="img-box">
                                        <figure><img src="/images/news/5.png" alt=""></figure>
                                    </li>
                                    <li>By : Seth Rollins</li>
                                    <li>Mar 27, 2017</li>
                                </ul>
                                <ul class="meta meta-right">
                                    <li><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;&nbsp; 12 Comments</li>
                                    <li><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp; 32</li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="single-item-overlay">
                                <div class="img-box">
                                    <img src="/images/news/6.jpg" alt="">
                                    <div class="overlay">
                                        <div class="inner-box">
                                            <div class="content">
                                                <a href="{{ route('posts.item') }}"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="title"><a href="{{ route('posts.item') }}">Professional level of Animation to Branding</a></div>
                                <div class="text">
                                    <p>Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. </p>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <ul class="meta">
                                    <li class="img-box">
                                        <figure><img src="/images/news/6.png" alt=""></figure>
                                    </li>
                                    <li>By : Adam Rose </li>
                                    <li>Mar 27, 2017</li>
                                </ul>
                                <ul class="meta meta-right">
                                    <li><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;&nbsp; 13 Comments</li>
                                    <li><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp; 24</li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-item">
                            <div class="single-item-overlay">
                                <div class="img-box">
                                    <img src="/images/news/7.jpg" alt="">
                                    <div class="overlay">
                                        <div class="inner-box">
                                            <div class="content">
                                                <a href="{{ route('posts.item') }}"><i class="fa fa-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="title"><a href="{{ route('posts.item') }}">Recognizing the need is the primary for design.</a></div>
                                <div class="text">
                                    <p>Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. </p>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <ul class="meta">
                                    <li class="img-box">
                                        <figure><img src="/images/news/7.png" alt=""></figure>
                                    </li>
                                    <li>By : Dwyne Smith</li>
                                    <li>Apr 02, 2017</li>
                                </ul>
                                <ul class="meta meta-right">
                                    <li><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;&nbsp; 21 Comments</li>
                                    <li><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp; 35</li>
                                </ul>
                            </div>
                        </div>
                        <ul class="link-btn">
                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#" class="active">2</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 sidebar-side">
                    <div class="sidebar">
                        <div class="sidebar-search sidebar-wideget">
                            <div class="sidebar-title">
                                <h5>Поиск</h5></div>
                            <div class="search-box">
                                <form action="#">
                                    <input type="text" placeholder="Search...">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-categories sidebar-wideget">
                            <div class="sidebar-title">
                                <h5>Категории</h5></div>
                            <ul class="categories-list">
                                <li><a href="#">Arts & Crafts <span>(12)</span></a></li>
                                <li><a href="#">Designing <span>(22)</span></a></li>
                                <li><a href="#" class="active">Development <span>(18)</span></a></li>
                                <li><a href="#">Branding <span>(32)</span></a></li>
                                <li><a href="#">Identity <span>(21)</span></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-tag sidebar-wideget">
                            <div class="sidebar-title">
                                <h5>Теги</h5></div>
                            <ul class="tag-list">
                                <li><a href="#">Design</a></li>
                                <li><a href="#" class="active">Logo</a></li>
                                <li><a href="#">Icons</a></li>
                                <li><a href="#">Photography</a></li>
                                <li><a href="#">Identity</a></li>
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Develop</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog classic section end -->

    @include('layouts.parts.extended_footer')

@stop