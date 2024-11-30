"use strict";
var KTAppChat = function() {
    var e = function(e) {
    	var x = $("#x-msg").val();
        var t = e.querySelector('[data-kt-element="messages"]'),
            n = e.querySelector('[data-kt-element="input"]');
        if (0 !== n.value.length) {
        	// alert (n.value);
        	send_message(n.value, x);
            var o, a = t.querySelector('[data-kt-element="template-out"]'),
                l = t.querySelector('[data-kt-element="template-in"]');
            (o = a.cloneNode(!0)).classList.remove("d-none"), o.querySelector('[data-kt-element="message-text"]').innerText = n.value, n.value = "", t.appendChild(o), t.scrollTop = t.scrollHeight, setTimeout((function() {
                (o = l.cloneNode(!0)).classList.remove("d-none"), o.querySelector('[data-kt-element="message-text"]').innerText = "Thank you for your awesome support!", t.appendChild(o), t.scrollTop = t.scrollHeight
            }), 2e3)
        }
    };
    return {
        init: function(t) {
            ! function(t) {
                t && (KTUtil.on(t, '[data-kt-element="input"]', "keydown", (function(n) {
                    if (13 == n.keyCode) return e(t), n.preventDefault(), !1
                })), KTUtil.on(t, '[data-kt-element="send"]', "click", (function(n) {
                    e(t)
                })))
            }(t)
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTAppChat.init(document.querySelector("#kt_chat_messenger")), KTAppChat.init(document.querySelector("#kt_drawer_chat_messenger"))
}));

function send_message(msg, x)
{	
	$.ajax({
        url: base_url + 'app/send_message',
        type: "POST",
        data: {msg:msg},
        async: true,
        dataType: "json",
        success: function( response ){
      
        	if (response.status == false) {
        		alert ("error");
        	}

        },
        error: function(data){
            // console.log(data);
        },
    });

    if (x == '0') {
    	// Swal.fire({
		//   text: "Your messages has been successfully send",
		//   icon: "success",
		//   confirmButtonColor: "#3085d6",
		//   confirmButtonText: "Ok, got it!"
		// }).then((result) => {
		//   if (result.isConfirmed) {
		//     location.reload();
		//   }
		// });
    	location.reload();
    }

    
}