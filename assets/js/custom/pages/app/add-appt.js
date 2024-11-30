"use strict";
var KTAccountSettingsProfileDetails = function() {
    var e, t;
    return {
        init: function() {
            (e = document.getElementById("kt_account_profile_details_form")) && 
            (t = FormValidation.formValidation(e, {
                fields: {
                    service_type: {
                        validators: {
                            notEmpty: {
                                message: "Service type is required"
                            }
                        }
                    },
                    service_dt: {
                        validators: {
                            notEmpty: {
                                message: "Service date is required"
                            }
                        }
                    },
                    service_time: {
                        validators: {
                            notEmpty: {
                                message: "Service time is required"
                            }
                        }
                    },
                    workshop: {
                        validators: {
                            notEmpty: {
                                message: "Workshop is required"
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
                    url: base_url + '/app/makeAppt', // Replace with your server endpoint
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
    KTAccountSettingsProfileDetails.init();
}));
