function ajax_request(url, data, onSuccess, method = 'POST',headers = {}) {
    // let spinner = $('#spinner-loader');
    // spinner.addClass('spinner')
    toastr.options.positionClass = 'toast-bottom-right';
    if ($.isFunction(data)) {
        onSuccess = data;
        data = {};
    }

    let base_url = window.location.origin;

    if (method !== 'get')
        data['_token'] = $('meta[name="csrf-token"]').attr('content');

    return $.ajax({
        type: method,
        url: base_url + '/' + url,
        data: {
            ...data
        },
        success: function (response) {

            if (!response?.status) {
                toastr.error(response?.message);
                return;
            }

            toastr.success(response?.message);
            onSuccess(response);
        },
        dataType: 'json',
        headers: headers,
        error: function (jqXHR, textStatus, errorThrown) {
            toastr.error(jqXHR?.responseJSON?.message);
        }
    });
}

function urlParams() {
    let pathname = window.location.pathname;
    return pathname.substring(pathname.lastIndexOf('/') + 1);
}

// $.extend({
//     put: function (url, data, callback) {
//         return ajax_request(url, data, callback, 'PUT');
//     },
//     delete_: function (url, data, callback) {
//         return ajax_request(url, data, callback, 'DELETE');
//     },
// });

