<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="rtl">
<head>
    <link rel="canonical" href="{{$canonicalLink}}" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132456884-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-132456884-1');
    </script>
    <?php $customPage = 0; ?>
    @yield('title')
    @if($customPage !== 1)
        <title>{{pageTitle}} | رمزینکس</title>
    @endif
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="Ramzinex" content="Ramzinex"/>
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js')}}"></script>
    <!-- BEGIN PAGE STYLE -->
    <link href="{{ asset('vendors/bootstrap-4.3.1/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('global/plugins/bootstrap/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('global/css/icons/line-icons/line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('global/css/icons/line-icons/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{asset('fonts/flaticon/flaticon.css')}}" rel="stylesheet">
    <link href="{{ asset('vendors/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    @yield('css')
    <link href="{{ asset('css/mobile.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/ramzinexMobile.css') }}?ver={{time()}}" rel="stylesheet">
</head>

<!-- BEGIN BODY -->
<body class="rtl ramzinex-mobile">
<div
    @auth
    @if( empty(\Illuminate\Support\Facades\Auth::user()) or empty(\Illuminate\Support\Facades\Auth::user()->theme))
    id="app-theme" class="ramzinex-Dark"
    @else
    id="app-theme" class="ramzinex-{{ucfirst(\Illuminate\Support\Facades\Auth::user()->theme)}}"
    @endif
    @endauth
    @guest
    id="app-theme" class="ramzinex-Dark"
    @endguest
