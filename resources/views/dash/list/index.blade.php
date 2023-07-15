@extends('dash.layout.index')
@section('content')
    @php
        $delete_route = get($config,'deleteGroupAction',true) ? (isset($trash) ? route(current_route().'.forceDelete') : route(current_route().'.delete-group')) : null;
        $list_route = $endpoint ?? (isset($trash) ? route(current_route().'.trash') : route(current_route().'.index'));
        $columns = $list_columns ?? $columns_args ?? $model->getColumns();
        $config_filter_inputs = get($config,'filter_inputs');
        $filterInputs = $config_filter_inputs && is_array($config_filter_inputs) ? $config_filter_inputs :  $model->getFilterInput();
    @endphp
    @if($model->getCards())
        @include('dash.custom.profitable')
    @endif
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <p id="statistics"></p>
                <!--begin::Wrapper-->
                <h2 style="font-weight: bold"> عرض {{  trans('lang.'.current_route()) }}  </h2>

                <!--begin::Wrapper-->
                {{--                <input type="text" id="search" data-kt-docs-table-filter="search" value=""--}}
                {{--                                       class="form-control w-250px" placeholder="أدخل للبحث"/>--}}
                {{--                d-flex flex-stack--}}
                <div class="mb-10">
                @if($slot = get($config,'slot'))
                    @include($slot)
                @endif
                <!--begin::Search-->
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                        <!--begin::Filter-->
                    {{--                        <button type="button" class="btn btn-light-success me-3" title="Exporting & Importing Sheets"--}}
                    {{--                                data-bs-toggle="modal" data-bs-target="#kt_modal_upload">--}}
                    {{--                            <span class="svg-icon svg-icon-2"><!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil003.svg-->--}}
                    {{--<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
                    {{--                                                        viewBox="0 0 24 24" fill="none">--}}
                    {{--<path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z" fill="black"/>--}}
                    {{--<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black"/>--}}
                    {{--</svg></span>--}}
                    {{--                                <!--end::Svg Icon--></span>--}}
                    {{--                            إستيراد--}}
                    {{--                        </button>--}}
                    @include('dash.list.components.sheets')

                    <!--end::Filter-->

                        @if(get($config,'addBtn',true))
                            <a href="{{ route(current_route().'.create') }}"
                               class="btn btn-sm btn-light btn-active-primary">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                <span class="svg-icon svg-icon-3">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none">
												<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                                      transform="rotate(-90 11.364 20.364)" fill="black"/>
												<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"/>
											</svg>
										</span>
                                <!--end::Svg Icon-->اضافة جديد</a>
                            <!--begin::Add customer-->
                            {{--                            <a href="{{ route(current_route().'.create') }}" class="btn btn-sm btn-light-primary"--}}
                            {{--                               data-bs-toggle="tooltip" title="اضافة جديد">--}}
                            {{--                            <span class="svg-icon svg-icon-2"><!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen035.svg-->--}}
                            {{--<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
                            {{--                                                        viewBox="0 0 24 24" fill="none">--}}
                            {{--<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="black"/>--}}
                            {{--<rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="black"/>--}}
                            {{--<rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="black"/>--}}
                            {{--</svg></span>--}}
                            {{--                                <!--end::Svg Icon--></span>--}}
                            {{--                                إضافة جديد--}}
                            {{--                            </a>--}}
                        <!--end::Add customer-->
                        @endif
                    </div>
                    <!--end::Toolbar-->

                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none"
                         data-kt-docs-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-docs-table-select="selected_count"></span> محدد
                        </div>

                        <button type="button" class="btn btn-danger" data-kt-docs-table-filter="selection_action"
                                data-bs-toggle="tooltip" title="Coming Soon">
                            حذف المحدد
                        </button>
                    </div>
                    <!--end::Group actions-->
                    @isset($filterInputs)
                        <div class="form-group mt-5">
                            <div data-repeater-list="kt_docs_repeater_basic">
                                <div class="form-group row">

                                    @if(get($config,'filter_inputs',true) != false)
                                        @foreach($filterInputs as $input)
                                            @php
                                                $placeholder = trans('lang.search_' .$input['model']);
                                            @endphp
                                            @switch($input['type'])
                                                @case('input')
                                                <div class="col-md-3">
                                                    <label class="form-label">أدخل للبحث</label>
                                                    <input class="form-control" type="text"
                                                           id="{{ $input['model'] }}"
                                                           data-kt-docs-table-filter="search" value=""
                                                           placeholder="أدخل للبحث"/>
                                                </div>
                                                @break
                                                @case('date')
                                                <div class="col-md-3">
                                                    <label class="form-label">{{ __genrateLabel($input) }}</label>
                                                    @include('dash.form.components.date',['is_search' => true,'enableTime' => true,'dateFormat' => 'Y-m-d'])
                                                </div>
                                                @break
                                                @case('select')
                                                <div class="col-md-3">
                                                    <label class="form-label">{{ __genrateLabel($input) }}</label>
                                                    @include('dash.form.components.select',['is_search' => true])
                                                </div>
                                                @break
                                            @endswitch
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endisset
                </div>

                <!--end::Wrapper-->
                <div class="table-responsive">

                    <!--begin::Datatable-->
                    <table id="kt_datatable_example_1" class="table table-rounded table-striped border gy-7 gs-7">
                        <thead>
                        <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                           data-kt-check-target="#kt_datatable_example_1 .form-check-input" value="1"/>
                                </div>
                            </th>
                            @foreach($list_columns ?? $columns_args ?? $model->getColumns() as $column)
                                <th>{{trans("lang.$column")}}</th>
                            @endforeach
                            @if(get($config,'deleteBtn',true) && get($config,'editBtn',true) && get($config,'showAction',true) )
                                <th class="text-end min-w-100px">الإجراءات</th>
                            @else
                                <th></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        </tbody>
                    </table>

                    <!--end::Datatable-->
                    <!--end::Datatable-->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    @include('dash.list.components.script')
    @include('dash.list.components.callableFunctions')
@endpush
