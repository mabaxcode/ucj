<script type="text/javascript">
	$(document).on('click', '.create-new-comment', function(e){
	    e.preventDefault();
	    var id = $(this).data('init');
	    var comment = $("#comment_val_id").val();
	    if (comment === '') {
	    	Swal.fire({
			  text: "Please type your comment",
			  icon: "error"
			});
			return;
	    }


	    $.ajax({
	        url: base_url + 'office/create_new_comment',
	        type: "POST",
	        data: {id:id,comment:comment},
	        async: true,
	        dataType:"json",
	        success: function( response ){
	            if (response.status == true) {
	            	Swal.fire({
					  title: response.msg,
					  icon: "success",
					  confirmButtonText: "Okay",
					}).then((result) => {
					  /* Read more about isConfirmed, isDenied below */
					  if (result.isConfirmed) {
					  		location.reload();
					  }
					});
	            } else {
	            	alert (response.msg);
	            }
	        },
	        error: function(data){
	            // console.log(data);
	        },
	    });
	});
</script>