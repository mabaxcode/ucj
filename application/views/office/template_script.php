
<div class="modal fade" id="kt_modal_create_template" tabindex="-1" aria-hidden="true"></div>

<script type="text/javascript">
	$(document).on('click', '.btn-add-new-template', function(e){
	    e.preventDefault();
	    $.ajax({
	        url: base_url + 'office/add_new_template_modal',
	        type: "POST",
	        // data: {id:id},
	        async: true,
	        success: function( response ){
	            $('#kt_modal_create_template').html(response);
	            $('#kt_modal_create_template').modal('show');
	        },
	        error: function(data){
	            // console.log(data);
	        },
	    });
	});

	$(document).on('click', '.save-this-template', function(e){
	    e.preventDefault();
	    var formTemplate = $("#template-data-form").serialize();
	    $.ajax({
	        url: base_url + 'office/check_template_uploaded',
	        type: "POST",
	        data: formTemplate,
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
				        url: base_url + 'office/save_new_template',
				        type: "POST",
				        data: formTemplate,
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