>
    <div id="app">
        <div id="mbl-wrapper">
            <div class="bgWatermark noselect">
                <div class="rmzWatermark text-center"></div>
                <div class="glassWrapper"></div>
            </div>
            {{--HEAD--}}
            <div id="mbl-head" class="mbl-menu">
                <div class="flex nowrap" style="width: 40%;justify-content: space-evenly;">
                    <div class="mbl-menu-item">
                        <a href="#" onclick="location.reload(true);" class="loading-overlay">
                            <div class="mbl-menu-icon"><i class="icon-refresh"></i></div>
                        </a>
                    </div>
                    @auth
                        <div id="toggle_theme" class="mbl-menu-item">
                            <a href="#">
                                <div class="mbl-menu-icon"><i class="icon-screen-desktop"></i></div>
                            </a>
                        </div>
                        <div class="mbl-menu-item">
                            <a href="{{ route('rial_payment')}}" class="rtl"
                               style="color: #636363; font-size: small;">
                                <div class="mbl-menu-icon" style="position: relative;">
                                    {{----}}
                                    <span style="font-size:10px;margin-right: 5px;" class="text-info"><span style="font-size: larger;font-family: Arial">1م</span> ﷼</span>
                                    <i
                                        style="color:blue;" class="text-info fa fa-1x fa-plus-square"></i>
                                </div>
                            </a>
                        </div>

                    @endauth
                </div>
                <div class="mbl-menu-item">
                    <a href="{{url('/wallet')}}"><img src="{{asset('img/Ramzinex-logo-R.png')}}" alt="Ramzinex Logo"
                                                      height="24"></a>
                </div>
                <div class="flex nowrap" style="width: 40%;justify-content: space-evenly;">
                    @auth

                        <div class="mbl-menu-item">
                            <a href="{{ route('systemMessages.index') }}">
                                <div class="mbl-menu-icon" style="position: relative;"><i
                                        class="icon-envelope-letter"></i>
                                    @php($unReadMessages = \Illuminate\Support\Facades\Auth::user()->unReadMessagesNumber())
                                    @if($unReadMessages > 0)
                                        <span
                                            class="badge badge-danger shabnamFD unread-count">{{$unReadMessages}}</span>
                                    @endif
                                </div>
                            </a>
                        </div>
                        <div class="mbl-menu-item">
                            <a href="{{ route('show_user_notification') }}">
                                <div class="mbl-menu-icon" style="position: relative;"><i class="icon-bell"></i>
                                    @if(\Illuminate\Support\Facades\Auth::user())
                                        @php($unReadNotifications = \Illuminate\Support\Facades\Auth::user()->unReadNotificationMessageNumber())
                                        @if($unReadNotifications > 0)
                                            <span
                                                class="badge badge-danger shabnamFD unread-count">{{$unReadNotifications}}</span>
                                        @endif
                                    @endif
                                </div>
                            </a>
                        </div>
                        <div class="mbl-menu-item">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="mbl-menu-icon"><i class="icon-power"></i></div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    @else
                        <div id="toggle_theme" class="mbl-menu-item">
                            <a href="#">
                                <div class="mbl-menu-icon"><i class="icon-screen-desktop"></i></div>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
            {{--BODY--}}
            <div id="mbl-body">
                <div id="contents-here" class="swiper-container panelGlass" style="position: relative;">
                    <div id="rmz-modal-top" class="noswipe" style="display: none;">
                        <div class="modalWrapper">
                            <div class="modalHeader"></div>
                            <div class="modalContent"></div>
                            <div class="modalFooter rmz-close-modal">
                                <i class="icon-arrow-up ml-2"></i> بستن
                            </div>
                        </div>
                    </div>
                    @yield('mobile')
                    <div id="rmz-modal-bottom" class="noswipe">
                        <div class="modalWrapper">
                            {{--<div class="modalHeader rmz-close-modal">--}}
                            {{--<i class="icon-arrow-down"></i>--}}
                            {{--</div>--}}
                            <div class="text-center panelGlassTitle">
                                فهرست بازارها
                            </div>
                            <div class="modalContent">
                                <div class="basePairs" style="border-left: 3px solid #0000001f;">
                                    <div class="pairsHeader text-center"
                                         style="padding: 20px; border-bottom: 2px solid #0000001f;">
                                        <div style="color: white;">بر پایه Rial</div>
                                    </div>
                                    <div class="pairs">
                                        @auth
                                            @foreach($pairs as $pair)
                                                @if($pair->currency_id1 == 2)
                                                    <div class="pairname text-center pa-5">
                                                        <a href="{{route('orderbook',$pair)}}" class="loading-overlay">
                                                            <h5 class="h5"
                                                                style="font-weight: bold">{{ucfirst($pair->currency2->name)}}</h5>
                                                            <h6 class="h6">{{strtoupper($pair->currency2->symbol).' / '.strtoupper($pair->currency1->symbol)}}</h6>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($pairs as $pair)
                                                @if($pair->currency_id1 == 2)
                                                    <div class="pairname text-center pa-5">
                                                        <a href="{{route('market',$pair)}}" class="loading-overlay">
                                                            <h5 class="h5"
                                                                style="font-weight: bolder">{{strtoupper($pair->currency2->name)}}</h5>
                                                            <h6 class="h6">{{strtoupper($pair->currency2->symbol).' / '.strtoupper($pair->currency1->symbol)}}</h6>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endauth
                                    </div>
                                </div>
                                <div class="basePairs">
                                    <div class="pairsHeader text-center"
                                         style="padding: 20px; border-bottom: 2px solid #0000001f;">
                                        <div style="color: white;">بر پایه Tether</div>
                                    </div>
                                    <div class="pairs">
                                        @auth
                                            @foreach($pairs as $pair)
                                                @if($pair->currency_id1 == \App\Models\Currency::getTetherErc20()->id)
                                                    <div class="pairname text-center pa-5">
                                                        <a href="{{route('orderbook',$pair)}}">
                                                            <h5 class="h5"
                                                                style="font-weight: bold">{{ucfirst($pair->currency2->name)}}</h5>
                                                            <h6 class="h6">{{strtoupper($pair->currency2->symbol).' / '.strtoupper($pair->currency1->symbol)}}</h6>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach($pairs as $pair)
                                                @if($pair->currency_id1 == \App\Models\Currency::getTetherErc20()->id)
                                                    <div class="pairname text-center pa-5">
                                                        <a href="{{route('market',$pair)}}">
                                                            <h5 class="h5"
                                                                style="font-weight: bolder">{{strtoupper($pair->currency2->name)}}</h5>
                                                            <h6 class="h6">{{strtoupper($pair->currency2->symbol).' / '.strtoupper($pair->currency1->symbol)}}</h6>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endauth
                                    </div>
                                </div>
                            </div>
                            <div class="modalFooter"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{--FOOTER--}}
            <div id="mbl-foot" class="mbl-menu">
                <div class="mbl-menu-item">
                    <a href="{{ route('live_price') }}" name="live_price" class="loading-overlay">
                        <div class="mbl-menu-icon"><i class="flaticon-money"></i></div>
                        <div class="mbl-menu-title">قیمت لحظه ای</div>
                    </a>
                </div>
                <div
                    {{--id="link_orderbook" --}}

                     class="mbl-menu-item">
                    <a href="{{route('orderbook',2)}}"
                       {{--name="orderbook"--}}
                       class="loading-overlay"
                    >
                        <div class="mbl-menu-icon"><i class="flaticon-bitcoin"></i></div>
                        <div class="mbl-menu-title">خرید و فروش</div>
                    </a>
                </div>
                <div class="mbl-menu-item">
                    <a href="{{ route('wallet') }}" name="wallet" class="loading-overlay">
                        <div class="mbl-menu-icon"><i class="flaticon-purse"></i></div>
                        <div class="mbl-menu-title">کیف پول</div>
                    </a>
                </div>
                <div class="mbl-menu-item">
                    <a href="{{ route('dashboard')}}" class="loading-overlay">
                        <div class="mbl-menu-icon"><i class="flaticon-dashboard"></i></div>
                        <div class="mbl-menu-title">داشبورد</div>
                    </a>
                </div>
                <div id="link_profile" class="mbl-menu-item">
                    <a href="#" name="account">
                        <div class="mbl-menu-icon"><i class="flaticon-user"></i></div>
                        <div class="mbl-menu-title">حساب کاربری</div>
                    </a>
                </div>
                {{--<div class="mbl-menu-item">--}}
                {{--<a href="#">--}}
                {{--<div class="mbl-menu-icon"><i class="flaticon-settings"></i></div>--}}
                {{--<div class="mbl-menu-title">تنظیمات</div>--}}
                {{--</a>--}}
                {{--</div>--}}
            </div>
        </div>

        {{--Other Stuffs--}}
        <div class="otherStuffs">
            <div class="modal left fade" id="modal-slideleft" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <input type="text" id="copyarea"/>
                <div class="modal-dialog">
                    <div class="modal-header cursor-pointer rmz-flex-h rmz-center" data-dismiss="modal"
                         aria-hidden="true">
                        <div style="color: #a7a7a7;"><i class="fas fa-times"></i></div>
                    </div>
                    <div class="modal-content">
                        <div class="modal-body modalContent">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade modal-bottomfull" id="modal-bottomfull" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header cursor-pointer rmz-flex-h rmz-center" data-dismiss="modal"
                             aria-hidden="true">
                            <div style="color: #a7a7a7;"><i class="fas fa-times"></i></div>
                        </div>
                        <div class="modal-body modalContent">

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade modal-topfull" id="modal-topfull" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <div class="modal-dialog modal-topfull">
                    <div class="modal-content">
                        <div class="modal-header cursor-pointer rmz-flex-h rmz-center" data-dismiss="modal"
                             aria-hidden="true">
                            <div style="color: #a7a7a7;"><i class="fas fa-times"></i></div>
                        </div>
                        <div class="modal-body modalContent">

                        </div>
                    </div>
                </div>
            </div>
            <input type="text" id="copyTemp"/>
            <div id="poppy" class="popper" style="display: none; z-index: 2000;"></div>
            @php($themes = ['Light' => 'روز', 'Evening' => 'غروب', 'Dark' => 'شب'])
            <div id="jbox_themeBox" class="smallerF"
                 style="display: none; z-index: 2000; text-align: right;">
                @auth
                    @php($this_theme = ucfirst(\Illuminate\Support\Facades\Auth::user()->theme))
                @else
                    @php($this_theme = 'Dark')
                @endauth
                @foreach($themes as $key=>$value)
                    <div class="pa-0-8">
                        <label class="ma-0">
                            @if($key == $this_theme)
                                <div class="checkIcon" style="width: 16px; float: right;">
                                    <i class="fas fa-check text-success"></i>
                                </div>
                                <input type="radio" name="theme" value="{{$key}}" class="hidden" checked> {{$value}}
                            @else
                                <div class="checkIcon" style="width: 16px; float: right;">
                                    <i class="fas fa-circle"></i>
                                </div>
                                <input type="radio" name="theme" value="{{$key}}" class="hidden"> {{$value}}
                            @endif
                        </label>
                    </div>
                @endforeach
            </div>
            <div id="profile_menu-item" class="mbl-submenu-item  text-center"
                 style="display: none; z-index: 2000; text-align: right;">
                <a href="{{ route('systemMessages.index') }}" class="loading-overlay">
                    <p>صندوق پیام</p>
                </a>
                <a href="{{ route('userProfiles.create') }}" class="loading-overlay">
                    <p>اطلاعات شخصی</p>
                </a>
                <a href="{{ route('user_profile_security') }}" class="loading-overlay">
                    <p>امنیت</p>
                </a>
                <a href="{{ route('deposits') }}" class="loading-overlay">
                    <p>تاریخچه واریزها</p>
                </a>
                <a href="{{ route('withdraws') }}" class="loading-overlay">
                    <p>تاریخچه برداشت ها</p>
                </a>
                <a href="{{ route('order_history') }}" class="loading-overlay">
                    <p>تاریخچه سفارش ها</p>
                </a>
                <a href="{{ route('bonuses') }}" class="loading-overlay">
                    <p>کسب درآمد</p>
                </a>
                <a href="{{ route('commissions') }}" class="loading-overlay">
                    <p>کارمزدها</p>
                </a>
                <a href="{{ route('apikeys.index') }}" class="loading-overlay">
                    <p class="last-item">API</p>
                </a>
                <a href="{{ route('telegram_bot_guide') }}" class="loading-overlay">
                    <p class="last-item">بات تلگرام</p>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-4.3.1/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/twitter-bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('js/axios.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/moment.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/momentj.js') }}"></script>--}}
