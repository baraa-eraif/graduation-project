@extends('dash.layout.index')
@section('content')
    @push('style')
        <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    @endpush
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
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">عدد الطلاب</span>
                            <!--end::Number-->
                            <!--begin::Line-->
                            <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-danger translate rounded"></span>
                            <!--end::Line-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Badge-->
                        <span class="badge badge-light-danger fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-danger ms-n1"><span class="path1"></span><span class="path2"></span></i>

             {{$studentCount ?? 0}}
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
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">عدد المساقات</span>
                            <!--end::Number-->
                            <!--begin::Line-->
                            <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-danger translate rounded"></span>
                            <!--end::Line-->
                        </div>
                        <!--end::Section-->
                    <!--begin::Badge-->
                        <span class="badge badge-light-danger fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-danger ms-n1"><span class="path1"></span><span class="path2"></span></i>

             {{$courseCount ?? 0}}
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
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">عدد افراد الهيئة التدريسة</span>
                            <!--end::Number-->
                            <!--begin::Line-->
                            <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-danger translate rounded"></span>
                            <!--end::Line-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Badge-->
                        <span class="badge badge-light-danger fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-danger ms-n1"><span class="path1"></span><span class="path2"></span></i>

            {{$teacherCount ?? 0}}
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
                            <span class="fw-semibold fs-2x text-gray-800 lh-1 ls-n2">عدد التخصصات</span>
                            <!--end::Number-->
                            <!--begin::Line-->
                            <span class="d-inline-block position-absolute h-8px bottom-0 end-0 start-0 bg-danger translate rounded"></span>
                            <!--end::Line-->
                        </div>
                        <!--end::Section-->

                        <!--begin::Badge-->
                        <span class="badge badge-light-danger fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-danger ms-n1"><span class="path1"></span><span class="path2"></span></i>

            {{$specializationCount ?? 0}}
        </span>
                        <!--end::Badge-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <!--end::Col-->
        </div>
        <div class="row gy-5 g-xl-10">
            <div class="col-sm-6 col-xl-6 mb-xl-10">
              <div class="card">
                  <div class="card-body">
                      <h3>احدث المساقات</h3>
                      <div class="table-responsive">
                          <table class="table table-striped gy-7 gs-7">
                              <thead>
                              <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                  @isset($course_columns)
                                      @foreach($course_columns as $column)
                                  <th>{{trans("lang.$column")}}</th>
                                      @endforeach
                                  @endisset
                              </tr>
                              </thead>
                              <tbody>
                              @isset($course_columns,$course_collection)
                                  @foreach($course_collection as $row)
                              <tr>
                                  @foreach($course_columns as $column)
                                      <td>{{get($row,$column)}}</td>
                                  @endforeach
                              </tr>
                                  @endforeach
                              @endisset

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-6 mb-xl-10">
              <div class="card">
                  <div class="card-body">
                      <h3>احدث الطلاب</h3>
                      <div class="table-responsive">
                          <table class="table table-striped gy-7 gs-7">
                              <thead>
                              <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                  @isset($student_columns)
                                      @foreach($student_columns as $column)
                                  <th>{{trans("lang.$column")}}</th>
                                      @endforeach
                                  @endisset
                              </tr>
                              </thead>
                              <tbody>
                              @isset($student_columns,$student_collection)
                                  @foreach($student_collection as $row)
                              <tr>
                                  @foreach($student_columns as $column)
                                      <td>{{get($row,$column)}}</td>
                                  @endforeach
                              </tr>
                                  @endforeach
                              @endisset

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

@endsection
