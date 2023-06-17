<div class="d-flex align-items-center py-3 py-md-1 mb-2">
    <!--begin::Wrapper-->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#kt_modal_2">إنشاء الطلبات السريعة</button>
    <!--end::Button-->
</div>
<div class="modal bg-white fade" tabindex="-1" id="kt_modal_2">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content shadow-none">
            <form method="post" action="{{route('store.fast_sale')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">الطلبات السريعة</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body scroll-y m-5">
                    <!--begin::Stepper-->
                    <div data-kt-stepper-element="content">

                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <!--begin::Heading-->
                            <!--end::Heading-->
                            <!--begin::Input group-->
                            <div class="row mb-15">
                                <!--begin::Col-->
                                <div class="col-xl-12">
                                    <!--begin::Row-->
                                    <div class="row g-9" data-kt-buttons="true"
                                         data-kt-buttons-target="[data-kt-button]">
                                        <!--begin::Col-->
                                    @foreach($products['model'] as $product)
                                        @include('dash.main.compounds.fast_sale')
                                    @endforeach
                                    <!--end::Col-->
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                            </div>

                            <!--begin::Row-->
                            <div class="row mb-8">
                                <!--begin::Col-->
                                <div class="col-xl-3">
                                    <div class="fs-6 fw-bold mt-2 mb-3">الكمية</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-9">
                                    @include('dash.main.compounds.counter_input')
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <!--end::Input group-->
                            <!--begin::Actions-->

                            <!--end::Actions-->
                        </div>
                        <!--end::Wrapper-->
                    </div>

                    <!--end::Stepper-->
                </div>

                <div class="modal-footer fixed-bottom">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-lg btn-primary" data-kt-stepper-action="next">حفظ
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                        <span class="svg-icon svg-icon-3 ms-1 me-0">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
													<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
												</svg>
											</span>
                        <!--end::Svg Icon--></button>
                </div>
            </form>

        </div>
    </div>
</div>
<!--end::Actions-->
