<header class="main-header header-style-one">
    <!-- main header -->
    <div class="header-lower">
        <div class="container">
            <div class="logo-box">
                <a href="{{ route('index') }}">
                    <figure><img src="/images/home/logo.png" alt=""></figure>
                </a>
            </div>
            <div class="menu-bar">
                <nav class="main-menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li><a href="{{ route('index') }}">Главная</a></li>
                            <li><a href="{{ route('portfolio.index') }}">Портфолио</a></li>
                            <li><a href="{{ route('articles.index') }}">Блог</a></li>
                            <li><a href="{{ route('contacts') }}">Контакты</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="nav-toggler">
                    <button class="hidden-bar-opener"><span class="icon fa fa-bars"></span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end header lower -->
    <!--sticky header-->
    <div class="sticky-header">
        <div class="container">
            <div class="logo-box">
                <a href="{{ route('index') }}">
                    <figure><img src="/images/home/logo.png" alt=""></figure>
                </a>
            </div>
            <div class="menu-bar">
                <nav class="main-menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li><a href="{{ route('index') }}">Главная</a></li>
                            <li><a href="{{ route('portfolio.index') }}">Портфолио</a></li>
                            <li><a href="{{ route('articles.index') }}">Блог</a></li>
                            <li><a href="{{ route('contacts') }}">Контакты</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="nav-toggler">
                    <button class="hidden-bar-opener"><span class="icon fa fa-bars"></span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- end sticky header -->
</header>