<script src="{{ asset('js/scriptx.js') }}"></script>
<script src="{{ asset('js/ramzinex.js') }}?ver={{time()}}"></script>
@yield('js')
<script>
    $(document).ready(function () {
        new jBox('Tooltip', {
            attach: '#toggle_theme',
            trigger: 'click',
            theme: 'TooltipDark',
            content: $('#jbox_themeBox'),
            adjustPosition: true,
            adjustTracker: true,
            closeOnClick: true
        });

        new jBox('Tooltip', {
            attach: '#link_profile',
            trigger: 'click',
            theme: 'TooltipDark',
            content: $('#profile_menu-item'),
            adjustPosition: true,
            adjustTracker: true,
            closeOnClick: true
        });

        new jBox('Tooltip', {
            attach: '.poppy',
            trigger: 'click',
            theme: 'TooltipDark',
            content: $('.poppy').attr('popper'),
            adjustPosition: true,
            adjustTracker: true,
            closeOnClick: true
        });
        //Hide Modals
        $(document).on('click', '#mbl-foot .mbl-menu-item', function () {
            $('#rmz-modal-top').hide();
            if ($(this).attr('id') != 'link_orderbook') {
                $('#rmz-modal-bottom').removeClass('slide-up').addClass('slide-down');
            } else {
                if ($('#rmz-modal-bottom').hasClass('slide-up')) {
                    $('#rmz-modal-bottom').removeClass('slide-up').addClass('slide-down');
                } else {
                    $('#rmz-modal-bottom').removeClass('slide-down').addClass('slide-up');
                }
            }

            if ($(this).hasClass('active') === false) {
                $('.active').removeClass('active');
            }
        });

        //COMMON WITH DESKTOP LAYOUT
        $(document).on('click', '.rmz-close-modal', function () {
            $('#rmz-modal-top').slideUp(1000, 'swing');
            $('body').css({"overflow": "scroll"});
        });
        $(document).on('click', '.order-details', function () {
            var dis = $(this);
            var orderId = dis.attr('order-id');
            var url = orderId;
            var targetModal = dis.attr('data-target');
            $.get(url, function (data) {
                if (data.success == '200') {
                    $('#mbl-body').css({"overflow": "hidden"});
                    $(targetModal).slideDown(1000, 'swing').find('.modalContent').html(data.message);
                } else if (data.success == '404') {
                    iziToast.info({
                        id: 'info',
                        rtl: true,
                        message: data.message,
                        position: 'topCenter',
                        transitionIn: 'bounceInRight',
                        timeout: 3000,
                    });
                }
            });
        });
        @auth
        $(document).on('change', 'input[name=theme]', function () {
            var dis = $(this);
            var theme = dis.val();
            var url = "{{route('user_change_theme')}}";
            $.when($(document).find('.checkIcon').html('<i class="fas fa-circle"></i> ')).done(function () {
                $('input[name=theme]:checked').parents('label').find('.checkIcon').html('<i class="fas fa-spinner fa-spin text-warning"></i> ');
            });
            $.get(url, {'theme': theme}, function () {
                $("#app-theme").attr('class', 'ramzinex-' + theme);
                $('input[name=theme]:checked').parents('label').find('.checkIcon').html('<i class="fas fa-check text-success"></i> ');
            });
        });
        @else
        $(document).on('change', 'input[name=theme]', function () {
            var dis = $(this);
            var theme = dis.val();
            $.when($(document).find('.checkIcon').html('<i class="fas fa-circle"></i> ')).done(function () {
                $("#app-theme").attr('class', 'ramzinex-' + theme);
                $('input[name=theme]:checked').parents('label').find('.checkIcon').html('<i class="fas fa-check text-success"></i> ');
            });
        });
        @endauth
        $(document).on('click', '.copyThis', function () {

            var dis = $(this);

            var address = dis.attr('copy-value');

            $.when($(document).find("#copyTemp").val(address)).done(function () {
                CopyToClipboard("copyTemp");

                iziToast.show({
                    message: 'لینک در حافظه موقت کپی شد',
                    rtl: true,
                    timeout: 2000,
                    position: 'topCenter',
                    theme: 'dark',
                    progressBarColor: 'rgb(79,195,247)',
                });

                $('#copyTemp').blur();

            });

        });

        $(document).on('keyup change', '.sepy', function () {

            var dis = $(this);

            var value = dis.val();

            $(this).val(number_format(value, 1));

        });

        var currentRoute = "{{Route::currentRouteName()}}";
        if (currentRoute.includes('orderbook') || currentRoute.includes('market')) {
            $(document).find('a[name="orderbook"]').parent().addClass('active');
        } else if (currentRoute.includes('wallet')) {
            $(document).find('a[name="wallet"]').parent().addClass('active');
        } else {
            $(document).find('a[name="account"]').parent().addClass('active');
        }

        $(document).on('focus', '.cleanInput2, .cleanInput', function () {
            let y = $(this).offset().top;
            console.log(y);
            $('html,body,.modal-body').scrollTop(y - 64);
        });
    });
</script>
@yield('jsmobile')
</body>
</html>
