@extends('dash.layout.index')
@section('content')
    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
    @isset($statistics)
        @foreach($statistics as $key=>$value)
            <!--begin::Col-->
                <div class="col-sm-6 col-xl-2 mb-xl-10">
                    <!--begin::Card widget 2-->
                    <div class="card h-lg-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between flex-column">
                            <!--begin::Icon-->
                            <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="w-35px" alt=""/>
                            <!--end::Icon-->
                            <!--begin::Section-->
                            <div class="d-flex flex-column my-7">
                                <!--begin::Number-->
                                <span class="fw-bold fs-3x text-gray-800 lh-1" style="width: 200px;">{{ (float)$value }}</span>
                                <!--end::Number-->
                                <!--begin::Follower-->
                                <span class="fw-bold fs-6 text-gray-400">{{ trans('lang.'.$key) }}</span>
                                <!--end::Follower-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Statistics-->
                            <div class="m-0">
                                <!--begin::Badge-->
                                <span class="badge badge-success d-inline-flex flex-center px-2">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
												<span class="svg-icon svg-icon-7 svg-icon-white">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<path opacity="0.5"
                                                              d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z"
                                                              fill="black"/>
														<path
                                                            d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z"
                                                            fill="black"/>
													</svg>
												</span>
                                    <!--end::Svg Icon-->2.1 %</span>
                                <!--end::Badge-->
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <!--end::Col-->
            @endforeach
        @endisset
    </div>
    @if(isset($model) && $model->getEnableFastSale())
        <!--begin::Actions-->
        @include('dash.main.compounds.fast_sale_template')
        <!--end::Row-->
    @endif
    @if(isset($todaySale,$todayOrder))
        <!--begin::Col-->
    <div class="row">
        <!--begin::Tables Widget 5-->
        <div class="card card-xxl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">{{trans('lang.today_info')}}</span>
                    <span class="text-muted mt-1 fw-bold fs-7">More than 400 new products</span>
                </h3>
                <div class="card-toolbar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 me-1 active"
                               data-bs-toggle="tab" href="#kt_table_widget_5_tab_1">{{ trans('lang.today_order') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 me-1"
                               data-bs-toggle="tab" href="#kt_table_widget_5_tab_2">{{ trans('lang.today_sale') }}</a>
                        </li>
                        {{--                    <li class="nav-item">--}}
                        {{--                        <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4" data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">{{ trans('lang.today_order') }}</a>--}}
                        {{--                    </li>--}}
                    </ul>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
                <div class="card-body py-3">
                    <div class="tab-content">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="border-0">
                                        @foreach($todayOrder['columns'] as $column)
                                            <th class="p-0 w-50px">{{trans('lang.'.$column)}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                    @foreach($todayOrder['model'] as $row)
                                        <tr>
                                            @foreach($todayOrder['columns'] as $column)
                                                <td>{{$row[$column]}}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                {!! $todayOrder['paginate']->links() !!}
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_table_widget_5_tab_2">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="border-0">
                                        @foreach($todaySale['columns'] as $column)
                                            <th class="p-0 w-50px">{{trans('lang.'.$column)}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                    @foreach($todaySale['model'] as $row)
                                        <tr>
                                            @foreach($todaySale['columns'] as $column)
                                                <td>{{$row[$column]}}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <div class="d-flex justify-content-center">
                                {!! $todaySale['paginate']->links() !!}
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_table_widget_5_tab_3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="border-0">
                                        <th class="p-0 w-50px"></th>
                                        <th class="p-0 min-w-150px"></th>
                                        <th class="p-0 min-w-140px"></th>
                                        <th class="p-0 min-w-110px"></th>
                                        <th class="p-0 min-w-50px"></th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="symbol symbol-45px me-2">
																			<span class="symbol-label">
																				<img
                                                                                    src="assets/media/svg/brand-logos/kickstarter.svg"
                                                                                    class="h-50 align-self-center"
                                                                                    alt=""/>
																			</span>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Bestseller
                                                Theme</a>
                                            <span class="text-muted fw-bold d-block">Best Customers</span>
                                        </td>
                                        <td class="text-end text-muted fw-bold">ReactJS, Ruby</td>
                                        <td class="text-end">
                                            <span class="badge badge-light-warning">In Progress</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#"
                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                <span class="svg-icon svg-icon-2">
																				<svg xmlns="http://www.w3.org/2000/svg"
                                                                                     width="24" height="24"
                                                                                     viewBox="0 0 24 24" fill="none">
																					<rect opacity="0.5" x="18" y="13"
                                                                                          width="13" height="2" rx="1"
                                                                                          transform="rotate(-180 18 13)"
                                                                                          fill="black"/>
																					<path
                                                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                                        fill="black"/>
																				</svg>
																			</span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="symbol symbol-45px me-2">
																			<span class="symbol-label">
																				<img
                                                                                    src="assets/media/svg/brand-logos/bebo.svg"
                                                                                    class="h-50 align-self-center"
                                                                                    alt=""/>
																			</span>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Active
                                                Customers</a>
                                            <span class="text-muted fw-bold d-block">Movie Creator</span>
                                        </td>
                                        <td class="text-end text-muted fw-bold">AngularJS, C#</td>
                                        <td class="text-end">
                                            <span class="badge badge-light-danger">Rejected</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#"
                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                <span class="svg-icon svg-icon-2">
																				<svg xmlns="http://www.w3.org/2000/svg"
                                                                                     width="24" height="24"
                                                                                     viewBox="0 0 24 24" fill="none">
																					<rect opacity="0.5" x="18" y="13"
                                                                                          width="13" height="2" rx="1"
                                                                                          transform="rotate(-180 18 13)"
                                                                                          fill="black"/>
																					<path
                                                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                                        fill="black"/>
																				</svg>
																			</span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="symbol symbol-45px me-2">
																			<span class="symbol-label">
																				<img
                                                                                    src="assets/media/svg/brand-logos/vimeo.svg"
                                                                                    class="h-50 align-self-center"
                                                                                    alt=""/>
																			</span>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">New
                                                Users</a>
                                            <span class="text-muted fw-bold d-block">Awesome Users</span>
                                        </td>
                                        <td class="text-end text-muted fw-bold">Laravel,Metronic</td>
                                        <td class="text-end">
                                            <span class="badge badge-light-primary">Success</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#"
                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                <span class="svg-icon svg-icon-2">
																				<svg xmlns="http://www.w3.org/2000/svg"
                                                                                     width="24" height="24"
                                                                                     viewBox="0 0 24 24" fill="none">
																					<rect opacity="0.5" x="18" y="13"
                                                                                          width="13" height="2" rx="1"
                                                                                          transform="rotate(-180 18 13)"
                                                                                          fill="black"/>
																					<path
                                                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                                        fill="black"/>
																				</svg>
																			</span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="symbol symbol-45px me-2">
																			<span class="symbol-label">
																				<img
                                                                                    src="assets/media/svg/brand-logos/telegram.svg"
                                                                                    class="h-50 align-self-center"
                                                                                    alt=""/>
																			</span>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Popular
                                                Authors</a>
                                            <span class="text-muted fw-bold d-block">Most Successful</span>
                                        </td>
                                        <td class="text-end text-muted fw-bold">Python, MySQL</td>
                                        <td class="text-end">
                                            <span class="badge badge-light-warning">In Progress</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="#"
                                               class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                <span class="svg-icon svg-icon-2">
																				<svg xmlns="http://www.w3.org/2000/svg"
                                                                                     width="24" height="24"
                                                                                     viewBox="0 0 24 24" fill="none">
																					<rect opacity="0.5" x="18" y="13"
                                                                                          width="13" height="2" rx="1"
                                                                                          transform="rotate(-180 18 13)"
                                                                                          fill="black"/>
																					<path
                                                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                                        fill="black"/>
																				</svg>
																			</span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Tap pane-->
                    </div>
                </div>
                <!--end::Body-->
         </div>
        <!--end::Tables Widget 5-->
    </div>
    <!--end::Col-->
    @endif
@endsection
