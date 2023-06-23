<div class="d-flex flex-column flex-lg-row mt-20">
    <!--begin::Content-->
    <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
        <!--begin::Form-->
        <form class="form" action="#" id="kt_subscriptions_create_new">
            <!--begin::Pricing-->
            <div class="card card-flush pt-3 mb-5 mb-lg-10  shadow-sm">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="fw-bolder">الحركات المالية</h2>
                    </div>
                    <!--begin::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table wrapper-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 fw-bold gy-4" id="kt_subscription_products_table">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-300px">المبلغ</th>
                                <th class="min-w-100px">التاريخ & الوقت</th>
                                <th class="min-w-70px text-end">الوصف</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600">
                            @if($balanceTransactions)
                                @foreach($balanceTransactions as $balanceTransaction)
                                    <tr>
                                        <td><span class="badge badge-light-{{ in_array(get($balanceTransaction,'transaction_type'),\App\Http\Controllers\StudentWallet::CREDIT_TRANSACTIONS) ? 'danger' : 'success'  }}">{{get($balanceTransaction,'amount')}}</span></td>
                                        <td>{{formatDates(get($balanceTransaction,'created_at'))}}</td>
                                        <td  class="text-end">{{trans('lang.'.get($balanceTransaction,'transaction_type'))}}</td>
                                    </tr>
                                @endforeach
                            @endif



                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table wrapper-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Pricing-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
    <!--begin::Sidebar-->
    <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
        <!--begin::Card-->
        <div class="card card-flush pt-3 mb-0  shadow-sm" data-kt-sticky="true" data-kt-sticky-name="subscription-summary" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>بيانات الطالب</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0 fs-6">
                <!--begin::Section-->
                <div class="mb-7">
                    <!--begin::Title-->
{{--                    <h5 class="mb-3">Customer details</h5>--}}
                    <!--end::Title-->
                    <!--begin::Details-->
                    <div class="d-flex align-items-center mb-1">
                        <!--begin::Name-->
                        <a href="../../demo18/dist/apps/customers/view.html" class="fw-bolder text-gray-800 text-hover-primary me-2">{{$name ?? ''}}</a>
                        <!--end::Name-->
                        <!--begin::Status-->
                        <span class="badge badge-light-success">{{ $student_id ?? '' }}</span>
                        <!--end::Status-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Email-->
                    <a href="#" class="fw-bold text-gray-600 text-hover-primary">{{ $email ?? '' }}</a>
                    <!--end::Email-->
                </div>
                <!--end::Section-->
                <!--begin::Seperator-->
                <div class="separator separator-dashed mb-7"></div>
                <!--end::Seperator-->
                <!--begin::Section-->
                <div class="mb-7">
                    <!--begin::Title-->
                    <h5 class="mb-3">رصيد الطالب</h5>
                    <!--end::Title-->
                    <!--begin::Details-->
                    <div class="mb-0">
                        <!--begin::Plan-->
                        <span class="badge badge-light-info me-2">دينار</span>
                        <!--end::Plan-->
                        <!--begin::Price-->
                        <span class="fw-bold text-gray-600">{{$balance ?? ''}}</span>
                        <!--end::Price-->
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Section-->
                <!--begin::Seperator-->
                <div class="separator separator-dashed mb-7"></div>
                <!--end::Seperator-->
{{--                <!--begin::Section-->--}}
{{--                <div class="mb-10">--}}
{{--                    <!--begin::Title-->--}}
{{--                    <h5 class="mb-3">Payment Details</h5>--}}
{{--                    <!--end::Title-->--}}
{{--                    <!--begin::Details-->--}}
{{--                    <div class="mb-0">--}}
{{--                        <!--begin::Card info-->--}}
{{--                        <div class="fw-bold text-gray-600 d-flex align-items-center">Mastercard--}}
{{--                            <img src="assets/media/svg/card-logos/mastercard.svg" class="w-35px ms-2" alt="" /></div>--}}
{{--                        <!--end::Card info-->--}}
{{--                        <!--begin::Card expiry-->--}}
{{--                        <div class="fw-bold text-gray-600">Expires Dec 2024</div>--}}
{{--                        <!--end::Card expiry-->--}}
{{--                    </div>--}}
{{--                    <!--end::Details-->--}}
{{--                </div>--}}
{{--                <!--end::Section-->--}}
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Sidebar-->
</div>
