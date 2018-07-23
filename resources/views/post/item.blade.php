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
                            <div class="img-box">
                                <figure><img src="/images/news/details.jpg" alt=""></figure>
                            </div>
                            <div class="single-item">
                                <div class="bottom-content">
                                    <ul class="meta">
                                        <li class="img-box">
                                            <figure><img src="/images/news/3.png" alt=""></figure>
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
                            <div class="title">Professional level of Animation to Branding</div>
                            <div class="text">
                                <p>Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei an pericula euripidis, hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an. Passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>
                            </div>
                            <div class="text-bg">Making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, com- bined with a handful of model sentence.</div>
                            <div class="text">
                                <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary. </p>
                            </div>
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
                        <div class="related-post">
                            <div class="blog-title-text">
                                <h4>Related Posts</h4></div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-item">
                                        <div class="single-item-overlay">
                                            <div class="img-box">
                                                <img src="/images/news/1.jpg" alt="">
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
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do ...</p>
                                            </div>
                                        </div>
                                        <div class="bottom-content">
                                            <ul class="meta">
                                                <li class="img-box">
                                                    <figure><img src="/images/news/1.png" alt=""></figure>
                                                </li>
                                                <li>By : David Warner</li>
                                                <li>Mar 25, 2017</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-item">
                                        <div class="single-item-overlay">
                                            <div class="img-box">
                                                <img src="/images/news/2.jpg" alt="">
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
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do ...</p>
                                            </div>
                                        </div>
                                        <div class="bottom-content">
                                            <ul class="meta">
                                                <li class="img-box">
                                                    <figure><img src="/images/news/1.png" alt=""></figure>
                                                </li>
                                                <li>By : David Warner</li>
                                                <li>Mar 25, 2017</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-area">
                            <div class="blog-title-text">
                                <h4>rECENT Comments [ 02 ]</h4></div>
                            <div class="single-comment">
                                <div class="comment-img">
                                    <figure><img src="/images/news/c1.png" alt=""></figure>
                                </div>
                                <div class="title">James warner</div>
                                <div class="time">Mar 03, 2017</div>
                                <div class="replay"><a href="#">Reply<i class="fa fa-reply" aria-hidden="true"></i></a></div>
                                <div class="text">
                                    <p>Fish don't fry in the kitchen and beans don't burn on the grill. Took a whole lotta burn on the grill. Took a whole lotta tryin' just. Took a whole lotta burn on the grill. Took a whole lotta tryin' just.</p>
                                </div>
                            </div>
                            <div class="single-comment">
                                <div class="comment-img">
                                    <figure><img src="/images/news/c2.png" alt=""></figure>
                                </div>
                                <div class="title">Robert Lee</div>
                                <div class="time">Mar 05, 2017</div>
                                <div class="replay"><a href="#">Reply<i class="fa fa-reply" aria-hidden="true"></i></a></div>
                                <div class="text">
                                    <p>Fish don't fry in the kitchen and beans don't burn on the grill. Took a whole lotta burn on the grill. Took a whole lotta tryin' just. Took a whole lotta burn on the grill. Took a whole lotta tryin' just.</p>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <div class="blog-title-text">
                                <h4>Leave a reply</h4></div>
                            <form id="contact-form" name="contact_form" class="default-form" action="inc/sendmail.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="form_name" value="" placeholder="Name" required="">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="form_email" value="" placeholder="Email" required="">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea placeholder="Message" name="form_message" required=""></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn-one" data-loading-text="Please wait...">SEND YOUR MESSAGE</button>
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
