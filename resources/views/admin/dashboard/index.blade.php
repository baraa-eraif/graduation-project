@extends('dash.layout.index')

@section('content')
    @push('style')
        <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    @endpush
    <!--begin::Post-->
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Row-->
        <div class="row gy-0 gx-10">
            <!--begin::Col-->
            <div class="col-xl-8">
                <div class="card card-bordered">
                    <div class="card-body">
                        <div id="kt_apexcharts_4" style="height: 350px;"></div>
                    </div>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 12-->
                <div class="card mb-10">
                    <!--begin::Header-->
                    <div class="card-header border-0 bg-success py-5">
                        <h3 class="card-title fw-bolder text-white">احصائيات</h3>
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button type="button"
                                    class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color- border-0 me-n3"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                <span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24">
															<g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
																<rect x="5" y="5" width="5" height="5" rx="1"
                                                                      fill="#000000"/>
																<rect x="14" y="5" width="5" height="5" rx="1"
                                                                      fill="#000000" opacity="0.3"/>
																<rect x="5" y="14" width="5" height="5" rx="1"
                                                                      fill="#000000" opacity="0.3"/>
																<rect x="14" y="14" width="5" height="5" rx="1"
                                                                      fill="#000000" opacity="0.3"/>
															</g>
														</svg>
													</span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 3-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Create Invoice</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                           title="Specify a target name for future usage and reference"></i></a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Generate Bill</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                     data-kt-menu-placement="right-end">
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">Subscription</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Plans</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Billing</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Statements</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3">
                                                <!--begin::Switch-->
                                                <label
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input w-30px h-20px" type="checkbox"
                                                           value="1" checked="checked" name="notifications"/>
                                                    <!--end::Input-->
                                                    <!--end::Label-->
                                                    <span class="form-check-label text-muted fs-6">Recuring</span>
                                                    <!--end::Label-->
                                                </label>
                                                <!--end::Switch-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-1">
                                    <a href="#" class="menu-link px-3">Settings</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body p-0">
                        <!--begin::Chart-->
                        <div class="mixed-widget-12-chart card-rounded-bottom bg-success" data-kt-color="success"
                             style="height: 250px"></div>
                        <!--end::Chart-->
                        <!--begin::Stats-->
                        <div class="card-rounded bg-body mt-n10 position-relative card-px py-15">
                            <!--begin::Row-->
                            <div class="row g-0 mb-7">
                                <!--begin::Col-->
                                <div class="col mx-5">
                                    <div class="fs-6 text-gray-400">عدد الطلاب</div>
                                    <div class="fs-2 fw-bolder text-gray-800">{{$studentCount}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col mx-5">
                                    <div class="fs-6 text-gray-400">عدد المساقات</div>
                                    <div class="fs-2 fw-bolder text-gray-800">{{$courseCount}}</div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <div class="row g-0">
                                <!--begin::Col-->
                                <div class="col mx-5">
                                    <div class="fs-6 text-gray-400">عدد افراد الهيئة التدريسة</div>
                                    <div class="fs-2 fw-bolder text-gray-800">{{$teacherCount}}</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col mx-5">
                                    <div class="fs-6 text-gray-400">عدد التخصصات</div>
                                    <div class="fs-2 fw-bolder text-gray-800">{{$specializationCount}}</div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Mixed Widget 12-->


            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Post-->
    @push('script')
        <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
        <script>
            var element = document.getElementById('kt_apexcharts_4');

            var height = parseInt(KTUtil.css(element, 'height'));
            var labelColor = KTUtil.getCssVariableValue('--kt-gray-500');
            var borderColor = KTUtil.getCssVariableValue('--kt-gray-200');

            var baseColor = KTUtil.getCssVariableValue('--kt-success');
            var baseLightColor = KTUtil.getCssVariableValue('--kt-success-light');
            var secondaryColor = KTUtil.getCssVariableValue('--kt-warning');
            var secondaryLightColor = KTUtil.getCssVariableValue('--kt-warning-light');

            if (element) {
                var options = {
                    series: [{
                        name: 'Net Profit',
                        data: [60, 50, 80, 40, 100, 60]
                    }, {
                        name: 'Revenue',
                        data: [70, 60, 110, 40, 50, 70]
                    }],
                    chart: {
                        fontFamily: 'inherit',
                        type: 'area',
                        height: height,
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {},
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    fill: {
                        type: 'solid',
                        opacity: 1
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false
                        },
                        labels: {
                            style: {
                                colors: labelColor,
                                fontSize: '12px'
                            }
                        },
                        crosshairs: {
                            position: 'front',
                            stroke: {
                                color: labelColor,
                                width: 1,
                                dashArray: 3
                            }
                        },
                        tooltip: {
                            enabled: true,
                            formatter: undefined,
                            offsetY: 0,
                            style: {
                                fontSize: '12px'
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: labelColor,
                                fontSize: '12px'
                            }
                        }
                    },
                    states: {
                        normal: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: false,
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: '12px'
                        },
                        y: {
                            formatter: function (val) {
                                return '$' + val + ' thousands'
                            }
                        }
                    },
                    colors: [baseColor, secondaryColor],
                    grid: {
                        borderColor: borderColor,
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: true
                            }
                        }
                    },
                    markers: {
                        colors: [baseLightColor, secondaryLightColor],
                        strokeColor: [baseLightColor, secondaryLightColor],
                        strokeWidth: 3
                    }
                };

                var chart = new ApexCharts(element, options);
                chart.render();
            }

        </script>
    @endpush
@endsection
