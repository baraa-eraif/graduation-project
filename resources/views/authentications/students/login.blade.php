<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
<head><base href="../../../">
    <title>بوابة الطالب</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{asset('landing/assets/iugLogo.png')}}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
<style>
    body {
        font-family: 'Cairo';
    }
</style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                <!--begin::Content-->
                <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                    <!--begin::Logo-->
                    <a href="#" class="py-9 mb-5">
                        <img alt="Logo" src="{{asset('landing/assets/iugLogo.png')}}" class="h-150px" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">بوابة الطالب</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <p class="fw-bold fs-2" style="color: #986923;">الجامعة الإسلامية -غزة - فلسطين
                        <br />معهد التنمية المجتمعية الجامعة الاسلامية-غزة</p>
                    <!--end::Description-->
                </div>
                <!--end::Content-->
                <!--begin::Illustration-->
                <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url({{asset('assets/media/illustrations/sketchy-1/13.png')}}"></div>
                <!--end::Illustration-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <!--begin::Wrapper-->
                <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form method="post" class="form w-100" id="kt_sign_in_form" action="{{route('student.login')}}">
                        @csrf
                        @method('post')
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">بوابة الطالب</h1>
                            <!--end::Title-->
                            <!--begin::Link-->

                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">معرف الطالب</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="number" name="student_id" autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">كلمة المرور</label>
                                <!--end::Label-->
                                <!--begin::Link-->
{{--                                <a href="../../demo18/dist/authentication/layouts/aside/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>--}}
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">تسجيل الدخول</span>
                                <span class="indicator-progress">انتظر قليلاً...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Submit button-->
                            <!--begin::Separator-->
{{--                            <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>--}}
{{--                            <!--end::Separator-->--}}
{{--                            <!--begin::Google link-->--}}
{{--                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">--}}
{{--                                <img alt="Logo" src="{{asset('assets/media/svg/brand-logos/google-icon.svg')}}" class="h-20px me-3" />Continue with Google</a>--}}
{{--                            <!--end::Google link-->--}}
{{--                            <!--begin::Google link-->--}}
{{--                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">--}}
{{--                                <img alt="Logo" src="{{asset('assets/media/svg/brand-logos/facebook-4.svg')}}" class="h-20px me-3" />Continue with Facebook</a>--}}
{{--                            <!--end::Google link-->--}}
{{--                            <!--begin::Google link-->--}}
{{--                            <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">--}}
{{--                                <img alt="Logo" src="{{asset('assets/media/svg/brand-logos/apple-black.svg')}}" class="h-20px me-3" />Continue with Apple</a>--}}
                            <!--end::Google link-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>

<!--end::Root-->
<!--end::Main-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('common/js/toastr.js')}}"></script>

{{--<script src="{{asset('common/js/common.js')}}"></script>--}}
{{--<script src="{{asset('common/js/ajax.js')}}"></script>--}}
{{--<script src="{{asset('common/js/constant.js')}}"></script>--}}
{{--<script src="{{asset('common/js/store/user.js')}}"></script>--}}
{{--<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>--}}
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>
<!--end::Page Custom Javascript-->
@if (@$errors->any())
    <script>
        "use strict";
        @foreach ($errors->all() as $error)
            toastr.options.positionClass = 'toast-bottom-right';
        toastr.error("{{ $error }}")
        @endforeach
    </script>
@endif
<script>
    $('#kt_sign_in_submit').click(function () {
        $(this).attr('data-kt-indicator', 'on');
    })
</script>
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
