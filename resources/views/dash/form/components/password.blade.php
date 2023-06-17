    <!--begin::Input group-->
    <div class="mb-10 fv-row" data-kt-password-meter="true">
        <!--begin::Wrapper-->
        <div class="mb-1">
            <!--begin::Label-->

            <!--end::Label-->

            <!--begin::Input wrapper-->
            <div class="position-relative mb-3">
                <input class="form-control" id="floatingInput" type="password" placeholder=" أدخل {{ trans('lang.'.$input['model']) }} "  name="{{ $input['model'] }}" autocomplete="off" />

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
        <div class="text-muted text-end">
            استخدم 8 أحرف أو أكثر مع مزيج من الأحرف والأرقام والرموز.
        </div>
        <!--end::Hint-->
    </div>    <!--end::Input group--->



