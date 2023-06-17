@extends('dash.layout.index')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Title</h3>
            <div class="card-toolbar">
                <button type="button" class="btn btn-sm btn-light">
                    Action
                </button>
            </div>
        </div>
        <div class="card-body">
            <!--begin::Row-->
            @foreach($specialization_years as $index => $year_text)
                <div class="row row-cols-lg-12 g-10">
                    <h1>{{$year_text}}</h1>
                    @foreach($specialization_season as $season_index => $season_text)
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Card-->
                            <div class="card card-bordered mb-4 hover-elevate-up shadow-sm parent-hover">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h3 class="card-label">{{trans("lang.$season_text")}}</h3>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body">
                                    <!--begin::Row-->
                                    <div class="row row-cols-1 g-10 min-h-200px draggable-zone">
                                        @foreach($specialization_courses as  $course)
                                            @if((get($course,'study_year') == $index + 1 ) && (get($course,'study_season') == $season_index + 1))
                                                <!--begin::Col-->
                                                <div class="col ">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered"
                                                               style="border: 1px solid black;">
                                                            <thead>
                                                            <tr class="fw-bold fs-6 text-gray-800"
                                                                style="border: 1px solid black;">
                                                                <th class="col-9 text-center">المادة</th>
                                                                <th class="text-center">عدد الساعات</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr style="border: 1px solid black;">
                                                                <td class="text-center">{{$course->name}}</td>
                                                                <td class="text-center">{{$course->hour_number}}</td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--begin::Card-->
                                                    {{--                                                    <div class="form-check">--}}
                                                    {{--                                                        <input class="form-check-input" name="{{$course->id}}"--}}
                                                    {{--                                                               type="checkbox"--}}
                                                    {{--                                                               value=""--}}
                                                    {{--                                                               id="{{$course->id}}"/>--}}
                                                    {{--                                                        <label class="form-check-label" for="{{$course->id}}">--}}
                                                    {{--                                                            {{$course->name}}--}}
                                                    {{--                                                        </label>--}}
                                                    {{--                                                    </div>--}}
                                                    <!--end::Card-->
                                                </div>
                                                <!--end::Col-->
                                            @endif
                                        @endforeach
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Col-->
                    @endforeach
                </div>
                <!--end::Row-->
            @endforeach
        </div>
    </div>
@endsection
