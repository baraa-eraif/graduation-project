@extends('dash.layout.index')
@section('content')
    @push('style')
        <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    @endpush
 <x-newsBar :notifications="$notifications" />
    <div class="row mt-5">
        <div class="row gy-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-4 mb-xl-10">
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
            <div class="col-sm-6 col-xl-4 mb-xl-10">
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
            <div class="col-sm-6 col-xl-4 mb-xl-10">
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
            <div class="col-sm-6 col-xl-4 mb-xl-10">
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
            <!--begin::Col-->
            <div class="col-sm-6 col-xl-4 mb-xl-10">
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
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">الساعات المسجلة</span>
                            <!--end::Number-->
                            <!--begin::Line-->
                            <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-success translate rounded"></span>
                            <!--end::Line-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Badge-->
                        <span class="badge badge-light-success fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>

            {{$enrolled_hours ?? 0}}
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

@endsection
