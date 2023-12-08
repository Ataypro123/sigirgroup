<!doctype html>
<html lang="en">
    <head>
        @include('include.link')
        <title>ФИИТ | @yield('title')</title>
    </head>

    <body>
        <div class="header-wrapper">
            <div class="top-navbar w-nav" data-animation="default" data-collapse="none" data-contain="1" data-duration="400">
                <div class="w-container">
                    <nav class="top-nav-menu w-nav-menu" role="navigation">
                        <a class="top-nav-link w-inline-block" href="#">
                            <div class="icon top-nav-title"></div>
                            <div class="top-nav-title">+996(312) 32-31-04</div>
                        </a>
                        <a class="top-nav-link w-inline-block" href="#!">
                            <div class="icon top-nav-title"></div>
                            <div class="top-nav-title">fiitknu@mail.ru</div>
                        </a>
                    </nav>
                    <a class="top-bar-link w-hidden-small w-hidden-tiny" href="http://avn.knu.kg/" target="_blank">AVN</a>
                    <a class="top-bar-link w-hidden-small w-hidden-tiny" href="https://moodle.university.kg/login/index.php" target="_blank">ДОТ</a>
                    <div class="w-nav-button">
                        <div class="w-icon-nav-menu"></div>
                    </div>
                </div>
            </div>
            <div class="navbar w-nav" data-animation="over-right" data-collapse="medium" data-contain="1" data-doc-height="1" data-duration="400">
            <div class="w-container">
                <a class="logo-block w-nav-brand" href="{{route('pages.index')}}">
                    <img class="image-logo" sizes="(max-width: 479px) 93vw, (max-width: 767px) 171.109375px, (max-width: 991px) 192.5px, 235.28125px" src="{{asset('images/logo/logo-knu.png')}}" srcset="{{asset('images/logo/logo-knu.png')}}">
                </a>
                <nav class="nav-menu w-nav-menu" role="navigation">
                    <a class="nav-link w-nav-link {{request()->route()->getName() === 'pages.index' ? 'active-menu' : ''}}" href="{{route('pages.index')}}">
                        Главная
                    </a>
                    <div class="dropdown w-dropdown" data-delay="0" data-hover="1">
                        <div class="dropdown-toggle nav-link w-dropdown-toggle">
                            <div>Институт</div>
                            <div class="dropdown-icon w-icon-dropdown-toggle"></div>
                        </div>
                        <nav class="dropdown-list w-dropdown-list">
                            <a class="dropdown-link w-dropdown-link" href="{{route('pages.department.instruction')}}">Инструкции</a>
                            @foreach($subMenus as $sb)
                                <a class="dropdown-link w-dropdown-link" href="{{route('pages.department.subMenu', $sb->slug)}}">{{$sb->name}}</a>
                            @endforeach
                            <a class="dropdown-link w-dropdown-link" href="{{route('pages.department.guide')}}">Руководство</a>
                            <a class="dropdown-link w-dropdown-link" href="{{route('pages.department.process')}}">Учебный процесс</a>
                        </nav>
                    </div>
                    <div class="dropdown w-dropdown" data-delay="0" data-hover="1">
                        <div class="dropdown-toggle nav-link w-dropdown-toggle">
                            <div>Студенческая жизнь</div>
                            <div class="dropdown-icon w-icon-dropdown-toggle"></div>
                        </div>
                        <nav class="dropdown-list w-dropdown-list">
                            @foreach($students as $s)
                                <a class="dropdown-link w-dropdown-link" href="{{route('pages.photos.student', $s->slug)}}">{{$s->name}}</a>
                            @endforeach
                        </nav>
                    </div>
                    <div class="dropdown w-dropdown" data-delay="0" data-hover="1">
                        <div class="dropdown-toggle nav-link w-dropdown-toggle">
                            <div>Фотогалерея</div>
                            <div class="dropdown-icon w-icon-dropdown-toggle"></div>
                        </div>
                        <nav class="dropdown-list w-dropdown-list">
                            @foreach($photoCategories as $pc)
                                <a class="dropdown-link w-dropdown-link" href="{{route('pages.photos.show', $pc->slug)}}">{{$pc->name}}</a>
                            @endforeach
                        </nav>
                    </div>
                    <div class="dropdown w-dropdown" data-delay="0" data-hover="1">
                        <div class="dropdown-toggle nav-link w-dropdown-toggle">
                            <div>Уч. программы</div>
                            <div class="dropdown-icon w-icon-dropdown-toggle"></div>
                        </div>
                        <nav class="dropdown-list w-dropdown-list">
                            @foreach(\App\Category::get() as $category)
                                <a class="dropdown-link w-dropdown-link" href="{{route('pages.category', $category->slug)}}">{{$category->name}}</a>
                            @endforeach
                            {{--<a class="dropdown-link w-dropdown-link" href="{{route('pages.department.programs')}}">Основная образовательная программа</a>--}}
                        </nav>
                    </div>
                </nav>
                <div class="menu-button w-nav-button">
                    <div class="w-icon-nav-menu"></div>
                </div>
            </div>
        </div>
        </div>

        @yield('content')

        <div class="footer">
            <div class="container w-container">
                <div class="footer-row w-row">
                    <div class="footer-column w-col w-col-3">
                        <div class="footer-title">Контакты</div>
                        <a class="footer-contact-block w-inline-block" href="#">
                            <div class="footer-contact-title icon"></div>
                            <div class="footer-contact-title">+996(312) 32-31-04</div>
                        </a>
                        <a class="footer-contact-block w-inline-block" href="#">
                            <div class="footer-contact-title icon"></div>
                            <div class="footer-contact-title">+996(312) 32-31-04</div>
                        </a>
                        <a class="footer-contact-block w-inline-block" href="#">
                            <div class="footer-contact-title icon"></div>
                            <div class="footer-contact-title">fiitknu@mail.ru</div>
                        </a>
                        <a class="footer-social-button w-inline-block" href="https://www.facebook.com/%D0%9A%D1%8B%D1%80%D0%B3%D1%8B%D0%B7%D1%81%D0%BA%D0%B8%D0%B9-%D0%9D%D0%B0%D1%86%D0%B8%D0%BE%D0%BD%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9-%D0%A3%D0%BD%D0%B8%D0%B2%D0%B5%D1%80%D1%81%D0%B8%D1%82%D0%B5%D1%82-179407758781293/" target="_blank">
                            <img class="footer-social-icon" src="http://uploads.webflow.com/571cab5c86c1049c4c0e7047/5725bf52138ce8c852415122_Icon-facebook_2.png">
                        </a>
                        <a class="footer-social-button w-inline-block" href="http://www.twitter.com" target="_blank">
                            <img class="footer-social-icon" src="http://uploads.webflow.com/571cab5c86c1049c4c0e7047/5725bf7e639cfa231e7840b7_Icon-twitter_1.png">
                        </a>
                        <a class="footer-social-button w-inline-block" href="http://www.linkedin.com" target="_blank">
                            <img class="footer-social-icon" src="http://uploads.webflow.com/571cab5c86c1049c4c0e7047/5725bf9f138ce8c852415257_Icon-linkedin.png">
                        </a>
                    </div>
                    <div class="footer-column last w-col w-col-3">
                        <div class="footer-title">О ФИИТ</div>
                        @foreach($subMenus as $sb)
                            <a class="footer-list-link" href="{{route('pages.department.subMenu', $sb->slug)}}">{{$sb->name}}</a>
                        @endforeach
                    </div>
                    <div class="footer-column w-col w-col-3">
                        <div class="footer-title">Полезные ссылки</div>
                        <a class="footer-list-link" href="{{route('pages.contact')}}">Контакты</a>
                        <a class="footer-list-link" href="{{route('pages.department')}}">Факультеты</a>
                        <a class="footer-list-link" href="{{route('pages.department')}}">О нас</a>
                    </div>
                    <div class="footer-column w-col w-col-3">
                        <div class="footer-title"></div>
                        <div class="w-dyn-list">
                            <div class="w-dyn-items">
                                <div class="w-dyn-item"><a target="_blank" class="footer-list-link" href="http://www.fiit.knu.kg">www.fiit.knu.kg</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer-block">
                    <div class="bottom-footer-text">© 2020. КНУ имени Ж. Баласагына. Факультет информационных и инновационных технологий</div>
                    <div class="bottom-footer-text right">design by&nbsp;<a class="footer-link" href="#">Omurov</a></div>
                </div>
            </div>
        </div>

        @include('include.script')
    </body>
</html>
