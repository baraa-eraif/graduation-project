// let button = $('#kt_sign_in_submit');
//
// submitFormWithValidate('#kt_sign_in_form', `api/student/login`, {
//     student_id: {
//         required: true,
//     },
//     password: {
//         required: true,
//     },
// }, function (e) {
//     button.attr('data-kt-indicator','on')
//     console.log();
// }, function (response) {
//     setToken(response?.data?.access_token)
//     setAuth(JSON.stringify(response?.data?.auth))
//     button.attr('data-kt-indicator','')
//
//     window.location.href = BASE_URL + '/student/dashboard';
//
// }, 'post', false);
// "use strict";
// var KTSigninGeneral = function () {
//     var t, e, i;
//     return {
//         init: function () {
//             t = document.querySelector("#kt_sign_in_form"), e = document.querySelector("#kt_sign_in_submit"), i = FormValidation.formValidation(t, {
//                 fields: {
//                     email: {
//                         validators: {
//                             notEmpty: {message: "Email address is required"},
//                             emailAddress: {message: "The value is not a valid email address"}
//                         }
//                     }, password: {validators: {notEmpty: {message: "The password is required"}}}
//                 },
//                 plugins: {
//                     trigger: new FormValidation.plugins.Trigger,
//                     bootstrap: new FormValidation.plugins.Bootstrap5({rowSelector: ".fv-row"})
//                 }
//             }), e.addEventListener("click", (function (n) {
//                 n.preventDefault(), i.validate().then((function (i) {
//                     "Valid" == i ? (e.setAttribute("data-kt-indicator", "on"), e.disabled = !0, setTimeout((function () {
//                         e.removeAttribute("data-kt-indicator"), e.disabled = !1, Swal.fire({
//                             text: "You have successfully logged in!",
//                             icon: "success",
//                             buttonsStyling: !1,
//                             confirmButtonText: "Ok, got it!",
//                             customClass: {confirmButton: "btn btn-primary"}
//                         }).then((function (e) {
//                             e.isConfirmed && (t.querySelector('[name="email"]').value = "", t.querySelector('[name="password"]').value = "")
//                         }))
//                     }), 2e3)) : Swal.fire({
//                         text: "Sorry, looks like there are some errors detected, please try again.",
//                         icon: "error",
//                         buttonsStyling: !1,
//                         confirmButtonText: "Ok, got it!",
//                         customClass: {confirmButton: "btn btn-primary"}
//                     })
//                 }))
//             }))
//         }
//     }
// }();
// KTUtil.onDOMContentLoaded((function () {
//     KTSigninGeneral.init()
// }));
