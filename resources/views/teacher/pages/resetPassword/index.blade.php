@extends('dash.layout.index')
@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="card-title">إعادة تعيين كلمة المرور</h3>
            <div class="card-toolbar">
                {{-- <button type="button" class="btn btn-sm btn-light">--}}
                {{-- إجراء--}}
                {{-- </button>--}}
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-550px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="form w-100" action="{{route('teacher.reset-password')}}" method="post" id="reset_password_form">
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">إعداد كلمة المرور الجديدة</h1>
                                <!--end::Title-->
                            </div>
                            <!--begin::Heading-->
                            <div class="fv-row mb-10">
                                <label class="form-label fw-bolder text-dark fs-6">كلمة المرور القديمة</label>
                                <input class="form-control form-control-lg form-control-solid" type="password"  name="oldPassword" autocomplete="off" />
                            </div>
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6">كلمة المرور</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" id="password" autocomplete="off" />
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
<i class="bi bi-eye-slash fs-2"></i>
<i class="bi bi-eye fs-2 d-none"></i>
</span>
                                    </div>
                                    <!--end::Input wrapper-->
                                    <!--begin::Meter-->
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                    <!--end::Meter-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Hint-->
                                <div class="text-muted">استخدم 8 أحرف أو أكثر بمزيج من الحروف والأرقام والرموز.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-10">
                                <label class="form-label fw-bolder text-dark fs-6">تأكيد كلمة المرور</label>
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirmPassword" autocomplete="off" />
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Action-->
                            <div class="text-center">
                                <button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
                                    <span class="indicator-label">تأكيد</span>
                                    <span class="indicator-progress">يرجى الانتظار...
<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Action-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
    @push('script')
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function () {

                $('#reset_password_form').validate({
                    rules: {
                        password: {
                            required: true,
                            minlength: 8,
                        },
                        confirmPassword: {
                            required: true,
                            equalTo: "#password",
                        },
                        oldPassword: {
                            required: true,
                        },
                    },
                    messages: {
                        oldPassword: {
                            required: "يرجى إدخال كلمة المرور القديمة.",
                        },
                        password: {
                            required: "يرجى إدخال كلمة المرور.",
                            minlength: "يجب أن تكون كلمة المرور على الأقل 8 أحرف."
                        },
                        confirmPassword: {
                            required: "يرجى تأكيد كلمة المرور.",
                            equalTo: "كلمات المرور غير متطابقة."
                        }
                    },
                    submitHandler: function (form) {
                        // Handle the form submission
                        // form.submit();
                        $.ajax({
                            url: form.action,
                            type: form.method,
                            data: $(form).serialize(),
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                // Handle success response
                                console.log(response);
                                if (!response.status) {
                                    Swal.fire({
                                        text: response.message,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "حسناً",
                                        customClass: {
                                            confirmButton: "btn fw-bold btn-primary",
                                        }
                                    });
                                    return;
                                }

                                window.location.href = window.location.origin + `/${response.route}/login`;
                                // Swal.fire({
                                //     text: response.message,
                                //     icon: "success",
                                //     buttonsStyling: false,
                                //     confirmButtonText: "حسناً",
                                //     customClass: {
                                //         confirmButton: "btn fw-bold btn-primary",
                                //     }
                                // });
                                // form.reset();
                                // ...
                            },
                            error: function (xhr, status, error) {
                                // Handle error response
                                console.log(xhr.responseText);
                                Swal.fire({
                                    title: xhr.responseText,
                                    text: '',
                                    icon: 'error',
                                    confirmButtonText: 'حسناً',
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-danger",
                                        cancelButton: "btn fw-bold btn-active-light-primary"
                                    }
                                });
                                // ...
                            }
                        });
                    }
                });
            });
        </script>

    @endpush
@endsection

