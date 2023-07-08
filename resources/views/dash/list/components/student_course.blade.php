@php
    $semester = current_semester();
    $number_registration_course = auth()->user()->registrationCourses()->sum('course_data->hour_number') ?? 0;
@endphp
@if($semester)
    <div style="direction: rtl" class="d-flex flex-wrap gap-2 justify-content-between mb-8">
        <div class="d-flex align-items-center flex-wrap gap-2">
            <!--begin::Heading-->
            <h5 class="me-3 my-1">الفصل الدراسي</h5>
            <!--begin::Heading-->

            <!--begin::Badges-->
            <span
                class="badge badge-light-primary my-1 me-2">{{ get($semester,'ordered') == 1 ? 'الأول' : 'الثاني' }}</span>
            {{--            <span class="badge badge-light-danger my-1">important</span>--}}
            <!--end::Badges-->
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <!--begin::Heading-->
            <h5 class="me-3 my-1">عدد ساعات الفصل الحالي</h5>
            <!--begin::Heading-->

            <!--begin::Badges-->
            <span class="badge badge-light-primary my-1 me-2">{{ get($semester,'number_of_hour')}}</span>
            {{--            <span class="badge badge-light-danger my-1">important</span>--}}
            <!--end::Badges-->
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <!--begin::Heading-->
            <h5 class="me-3 my-1">تاريخ نهاية الاضافة</h5>
            <!--begin::Heading-->

            <!--begin::Badges-->
            <span class="badge badge-light-danger my-1 me-2">{{ formatDates(get($semester,'end_date'),'Y-m-d') }}</span>
            {{--            <span class="badge badge-light-danger my-1">important</span>--}}
            <!--end::Badges-->
        </div>
        <div class="d-flex align-items-center flex-wrap gap-2">
            <!--begin::Heading-->
            <h5 class="me-3 my-1">عدد الساعات المسجلة للفصل الحالي</h5>
            <!--begin::Heading-->

            <!--begin::Badges-->
            <span class="badge badge-light-primary my-1 me-2">{{ $number_registration_course }}</span>
            {{--            <span class="badge badge-light-danger my-1">important</span>--}}
            <!--end::Badges-->
        </div>
    </div>
@endif
