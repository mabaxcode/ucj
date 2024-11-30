<script type="text/javascript">
"use strict";
var KTSetSetting = function() {
    var e, t;
    return {
        init: function() {
            (e = document.getElementById("kt_account_profile_details_form_setting")) && 
            (t = FormValidation.formValidation(e, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Name is required"
                            }
                        }
                    },
                    phone_no: {
                        validators: {
                            notEmpty: {
                                message: "Contact Phone is required"
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
                // const formData = $(e).serialize(); // Serialize form data

                const formData = new FormData(e);

                // console.log(formData);

                $.ajax({
                    url: base_url + 'app/updateProfile', // Replace with your server endpoint
                    method: 'POST',
                    data: formData,
                    dataType:"json",
                    processData: false, // Don't process the data (important for file uploads)
                    contentType: false, // Don't set content type (important for file uploads)
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
    KTSetSetting.init();
}));


"use strict";
var KTAccountSettingsSigninMethods = function() {
    var t, e, n, o, i, s, r, a, l, d = function() {
            e.classList.toggle("d-none"), s.classList.toggle("d-none"), n.classList.toggle("d-none")
        },
        c = function() {
            o.classList.toggle("d-none"), a.classList.toggle("d-none"), i.classList.toggle("d-none")
        };
    return {
        init: function() {
            var m;
            t = document.getElementById("kt_signin_change_email"), e = document.getElementById("kt_signin_email"), n = document.getElementById("kt_signin_email_edit"), o = document.getElementById("kt_signin_password"), i = document.getElementById("kt_signin_password_edit"), s = document.getElementById("kt_signin_email_button"), r = document.getElementById("kt_signin_cancel"), a = document.getElementById("kt_signin_password_button"), l = document.getElementById("kt_password_cancel"), e && (s.querySelector("button").addEventListener("click", (function() {
                    d()
                })), r.addEventListener("click", (function() {
                    d()
                })), a.querySelector("button").addEventListener("click", (function() {
                    c()
                })), l.addEventListener("click", (function() {
                    c()
                }))), t && (m = FormValidation.formValidation(t, {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: "Email is required"
                                },
                                emailAddress: {
                                    message: "The value is not a valid email address"
                                }
                            }
                        }
                        // ,
                        // confirmemailpassword: {
                        //     validators: {
                        //         notEmpty: {
                        //             message: "Password is required"
                        //         }
                        //     }
                        // }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row"
                        })
                    }
                }), t.querySelector("#kt_signin_submit").addEventListener("click", (function(e) {
                    e.preventDefault(), console.log("click"), m.validate().then((function(e) {
                        if("Valid" == e){ 
                            /*do the process*/
                            var formData = $('#kt_signin_change_email').serialize();
                            do_change_the_email(formData);
                            
                        } else {
                            swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            })
                        }
                    }))
                }))),
                function() {
                    var t, e = document.getElementById("kt_signin_change_password");
                    e && (t = FormValidation.formValidation(e, {
                        fields: {
                            currentpassword: {
                                validators: {
                                    notEmpty: {
                                        message: "Current Password is required"
                                    }
                                }
                            },
                            newpassword: {
                                validators: {
                                    notEmpty: {
                                        message: "New Password is required"
                                    }
                                }
                            },
                            confirmpassword: {
                                validators: {
                                    notEmpty: {
                                        message: "Confirm Password is required"
                                    },
                                    identical: {
                                        compare: function() {
                                            return e.querySelector('[name="newpassword"]').value
                                        },
                                        message: "The password and its confirm are not the same"
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger,
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row"
                            })
                        }
                    }), e.querySelector("#kt_password_submit").addEventListener("click", (function(n) {
                        n.preventDefault(), console.log("click"), t.validate().then((function(n) {

                        	if (n === "Valid") {
                        		var formPasswordData = $('#kt_signin_change_password').serialize();
                                do_change_the_password(formPasswordData);
                        	} else {
                        		swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                })
                        	}


                            // "Valid" == n ? swal.fire({
                            //     text: "Sent password reset. Please check your email",
                            //     icon: "success",
                            //     buttonsStyling: !1,
                            //     confirmButtonText: "Ok, got it!",
                            //     customClass: {
                            //         confirmButton: "btn font-weight-bold btn-light-primary"
                            //     }
                            // }).then((function() {
                            //     e.reset(), t.resetForm(), c()
                            // })) : swal.fire({
                            //     text: "Sorry, looks like there are some errors detected, please try again.",
                            //     icon: "error",
                            //     buttonsStyling: !1,
                            //     confirmButtonText: "Ok, got it!",
                            //     customClass: {
                            //         confirmButton: "btn font-weight-bold btn-light-primary"
                            //     }
                            // })
                            
                        }))
                    })))
                }()
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTAccountSettingsSigninMethods.init()
}));


function do_change_the_email(formData)
{
    $.ajax({
        url: base_url + 'app/updateEmail',
        type: "POST",
        data: formData,
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
                return;
            }
        }
    });
}

function do_change_the_password(formPasswordData)
{
    $.ajax({
        url: base_url + 'app/change_password',
        type: "POST",
        data: formPasswordData,
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
                return;
            }
        }
    });
}

</script>