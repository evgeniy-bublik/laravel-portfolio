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

                        @foreach ($posts as $post)

                            <div class="single-item">
                                <div class="single-item-overlay">
                                    <div class="img-box">

                                        @if ($post->image)

                                            <img src="{{ asset($post->imageUrl) }}" alt="{{ $post->name }}">
                                            <div class="overlay">
                                                <div class="inner-box">
                                                    <div class="content">
                                                        <a href="{{ route('posts.item', ['slug' => $post->slug]) }}"><i class="fa fa-link"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                        @endif

                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="title"><a href="{{ route('posts.item', ['slug' => $post->slug]) }}">{{ $post->name }}</a></div>
                                    <div class="text">
                                        <p>{{ $post->small_description }}</p>
                                    </div>
                                </div>
                                <div class="bottom-content">
                                    <ul class="meta">
                                        <li class="img-box">
                                            <figure><img src="{{ $aboutMe[ 'link_photo_for_posts' ]}}" alt=""></figure>
                                        </li>
                                        <li>{{ $aboutMe[ 'first_name' ] }} {{ $aboutMe[ 'last_name' ] }}</li>
                                        <li>{{ $post->humanDate }}</li>
                                    </ul>
                                    <ul class="meta meta-right">
                                        <li><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;&nbsp; {{ $post->comments_count }} Комментариев</li>
                                        <li><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp; {{ $post->unique_views }}</li>
                                    </ul>
                                </div>
                            </div>

                        @endforeach

                        {{ $posts->links() }}

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
                            <div class="sidebar-title"><h5>Категории</h5></div>
                            <ul class="categories-list">

                                @foreach ($categories as $category)

                                    <li><a href="{{ route('posts.by.category', ['categorySlug' => $category->slug]) }}" class="{{ ($category->id = $activeCategoryId) ? 'active' : '' }}">{{ $category->name }} <span>({{ $category->posts_count }})</span></a></li>

                                @endforeach

                            </ul>
                        </div>
                        <div class="sidebar-tag sidebar-wideget">
                            <div class="sidebar-title">
                                <h5>Теги</h5></div>
                            <ul class="tag-list">

                                @foreach ($listTags as $tag)

                                   <li><a href="{{ route('posts.by.tag', ['tagSlug' => $tag->slug]) }}" class="{{ ($tag->id = $activeTagId) ? 'active' : '' }}">{{ $tag->name }}</a></li>

                                @endforeach

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