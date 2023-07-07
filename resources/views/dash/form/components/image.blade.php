<!--begin::Row-->
<div class="row mb-5 mt-3">
    <!--begin::Col-->
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-lg-6">
        <!--begin::Image input-->
        <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/files/blank-image-dark.svg')">
            <!--begin::Preview existing avatar-->
            <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 95%; background-image: url({{ ${$input['model']}  ?? null  }})"></div>
            <!--end::Preview existing avatar-->
            <!--begin::Label-->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                <i class="bi bi-pencil-fill fs-7"></i>
                <!--begin::Inputs-->
                <input type="file" name="{{$input['model']}}" />
{{--                <input type="hidden" name="{{$input['model']}}" />--}}
                <!--end::Inputs-->
            </label>
            <!--end::Label-->
            <!--begin::Cancel-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
														<i class="bi bi-x fs-2"></i>
													</span>
            <!--end::Cancel-->
            <!--begin::Remove-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
														<i class="bi bi-x fs-2"></i>
													</span>
            <!--end::Remove-->
        </div>
        <!--end::Image input-->
        <!--begin::Hint-->
        <div class="form-text">  png، jpg، jpeg.<span>  : أنواع الملفات المسموح بها </span></div>
        <!--end::Hint-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
