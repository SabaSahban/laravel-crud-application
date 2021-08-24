<?php
if (!defined('customMenu')) {
    $menuItems[] = [
        'name' => 'خانه',
        'href' => url('/#top')
    ];
    $menuItems[] = [
        'name' => 'نمای بازار',
        'href' => url('/market/2')
    ];
    $menuItems[] = [
        'name' => 'راهنما',
        'href' => url('/help')
    ];
    $menuItems[] = [
        'name' => 'کارمزدها',
        'href' => url('/pricing')
    ];
    $menuItems[] = [
        'name' => 'سوالات متداول',
        'href' => url('/faq')
    ];
    $menuItems[] = [
        'name' => 'اپ',
        'href' => url('/applications')
    ];
//    $menuItems[] = [
//        'name' => 'قیمت لحظه ای',
//        'href' => route('live_price')
//    ];
    $menuItems[] = [
        'name' => 'بلاگ',
        'href' => 'http://ramzinex.com/blog'
    ];
} else {
    $menuItems[] = [
        'name' => 'خانه',
        'href' => url('/#top')
    ];
    $menuItems[] = [
        'name' => 'نمای بازار',
        'href' => url('/market', ['pair' => 2])
    ];
    $menuItems[] = [
        'name' => 'راهنما',
        'href' => url('/help')
    ];
    $menuItems[] = [
        'name' => 'کارمزدها',
        'href' => url('/pricing')
    ];
    $menuItems[] = [
        'name' => 'سوالات متداول',
        'href' => url('/faq')
    ];
    $menuItems[] = [
        'name' => 'اپ',
        'href' => url('/applications')
    ];
    $menuItems[] = [
        'name' => 'API',
        'href' => route('apikeys.guide')
    ];
    $menuItems[] = [
        'name' => 'قیمت لحظه ای',
        'href' => route('live_price')
    ];
    $menuItems[] = [
        'name' => 'بلاگ',
        'href' => 'http://ramzinex.com/blog'
    ];
}
?>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="canonical" href="{{$canonicalLink}}" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132456884-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-132456884-1');
    </script>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta content="" name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">
    <meta name="HandheldFriendly" content="true">
    <link rel="shortcut icon" type="image/png" href="{{asset('favicon.ico')}}">
    @yield('head')
    <link rel="stylesheet" href="{{asset('fonts/flaticon/flaticon.css')}}">
    <link href="{{asset('fonts/font-awesome/css/all.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('ozun/libs/bootstrap/bootstrap.css')}}" rel="stylesheet"/>
    <link href="{{asset('ozun/libs/bootstrap/bootstrap.rtl.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/landing.css')}}?ver={{time()}}" rel="stylesheet">
    <style>
        html, body {
            color: #636b6f;
            height: 100vh;
            margin: 0;
            -ms-overflow-style: none;
        }

        .full-height {
            min-height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .mx-2 {
            margin-right: 0.5rem;
            margin-left: 0.5rem;
        }

        .text-white {
            color: white !important;
        }

        .gold-link:hover {
            color: gold !important;
            transition: all 0.5s;
        }
    </style>
</head>

<body class="shabnamFD">

<div class="l-theme animated-css" data-header="sticky" data-header-top="200" data-canvas="container">
    <!-- ==========================-->
    <!-- MOBILE MENU-->
    <!-- ==========================-->
    <div data-off-canvas="mobile-slidebar right overlay" class="main">
        <nav>
            <ul class="yamm nav navbar-nav">
                @foreach($menuItems as $menuItem)
                    <li><a href="{{ $menuItem['href'] }}">{{ $menuItem['name'] }}</a></li>
                @endforeach
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{ url('/wallet') }}">پنل کاربری</a></li>
                    @else
                        <li><a href="{{ url('/wallet') }}">ورود</a></li>
                        <li><a href="{{ route('register') }}">ثبت نام</a></li>
                    @endauth
                @endif
            </ul>
        </nav>
    </div>
    <!-- ==========================-->
    <!-- FULL SCREEN MENU-->
    <!-- ==========================-->
    <div class="wrap-fixed-menu" id="fixedMenu">
        <nav class="fullscreen-center-menu">

            <div class="menu-main-menu-container main">
                <nav>
                    <ul class="nav navbar-nav">
                        @foreach($menuItems as $menuItem)
                            <li><a href="{{ $menuItem['href'] }}">{{ $menuItem['name'] }}</a></li>
                        @endforeach
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/home') }}">پنل کاربری</a></li>
                            @else
                                <li><a href="{{ url('/wallet') }}">ورود</a></li>
                                <li><a href="{{ route('register') }}">ثبت نام</a></li>
                            @endauth
                        @endif
                    </ul>
                </nav>
            </div>
        </nav>
        <button type="button" class="fullmenu-close"><i class="fas fa-times"></i></button>
    </div>

    <header
        class="header header-topbar-hidden header-boxed-width navbar-fixed-top header-background-trans header-color-white header-logo-white header-navibox-1-left header-navibox-2-left header-navibox-3-right header-navibox-4-right">
        <div class="container container-boxed-width navmenu">
            <nav class="navbar" id="nav">
                <div class="container">
                    <div class="header-navibox-1">
                        <!-- Mobile Trigger Start-->
                        <button
                            class="menu-mobile-button visible-xs-block js-toggle-mobile-slidebar toggle-menu-button">
                            <i class="toggle-menu-button-icon"><span></span><span></span><span></span><span></span><span></span><span></span></i>
                        </button>
                        <!-- Mobile Trigger End-->
                        <a class="navbar-brand scroll" href="{{ url('/') }}"><img class="normal-logo"
                                                                                  src="{{asset('img/logo.png')}}"
                                                                                  alt="logo" width="184"><img
                                class="scroll-logo hidden-xs" src="{{asset('img/logo.png')}}" alt="logo"
                                width="184"></a>
                    </div>
                    <div class="header-navibox-2">
                        <nav>
                            <ul class="yamm main-menu nav navbar-nav">
                                @foreach($menuItems as $menuItem)
                                    <li><a href="{{ $menuItem['href'] }}">{{ $menuItem['name'] }}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="header-navibox-4">
                        <ul class="yamm main-menu nav navbar-nav">
                            @if (Route::has('login'))
                                @auth
                                    <li><a href="{{ url('/home') }}">پنل کاربری</a></li>
                                @else
                                    <li><a href="{{ url('/wallet') }}">ورود | ثبت نام</a></li>
                                @endauth
                            @endif
                        </ul>
                        {{--<div class="header-language-nav dropdown">--}}
                        {{--<button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">فارسی<span class="caret"></span></button>--}}
                        {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="#">فارسی</a></li>--}}
                        {{--<li><a href="#">انگلیسی</a></li>--}}
                        {{--<li><a href="#">عربی</a></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end .header-->
    <div id="the-content">
        @yield('content')
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="footer-social-nets">
                        <span class="footer-items-links"><a class="footer-social-nets__link"
                                                            href="/">خانه</a></span> |
                        <span class="footer-items-links"><a class="footer-social-nets__link"
                                                            href="/help">راهنما</a></span> |
                        <span class="footer-items-links"><a class="footer-social-nets__link" href="{{url('/support')}}">پشتیبانی</a></span>
                        |
                        <span class="footer-items-links"><a class="footer-social-nets__link" href="{{url('/pricing')}}">کارمزدها</a></span>
                        |
                        <span class="footer-items-links"><a class="footer-social-nets__link" href="{{url('/faq')}}">سوالات متداول</a></span>
                        |
                        <span class="footer-items-links"><a class="footer-social-nets__link"
                                                            href="http://ramzinex.com/blog">بلاگ</a></span> |
                        @if (Route::has('login'))
                            @auth
                                <span class="footer-items-links"><a class="footer-social-nets__link"
                                                                    href="{{url('/wallet')}}">پنل کاربری</a></span>
                            @else
                                <span class="footer-items-links"><a class="footer-social-nets__link"
                                                                    href="{{url('/wallet')}}">ورود</a></span> |
                                <span class="footer-items-links"><a class="footer-social-nets__link"
                                                                    href="{{route('register')}}">ثبت نام</a></span>
                            @endauth
                        @endif

                    </ul>

                </div>
            </div>
        </div>
        <div class="footer__main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <section class="footer-section text-left">
                            <h3 class="footer-section__title_l">رمزینکس</h3>
                            <p>رمزینکس تابع قوانین جمهوری اسلامی ایران بوده و بستری برای تبادل دارایی‌های دیجیتال مانند
                                بیت کوین، لایت کوین و اتریوم با ریال می‌باشد. هیچ گونه تبادل ارزی اعم از خرید و فروش
                                دلار یا سایر ارزهای کاغذی، در این بستر صورت نمی گیرد.</p>
                        </section>
                    </div>
                    <div class="col-sm-4 rmz-center">
                        <section class="footer-section footer-section_links footer-logo">
                            <img src="{{asset('img/Ramzinex-logotype.png')}}" alt="logo"
                                 class="rmz-center flip animatex" width="256">
                        </section>

                    </div>
                    <div class="col-sm-4">
                        <section class="footer-section">
                            <h3 class="footer-section__title">اطلاعات تماس</h3>
                            <p>
                                آدرس: تهران- خیابان آزادی -  خیابان حبیب اللهی - ایستگاه نوآوری دانشگاه صنعتی شریف
                            </p>
                            <p>تلفن: 91076606-021 / 09220514409</p>
                            <p>ایمیل: info(at)ramzinex.com</p><a class="footer__link" href="{{route('support')}}">با ما
                                تماس بگیرید</a>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12" style="margin-bottom: 1rem !important;">© 2019 تمامی حقوق برای رمزینکس محفوظ
                        است
                    </div>
                    <div class="col-xs-12" style="margin-bottom: 1rem !important;">
                        Powered By <a href="https://cryptoapis.io/?utm_source=package_info">Crypto APIs</a>
                    </div>
                    <p class="text-center social-icons font-large">
                        <a href="https://instagram.com/ramzinex_com" target="_blank" class="hvr-bob text-white mx-2"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com/ramzinex_com" target="_blank" class="hvr-bob text-white mx-2"><i
                                class="fab fa-twitter"></i></a>
                        <a href="https://t.me/ramzinex_com" target="_blank" class="hvr-bob text-white mx-2"><i
                                class="far fa-paper-plane"></i></a>
                        <a href="https://www.linkedin.com/company/ramzinex" target="_blank"
                           class="hvr-bob text-white mx-2"><i
                                class="fab fa-linkedin"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- .footer-->
</div>
<!-- end layout-theme-->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{asset('ozun/libs/bootstrap/bootstrap.min.js')}}" defer></script>
<script src="{{asset('js/landing.js')}}" defer></script>
@yield('js')
<script>
    $(document).ready(function () {

        $(document).on('click', '.animatex', function () {
            $.when($(this).addClass('animated')).done(function () {
                var timeout = setTimeout(function () {

                    $(document).find(".animatex").removeClass('animated');

                }, 1000, function () {
                    clearTimeout(timeout);
                });
            });
        });

        var scroll = new SmoothScroll('a[href*="#"]', {

            speed: 1000,
            speedAsDuration: true,
            easing: 'easeInOutCubic',

            // Selectors
            ignore: '[data-scroll-ignore]'

        });

    });

</script>
<!-- BEGIN JIVOSITE CODE {literal} -->
{{--<script type='text/javascript'>--}}
{{--    (function () {--}}
{{--        var widget_id = '2XwnWHTHHw';--}}
{{--        var d = document;--}}
{{--        var w = window;--}}

{{--        function l() {--}}
{{--            var s = document.createElement('script');--}}
{{--            s.type = 'text/javascript';--}}
{{--            s.async = true;--}}
{{--            s.src = '//code.jivosite.com/script/widget/' + widget_id--}}
{{--            ;var ss = document.getElementsByTagName('script')[0];--}}
{{--            ss.parentNode.insertBefore(s, ss);--}}
{{--        }--}}

{{--        if (d.readyState == 'complete') {--}}
{{--            l();--}}
{{--        } else {--}}
{{--            if (w.attachEvent) {--}}
{{--                w.attachEvent('onload', l);--}}
{{--            } else {--}}
{{--                w.addEventListener('load', l, false);--}}
{{--            }--}}
{{--        }--}}
{{--    })();--}}
{{--</script>--}}
<!-- {/literal} END JIVOSITE CODE -->

<!---begin GOFTINO code--->
<script type="text/javascript">
    !function(){var g=document.createElement("script"),s="https://www.goftino.com/widget/GMybkf",e=document.getElementsByTagName("script")[0];g.type="text/javascript";g.async=!0;g.src=localStorage.getItem("goftino")?s+"?o="+localStorage.getItem("goftino"):s;e.parentNode.insertBefore(g,e);}();
</script>
<!---end GOFTINO code--->

</body>

</html>
