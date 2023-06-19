<div class="mh-300px scroll-y me-n5 pe-5">
    @forelse($students as $student)
        <!--begin::User-->
        <div id="student-profile-link" data-student-id="{{get($student,'student_id')}}"
             class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1"
             data-kt-search-element="customer">
            <!--begin::Avatar-->
            <div class="symbol symbol-35px symbol-circle me-5">
                <img alt="Pic" src="{{asset('assets/media/avatars/300-1.jpg')}}"/>
            </div>
            <!--end::Avatar-->
            <!--begin::Info-->
            <div class="d-flex justify-content-around">
                <div class="fw-bold">
                    <span class="fs-6 text-gray-800 me-2">{{get($student,'student_id')}}</span>
                    <span class="badge badge-light">{{get($student,'name')}}</span>
                </div>
                <div>
                    <span class="fs-6 text-gray-800 me-2">الرصيد</span>
                    <span class="badge badge-light">{{get($student,'balance')}}</span>
                </div>
            </div>
            <!--end::Info-->
        </div>
        <!--end::User-->
    @empty
        <!--begin::Empty-->
        <div class="text-center">
            <!--begin::Message-->
            <div class="fw-bold py-0 mb-10">
                <div class="text-gray-600 fs-3 mb-2">لا توجد نتائج مشابهة</div>
                <div class="text-gray-400 fs-6">الرجاء التاكد من رقم الطالب المدخل ...
                </div>
            </div>
            <!--end::Message-->
            <!--begin::Illustration-->
            <div class="text-center px-4">
                <img src="{{asset('assets/media/illustrations/sketchy-1/9.png')}}" alt="user"
                     class="mw-100 mh-200px"/>
            </div>
            <!--end::Illustration-->
        </div>
        <!--end::Empty-->
    @endforelse

</div>
