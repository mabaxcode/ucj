
<div class="modal fade" id="kt_modal_create_order" tabindex="-1" aria-hidden="true"></div>

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


$(document).on('click', '.add-new-order', function(e){
    e.preventDefault();
    $.ajax({
        url: base_url + 'app/add_new_order',
        type: "POST",
        // data: {id:id},
        async: true,
        success: function( response ){
            $('#kt_modal_create_order').html(response);
            $('#kt_modal_create_order').modal('show');
        },
        error: function(data){
            // console.log(data);
        },
    });
});

$(document).on('click', '.submit-this-order', function(e){
    e.preventDefault();
    var formOrder = $("#order-data-form").serialize();
    $.ajax({
        url: base_url + 'app/check_order_uploaded',
        type: "POST",
        data: formOrder,
        async: true,
        dataType:"json",
        success: function( response ){
            if (response.status == false) {
                Swal.fire({
                  title: "Error!",
                  html: response.msg,
                  icon: "error"
                });
            } else {

                $.ajax({
                    url: base_url + 'app/save_new_order',
                    type: "POST",
                    data: formOrder,
                    async: true,
                    dataType:"json",
                    success: function( response ){
                        if (response.status == true) {
                            Swal.fire({
                              title: "Success",
                              text: response.msg,
                              icon: "success",
                              confirmButtonColor: "#3085d6",
                              confirmButtonText: "Okay"
                            }).then((result) => {
                              if (result.isConfirmed) {
                                    location.reload();
                              }
                            });
                        } else {
                            Swal.fire({
                              title: "Error!",
                              html: response.msg,
                              icon: "error"
                            });
                        }
                    },
                    error: function(data){
                        // console.log(data);
                    },
                });

            }
        },
        error: function(data){
            // console.log(data);
        },
    });
});

</script>