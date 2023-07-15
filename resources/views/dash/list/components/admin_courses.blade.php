<div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
    <button class="btn btn-sm btn-success btn-active-light-success" disabled id="admin_accreditation">اعتماد الدرجات</button>
</div>
@push('script')

    <script>
        $('#admin_accreditation').click(function () {
            let $this = $(this);
            ajax_request('admin/accreditation/grades', {
                'id': $(this).attr('teacher_id')
            }, function (response) {
                $this.attr('disabled',true)
            })
        })
    </script>
@endpush
