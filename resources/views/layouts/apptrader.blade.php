@if(!isset($userDevice))
    @php ($userDevice = 'desktop')
@endif

@extends('layouts.'.$userDevice)

@if($userDevice == 'desktop')

@section('sidebar')
    <div class="sidebar-top big-img">
        <div class="user-image cursor-pointer">
            <img src="{{ asset('img/logo-coin@4x.png') }}" class="img-responsive img-circle flip animatex"
                 alt="Ramzinex Logo">
        </div>
    </div>
    <div class="menu-title text-center">

    </div>
    <ul class="nav nav-sidebar">
        {{--<li class=" nav-active active">--}}
        {{--<a href="{{ url('/home') }}"><i class="icon-home"></i><span>داشبورد</span></a>--}}
        {{--</li>--}}
        <li class="nav-parent">
            <a href="#"><i class="sidebar-icon flaticon-bitcoin"></i><span>خرید و فروش</span> <span
                        class="fas fa-angle-left arrow"></span></a>
            <div class="children collapse">
            &nbsp&nbsp
            بازارهای اصلی
            <ul >
                @isset(\Illuminate\Support\Facades\Auth::user()->id)
                    @foreach($rialPairs as $pair)
                        @if($pair->enable==1)
                            <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="{{route('orderbook',$pair)}}">{{$pair->getPersianName()}}</a></li>
                        @endif
                    @endforeach
                @endisset
                @empty(\Illuminate\Support\Facades\Auth::user())
                    @foreach($rialPairs as $pair)
                        @if($pair->enable==1)
                            <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="{{route('market',$pair)}}">{{$pair->getPersianName()}}</a></li>
                        @endif
                    @endforeach
                @endempty
            </ul>
            &nbsp&nbsp
            بازارهای بین المللی
            <ul >
                @isset(\Illuminate\Support\Facades\Auth::user()->id)
                    @foreach($internationalPairs as $pair)
                        @if($pair->enable==1)
                            <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="{{route('orderbook',$pair)}}">{{$pair->getPersianName()}}</a></li>
                        @endif
                    @endforeach
                @endisset
                @empty(\Illuminate\Support\Facades\Auth::user())
                    @foreach($internationalPairs as $pair)
                        @if($pair->enable==1)
                            <li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="{{route('market',$pair)}}">{{$pair->getPersianName()}}</a></li>
                        @endif
                    @endforeach
                @endempty

                {{--@foreach($currencies as $c)--}}
                {{--<p>{{$c->name}}</p>--}}
                {{--<ul>--}}
                {{--@foreach(\App\Models\Pair::query()->where('currency_id1', $c->id)->get() as $p)--}}
                {{--<li><a href="{{route('orderbook',$p)}}">{{$p->getName()}}</a></li>--}}
                {{--@endforeach--}}
                {{--</ul>--}}
                {{--@endforeach--}}
            </ul>
            </div>
        </li>
        <li>
            <a href="{{ route('wallet') }}"><i class="sidebar-icon flaticon-purse"></i><span>کیف پول</span></a>
        </li>
        <li class="nav-parent">
            <a href="#"><i class="sidebar-icon flaticon-user"></i><span>حساب کاربری</span> <span
                        class="fas fa-angle-left arrow"></span></a>
            <ul class="children collapse">
                <li>
                    <a href="{{ route('userProfiles.create') }}">اطلاعات شخصی</a>
                </li>
                <li>
                    <a href="{{ route('user_profile_security') }}">امنیت</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user())
                    <li>
                        <a href="{{ route('systemMessages.index') }}">
                            صندوق پیام
                            @php($unReadMessages = \Illuminate\Support\Facades\Auth::user()->unReadMessagesNumber())
                            @if($unReadMessages > 0)
                                <span class="badge badge-info shabnamFD">{{$unReadMessages}}</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('show_user_notification') }}">
                            اعلان ها
                            @php($unReadNotifications = \Illuminate\Support\Facades\Auth::user()->unReadNotificationMessageNumber())
                            @if($unReadNotifications > 0)
                                <span class="badge badge-danger shabnamFD">{{$unReadNotifications}}</span>
                            @endif
                        </a>

                    </li>
                @endif
                <li>
                    <a href="{{ route('deposits') }}">تاریخچه واریزها</a>
                </li>
                <li>
                    <a href="{{ route('withdraws') }}">تاریخچه برداشت ها</a>
                </li>
                <li>
                    <a href="{{ route('order_history') }}">تاریخچه سفارش ها</a>
                </li>
                <li>
                    <a href="{{ route('bonuses') }}">کسب درآمد</a>
                </li>
                <li>
                    <a href="{{ route('commissions') }}">کارمزدها</a>
                </li>
                <li>
                    <a href="{{ route('apikeys.index') }}">API</a>
                </li>
                <li>
                    <a href="{{ route('telegram_bot_guide') }}">بات تلگرام</a>
                </li>
            </ul>
        </li>
        @if(!is_null( \Illuminate\Support\Facades\Auth::user()) && \Illuminate\Support\Facades\Auth::user()->isStaffOrHigher())
            <li>
                <a href="{{ route('admin-dashboard') }}"><i
                            class="sidebar-icon flaticon-purse"></i><span>ادمین</span></a>
            </li>
        @endif
        <li>
            <a href="{{route('applications')}}">
                <i class="fab fa-android"></i><span>دانلود اپ اندروید</span>
            </a>
        </li>
    </ul>
@endsection

@endif
