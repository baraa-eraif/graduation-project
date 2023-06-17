function toastBar(type, message) {
    toastr.options = {
        "closeButton": false,
        "debug": true,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toastr-bottom-center",
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
// function createElement(parent,element,numberOfElement,text) {
//  let nameElement = [];
//  for (let i = 0; i < numberOfElement ; i++){
//      numberOfElement.push(document.createElement(element));
//      parent.append(numberOfElement[i]);
//      if (text !== undefined)
//          numberOfElement[i].append(text);
//  }
// }
