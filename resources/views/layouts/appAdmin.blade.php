@extends('layouts.desktop')

@section('sidebar')
    <div class="sidebar-top big-img">
        <div class="user-image cursor-pointer">
            <img src="{{ asset('img/logo-coin.png') }}" class="img-responsive img-circle flip animatex"
                 alt="friend 8">
        </div>
    </div>
    <div class="menu-title text-center">

    </div>
    <ul class="nav nav-sidebar">
        <li>
            <a href="{{ route('admin-dashboard') }}"><i
                    class="sidebar-icon flaticon-dashboard"></i><span>داشبورد مدیر</span></a>
        </li>
        <li class="nav-parent">
            <a href="#"><i class="sidebar-icon flaticon-settings"></i><span>منوی عملیات</span> <span
                    class="fas fa-angle-left arrow"></span></a>

        </li>
        <li>
            <a href="{{ route('wallet') }}"><i
                    class="sidebar-icon flaticon-user"></i><span>پنل کاربری</span></a>
        </li>
    </ul>
@endsection
