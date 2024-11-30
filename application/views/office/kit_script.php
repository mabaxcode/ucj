
<div class="modal fade" id="kt_modal_create_kit" tabindex="-1" aria-hidden="true"></div>

<script type="text/javascript">

	
	$(document).on('click', '.btn-add-new-kit', function(e){
	    e.preventDefault();
	    $.ajax({
	        url: base_url + 'office/add_new_kit_modal',
	        type: "POST",
	        // data: {id:id},
	        async: true,
	        success: function( response ){
	            $('#kt_modal_create_kit').html(response);
	            $('#kt_modal_create_kit').modal('show');
	        },
	        error: function(data){
	            // console.log(data);
	        },
	    });
	});

	$(document).on('click', '.save-this-kit', function(e){
	    e.preventDefault();
	    var formKit = $("#kit-data-form").serialize();
	    $.ajax({
	        url: base_url + 'office/check_kit_uploaded',
	        type: "POST",
	        data: formKit,
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
				        url: base_url + 'office/save_new_kit',
				        type: "POST",
				        data: formKit,
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

	$(document).on('click', '.delete-kit', function(e){
	    e.preventDefault();
	    var id = $(this).data('init');

	    Swal.fire({
		  title: "Are you sure?",
		  text: "You won't be able to revert this!",
		  icon: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#3085d6",
		  cancelButtonColor: "#d33",
		  confirmButtonText: "Yes, delete it!"
		}).then((result) => {
		  if (result.isConfirmed) {

		  	$.ajax({
		        url: base_url + 'office/delete_kit',
		        type: "POST",
		        data: {id:id},
		        async: true,
		        dataType:"json",
		        success: function( response ){

		        	if (response.status == true) {
		        		Swal.fire({
		        			title: "Deleted!",
					        text: "Kit has been deleted !",
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
		        		alert ('Failed to update'); return;
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