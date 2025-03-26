
<div class="modal fade" id="modal_complete_reg" tabindex="-1" aria-hidden="true">

<script type="text/javascript">
"use strict";
var KTUsersList = function() {
    var e, t, n, r, o = document.getElementById("dt_staff_list"),
        c = () => {
            
        };

    return {
        init: function() {
            o && (o.querySelectorAll("tbody tr").forEach((e => {
                const t = e.querySelectorAll("td"),
                    n = t[3].innerText.toLowerCase();
                let r = 0,
                    o = "minutes";
                n.includes("yesterday") ? (r = 1, o = "days") : n.includes("mins") ? (r = parseInt(n.replace(/\D/g, "")), o = "minutes") : n.includes("hours") ? (r = parseInt(n.replace(/\D/g, "")), o = "hours") : n.includes("days") ? (r = parseInt(n.replace(/\D/g, "")), o = "days") : n.includes("weeks") && (r = parseInt(n.replace(/\D/g, "")), o = "weeks");
                const c = moment().subtract(r, o).format();
                t[3].setAttribute("data-order", c);
                // const l = moment(t[5].innerHTML, "DD MMM YYYY, LT").format();
                // t[5].setAttribute("data-order", l)
            })), (e = $(o).DataTable({
                info: !1,
                order: [],
                pageLength: 10,
                lengthChange: !1,
                columnDefs: [{
                    orderable: !1,
                    targets: 0
                }, {
                    orderable: !1,
                    targets: 3
                }]
            })).on("draw", (function() {
                c()
            })), document.querySelector('[data-kt-user-table-filter="search"]').addEventListener("keyup", (function(t) {
                e.search(t.target.value).draw()
            })), c(), (() => {
                const t = document.querySelector('[data-kt-user-table-filter="form"]')
            })())
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTUsersList.init()
}));


var KTModalNewTargetEdit = function() {
    var t, e, n, a, o, i;
    return {
        init: function() {
            (i = document.querySelector("#kt_modal_new_address")) && (o = new bootstrap.Modal(i), a = document.querySelector("#kt_modal_new_address_form"), t = document.getElementById("kt_modal_new_address_submit"), e = document.getElementById("kt_modal_new_address_cancel"), new Tagify(a.querySelector('[name="tags"]'), {
                whitelist: ["Important", "Urgent", "High", "Medium", "Low"],
                maxTags: 5,
                dropdown: {
                    maxItems: 10,
                    enabled: 0,
                    closeOnSelect: !1
                }
            }).on("change", (function() {
                n.revalidateField("tags")
            })), $(a.querySelector('[name="due_date"]')).flatpickr({
                enableTime: !0,
                dateFormat: "d, M Y, H:i"
            }), $(a.querySelector('[name="team_assign"]')).on("change", (function() {
                n.revalidateField("team_assign")
            })), n = FormValidation.formValidation(a, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Name is required"
                            }
                        }
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: "Username is required"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            }
                        }
                    },
                    "confirm-password": {
                        validators: {
                            notEmpty: {
                                message: "The password confirmation is required"
                            },
                            identical: {
                                compare: function() {
                                    return a.querySelector('[name="password"]').value
                                },
                                message: "The password and its confirm are not the same"
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), t.addEventListener("click", (function(e) {
                var workshopForm = $('#kt_modal_new_address_form').serialize();
                e.preventDefault(), n && n.validate().then((function(e) {
                    console.log("validated!"), "Valid" == e ? (t.setAttribute("data-kt-indicator", "on"), t.disabled = !0, setTimeout((function() {
                        t.removeAttribute("data-kt-indicator"), t.disabled = !1,
                        // doRegister(workshopForm);
                        $.ajax({
                            url: base_url + 'admin/create_staff_account',
                            type: "POST",
                            data: workshopForm,
                            dataType: "json",
                            async: true,
                            success: function( response ) {
                                // console.log(response);
                                if (response.status == true) {
                                    Swal.fire({
                                        text: response.msg,
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then((function(t) {
                                        if (t.isConfirmed) {
                                            t.isConfirmed && o.hide()
                                            location.reload();
                                        }
                                    }))
                                } else {
                                    Swal.fire({
                                        text: response.msg,
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    })
                                }
                            }
                        });
                    }), 2e3)) : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }))
            })), e.addEventListener("click", (function(t) {
                t.preventDefault(), Swal.fire({
                    text: "Are you sure you would like to cancel?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, cancel it!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then((function(t) {
                    t.value ? (a.reset(), o.hide()) : "cancel" === t.dismiss && Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }))
            })))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTModalNewTargetEdit.init()
}));

