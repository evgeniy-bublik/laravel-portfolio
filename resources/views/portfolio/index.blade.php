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
                <div class="left-content">Портфолио</div>
                <div class="right-content"><a href="{{ route('index') }}">Главная &nbsp;<i class="fa fa-angle-right"></i></a> &nbsp;Портфолио</div>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- gallery section -->
    <section class="gallery-section centred portfolio-page gallery-style-two">
        <div class="container">

            @if ($works->count())

                <ul class="post-filter centred ">
                    <li class="active" data-filter=".filter-item">
                        <span>Все</span>
                    </li>

                    @foreach ($categories as $category)

                        <li data-filter=".category-{{ $category->id }}">
                            <span>{{ $category->name }}</span>
                        </li>

                    @endforeach

                </ul>
                <div class="row masonary-layout filter-layout">

                    @foreach ($works as $work)

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

                {{ $works->links() }}

            @endif

        </div>
    </section>
    <!-- gallery section end -->

    @include('layouts.parts.extended_footer')

@stop