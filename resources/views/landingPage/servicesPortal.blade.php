@extends('landingPage.layout')
@section('content')


    <div dir="rtl" class="vg-page page-home" id="home"
         style="background-image: url('{{asset('landing/assets/img/cover1.jpg')}}')">
        <!-- Navbar -->
        <div dir="rtl" class="navbar navbar-expand-lg navbar-dark sticky" data-offset="500">
            <div dir="rtl" class="container">
                <!--  <a href="" class="navbar-brand"> الجامعة الاسلامية-غزة</a>-->
                <button dir="rtl" class="navbar-toggler" data-toggle="collapse" data-target="#main-navbar"
                        aria-expanded="true">
                    <span dir="rtl" class="ti-menu"></span>
                </button>
                <div dir="rtl" class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="#home" class="nav-link" data-animate="scrolling">بوابة الخدمات</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/')}}" class="nav-link" data-animate="scrolling">الصفحة الرئيسية</a>
                        </li>

                    </ul>
                    <ul class="nav ml-auto">
                        <li class="nav-item">
                            <a href="" class="navbar-brand">معهد التنمية المجتمعية الجامعة الاسلامية-غزة</a>

                        </li>
                    </ul>
                </div>
            </div>
        </div> <!-- End Navbar -->
        <!-- Caption header -->
        <div class="caption-header wow zoomInDown">
            <h1 class="fw-normal">أهلا بك في بوابة الخدمات</h1>
            <div class="button-container">
                <a href="{{url('student/login')}}" target="_blank" class="student-button">خدمات الطالب</a>
                <a href="{{url('teacher/login')}}" target="_blank" class="teacher-button">خدمات المدرس</a>
                <a href="{{url('admin/login')}}" target="_blank" class="manager-button">خدمات المدير</a>
                <a href="https://cdi.iugaza.edu.ps/enrollment-application" class="apply-button">طلب الالتحاق</a>
            </div>
        </div>

    </div> <!-- End Caption header -->
    {{--    <div class="home-container">--}}
    {{--        <h2>مرحبًا بك في موقعنا!</h2>--}}
    {{--        <div class="button-group">--}}
    {{--            <a href="#" class="button">خدمات الطالب</a>--}}
    {{--            <a href="#" class="button">خدمات المدرس</a>--}}
    {{--            <a href="#" class="button">خدمات المدير</a>--}}
    {{--            <a href="#" class="button">طلب الالتحاق</a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