$(document).on('click', '.complete-register', function(e){
    var id = $(this).data('init');
    e.preventDefault();
    $.ajax({
        url: base_url + 'admin/completeStaffRegister',
        type: "POST",
        data: {id:id},
        async: true,
        success: function( response ){
            $('#modal_complete_reg').html(response);
            $('#modal_complete_reg').modal('show');
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.complete-register-vendor', function(e){
    var id = $(this).data('init');
    e.preventDefault();
    $.ajax({
        url: base_url + 'admin/completeVendorRegister',
        type: "POST",
        data: {id:id},
        async: true,
        success: function( response ){
            $('#modal_complete_reg').html(response);
            $('#modal_complete_reg').modal('show');
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.edit-staff', function(e){
    var id = $(this).data('init');
    e.preventDefault();
    $.ajax({
        url: base_url + 'admin/editStaff',
        type: "POST",
        data: {id:id},
        async: true,
        success: function( response ){
            $('#modal_complete_reg').html(response);
            $('#modal_complete_reg').modal('show');
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.edit-vendor', function(e){
    var id = $(this).data('init');
    e.preventDefault();
    $.ajax({
        url: base_url + 'admin/editVendor',
        type: "POST",
        data: {id:id},
        async: true,
        success: function( response ){
            $('#modal_complete_reg').html(response);
            $('#modal_complete_reg').modal('show');
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.topup-ewallet', function(e){
    var id = $(this).data('init');
    e.preventDefault();
    $.ajax({
        url: base_url + 'admin/topupEwallet_modal',
        type: "POST",
        data: {id:id},
        async: true,
        success: function( response ){
            $('#modal_complete_reg').html(response);
            $('#modal_complete_reg').modal('show');
        },
        error: function(data){
            // console.log(data);
        },
    });
});

var validateStaffComplete;
function completeStaffRegis(formID)
{   
    const fileForm = document.getElementById(formID);
    validateStaffComplete = FormValidation.formValidation(
    fileForm,
    {
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Staff Name is required',
                    }
                }
            },
            email: {
                validators: {
                    regexp: {
                        regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                        message: "The value is not a valid email address"
                    },
                    notEmpty: {
                        message: "Email address is required"
                    }
                }
            },
            phone_no: {
                validators: {
                    notEmpty: {
                        message: 'Phone No. is required',
                    }
                }
            },
            position: {
                validators: {
                    notEmpty: {
                        message: 'Position is required',
                    }
                }
            },
            balance: {
                validators: {
                    notEmpty: {
                        message: 'E-Wallet balance is required',
                    }
                }
            }
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger,
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: ""
            })
        }
    }
    );
}

$(document).on('click', '.btn-register-staff', function (e) {
    e.preventDefault();
    validateStaffComplete.validate().then(function(status) {

        if (status == 'Valid') {

            var newStaffFormData = $('#complete_staff_regis_data').serialize();

            $.ajax({
                url: base_url + 'admin/do_register_staff',
                type: "POST",
                data: newStaffFormData,
                dataType: "json",
                async: true,
                success: function( response ) {
                    // console.log(response);
                    if (response.status == true) {
                        Swal.fire({
                            text: response.msg,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                $("#modal_complete_reg").modal('hide');
                                location.reload();
                            }
                        }))
                    } else {
                        Swal.fire({
                            text: response.msg,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    }
                }
            });

        } else {
            swal.fire({
                text: "Before proceeding, please ensure that all mandatory fields have been completed.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            })
        }
    });

});

var validateStaffEdit;
function editStaffRegis(formID)
{   
    const fileForm = document.getElementById(formID);
    validateStaffEdit = FormValidation.formValidation(
    fileForm,
    {
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Staff Name is required',
                    }
                }
            },
            email: {
                validators: {
                    regexp: {
                        regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                        message: "The value is not a valid email address"
                    },
                    notEmpty: {
                        message: "Email address is required"
                    }
                }
            },
            phone_no: {
                validators: {
                    notEmpty: {
                        message: 'Phone No. is required',
                    }
                }
            },
            position: {
                validators: {
                    notEmpty: {
                        message: 'Position is required',
                    }
                }
            }
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger,
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: ""
            })
        }
    }
    );
}

$(document).on('click', '.btn-edit-staff', function (e) {
    e.preventDefault();
    validateStaffEdit.validate().then(function(status) {

        if (status == 'Valid') {

            var editStaffFormData = $('#edit_staff_regis_data').serialize();

            $.ajax({
                url: base_url + 'admin/do_edit_staff',
                type: "POST",
                data: editStaffFormData,
                dataType: "json",
                async: true,
                success: function( response ) {
                    // console.log(response);
                    if (response.status == true) {
                        Swal.fire({
                            text: response.msg,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                $("#modal_complete_reg").modal('hide');
                                location.reload();
                            }
                        }))
                    } else {
                        Swal.fire({
                            text: response.msg,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    }
                }
            });

        } else {
            swal.fire({
                text: "Before proceeding, please ensure that all mandatory fields have been completed.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            })
        }
    });

});


$(document).on('click', '.btn-topup-staff-ewallet', function(e){
    var id = $(this).data('init');
    var balance = $("#top_up_balance_id").val(); curr_balance
    var curr_balance = $("#curr_balance").val();
    if (balance == '') {
        Swal.fire({
              // title: "The Internet?",
              text: "Please insert top up amount",
              icon: "info"
            });
    }
    e.preventDefault();
    $.ajax({
        url: base_url + 'admin/topupEwallet_process',
        type: "POST",
        data: {id:id,balance:balance,curr_balance:curr_balance},
        async: true,
        dataType:"json",
        success: function( response ){
                if (response.status == true) {
                    Swal.fire({
                        text: response.msg,
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then((function(t) {
                        if (t.isConfirmed) {
                            $("#modal_complete_reg").modal('hide');
                            location.reload();
                        }
                    }))
                } else {
                    Swal.fire({
                        text: response.msg,
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }
        },
        error: function(data){
            // console.log(data);
        },
    });
});



    var KTModalNewTargetAddVendor = function() {
    var t, e, n, a, o, i;
    return {
        init: function() {
            (i = document.querySelector("#kt_modal_new_vendor")) && (o = new bootstrap.Modal(i), a = document.querySelector("#kt_modal_new_address_form_vendor"), t = document.getElementById("kt_modal_new_address_submit_vendor"), e = document.getElementById("kt_modal_new_address_cancel_vendor"), new Tagify(a.querySelector('[name="tags"]'), {
                whitelist: ["Important", "Urgent", "High", "Medium", "Low"],
                maxTags: 5,
                dropdown: {
                    maxItems: 10,
                    enabled: 0,
                    closeOnSelect: !1
                }
            }).on("change", (function() {
                n.revalidateField("tags")
            })), $(a.querySelector('[name="due_date"]')).flatpickr({
                enableTime: !0,
                dateFormat: "d, M Y, H:i"
            }), $(a.querySelector('[name="team_assign"]')).on("change", (function() {
                n.revalidateField("team_assign")
            })), n = FormValidation.formValidation(a, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Name is required"
                            }
                        }
                    },
                    username: {
                        validators: {
                            notEmpty: {
                                message: "Username is required"
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            }
                        }
                    },
                    "confirm-password": {
                        validators: {
                            notEmpty: {
                                message: "The password confirmation is required"
                            },
                            identical: {
                                compare: function() {
                                    return a.querySelector('[name="password"]').value
                                },
                                message: "The password and its confirm are not the same"
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), t.addEventListener("click", (function(e) {
                var workshopForm = $('#kt_modal_new_address_form_vendor').serialize();
                e.preventDefault(), n && n.validate().then((function(e) {
                    console.log("validated!"), "Valid" == e ? (t.setAttribute("data-kt-indicator", "on"), t.disabled = !0, setTimeout((function() {
                        t.removeAttribute("data-kt-indicator"), t.disabled = !1,
                        // doRegister(workshopForm);
                        $.ajax({
                            url: base_url + 'admin/create_vendor_account',
                            type: "POST",
                            data: workshopForm,
                            dataType: "json",
                            async: true,
                            success: function( response ) {
                                // console.log(response);
                                if (response.status == true) {
                                    Swal.fire({
                                        text: response.msg,
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    }).then((function(t) {
                                        if (t.isConfirmed) {
                                            t.isConfirmed && o.hide()
                                            location.reload();
                                        }
                                    }))
                                } else {
                                    Swal.fire({
                                        text: response.msg,
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    })
                                }
                            }
                        });
                    }), 2e3)) : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }))
            })), e.addEventListener("click", (function(t) {
                t.preventDefault(), Swal.fire({
                    text: "Are you sure you would like to cancel?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, cancel it!",
                    cancelButtonText: "No, return",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then((function(t) {
                    t.value ? (a.reset(), o.hide()) : "cancel" === t.dismiss && Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }))
            })))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTModalNewTargetAddVendor.init()
}));


var validateVendorComplete;
function completeVendorRegis(formID)
{   
    const fileForm = document.getElementById(formID);
    validateVendorComplete = FormValidation.formValidation(
    fileForm,
    {
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required',
                    }
                }
            },
            email: {
                validators: {
                    regexp: {
                        regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                        message: "The value is not a valid email address"
                    },
                    notEmpty: {
                        message: "Email address is required"
                    }
                }
            },
            phone_no: {
                validators: {
                    notEmpty: {
                        message: 'Phone No. is required',
                    }
                }
            }
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger,
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: ""
            })
        }
    }
    );
}

$(document).on('click', '.btn-register-vendor', function (e) {
    e.preventDefault();
    validateVendorComplete.validate().then(function(status) {

        if (status == 'Valid') {

            var newStaffFormData = $('#complete_vendor_regis_data').serialize();

            $.ajax({
                url: base_url + 'admin/do_register_vendor',
                type: "POST",
                data: newStaffFormData,
                dataType: "json",
                async: true,
                success: function( response ) {
                    // console.log(response);
                    if (response.status == true) {
                        Swal.fire({
                            text: response.msg,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                $("#modal_complete_reg").modal('hide');
                                location.reload();
                            }
                        }))
                    } else {
                        Swal.fire({
                            text: response.msg,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    }
                }
            });

        } else {
            swal.fire({
                text: "Before proceeding, please ensure that all mandatory fields have been completed.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            })
        }
    });

});


var validateVendorEdit;
function editVendorRegis(formID)
{   
    const fileForm = document.getElementById(formID);
    validateVendorEdit = FormValidation.formValidation(
    fileForm,
    {
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required',
                    }
                }
            },
            email: {
                validators: {
                    regexp: {
                        regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                        message: "The value is not a valid email address"
                    },
                    notEmpty: {
                        message: "Email address is required"
                    }
                }
            },
            phone_no: {
                validators: {
                    notEmpty: {
                        message: 'Phone No. is required',
                    }
                }
            }
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger,
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: ""
            })
        }
    }
    );
}

$(document).on('click', '.btn-edit-vendor', function (e) {
    e.preventDefault();
    validateVendorEdit.validate().then(function(status) {

        if (status == 'Valid') {

            var editStaffFormData = $('#edit_vendor_regis_data').serialize();

            $.ajax({
                url: base_url + 'admin/do_edit_vendor',
                type: "POST",
                data: editStaffFormData,
                dataType: "json",
                async: true,
                success: function( response ) {
                    // console.log(response);
                    if (response.status == true) {
                        Swal.fire({
                            text: response.msg,
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                $("#modal_complete_reg").modal('hide');
                                location.reload();
                            }
                        }))
                    } else {
                        Swal.fire({
                            text: response.msg,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    }
                }
            });

        } else {
            swal.fire({
                text: "Before proceeding, please ensure that all mandatory fields have been completed.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn font-weight-bold btn-light-primary"
                }
            })
        }
    });

});

</script>