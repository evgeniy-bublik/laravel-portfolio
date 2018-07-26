@extends('layouts.main')

@section('content')

    <!-- page title -->
    <section class="page-title">
        <div class="container">
            <div class="bread-crumb">
                <div class="left-content">Детали поста</div>
                <div class="right-content"><a href="{{ route('index') }}">Главная &nbsp;<i class="fa fa-angle-right"></i></a> &nbsp;Детали поста</div>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <!-- blog classic -->
    <section class="blog-details news-section blog-page sidebar-page-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 content-side">
                    <div class="blog-details-content">
                        <div class="content-style-one">

                            @if ($post->image)

                                <div class="img-box">
                                    <figure><img src="{{ asset($post->imageUrl) }}" alt="{{ $post->name }}"></figure>
                                </div>

                            @endif

                            <div class="single-item">
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
                            <div class="title">{{ $post->name }}</div>
                            <div class="text">{!! $post->description !!}</div>
                        </div>
                        <div class="post-share-option">
                            <div class="share-title">Поделиться :</div>
                            <ul class="post-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="active"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>

                        @if ($post->relatedPosts->count())

                            <div class="related-post">
                                <div class="blog-title-text"><h4>Похожие записи</h4></div>
                                <div class="row">

                                    @foreach ($post->relatedPosts as $relatedPost)

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="single-item">

                                                @if ($relatedPost->image)

                                                    <div class="single-item-overlay">
                                                        <div class="img-box">
                                                            <img src="{{ asset($relatedPost->imageUrl) }}" alt="{{ $relatedPost->name }}">
                                                            <div class="overlay">
                                                                <div class="inner-box">
                                                                    <div class="content">
                                                                        <a href="{{ route('posts.item', ['slug' => $relatedPost->slug]) }}"><i class="fa fa-link"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif

                                                <div class="lower-content">
                                                    <div class="title"><a href="{{ route('posts.item', ['slug' => $relatedPost->slug]) }}">{{ $relatedPost->name }}</a></div>
                                                    <div class="text">
                                                        <p>{{ $relatedPost->small_description }}</p>
                                                    </div>
                                                </div>
                                                <div class="bottom-content">
                                                    <ul class="meta">
                                                        <li class="img-box">
                                                            <figure><img src="{{ $aboutMe[ 'link_photo_for_posts' ]}}" alt=""></figure>
                                                        </li>
                                                        <li>{{ $aboutMe[ 'first_name' ] }} {{ $aboutMe[ 'last_name' ] }}</li>
                                                        <li>{{ $relatedPost->humanDate }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                            </div>

                        @endif
                        @if ($post->comments_count)

                            <div class="comment-area">
                                <div class="blog-title-text"><h4>Оставленных комментариев [ {{ $post->comments_count }} ]</h4></div>

                                @foreach ($post->comments as $comment)

                                    <div class="single-comment">
                                        <div class="comment-img">
                                            <figure><img class="img-responsive" src="/images/noavatar.png" alt=""></figure>
                                        </div>
                                        <div class="title">{{ $comment->user_name }}</div>
                                        <div class="time">{{ $comment->humanDate }}</div>
                                        <div class="text">
                                            <p>{{ $comment->text }}</p>
                                        </div>
                                </div>

                                @endforeach

                            </div>

                        @endif

                        <div class="comment-form">
                            <div class="blog-title-text"><h4>Оставить комментарий</h4></div>
                            <form id="comment-form" name="contact_form" class="default-form" action="{{ route('posts.add.comment', compact('post')) }}" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="user_name" value="" placeholder="Имя" required="">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="user_email" value="" placeholder="Email" required="">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea placeholder="Текст" name="text" required=""></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn-one" data-loading-text="Please wait...">Оставить</button>
                            </form>
                        </div>
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

                                    <li><a href="{{ route('posts.by.category', ['categorySlug' => $category->slug]) }}">{{ $category->name }} <span>({{ $category->posts_count }})</span></a></li>

                                @endforeach

                            </ul>
                        </div>
                        <div class="sidebar-tag sidebar-wideget">
                            <div class="sidebar-title"><h5>Теги</h5></div>
                            <ul class="tag-list">

                                @foreach ($post->tags as $tag)

                                    <li><a href="{{ route('posts.by.tag', ['tagSlug' => $tag->slug]) }}">{{ $tag->name }}</a></li>

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
