<div id="kt_aside" class="aside px-5" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="true"
     data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '285px'}"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 me-n4 pe-4" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_footer"
             data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="2px">
            <!--begin::Menu-->
            <div class="menu menu-rounded menu-column menu-gray-600 menu-state-bg fw-semibold w-250px" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">

                @foreach(genrate_menu_item() as $item)
                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-0">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{ trans('lang.'. remove_string('.index',$item)) }}</span>
                        </div>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ routeContains(remove_string('.index',$item)) ? 'active show' : null }}" href="{{route($item)}}" title="Build your layout and export HTML for server side integration" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="black" />
													<path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="black" />
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
                            <span class="menu-title">{{ trans('lang.'. remove_string('.index',$item)) }}</span>
                        </a>
                    </div>
{{--                    <a  href="{{route($item)}}" class="menu-item menu-accordion {{ routeContains(remove_string('.index',$item)) ? 'here show' : null }}">--}}
{{--									<span class="menu-link">--}}
{{--										<span class="menu-icon">--}}
{{--											<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->--}}
{{--											<span class="svg-icon svg-icon-2">--}}
{{--												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
{{--                                                     viewBox="0 0 24 24" fill="none">--}}
{{--													<rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>--}}
{{--													<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"--}}
{{--                                                          fill="black"/>--}}
{{--													<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"--}}
{{--                                                          fill="black"/>--}}
{{--													<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"--}}
{{--                                                          fill="black"/>--}}
{{--												</svg>--}}
{{--											</span>--}}
{{--                                            <!--end::Svg Icon-->--}}
{{--										</span>--}}
{{--										<span class="menu-title">{{ trans('lang.'. remove_string('.index',$item)) }}</span>--}}
{{--									</span>--}}
{{--                    </a>--}}

                @endforeach

            </div>
            </div>
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Aside menu-->

</div>
