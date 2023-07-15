<div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
    <button class="btn btn-sm btn-success btn-active-light-success" {{($model->enabled_accreditation ?? false) ? '' : 'disabled'}} id="accreditation">اعتماد الدرجات</button>
</div>
@push('script')

    <script>
        $('#accreditation').click(function () {
            let $this = $(this);
            ajax_request('teacher/accreditation', {
                'id': '{{$model->id ?? null}}'
            }, function (response) {
                $this.attr('disabled',true)
            })
        })
    </script>
@endpush
