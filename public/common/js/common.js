function collectFormData(form) {
    let collection = {
        '_token': $('meta[name="csrf-token"]').attr('content'),
    };
    $(form).serializeArray().map(function (field) {
        collection[field.name] = field.value;
    });
    return collection;
}

function submitFormWithValidate(formSelection, url, rules = {},beforeSend, onSuccess, method = 'POST', withSwal = false, options = {}) {
    $(formSelection).submit(function (e) {
        e.preventDefault();
        beforeSend(e);
    }).validate({
        errorClass: options.errorClass ?? 'error',
        validClass: options.validClass ?? 'success',
        errorElement: 'span',
        rules: rules,
        messages: options.messages ?? {},

        submitHandler: function (form) {

            if (!withSwal)
                return ajax_request(url, collectFormData(form), onSuccess, method);

            swal('التأكد من حفظ البيانات', 'سيتم حفظ البيانات، هل أنت متأكد من صحة البيانات المدخلة ؟', function () {
                ajax_request(url, collectFormData(form), onSuccess, method);
            })
        }
    });
}

function swal(title, text, confirmCallback, cancelCallback = null, icon = 'warning', showCancelButton = true) {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: showCancelButton,
        confirmButtonText: 'حسناً',
        cancelButtonText: 'إلغاء',
        customClass: {confirmButton: "btn btn-primary",cancelButton: "btn btn-danger",}
    }).then((result) => {
        if (result.value === true && confirmCallback)
            confirmCallback(result)
        // else
        //     cancelCallback(result)
    })
}

function toastBar(type, message) {
    toastr.options = {
        "closeButton": false,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toastr-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    switch (type) {
        case 'success':
            toastr.success(message);
            break;
        case 'info':
            toastr.info(message);
            break;
        case 'warning':
            toastr.warning(message);
            break;
        case 'error':
            toastr.error(message);
            break;
    }
}
