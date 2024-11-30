"use strict";
var KTSignupGeneral = function() {
    var e, t, r, a, s = function() {
        return a.getScore() > 50
    };
    return {
        init: function() {
            e = document.querySelector("#kt_sign_up_form"), t = document.querySelector("#kt_sign_up_submit"), a = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]')), ! function(e) {
                try {
                    return new URL(e), !0
                } catch (e) {
                    return !1
                }
            }(t.closest("form").getAttribute("action")) ? (r = FormValidation.formValidation(e, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Name is required"
                            }
                        }
                    },
                    user_type: {
                        validators: {
                            notEmpty: {
                                message: "Please select you are register account as a User or Workshop Owner"
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
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            },
                            callback: {
                                message: "Please enter valid password",
                                callback: function(e) {
                                    if (e.value.length > 0) return s()
                                }
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
                                    return e.querySelector('[name="password"]').value
                                },
                                message: "The password and its confirm are not the same"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: !1
                        }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), t.addEventListener("click", (function(s) {
            	var regFrom = $('#kt_sign_up_form').serialize();
                s.preventDefault(), r.revalidateField("password"), r.validate().then((function(r) {
                    "Valid" == r ? (t.setAttribute("data-kt-indicator", "on"), t.disabled = !0, setTimeout((function() {
                        t.removeAttribute("data-kt-indicator"), t.disabled = !1, 
                        doRegAccount(regFrom);
                    }), 1500)) : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }))
            })), e.querySelector('input[name="password"]').addEventListener("input", (function() {
                this.value.length > 0 && r.updateFieldStatus("password", "NotValidated")
            }))) : (r = FormValidation.formValidation(e, {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: "Name is required"
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
                    password: {
                        validators: {
                            notEmpty: {
                                message: "The password is required"
                            },
                            callback: {
                                message: "Please enter valid password",
                                callback: function(e) {
                                    if (e.value.length > 0) return s()
                                }
                            }
                        }
                    },
                    password_confirmation: {
                        validators: {
                            notEmpty: {
                                message: "The password confirmation is required"
                            },
                            identical: {
                                compare: function() {
                                    return e.querySelector('[name="password"]').value
                                },
                                message: "The password and its confirm are not the same"
                            }
                        }
                    },
                    toc: {
                        validators: {
                            notEmpty: {
                                message: "You must accept the terms and conditions"
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: !1
                        }
                    }),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: ""
                    })
                }
            }), t.addEventListener("click", (function(a) {
                a.preventDefault(), r.revalidateField("password"), r.validate().then((function(r) {
                    "Valid" == r ? (t.setAttribute("data-kt-indicator", "on"), t.disabled = !0, axios.post(t.closest("form").getAttribute("action"), new FormData(e)).then((function(t) {
                        if (t) {
                            e.reset();
                            const t = e.getAttribute("data-kt-redirect-url");
                            t && (location.href = t)
                        } else Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    })).catch((function(e) {
                        Swal.fire({
                            text: "Sorry, looks like there are some errors detected, please try again.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    })).then((() => {
                        t.removeAttribute("data-kt-indicator"), t.disabled = !1
                    }))) : Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                }))
            })), e.querySelector('input[name="password"]').addEventListener("input", (function() {
                this.value.length > 0 && r.updateFieldStatus("password", "NotValidated")
            })))
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTSignupGeneral.init()
}));


function doRegAccount(regData)
{	
	$.ajax({
        url: base_url + 'main/doCreateAccount',
        type: "POST",
        data: regData,
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
        	}
        }
    });
}




