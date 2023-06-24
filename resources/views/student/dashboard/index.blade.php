@extends('dash.layout.index')
@section('content')
    @push('style')
        <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    @endpush
 <x-newsBar :notifications="$notifications" />
    <div class="row mt-5">
        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-3 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <i class="ki-duotone ki-compass fs-2hx text-gray-600"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">المعدل التراكمي</span>
                            <!--end::Number-->
                            <!--begin::Line-->
                            <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                            <!--end::Line-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>

             {{round(get(auth()->user(),'gpa',0),2)}}
        </span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-3 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <i class="ki-duotone ki-compass fs-2hx text-gray-600"><span class="path1"></span><span class="path2"></span></i>

                        </div>
                        <!--end::Icon-->

                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">رصيد الطالب</span>
                            <!--end::Number-->
                            <!--begin::Line-->
                            <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                            <!--end::Line-->
                        </div>
                        <!--end::Section-->
@php $balance = get(auth()->user(),'balance',0);  @endphp
                        <!--begin::Badge-->
                        <span class="badge badge-light-{{$balance > 0 ? 'success' : 'danger'}} fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>

            {{$balance}}
        </span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-3 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <i class="ki-duotone ki-compass fs-2hx text-gray-600"><span class="path1"></span><span class="path2"></span></i>

                        </div>
                        <!--end::Icon-->

                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">عدد ساعات النجاح</span>
                            <!--end::Number-->
                            <!--begin::Line-->
                            <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                            <!--end::Line-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>

            {{$passed_hour ?? 0}}
        </span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-3 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between align-items-start flex-column">
                        <!--begin::Icon-->
                        <div class="m-0">
                            <i class="ki-duotone ki-compass fs-2hx text-gray-600"><span class="path1"></span><span class="path2"></span></i>

                        </div>
                        <!--end::Icon-->

                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">عدد الساعات متبقية</span>
                            <!--end::Number-->
                            <!--begin::Line-->
                            <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                            <!--end::Line-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>

            {{$remind_hour ?? 0}}
        </span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
        </div>
    </div>
    <div class="row">
        <div class="card card-bordered">
            <div class="card-body">
                <div id="kt_amcharts_1" style="height: 500px;"></div>
            </div>
        </div>
    </div>
@push('script')
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script>
        am5.ready(function () {
            // Create root element
            var root = am5.Root.new("kt_amcharts_1");

            // Set themes
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            // Create chart
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "panX",
                wheelY: "zoomX",
                layout: root.verticalLayout
            }));

            // Add legend
            var legend = chart.children.push(
                am5.Legend.new(root, {
                    centerX: am5.p50,
                    x: am5.p50
                })
            );

            var data = [
                { year: "٢٠١٦", europe: 500, namerica: 300, asia: 600, lamerica: 200, meast: 400, africa: 100 },
                { year: "٢٠١٧", europe: 550, namerica: 350, asia: 650, lamerica: 250, meast: 450, africa: 150 },
                { year: "٢٠١٨", europe: 600, namerica: 400, asia: 700, lamerica: 300, meast: 500, africa: 200 },
                { year: "٢٠١٩", europe: 650, namerica: 450, asia: 750, lamerica: 350, meast: 550, africa: 250 },
                { year: "٢٠٢٠", europe: 700, namerica: 500, asia: 800, lamerica: 400, meast: 600, africa: 300 },
                { year: "٢٠٢١", europe: 750, namerica: 550, asia: 850, lamerica: 450, meast: 650, africa: 350 }
            ];

            // Create axes
            var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                categoryField: "year",
                renderer: am5xy.AxisRendererX.new(root, {
                    cellStartLocation: 0.1,
                    cellEndLocation: 0.9
                }),
                tooltip: am5.Tooltip.new(root, {})
            }));

            xAxis.data.setAll(data);

            var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                renderer: am5xy.AxisRendererY.new(root, {})
            }));

            // Add series
            function makeSeries(name, fieldName) {
                var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                    name: name,
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: fieldName,
                    categoryXField: "year"
                }));

                series.columns.template.setAll({
                    tooltipText: "{name}, {categoryX}:{valueY}",
                    width: am5.percent(90),
                    tooltipY: 0
                });

                series.data.setAll(data);

                series.appear();

                series.bullets.push(function () {
                    return am5.Bullet.new(root, {
                        locationY: 0,
                        sprite: am5.Label.new(root, {
                            text: "{valueY}",
                            fill: root.interfaceColors.get("alternativeText"),
                            centerY: 0,
                            centerX: am5.p50,
                            populateText: true
                        })
                    });
                });

                legend.data.push(series);
            }

            makeSeries("أوروبا", "europe");
            makeSeries("أمريكا الشمالية", "namerica");
            makeSeries("آسيا", "asia");
            makeSeries("أمريكا اللاتينية", "lamerica");
            makeSeries("الشرق الأوسط", "meast");
            makeSeries("أفريقيا", "africa");

            chart.appear(1000, 100);
        });
    </script>
@endpush
@endsection
