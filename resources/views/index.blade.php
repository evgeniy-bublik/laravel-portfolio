@extends('layouts.main')

@section('title')
    {{ $metaDto->getTitle() }}
@stop

@section('meta-keywords')
    {{ $metaDto->getKeywords() }}
@stop

@section('meta-description')
    {{ $metaDto->getDescription() }}
@stop

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
                                <a href="{{ route('portfolio.index') }}" class="btn-one">Мои работы</a>
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
            <div class="button"><a target="blank" href="{{ $aboutMe[ 'сurriculum_vitae_link' ] }}" class="btn-one">Загрузить</a></div>
        </div>
    </section>
    <!-- view resume -->

    @if ($portfolioWorks->count())

        <!-- gallery section -->
        <section class="gallery-section centred gallery-style-two">
            <div class="container">
                <div class="gallery-title">
                    <div class="sec-title"><h2>Последние работы</h2></div>
                </div>
                <ul class="post-filter centred ">
                    <li class="active" data-filter=".filter-item">
                        <span>Все</span>
                    </li>

                    @foreach ($portfolioCategories as $category)

                        <li data-filter=".category-{{ $category->id }}">
                            <span>{{ $category->name }}</span>
                        </li>

                    @endforeach

                </ul>
                <div class="row masonary-layout filter-layout">

                    @foreach ($portfolioWorks as $work)

                        <div class="col-md-4 col-sm-6 col-xs-12 filter-item category-{{ $work->category_id }}">
                            <div class="single-item">
                                <div class="single-item-overlay">
                                    <div class="img-box">
                                        <img src="{{ asset($work->imageUrl) }}" alt="{{ $work->name }}">
                                        <div class="overlay">
                                            <div class="inner-box">
                                                <div class="content">
                                                    <div class="title">{{ $work->name }}</div>
                                                    <div class="text">{{ $work->category->name }}</div>
                                                    <ul>
                                                        <li><a href="{{ route('portfolio.item', ['itemSlug' => $work->slug]) }}"><i class="fa fa-link"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>
        <!-- gallery section end -->

    @endif

    @include('contact_form')

    @include('layouts.parts.small_footer')

@stop