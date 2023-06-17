<td class="text-end">


    @if(!isset($trash) && get($config,'editBtn',true))
        <a data-kt-docs-table-filter="edit_row" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
            <span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24" viewBox="0 0 24 24" fill="none">
																	<path
                                                                        d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                                        fill="black"/>
																	<path opacity="0.3"
                                                                          d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                                          fill="black"/>
																</svg>
															</span>
            <!--end::Svg Icon-->
        </a>
    @endif
    @if(get($config,'deleteBtn',true))
        <a data-kt-docs-table-filter="delete_row" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
            <span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24" viewBox="0 0 24 24" fill="none">
																	<path
                                                                        d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                        fill="black"/>
																	<path opacity="0.5"
                                                                          d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                          fill="black"/>
																	<path opacity="0.5"
                                                                          d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                          fill="black"/>
																</svg>
															</span>
            <!--end::Svg Icon-->
        </a>
    @endif
    @if(($model->getShowAction() && !isset($trash)) || get($config,'showAction',false))
        <a data-kt-docs-table-filter="show_row"
           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
            <span class="svg-icon svg-icon-3">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                                                <path opacity="0.3"
                                                                      d="M4.7 17.3V7.7C4.7 6.59543 5.59543 5.7 6.7 5.7H9.8C10.2694 5.7 10.65 5.31944 10.65 4.85C10.65 4.38056 10.2694 4 9.8 4H5C3.89543 4 3 4.89543 3 6V19C3 20.1046 3.89543 21 5 21H18C19.1046 21 20 20.1046 20 19V14.2C20 13.7306 19.6194 13.35 19.15 13.35C18.6806 13.35 18.3 13.7306 18.3 14.2V17.3C18.3 18.4046 17.4046 19.3 16.3 19.3H6.7C5.59543 19.3 4.7 18.4046 4.7 17.3Z"
                                                                      fill="black"/>
                                                                <rect x="21.9497" y="3.46448" width="13" height="2"
                                                                      rx="1" transform="rotate(135 21.9497 3.46448)"
                                                                      fill="black"/>
                                                                <path
                                                                    d="M19.8284 4.97161L19.8284 9.93937C19.8284 10.5252 20.3033 11 20.8891 11C21.4749 11 21.9497 10.5252 21.9497 9.93937L21.9497 3.05029C21.9497 2.498 21.502 2.05028 20.9497 2.05028L14.0607 2.05027C13.4749 2.05027 13 2.52514 13 3.11094C13 3.69673 13.4749 4.17161 14.0607 4.17161L19.0284 4.17161C19.4702 4.17161 19.8284 4.52978 19.8284 4.97161Z"
                                                                    fill="black"/>
                                                                </svg>
                                    </span>
            <!--end::Svg Icon-->
        </a>
    @endif
</td>
@if(isset($trash) && get($config,'trash',true))
    <a data-kt-docs-table-filter="restore_row" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
        <span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
<path
    d="M17.1 15.8C16.6 15.7 16 16 15.9 16.5C15.7 17.4 14.9 18 14 18H6C4.9 18 4 17.1 4 16V8C4 6.9 4.9 6 6 6H14C15.1 6 16 6.9 16 8V9.4H18V8C18 5.8 16.2 4 14 4H6C3.8 4 2 5.8 2 8V16C2 18.2 3.8 20 6 20H14C15.8 20 17.4 18.8 17.9 17.1C17.9 16.5 17.6 16 17.1 15.8Z"
    fill="black"/>
<path opacity="0.3" d="M11.9 9.39999H21.9L17.6 13.7C17.2 14.1 16.6 14.1 16.2 13.7L11.9 9.39999Z" fill="black"/>
</svg>
															</span>
        <!--end::Svg Icon-->
    </a>
@endif
