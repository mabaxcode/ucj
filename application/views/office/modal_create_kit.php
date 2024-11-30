<!--begin::Modal dialog-->
			<div class="modal-dialog modal-dialog-centered mw-900px">
				<!--begin::Modal content-->
				<div class="modal-content">
					<!--begin::Modal header-->
					<div class="modal-header">
						<!--begin::Modal title-->
						<h2>Add New Kit Listing</h2>
						<!--end::Modal title-->
						<!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
							<i class="ki-duotone ki-cross fs-1">
								<span class="path1"></span>
								<span class="path2"></span>
							</i>
						</div>
						<!--end::Close-->
					</div>
					<!--end::Modal header-->
					<!--begin::Modal body-->
					<div class="modal-body py-lg-10 px-lg-10">
						<form class="form" id="kit-data-form">
							<input type="hidden" id="temp_key" name="temp_key" value="<?=$temp_key?>">
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-5 fw-semibold mb-2">
									<span class="required">Kit Name</span>
									<span class="ms-1" data-bs-toggle="tooltip" title="Specify your unique kit name">
										<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
											<span class="path1"></span>
											<span class="path2"></span>
											<span class="path3"></span>
										</i>
									</span>
								</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input type="text" class="form-control form-control-lg" name="name" placeholder="" required />
								<!--end::Input-->
							</div>
						    <!--begin::Input group-->
						    <div class="fv-row">
						        <!--begin::Dropzone-->
						        <div class="dropzone" id="kt_dropzonejs_example_1">
						            <!--begin::Message-->
						            <div class="dz-message needsclick">
						                <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>

						                <!--begin::Info-->
						                <div class="ms-4">
						                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
						                    <span class="fs-7 fw-semibold text-gray-500">Only image type .png is allowed and image should be in resolution 600 x 600</span>
						                </div>
						                <!--end::Info-->
						            </div>
						        </div>
						        <!--end::Dropzone-->
						    </div>
						    <!--end::Input group-->
						    <div class="pt-10">
								
								<!--begin::Wrapper-->
								<div align="right">
									<button type="button" class="btn btn-lg btn-warning" data-bs-dismiss="modal">
										<span class="indicator-label">Close</span>
									</button>
									<button type="button" class="btn btn-lg btn-primary save-this-kit">Save 
									<i class="ki-duotone ki-arrow-right fs-3 ms-1 me-0">
										<span class="path1"></span>
										<span class="path2"></span>
									</i></button>
								</div>
								<!--end::Wrapper-->
							</div>
						</form>
						<!--end::Form-->
					</div>
					<!--end::Modal body-->
				</div>
				<!--end::Modal content-->
			</div>
			<!--end::Modal dialog-->



<script type="text/javascript">

	var temp_key = $("#temp_key").val();

	var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
	    url: base_url + 'office/upload_kit_design', // Set the URL for your upload script location
	    paramName: "file", // The name that will be used to transfer the file
	    maxFiles: 1,
	    maxFilesize: 10, // MB
	    // addRemoveLinks: true,
	    acceptedFiles: "image/png", // Only allow PNG images
	    params: {temp_key:temp_key},
	    accept: function(file, done) {
	        // Create a new image element to check the resolution
	        var img = new Image();
	        
	        // Create a file reader to read the uploaded image
	        var reader = new FileReader();
	        reader.onload = function(event) {
	            img.onload = function() {
	                // Check if the image resolution is 600x600
	                if (img.width === 600 && img.height === 600) {
	                    // Allow the file to be uploaded
	                    done();
	                } else {
	                    // Reject the file if resolution is not 600x600
	                    // done("Please upload an image with resolution 600x600 pixels.");
	                    Swal.fire({
						  title: "Error!",
						  text: "Please upload an image with resolution 600x600 pixels.",
						  icon: "error"
						});
	                }
	            };
	            img.src = event.target.result; // Set image source as the uploaded file data URL
	        };
	        
	        // Read the image as a data URL (base64 encoded)
	        reader.readAsDataURL(file);
	    },
	    // Handle server response after the file is successfully uploaded
	    success: function(file, response) {
	        try {
	            // Parse the JSON response from the server
	            var jsonResponse = JSON.parse(response);
	            if (jsonResponse.status === true) {
	            	Swal.fire({
					  title: "Success!",
					  text: jsonResponse.message,
					  icon: "success"
					});
	                // console.log("Upload successful:", jsonResponse.message);
	                // You can also use jsonResponse to update your UI
	            } else {
	                // console.error("Upload failed:", jsonResponse.message);
	                Swal.fire({
					  title: "Error!",
					  text: jsonResponse.message,
					  icon: "error"
					});
	            }
	        } catch (error) {
	            console.error("Error parsing server response:", error);
	        }
	    },
	    // Handle errors if the upload fails
	    error: function(file, response) {
	        console.error("Upload failed:", response);
	    }
	});

</script>