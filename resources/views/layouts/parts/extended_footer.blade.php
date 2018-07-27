<footer class="main-footer-area">
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 footer-column">
                    <div class="logo-wideget footer-wideget">
                        <div class="footer-logo">
                            <a href="{{ route('index') }}">
                                <figure><img src="/images/footer/footer-logo.png" alt=""></figure>
                            </a>
                        </div>
                        <div class="text">Nulla ut ex tempor, volutpat quam sed, mattis nibh. Maecenas a ultrices ante. Integer libero dui, vulputate sed.</div>
                        <div class="follow">Подпишись на меня :</div>
                        <ul class="footer-social">

                            @foreach ($socialLinks as $link)

                                <li><a href="{{ $link->link }}" target="_blank"><i class="{{ $link->additional_classes }}"></i></a></li>

                            @endforeach

                        </ul>
                    </div>
                </div>

                @if ($latestPosts)

                    <div class="col-md-4 col-sm-6 col-xs-12 footer-column">
                        <div class="update-wideget footer-wideget">
                            <div class="footer-title">Последние записи</div>

                            @foreach ($latestPosts as $latestPost)

                                <div class="single-box">
                                    <div class="text"><a href="{{ route('posts.item', ['slug' => $latestPost->slug]) }}">{{ $latestPost->name }}</a></div>
                                    <div class="comment">{{ $latestPost->comments_count }} Комментариев</div>
                                </div>

                            @endforeach

                        </div>
                    </div>

                @endif

                <div class="col-md-3 col-sm-6 col-xs-12 footer-column">
                    <div class="gallery-wideget footer-wideget">
                        <div class="footer-title">Последние работы</div>

                        @foreach ($latestWorks as $latestWork)

                            <div class="single-box">
                                <div class="text"><a href="{{ route('portfolio.item', ['itemSlug' => $latestWork->slug]) }}">{{ $latestWork->name }}</a></div>
                            </div>

                        @endforeach

                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12 footer-column">
                    <div class="link-wideget footer-wideget">
                        <div class="footer-title">Меню</div>
                        <ul class="list">
                            <li><a href="{{ route('portfolio.index') }}">Портфолио</a></li>
                            <li><a href="{{ route('contacts') }}">Контакты</a></li>
                            <li><a href="{{ route('posts.index') }}">Блог</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-bottom centred">
            <div class="copyright">Copyright © {{ (date('Y') == 2018) ? 2018 : 2018 - date('Y')}}. Все права защищены.</div>
        </div>
    </div>
</footer>
