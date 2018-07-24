@extends('layouts.main')

@section('content')

    <!--Main Slider-->
    <section class="main-slider-two">
        <div class="tp-banner-container">
            <div class="tp-banner-two">
                <ul>
                    <!-- slider 1 -->
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="images/slider/3.jpg" data-saveperformance="off" data-title="Awesome Title Here">
                        <img src="/images/slider/3.jpg" alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <div class="tp-caption sfl sfb tp-resizeme" data-x="left" data-hoffset="15" data-y="center" data-voffset="-140" data-speed="1500" data-start="500" data-easing="easeOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.3" data-endspeed="1200" data-endeasing="Power4.easeIn">
                            <div class="title-top">{{ $aboutMe[ 'last_name' ] }} {{ $aboutMe[ 'first_name' ] }}</div>
                        </div>
                        <div class="tp-caption sfl sfb tp-resizeme" data-x="left" data-hoffset="15" data-y="center" data-voffset="-50" data-speed="1500" data-start="500" data-easing="easeOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.3" data-endspeed="1200" data-endeasing="Power4.easeIn">
                            <div class="title">{{ $aboutMe[ 'professional' ] }}</div>
                        </div>
                        <div class="tp-caption sfl sfb tp-resizeme" data-x="left" data-hoffset="15" data-y="center" data-voffset="50" data-speed="1500" data-start="1000" data-easing="easeOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.3" data-endspeed="1200" data-endeasing="Power4.easeIn">
                            <div class="text">BCurrently available for select projects, collaborations and consulting.Currently
                                <br /> available for select projects, collaborations and consulting.</div>
                        </div>
                        <div class="tp-caption sfl sfb tp-resizeme" data-x="left" data-hoffset="15" data-y="center" data-voffset="120" data-speed="1500" data-start="1500" data-easing="easeOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.3" data-endspeed="1200" data-endeasing="Power4.easeIn">
                            <div class="tp-btn">
                                <a href="#" class="btn-one">See My work</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </section>
    <!-- main slider end -->
    <!-- about style two -->
    <section class="about-style-two">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-12 about-column">
                    <div class="img-content">
                        <figure><img src="/images/about/1.jpg" alt=""></figure>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-12 about-column">
                    <div class="about-content">
                        <div class="top-title">Привет, меня зовут {{ $aboutMe[ 'first_name' ] }} {{ $aboutMe[ 'last_name' ] }}</div>
                        <div class="title">{{ $aboutMe[ 'professional' ] }}</div>
                        <div class="text">
                            <p>{{ $aboutMe[ 'full_about_me' ] }}</p>
                        </div>
                        <div class="progress-content">

                            @foreach ($professionalSkills as $skill)

                                <div class="progress-item">
                                    <div class="progress-text">{{ $skill->name }}</div>
                                    <div class="progress" data-value="{{ $skill->value }}">
                                        <div class="progress-bar" style="background-color: {{ $skill->color_bar }}" role="progressbar" aria-valuenow="{{ $skill->value }}" aria-valuemin="0" aria-valuemax="100">
                                            <div class="value-holder"><span class="value"></span>%</div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about style two end -->
    <!-- view resume -->
    <section class="view-resume centred">
        <div class="container">
            <div class="sec-title"><h2>Мое резюме</h2></div>
            <div class="button"><a href="#" class="btn-one">Загрузить</a></div>
        </div>
    </section>
    <!-- view resume -->
    <!-- gallery section -->
    <!-- <section class="gallery-section centred gallery-style-two">
        <div class="container">
            <div class="gallery-title">
                <div class="sec-title">
                    <h2>Recent Work</h2></div>
            </div>
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
                                <img src="/images/gallery/g1.jpg" alt="">
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
                                <img src="/images/gallery/g2.jpg" alt="">
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
                                <img src="/images/gallery/g3.jpg" alt="">
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
                                <img src="/images/gallery/g6.jpg" alt="">
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
                                <img src="/images/gallery/g4.jpg" alt="">
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
                                <img src="/images/gallery/g5.jpg" alt="">
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
                                <img src="/images/gallery/g9.jpg" alt="">
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
                                <img src="/images/gallery/g7.jpg" alt="">
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
                                <img src="/images/gallery/g8.jpg" alt="">
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
        </div>
    </section> -->
    <!-- gallery section end -->
    <!-- subscribe section -->
    <section class="subscribe-section subscribe-style-two sec-pad">
        <div class="container">
            <div class="subscribe-title centred">
                <div class="sec-title"><h2>Написать мне</h2></div>
            </div>
            <div class="subscribe-form">
                <form id="contact-form" name="contact_form" class="default-form" action="" method="post">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <input type="text" name="form_name" value="" placeholder="Ваше имя" required="">
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <input type="email" name="form_email" value="" placeholder="Ваш email" required="">
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <input type="text" name="form_phone" value="" placeholder="Сайт" required="">
                        </div>
                        <div class="colo-md-12 col-sm-12 col-xs-12">
                            <input type="text" name="form_subject" value="" placeholder="Тема" required="">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <textarea placeholder="Ваше сообщение" name="form_message" required=""></textarea>
                        </div>
                    </div>
                    <div class="subscribe-btn centred">
                        <button type="submit" class="btn-one" data-loading-text="Please wait...">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- subscribe section end -->

    @include('layouts.parts.small_footer')

@stop