<script type="text/javascript">
"use strict";
var KTUsersList = function() {
    var e, t, n, r, o = document.getElementById("kt_table_search_workshop"),
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

$(document).on('click', '.confirm-order', function(e){
    e.preventDefault();

    var id = $(this).data('init');

    Swal.fire({
	  title: "Do you want to confirm this order?",
	  icon: "info",
	  showCancelButton: true,
	  confirmButtonText: "Yes, Confirm !",
	}).then((result) => {
	  /* Read more about isConfirmed, isDenied below */
	  if (result.isConfirmed) {
	    	// Swal.fire("Success!", "Order has been confirmed", "success");
	  		$.ajax({
		        url: base_url + 'office/confirm_order',
		        type: "POST",
		        data: {id:id},
		        async: true,
		        dataType: "json",
		        success: function( response ){
		        	if (response.status == true) {
		        		Swal.fire("Success!", "Order has been confirmed", "success");
		        		setTimeout(() => {
						 	location.reload();
						}, 1000);
		        	} else {
		        		alert ("Error");
		        	}
		        },
		        error: function(data){
		            // console.log(data);
		        },
		    });
	  }
	});
});

$(document).on('click', '.reject-order', function(e){
    e.preventDefault();

    var id = $(this).data('init');

    Swal.fire({
	  title: "Do you want to reject this order?",
	  icon: "info",
	  showCancelButton: true,
	  confirmButtonText: "Yes, Reject !",
	}).then((result) => {
	  /* Read more about isConfirmed, isDenied below */
	  if (result.isConfirmed) {
	    	// Swal.fire("Success!", "Order has been confirmed", "success");
	  		$.ajax({
		        url: base_url + 'office/reject_order',
		        type: "POST",
		        data: {id:id},
		        async: true,
		        dataType: "json",
		        success: function( response ){
		        	if (response.status == true) {
		        		Swal.fire("Success!", "Order has been rejected", "success");
		        		setTimeout(() => {
						 	location.reload();
						}, 1000);
		        	} else {
		        		alert ("Error");
		        	}
		        },
		        error: function(data){
		            // console.log(data);
		        },
		    });
	  }
	});
});

$(document).on('click', '.print-order', function(e){
    e.preventDefault();

    var id = $(this).data('init');

    Swal.fire({
	  title: "Route this order to printing stage?",
	  icon: "info",
	  showCancelButton: true,
	  confirmButtonText: "Yes",
	}).then((result) => {
	  /* Read more about isConfirmed, isDenied below */
	  if (result.isConfirmed) {
	    	// Swal.fire("Success!", "Order has been confirmed", "success");
	  		$.ajax({
		        url: base_url + 'office/print_order',
		        type: "POST",
		        data: {id:id},
		        async: true,
		        dataType: "json",
		        success: function( response ){
		        	if (response.status == true) {
		        		Swal.fire("Success!", "Order has been routed to printing", "success");
		        		setTimeout(() => {
						 	location.reload();
						}, 1000);
		        	} else {
		        		alert ("Error");
		        	}
		        },
		        error: function(data){
		            // console.log(data);
		        },
		    });
	  }
	});
});

$(document).on('click', '.complete-order', function(e){
    e.preventDefault();

    var id = $(this).data('init');

    Swal.fire({
	  title: "Do you want to complete this order?",
	  icon: "info",
	  showCancelButton: true,
	  confirmButtonText: "Yes, Confirm !",
	}).then((result) => {
	  /* Read more about isConfirmed, isDenied below */
	  if (result.isConfirmed) {
	    	// Swal.fire("Success!", "Order has been confirmed", "success");
	  		$.ajax({
		        url: base_url + 'office/complete_order',
		        type: "POST",
		        data: {id:id},
		        async: true,
		        dataType: "json",
		        success: function( response ){
		        	if (response.status == true) {
		        		Swal.fire("Success!", "Order has been completed", "success");
		        		setTimeout(() => {
						 	location.reload();
						}, 1000);
		        	} else {
		        		alert ("Error");
		        	}
		        },
		        error: function(data){
		            // console.log(data);
		        },
		    });
	  }
	});
});

</script>