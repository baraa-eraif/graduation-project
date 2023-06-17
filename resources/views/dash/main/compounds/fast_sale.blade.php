<div class="col-md-4 col-lg-12 col-xxl-2">
    <label
        class="btn btn-outline btn-outline-dashed btn-outline-default active d-flex text-start p-6"
        data-kt-button="true">
        <!--begin::Radio button-->
        <span
            class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
																<input class="form-check-input" type="radio"
                                                                       name="selected_product" value="{{$product['id']}}" checked="checked"/>
															</span>
        <!--end::Radio button-->
        <span class="ms-5">
																<span
                                                                    class="fs-4 fw-bolder mb-1 d-block">{{$product['name']}}</span>
															</span>
    </label>
</div>
