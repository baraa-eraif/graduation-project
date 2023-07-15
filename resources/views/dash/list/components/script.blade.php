
<script>
    "use strict";
    // window.onload = function () {
    //     $('#search').val('');
    // }
    // Class definition
    let $appended_actions = <?php echo json_encode(array_values($appended_actions ?? [])) ?>;;
    var KTDatatablesServerSide = function () {
        // Shared variables
        var table;
        var dt;
        var filterPayment;
        var columns_list = <?php echo json_encode(array_values($data_table)) ?>;
        columns_list['addition'] = {data: null};
        console.log('columns_list', columns_list)
        // Private functions
        var initDatatable = function () {
            dt = $("#kt_datatable_example_1").DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                order: [[{{count($columns)}}, 'desc']],
                stateSave: false,
                select: {
                    style: 'os',
                    selector: 'td:first-child',
                    className: 'row-selected'
                },
                ajax: {
                    url: '{{ $list_route }}',
                },
                columns: Object.values(columns_list),
                drawCallback: function (settings) {
                    // Handle the response data here
                    var response = settings.json; // Access the response data

                    if (response?.enabled_accreditation) {
                        let btn = $(document).find('#admin_accreditation');

                        let enabled_accreditation = response.enabled_accreditation;
                        btn.attr('disabled', !enabled_accreditation);
                        btn.attr('teacher_id', response?.teacher_id);
                    }
                },
                columnDefs: [
                    {
                        targets: 0,
                        orderable: false,
                        visible: '{{get($config,'deleteGroupAction',true)}}', // Add this line to hide the column
                        render: function (data, type, row) {
                            return `
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="${row.id}" />
                            </div>`;
                        }
                    },
                        @foreach($columns as $key => $value)
                        @if(is_string($key))
                        @switch($key)
                        @case('status-label')
                    {
                        targets: columns_list.map(e => e.data).indexOf(<?php echo json_encode($value); ?>),
                        render: function (data, type, row) {
                            return `<span class="badge badge-light-${data.class} fs-7 m-1">${data.value}</span>`;
                            // badge badge-light-primary fs-7 m-1
                        }
                    },
                        @break
                        @case('image-holder')
                    {
                        targets: columns_list.map(e => e.data).indexOf(<?php echo json_encode($value); ?>),
                        render: function (data, type, row) {
                            return `<img src="${data}" class="btn-icon rounded position-relative w-auto h-50px w-md-40px h-md-40px" alt="{{asset('images/avatar.png')}}">`;
                        }
                    },
                        @break
                        @case('editable-select')
                    {
                        targets: columns_list.map(e => e.data).indexOf(<?php echo json_encode($value); ?>),
                        render: function (data, type, row) {
                            let options = '';
                            $.each(row.teachers ?? [], function (index, object) {
                                options += `<option value="${object.id}" ${row.selected_teacher === object.id ? 'selected' : ''}>${object.name}</option>`
                            });
                            return `<select class="form-select form-select-solid"  ${row.selected_teacher ? 'disabled' : ''} id="select-${row.id}" data-control="select2" data-dropdown-parent="#kt_modal_1" data-placeholder="اختر" data-allow-clear="true">
                                        <option value="{{null}}">{{trans('lang.select_one')}}</option>
                                        ${options}
                                    </select>`;
                        }
                    },
                        @break
                        @endswitch
                        @endif
                        @if(isset($editable_input) && @is_array($editable_input) && in_array($value,$editable_input))
                    {
                        targets: columns_list.map(e => e.data).indexOf(<?php echo json_encode($value); ?>),
                        render: function (data, type, row) {

                            return `<div class="input-group input-group-sm w-50">
                                <input id="{{"editable_$value"}}"  ${row.enabled_accreditation ? '' : 'disabled'} type="text" maxlength="3" data-row="${row.id}" value="${data}" class="form-control " placeholder="{{$value}}" aria-label="{{$value}}" aria-describedby="basic-addon2"/>

                            </div>`;
                        }
                    },
                        @endif
                        @endforeach
                        @if(get($config,'status_btn'))
                    {
                        targets: -1,
                        data: null,
                        orderable: true,
                        className: 'text-end',
                        render: function (data, type, row) {
                            let btn_text = row?.status_text ?? 'التسجيل';
                            let btnClass = 'primary';
                            let btnIsDisabled = '';

                            let teachers = {};
                            $.each(row.teachers ?? [], function (index, object) {
                                teachers['name'] = object.name;
                                teachers['id'] = object.id;
                            });
                            teachers = Object.values(teachers)
                            switch (row.status) {
                                case 'pending':
                                    btnClass = 'warning';
                                    btnIsDisabled = 'disabled';
                                    break;
                                case 'accepted':
                                    btnClass = 'primary';
                                    btnIsDisabled = 'disabled';
                                    break;
                                case 'rejected':
                                    btnClass = 'danger';
                                    btnIsDisabled = 'disabled';
                                    break;
                            }
                            return `<button data-teachers="${teachers}"  data-kt-docs-table-enroll="enroll_row" ${btnIsDisabled} class="btn btn-sm btn-${btnClass}">${btn_text}</button>`;
                        },
                    },
                        @else
                    {
                        targets: -1,
                        data: null,
                        orderable: true,
                        className: 'text-end',
                        render: function (data, type, row) {
                            let html = '';
                            @if($appended_actions)
                                @foreach($appended_actions as $key => $action)
                                @if($action == 'appointment')
                                html += ` @include('components.appointment')`;
                            @else
                            @php
                                $slug = null;
                                $class = null;
                                if (is_array($action)){
                                    $slug = get($action,'model',$key);
                                    $class=  get($action,'class','primary');
                                }else {
                                    $slug = $action;
                                    $class= 'success';
                                }
                            @endphp

                            let slug{{$key}} = '{{$slug}}';
                            let btnIsDisabled{{$key}} = (row[`enabled_${slug{{$key}}}`] ?? true) ? '' : 'disabled';
                            html += `<button ${btnIsDisabled{{$key}}} data-kt-docs-table-{{$slug}}="{{$slug.'_row'}}" class="mx-1 btn btn-sm btn-light-{{$class ?? 'primary'}}">{{trans("lang.$slug")}}</button>`
                            @endif
                            @endforeach
                            @endif
                                return html + ` @include('dash.list.actions')`;
                        },
                    },
                    @endif
                ],
            });

            table = dt.$;

            // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
            dt.on('draw', function () {
                initToggleToolbar();
                toggleToolbars();
                handleDeleteRows();
                KTMenu.createInstances();
            });
        }

        // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
        var handleSearchDatatable = function () {
            const filterSearch = document.querySelector('[data-kt-docs-table-filter ="search"]');
            @isset($filterInputs)
            @foreach($filterInputs as $input)
            @switch($input['type'])
            @case('input')
            filterSearch.addEventListener('keyup', function (e) {
                dt.search([e.target.id, e.target.value]).draw();
            });
            @break
            @case('dateRange')
            $(".searchDateRange").click(function (e) {
                dt.search([e.target.id, e.target.value]).draw();
            });
            @break
            @case('select')
            $(".searchSelect").change(function (e) {
                dt.search([e.target.id, e.target.value]).draw();
            });
            @break
            @case('date')
            $(".datepickerFilter").change(function (e) {
                dt.search([e.target.id, e.target.value]).draw();
            });
            @break
            @endswitch
            @endforeach
            @endisset
        }

        // // Filter Datatable
        // var handleFilterDatatable = () => {
        //     // Select filter options
        //     filterPayment = document.querySelectorAll('[data-kt-docs-table-filter="payment_type"] [name="payment_type"]');
        //     const filterButton = document.querySelector('[data-kt-docs-table-filter="filter"]');
        //
        //     // Filter datatable on submit
        //     filterButton ? filterButton.addEventListener('click', function () {
        //         // Get filter values
        //         let paymentValue = '';
        //
        //         // Get payment value
        //         filterPayment.forEach(r => {
        //             if (r.checked) {
        //                 paymentValue = r.value;
        //             }
        //
        //             // Reset payment value if "All" is selected
        //             if (paymentValue === 'all') {
        //                 paymentValue = '';
        //             }
        //         });
        //
        //         // Filter datatable --- official docs reference: https://datatables.net/reference/api/searc23.h()
        //         dt.search(paymentValue).draw();
        //     }) : null;
        // }

        // Delete customer
        var handleDeleteRows = () => {
            // Select all delete buttons
            const deleteButtons = document.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');
            const editButtons = document.querySelectorAll('[data-kt-docs-table-filter="edit_row"]');
            const showButtons = document.querySelectorAll('[data-kt-docs-table-filter="show_row"]');
            const restoreButtons = document.querySelectorAll('[data-kt-docs-table-filter="restore_row"]');
            @if($appended_actions)
            @foreach($appended_actions as $key => $action)
            @if($action != 'appointment')
            @php
                $slug = null;
                   $class = null;
                   if (is_array($action)){
                       $slug = get($action,'model',$key);
                       $class=  get($action,'class','primary');
                   }else {
                       $slug = $action;
                   }
            @endphp

            const {{$slug}}Buttons = document.querySelectorAll('[data-kt-docs-table-{{$slug}}="{{$slug}}_row"]');
            {{$slug}}Buttons.forEach(d => {
                // Delete button on click
                d.addEventListener('click', function (e) {
                    e.preventDefault();

                    const parent = e.target.closest('tr');
                    const $_id = parent.querySelectorAll('td')[0].innerText;
                    let action = '{{$slug}}';

                    let html = '';
                    let data = $(this).data('teachers');
                    let teachers = data ? data.split(' ') : null;
                    let appended = {};

                    if (action === 'enroll') {
                        appended['selected_teacher'] = $(`#select-${$_id}`).val()
                    }
                    console.log('appendedappended', appended,)

                    // Select parent row
                    // Get customer name
                    const customerName = parent.querySelectorAll('td')[1].innerText;
                    @if(is_array($action) && !get($action,'model'))
                    function evaluationCourse() {
                        console.log('evaluationCourse', $_id)
                    }

                    @else
                    Swal.fire({
                        text: '{{trans("lang.message_$slug")}}',
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم , حسناً",
                        cancelButtonText: "لا , الغاء",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            // Simulate delete request -- for demo purpose only
                            Swal.fire({
                                text: "يتم التسجيل ",
                                icon: "info",
                                buttonsStyling: false,
                                showConfirmButton: false,
                                timer: 300
                            }).then(function () {
                                $.ajax({
                                    url: `{{route(current_route().".$slug")}}`,
                                    type: "POST",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        id: $_id,
                                        ...appended
                                    },
                                    success: function (data) {
                                        if (!data.status) {
                                            Swal.fire({
                                                text: data.message,
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "حسناً",
                                                customClass: {
                                                    confirmButton: "btn fw-bold btn-primary",
                                                }
                                            });
                                            return;
                                        }
                                        Swal.fire({
                                            text: "تم عملية التسجيل",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "حسناً",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        });
                                        // parent.remove()
                                        dt.draw();
                                    },
                                    error: function (error) {
                                        Swal.fire({
                                            text: "حدث خطا غير معروف",
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "حسناً",
                                            customClass: {
                                                confirmButton: "btn fw-bold btn-primary",
                                            }
                                        });
                                    }
                                })
                            });
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: " تم إلغاء العملية",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "حسناً",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                    });
                    @endif
                    // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/

                })
            });
            @endif
            @endforeach
            @endif

            let current_route = '{{current_route()}}';
            showButtons.forEach(d => {
                d.addEventListener('click', function (e) {
                    e.preventDefault();
                    const parent = e.target.closest('tr');
                    let deleteGroupAction = '{{get($config,'deleteGroupAction',true)}}';
                    let index = deleteGroupAction ? 1 : 0;
                    const $_id = parent.querySelectorAll('td')[index].innerText;
                    var url = window.location.href + "/" + $_id;
                    window.location.replace(url);
                })
            })
            editButtons.forEach(d => {
                d.addEventListener('click', function (e) {
                    e.preventDefault();

                    const parent = e.target.closest('tr');
                    const $_id = parent.querySelectorAll('td')[1].innerText;
                    var url = window.location.href + "/" + $_id + '/edit';
                    window.location.replace(url);
                })
            })
            restoreButtons.forEach(d => {
                // Delete button on click
                d.addEventListener('click', function (e) {
                    e.preventDefault();
                    // Select parent row
                    const parent = e.target.closest('tr');

                    // Get customer name
                    const customerName = parent.querySelectorAll('td')[1].innerText;

                    // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                    Swal.fire({
                        text: customerName + "هل أنت متأكد من الأسترجاع ",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم , حسناً",
                        cancelButtonText: "لا , الغاء",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            // Simulate delete request -- for demo purpose only
                            Swal.fire({
                                text: "Deleting " + customerName,
                                icon: "info",
                                buttonsStyling: false,
                                showConfirmButton: false,
                                timer: 300
                            }).then(function () {
                                $.ajax({
                                    url: `{{get($config,'trash',true) ? route(current_route().'.restore') : '#'}}`,
                                    type: "POST",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        id: parent.querySelectorAll('td')[1].innerText,
                                    },
                                    success: function (data) {

                                    },
                                    error: function (error) {

                                    }
                                }) && Swal.fire({
                                    text: "You have deleted " + customerName,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "حسناً",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {

                                    // delete row data from server and re-draw datatable
                                    dt.draw();
                                });
                            });
                        } else if (result.dismiss === 'cancel') {
                            toastBar('error', "إلغاء عملية الحذف")

                            // Swal.fire({
                            //     text: customerName + " إلغاء عملية الحذف .",
                            //     icon: "error",
                            //     buttonsStyling: false,
                            //     confirmButtonText: "حسناً",
                            //     customClass: {
                            //         confirmButton: "btn fw-bold btn-primary",
                            //     }
                            // });
                        }
                    });
                })
            });
            //===============================================================================
            deleteButtons.forEach(d => {
                // Delete button on click
                d.addEventListener('click', function (e) {
                    e.preventDefault();
                    console.log('deleteButtons', e)

                    // Select parent row
                    const parent = e.target.closest('tr');

                    // Get customer name
                    const customerName = parent.querySelectorAll('td')[1].innerText;

                    // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "هل أنت متأكد من الحذف ؟",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم , حسناً",
                        cancelButtonText: "لا , الغاء",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            // Simulate delete request -- for demo purpose only
                            Swal.fire({
                                text: "Deleting " + customerName,
                                icon: "info",
                                buttonsStyling: false,
                                showConfirmButton: false,
                                timer: 300
                            }).then(function () {
                                $.ajax({
                                    url: `{{$delete_route}}`,
                                    type: "POST",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        group: [parent.querySelectorAll('td')[1].innerText],
                                    },
                                    success: function (data) {

                                    },
                                    error: function (error) {

                                    }
                                }) && Swal.fire({
                                    text: "تم عملية الحذف",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "حسناً",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function () {

                                    // delete row data from server and re-draw datatable
                                    dt.draw();
                                });
                            });
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: " تم إلغاء العملية",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "حسناً",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                    });
                })
            });
        }

        // Reset Filter
        var handleResetForm = () => {
            // Select reset button
            const resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');

            // Reset datatable
            resetButton ? resetButton.addEventListener('click', function () {
                // Reset payment type
                filterPayment[0].checked = true;

                // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
                dt.search('').draw();
            }) : null;
        }

        // Init toggle toolbar
        var initToggleToolbar = function () {
            // Toggle selected action toolbar
            // Select all checkboxes
            const container = document.querySelector('#kt_datatable_example_1');
            const checkboxes = container.querySelectorAll('[type="checkbox"]');

            // Select elements
            const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

            // Toggle delete selected toolbar
            checkboxes.forEach(c => {
                // Checkbox on click event
                c.addEventListener('click', function () {
                    setTimeout(function () {
                        toggleToolbars();
                    }, 50);
                });
            });

            // Deleted selected rows
            deleteSelected ? deleteSelected.addEventListener('click', function () {
                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "هل أنت متأكد من حذف المحدد ؟",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    showLoaderOnConfirm: true,
                    confirmButtonText: "نعم",
                    cancelButtonText: "إلغاء",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    },
                }).then(function (result) {
                    if (result.value) {
                        // Simulate delete request -- for demo purpose only
                        Swal.fire({
                            text: "الحذف ...",
                            icon: "info",
                            buttonsStyling: false,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function () {
                            Swal.fire({
                                text: "تمت عملية حذف المحدد بنجاح",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "حسناً",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function () {
                                // delete row data from server and re-draw datatable
                                dt.draw();
                            });

                            // Remove header checked box
                            const headerCheckbox = container.querySelectorAll('[type="checkbox"]')[0];
                            headerCheckbox.checked = false;
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: "تم إلغاء عملية الحذف",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "حسناً",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            }) : null;
        }

        // Toggle toolbars
        var toggleToolbars = function () {
            // Define variables
            const container = document.querySelector('#kt_datatable_example_1');
            const toolbarBase = document.querySelector('[data-kt-docs-table-toolbar="base"]');
            const toolbarSelected = document.querySelector('[data-kt-docs-table-toolbar="selected"]');
            const selectedCount = document.querySelector('[data-kt-docs-table-select="selected_count"]');
            // Select refreshed checkbox DOM elements
            const allCheckboxes = container.querySelectorAll('tbody [type="checkbox"]');
            const selectionButtons = document.querySelectorAll('[data-kt-docs-table-filter="selection_action"]');

            // Detect checkboxes state & count
            let checkedState = false;
            let count = 0;
            var arr_ids = [];

            // Count checked boxes
            allCheckboxes.forEach(c => {
                if (c.checked) {
                    arr_ids.push(c.value);
                    checkedState = true;
                    count++;
                }
            });
            selectionButtons.forEach(d => {
                d.addEventListener('click', function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: `{{$delete_route}}`,
                        type: "POST",
                        data: {
                            group: arr_ids,
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            Swal.fire({
                                text: "تمت عملية حذف المحدد بنجاح",
                                icon: "info",
                                buttonsStyling: false,
                                showConfirmButton: false,
                                timer: 2000
                            }).then((function () {
                                dt.draw();
                            }))
                        },
                        error: function (error) {
                            console.log('test_error', error);
                        }
                    });
                })
            })
            // Toggle toolbars
            if (checkedState) {
                selectedCount.innerHTML = count;
                toolbarBase.classList.add('d-none');
                toolbarSelected.classList.remove('d-none');
            } else {
                toolbarBase.classList.remove('d-none');
                toolbarSelected.classList.add('d-none');
            }
        }

        // Public methods
        return {
            init: function () {
                initDatatable();
                handleSearchDatatable();
                initToggleToolbar();
                // handleFilterDatatable();
                handleDeleteRows();
                handleResetForm();
            }
        }
    }();
    var start = moment().subtract(29, "days");
    var end = moment();

    function cb(start, end) {
        $("#kt_daterangepicker_4").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
    }

    $("#kt_daterangepicker_4").daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            "Today": [moment(), moment()],
            "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
            "Last 7 Days": [moment().subtract(6, "days"), moment()],
            "Last 30 Days": [moment().subtract(29, "days"), moment()],
            "This Month": [moment().startOf("month"), moment().endOf("month")],
            "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
        }
    }, cb);

    cb(start, end);
    // On document ready
    KTUtil.onDOMContentLoaded(function () {
        KTDatatablesServerSide.init();
    });
</script>
