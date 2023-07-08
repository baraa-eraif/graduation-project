@extends('dash.layout.index')
@section('content')
    <div class="card shadow-sm">
        <div class="card-body scroll-y mx-5 mx-xl-18 pt-10 pb-15">
            <!--begin::Content-->
            <div class="text-center mb-12">
                <h1 class="fw-bolder mb-3">مالية الطالب</h1>
                <div class="text-gray-400 fw-bold fs-5">اضافة رصيد الى الطالب</div>
            </div>
            <!--end::Content-->
            <!--begin::Search-->
            <div id="kt_modal_customer_search_handler" data-kt-search-keypress="true"
                 data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
                <!--begin::Form-->
                <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">
                    <!--begin::Hidden input(Added to disable form autocomplete)-->
                    <input type="hidden"/>
                    <!--end::Hidden input-->
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span
                        class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                                  height="2" rx="1"
                                                                  transform="rotate(45 17.0365 15.1223)" fill="black"/>
															<path
                                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                                fill="black"/>
														</svg>
													</span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-lg form-control-solid px-15" id="search"
                           name="search" value="" placeholder="ابحث بواسطة رقم الطالب  ..."
                           data-kt-search-element="input"/>
                    <!--end::Input-->
                    <!--begin::Spinner-->
                    <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                          id="spinner" data-kt-search-element="spinner">
														<span
                                                            class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
													</span>
                    <!--end::Spinner-->
                    <!--begin::Reset-->
                    <span
                        class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                        id="clear" data-kt-search-element="clear">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
														<span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                      height="2" rx="1"
                                                                      transform="rotate(-45 6 17.3137)" fill="black"/>
																<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                      transform="rotate(45 7.41422 6)" fill="black"/>
															</svg>
														</span>
                        <!--end::Svg Icon-->
													</span>
                    <!--end::Reset-->
                </form>
                <!--end::Form-->
                <!--begin::Wrapper-->
                <div class="py-5">
                    <!--begin::Suggestions-->
                    <div id="suggestions">
                        <!--begin::Illustration-->
                        <div class="text-center px-4 pt-10">
                            <img src="{{asset('assets/media/illustrations/sketchy-1/4.png')}}" alt=""
                                 class="mw-100 mh-200px"/>
                        </div>
                        <!--end::Illustration-->
                    </div>
                    <!--end::Suggestions-->
                    <!--begin::Results-->
                    <div data-kt-search-element="results" id="student-result" class="d-none">
                        <!--begin::Users-->

                        <!--end::Users-->
                    </div>
                    <!--end::Results-->

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Search-->
        </div>
    </div>

    <div id="student-info-div">

    </div>

    @push('script')
        {{--        <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>--}}
        <script>
            $(document).ready(function () {
                // Search input keyup event handler
                let spinner = $('#spinner');
                let clear = $('#clear');
                let suggestions = $('#suggestions');
                $("#search").keyup(function () {
                    $('#student-info-div').html('');
                    let value = $(this).val(); // Get the search term from the input
                    if (value.length > 0) {
                        spinner.removeClass('d-none')
                        clear.addClass('d-none')
                    }
                    setTimeout((function () {
                        ajax_request(`admin/financial/search-student`, {q: value}, function (response) {
                            suggestions.addClass('d-none')
                            $('#student-result').removeClass('d-none').html(response.view);
                            spinner.addClass('d-none')
                            clear.removeClass('d-none')
                        }, 'get')
                    }), 1500)
                });

                $(document).on('click', '#clear', function (e) {
                    $("#search").val('');
                    clear.addClass('d-none')
                    $('#student-result').html('')
                });


                $(document).on('click', '#student-profile-link', function (e) {
                    let student_id = $(this).data('student_id');
                    Swal.fire({
                        html: `<div class="mb-7"> ${student_id} اضافة رصيد للطالب صاحب الرفم الجامعي </div><div class="fw-bolder mb-5">الرجاء ادخال المبلغ المراد اضافته</div><input type="text" class="form-control" name="amount" />`,
                        icon: "info",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم, اضف الرصبد",
                        cancelButtonText: "لا, الغاء",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            let amount = document.querySelector(`input[name="amount"]`).value;
                            if (isNaN(amount) || !$.isNumeric(amount) || amount < 0) {
                                Swal.fire({
                                    text: "الرجاء ادخال مبلغ صالج",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "حسناً",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    }
                                });
                            }
                            ajax_request('admin/financial/add-amount', {
                                amount: amount,
                                student_id: student_id,
                            }, function (response) {
                                $('#student-info-div').html(response.view);
                            })
                        }
                    });
                })


                $(document).on('click','#show-student-info',function () {
                    let student_id = $(this).data('student_id')
                    ajax_request(`admin/student/financial/${student_id}`,{},function (response) {
                        $('#student-info-div').html(response.view);
                    },'get')
                })
            });
            //
        </script>
    @endpush
@endsection
