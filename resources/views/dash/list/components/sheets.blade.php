<div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">إستيراد ملف</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                     data-bs-dismiss="modal" aria-label="Close">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                          height="2" rx="1"
                                                                          transform="rotate(-45 6 17.3137)"
                                                                          fill="black"/>
																	<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                                          transform="rotate(45 7.41422 6)"
                                                                          fill="black"/>
																</svg>
															</span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            @if(get($config,'importBtn',true))
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form action="{{ route(current_route().'-file-import') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Input-->
                            <a href="{{ route(current_route().'-example-import') }}"
                               class="btn btn-light-warning d-flex"><i
                                    class="bi-cloud-download"></i> قم بتحميل النموذج </a>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mb-2">إرفاق النموذج :</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" name="file" class="form-control"
                                   placeholder="إرفاق النموذج ">
                            <!--end::Input-->
                        </div>

                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                إلغاء
                            </button>
                            <button type="submit" class="btn btn-primary"
                                    data-kt-users-modal-action="submit">
                                <span class="indicator-label">حفظ</span>
                                <span class="indicator-progress">Please wait...
																	<span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            @endif

        </div>
    </div>
</div>
