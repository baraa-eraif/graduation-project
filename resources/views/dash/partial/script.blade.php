<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-project/type.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-project/budget.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-project/settings.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-project/team.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-project/targets.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-project/files.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-project/complete.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/create-project/main.js')}}"></script>
<script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
<script src="{{asset('common/js/ajax.js')}}"></script>
<script src="{{asset('common/js/common.js')}}"></script>
<script src="{{asset('common/js/toastr.js')}}"></script>

@if (@$errors->any())
    <script>
        "use strict";
        @foreach ($errors->all() as $error)
            toastBar('error',"{{ $error }}")
        @endforeach
    </script>
@endif

@stack('script')
