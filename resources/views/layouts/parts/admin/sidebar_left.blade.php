<!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="{{ route('admin.index') }}">
                <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Главная</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#admin_portfolio">
                <div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Портфолио</span></div>
                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="admin_portfolio" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('admin.portfolio.categories.index') }}">Категории</a>
                </li>
                <li>
                    <a href="{{ route('admin.portfolio.works.index') }}">Работы</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#admin_blog">
                <div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Блог</span></div>
                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="admin_blog" class="collapse collapse-level-1">
                <li>
                    <a href="{{ route('admin.blog.categories.index') }}">Категории</a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.tags.index') }}">Теги</a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.posts.index') }}">Посты</a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.comments.index') }}">Комментарии</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('admin.about.me.edit') }}">
                <div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">Обо мне</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.social_links.index') }}">
                <div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">Социальные ссылки</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.professional_skills.index') }}">
                <div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">Проф. навыки</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.pages.index') }}">
                <div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">СЕО</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.support.messages.index') }}">
                <div class="pull-left"><i class="zmdi zmdi-flag mr-20"></i><span class="right-nav-text">Support</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <hr class="light-grey-hr mb-10"/>
        </li>
    </ul>
</div>
<!-- /Left Sidebar Menu -->
