"use strict";
var KTSetReminder = function() {
    var e, t;
    return {
        init: function() {
            (e = document.getElementById("kt_account_profile_details_form_reminder")) && 
            (t = FormValidation.formValidation(e, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Product Name is required"
                            }
                        }
                    },
                    price: {
                        validators: {
                            notEmpty: {
                                message: "Product Price is required"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    submitButton: new FormValidation.plugins.SubmitButton,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            })).on('core.form.valid', function() {
                // AJAX call when form is valid
                const formData = $(e).serialize(); // Serialize form data

                // console.log(formData);

                $.ajax({
                    url: base_url + 'vendor/doAddProduct', // Replace with your server endpoint
                    method: 'POST',
                    data: formData,
                    dataType:"json",
                    success: function(response) {
                        // Handle successful response
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
						        location.reload();
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
                    error: function(error) {
                        // Handle error response
                        Swal.fire({
		                    text: "Error ! Something when wrong",
		                    icon: "error",
		                    buttonsStyling: !1,
		                    confirmButtonText: "Ok, got it!",
		                    customClass: {
		                        confirmButton: "btn btn-primary"
		                    }
		                })
                    }
                });
            });
        }
    }
}();

KTUtil.onDOMContentLoaded((function() {
    KTSetReminder.init();
}));
