@props(array('instance','events' => []))
    @push('style')
        <link href="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endpush
    <div id="kt_docs_fullcalendar_selectable"></div>

    @push('script')
        <script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
        <script>

            // ajax_request()
            let eventsValue = <?php echo json_encode($events ?? []) ?>;
            var calendarEl = document.getElementById("kt_docs_fullcalendar_selectable");

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay"
                },
                initialDate: new Date(),
                locale: 'ar',
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,

                // Create new event
                select: function (arg) {
                    Swal.fire({
                        html: `<div class="mb-7">هل ترغب في إنشاء حدث جديد؟</div><div class="fw-bolder mb-5">اسم الحدث:</div><input type="text" class="form-control" name="event_name" />`,
                        icon: "info",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم، قم بإنشائه!",
                        cancelButtonText: "لا، عودة",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            var title = document.querySelector(`input[name="event_name"]`).value;
                            if (title) {
                                let event = {
                                    title: title,
                                    start: formatDate(arg.start),
                                    end: formatDate(arg.end),
                                    allDay: arg.allDay
                                }
                                console.log('event',event)
                                ajax_request(`{{$instance}}/calendar/add-event`,event,function (response) {
                                    console.log('ressssss',response)
                                });
                                calendar.addEvent({
                                    title: title,
                                    start: arg.start,
                                    end: arg.end,
                                    allDay: arg.allDay
                                })
                            }
                            calendar.unselect()
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "تم رفض إنشاء الحدث!",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "حسنًا، فهمت!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                }
                            });
                        }
                    });
                },

                // Delete event
                eventClick: function (arg) {
                    Swal.fire({
                        text: "هل أنت متأكد أنك تريد حذف هذا الحدث؟",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم، احذفه!",
                        cancelButtonText: "لا، عودة",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            let id = arg?.event.id;
                            ajax_request(`{{$instance}}/calendar/delete-event/${id}`,{},function (response) {

                            })
                            arg.event.remove()
                        } else if (result.dismiss === "cancel") {
                            Swal.fire({
                                text: "لم يتم حذف الحدث!",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "حسنًا، فهمت!",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                }
                            });
                        }
                    });
                },
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events : eventsValue
            });

            calendar.render();

            function formatDate(date) {
                return date.toISOString().split(".")[0].replace("T", " ").replace(/:/g, "-");
            }
        </script>
    @endpush
