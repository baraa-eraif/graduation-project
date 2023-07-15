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
<html>
<!--begin::Head-->
<head>
    <base href="">
    @include('dash.partial.head')
    <!--end::Global Stylesheets Bundle-->
</head>

<!--begin::Page loading(append to body)-->
<div class="page-loader flex-column">
    <span class="spinner-border text-primary" role="status"></span>
    <span class="text-muted fs-6 fw-semibold mt-5">Loading...</span>
</div>
<!--end::Page loading-->

<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        @include('dash.partial.aside')
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
                 data-kt-sticky-animation="true" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <!--begin::Container-->
                <div class="container-xxl d-flex align-items-center flex-lg-stack">
                    <!--begin::Brand-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-2 me-lg-5">
                        <!--begin::Wrapper-->
                        <div class="flex-grow-1">
                            <!--begin::Aside toggle-->
                            <button
                                class="btn btn-icon btn-active-color-primary"
                                id="kt_aside_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen059.svg')}}-->
                                <span class="svg-icon svg-icon-2">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15"
                                                 viewBox="0 0 16 15" fill="none">
												<rect y="6" width="16" height="3" rx="1.5" fill="black"/>
												<rect opacity="0.3" y="12" width="8" height="3" rx="1.5" fill="black"/>
												<rect opacity="0.3" width="12" height="3" rx="1.5" fill="black"/>
											</svg>
										</span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--end::Aside toggle-->
                            <!--begin::Header Logo-->
                            <a href="#">
                                <img alt="Logo" src="{{asset('landing/assets/iugLogo.png')}}"
                                     class="h-30px h-lg-50px"/>
                            </a>
                            <!--end::Header Logo-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin:Search-->
                        <div class="ms-5 ms-md-10 d-flex align-items-center">
                            <!--begin::Search-->
                            <div id="kt_header_search" class="d-flex align-items-center w-lg-400px"
                                 data-kt-search-keypress="true" data-kt-search-min-length="2"
                                 data-kt-search-enter="enter" data-kt-search-layout="menu"
                                 data-kt-search-responsive="lg" data-kt-menu-trigger="auto"
                                 data-kt-menu-permanent="true"
                                 data-kt-menu-placement="{default: 'bottom-end', lg: 'bottom-start'}">
                                <!--begin::Tablet and mobile search toggle-->
                                <div data-kt-search-element="toggle" class="d-flex d-lg-none align-items-center">
                                    <div
                                        class="btn btn-icon btn-color-gray-800 btn-active-light-primary w-30px h-30px w-md-40px h-md-40px">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg')}}-->
                                        <span class="svg-icon svg-icon-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                              height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                              fill="black"/>
														<path
                                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                            fill="black"/>
													</svg>
												</span>
                                        <!--end::Svg Icon-->
                                    </div>
                                </div>
                                <!--end::Tablet and mobile search toggle-->

                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end:Search-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Toolbar wrapper-->
                    <div class="d-flex align-items-stretch flex-shrink-0">

                        <!--begin::Activities-->
                        <div class="d-flex align-items-center ms-1 ms-lg-3">
                            <!--begin::drawer toggle-->
                            <div
                                class="position-relative btn btn-color-gray-800 btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                id="kt_drawer_chat_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg')}}-->
                                <span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
												<rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>
												<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                                      fill="black"/>
												<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                                      fill="black"/>
												<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                                      fill="black"/>
											</svg>
										</span>
                                <!--end::Svg Icon-->
                                <span
                                    class="bullet bullet-dot bg-danger h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                            </div>
                            <!--end::drawer toggle-->
                        </div>
                        <!--end::Activities-->
                        <!--begin::Theme mode-->
                        <div class="d-flex align-items-center ms-1 ms-lg-3">
                            <!--begin::Theme mode docs-->
                            <a class="btn btn-color-gray-800 btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                               href="#">
                                <i class="fonticon-sun fs-2"></i>
                            </a>
                            <!--end::Theme mode docs-->
                        </div>
                        <!--end::Theme mode-->
                        <!--begin::User menu-->
                        <div class="d-flex align-items-center ms-1 ms-lg-3">
                            <!--begin::Menu wrapper-->
                            <div
                                class="btn btn-color-gray-800 btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px position-relative btn btn-color-gray-800 btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg')}}-->
                                <span class="svg-icon svg-icon-2x">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
												<path
                                                    d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                    fill="black"/>
												<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4"
                                                      fill="black"/>
											</svg>
										</span>
                                <!--end::Svg Icon-->
                            </div>
                            <!--begin::User account menu-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="{{asset('assets/media/avatars/300-1.jpg')}}" src="{{image_url(auth()->user()->profile_image ?? '')}}"/>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Username-->
                                        <div class="d-flex flex-column">
                                            <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name ?? '' }}
                                                <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ auth()->user()->user_id ?? '' }}</span>
                                            </div>
                                            <a href="#"
                                               class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email ?? '' }}</a>
                                        </div>
                                        <!--end::Username-->
                                    </div>
                                </div>

                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="" id="logoutButton" class="menu-link px-5">تسجيل الخروج</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::User account menu-->
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::User menu-->
                        <!--begin::Chat-->
                        <div class="d-flex align-items-center ms-1 ms-lg-3">
                            <!--begin::Drawer wrapper-->
                            <img alt="" class="btn-icon rounded position-relative w-30px h-30px w-md-40px h-md-40px" src="{{image_url(auth()->user()->profile_image ?? '')}}"/>
{{--                            <div class="btn btn-icon btn-danger position-relative w-30px h-30px w-md-40px h-md-40px"--}}
{{--                                 id="kt_drawer_chat_toggle">3--}}
{{--                            </div>--}}
                            <!--end::Drawer wrapper-->
                        </div>
                        <!--end::Chat-->
                    </div>
                    <!--end::Toolbar wrapper-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Container-->
            <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                <!--begin::Post-->
                <div class="content flex-row-fluid" id="kt_content">
                    @yield('content')
                </div>
                <!--end::Post-->
            </div>
            <!--end::Container-->
            <!--begin::Footer-->
            <div class="footer pb-4 d-flex flex-lg-column" id="kt_footer">
                <!--begin::Container-->
                <div class="container-xxl d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-bold me-1">2023©</span>
                        <span class="text-gray-800 text-hover-primary">الجامعة الاسلامية (التعليم المستمر)</span>
                    </div>
                    <!--end::Copyright-->

                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--end::Modals-->
<!--begin::Javascript-->
@include('dash.partial.script')

@include('authentications.script.index')
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
