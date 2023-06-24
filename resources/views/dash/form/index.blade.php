@extends('dash.layout.index')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <div class="card shadow-sm">
        <form id="kt_docs_formvalidation_email" method="post" action="{{$actions}}"
              enctype="multipart/form-data">
            @isset($form_method)
                @method('put')
            @endisset
            @csrf
            <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
            <div class="card-header">
                <div class="card-title">
                    <h3 style="font-weight: bold">{{ title() .' '. trans('lang.'.current_route()) }}</h3>
                </div>
            </div>
            <div class="card-body py-4">
                <div class="form-group">
                    @include('dash.form.components.index')
                </div>
                <!--begin::Actions-->
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <a href="{{  url()->previous() }}"
                   class="btn btn-light btn-hover-rotate-start me-2">{{ trans('lang.back') }}</a>
                <button id="kt_docs_formvalidation_email_submit" type="submit"
                        class="btn btn-primary btn-hover-rotate-end">
        <span class="indicator-label">
            حفظ
        </span>
                    <span class="indicator-progress">
            إنتظر قليلاً...  <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
                </button>
                <!--end::Actions-->
            </div>
            <!--end::Actions-->
        </form>
    </div>
@endsection
@push('script')
    @include('dash.form.script.selectFunctions')
    <script src="{{asset('assets/js/form.js')}}"></script>
    <script>
        // Define form element
        const form = document.getElementById('kt_docs_formvalidation_email');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    @foreach($inputs as $input)
                        {{$input['model']}}: {
                        validators: {
                            @if(isset($input['role']['require']))
                            notEmpty: {
                                message: 'هذا الحقل مطلوب'
                            },
                            @endif
                                @if(isset($input['role']['integer']))
                            integer: {
                                message: 'يجب أن يكون قيمة صحيحة'
                            },
                            @endif
{{--                                @if(isset($input['role']['lessThan']))--}}
{{--                            lessThan: {--}}
{{--                                value: {{$input['role']['lessThan']}},--}}
{{--                                inclusive: true,--}}
{{--                                message: ' يجب ألا يتجاوز القيمة {{$input['role']['lessThan']}} '--}}
{{--                            },--}}
{{--                            @endif--}}

                        }
                    },
                    @endforeach
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: 'is-invalid',
                        eleValidClass: 'is-valid'
                    })
                }
            }
        );

        async function submit() {
            document.getElementById("kt_docs_formvalidation_email").submit();
            // Show popup confirmation
        }

        // Submit button handler
        const submitButton = document.getElementById('kt_docs_formvalidation_email_submit');
        submitButton.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');

                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');

                        // Disable button to avoid multiple click
                        submitButton.disabled = true;

                        // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        setTimeout(function () {
                            // Remove loading indication
                            submitButton.removeAttribute('data-kt-indicator');

                            // Enable button
                            submitButton.disabled = false;

                            submit();
                            //form.submit(); // Submit form
                        }, 500);
                        toastBar('success', "تم حفظ البيانات بنجاح")
                    }
                });
            }
        });

        @if(isset($input['show'],$input['show']['standOnOtherInput'],$input['show']['values']))
        $("#{{$input['model']}}").hide();
        $('#{{$input['show']['standOnOtherInput']}}').on('change', function () {
            var array$ = <?php echo json_encode(array_values($input['show']['values'])) ?>;
            if (array$.includes($(this).find(":selected").val())) {
                $("#{{$input['model']}}").show();
            } else {
                $("#{{$input['model']}}").hide();
            }
        });
        @endif


    </script>
@endpush
