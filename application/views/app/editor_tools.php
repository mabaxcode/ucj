<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">
												<a href="index.html" class="text-muted text-hover-primary">Home</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-500 w-5px h-2px"></span>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">Jersey Customize</li>
											<!--end::Item-->
										</ul>
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page title-->
								
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!-- <div class="row g-5 gx-xl-10 mb-5 mb-xl-10"> -->
									
							
										<!--begin::Col-->
										<div class="col-xxl-12">
											<!--begin::Engage widget 10-->
											<div class="card card-flush h-md-100">
											<!--begin::Body-->
											<div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0">
												
												
													
														<div class="row">
										                    <!-- left column -->
															<div class="col-md-2">
																<div class="leftLayout" id="leftLayoutContainer">
																	<div>Type</div>
																	<div class="btn-group" data-toggle="buttons">
										                                <div class="btn typeButton active">
										                                    <input type="radio" name="form_shirt_type" value="1" autocomplete="off" checked />
										                                    <img src="<?=base_url()?>assets-editor/images/shirts/men1_blue_front.png" /><br/>
										                                    <div class="typename">Men</div>
										                                </div>
										                                <div class="btn typeButton">
										                                    <input type="radio" name="form_shirt_type" value="2" autocomplete="off" />
										                                    <img src="<?=base_url()?>assets-editor/images/shirts/women_black_front.png" /><br/>
										                                    <div class="typename">Women</div>
										                                </div>
																	</div>
																	<div id="div_colors_title">Color</div>
																	<div class="btn-group" data-toggle="buttons" id="div_colors">
										                                <div class="btn colorButton active" style="background-color: #0268b0;">
										                                    <input type="radio" name="form_shirt_color" value="1" autocomplete="off" checked />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										                                </div>
										                                <div class="btn colorButton" style="background-color: #ffffff;">
										                                    <input type="radio" name="form_shirt_color" value="2" autocomplete="off" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										                                </div>
																	</div>
																	<div class="btn-toolbar">
																		<div class="add_image btn-group">
																			<iframe id="ifr_upload" name="ifr_upload" height="0" width="0" frameborder="0"></iframe>
																			<form id="frm_upload" action="" method="post" enctype="multipart/form-data" target="ifr_upload">
																			<label class="btn btn-default btn-file">
																				<i class="fa fa-picture-o"></i>&nbsp;&nbsp;Add image<input type="file" name="image_upload" accept=".gif,.jpg,.jpeg,.png,.ico">
																			</label>
																			</form>
																		</div>
																		<div class="add_text btn-group">
																			<button type="button" class="btn btn-default" id="btn_addtext"><i class="fa fa-font"></i>&nbsp;&nbsp;Add text</button>
																		</div>
																		<div class="add_album btn-group">
																			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#albumModal"><i class="fa fa-th"></i>&nbsp;&nbsp;Album</button>
																		</div>
																	</div>
																	<div class="message">
																	</div>
																</div>
															</div>	
										                    <!-- center column -->
															<div class="col-md-8">
																<div class="centerLayout" id="centerLayoutContainer">
							<div class="shirt"><img src="<?=base_url()?>assets-editor/images/shirts/men1_blue_front.png" id="img_shirt" /></div>
							<div class="cvtoolbox">
								<div class="btn-group">
									<button type="button" class="btn btn-default" id="toolbox_centerh"><i class="fa fa-arrows-h fa-lg"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_up"><i class="fa fa-arrow-up"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_centerv"><i class="fa fa-arrows-v fa-lg"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_flipx"><i class="fa fa-road fa-lg"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_flipy"><i class="fa fa-road fa-lg fa-rotate-90"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_remove"><i class="fa fa-trash-o fa-lg"></i></button>
								</div>
							</div>
							<div class="cvtoolbox cvtoolbox_2nd">
								<div class="btn-group">
									<button type="button" class="btn btn-default" id="toolbox_left"><i class="fa fa-arrow-left"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_center"><i class="fa fa-arrows fa-lg"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_right"><i class="fa fa-arrow-right"></i></button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
								</div>
							</div>
							<div class="cvtoolbox cvtoolbox_3rd">
								<div class="btn-group">
									<button type="button" class="btn btn-default" id="toolbox_totop"><i class="fa fa-step-backward fa-lg fa-rotate-90"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_down"><i class="fa fa-arrow-down"></i></button>
									<button type="button" class="btn btn-default" id="toolbox_tobottom"><i class="fa fa-step-forward fa-lg fa-rotate-90"></i></button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
									<button type="button" class="btn btn-default nobtn">&nbsp;</button>
								</div>
							</div>
							<div class="cvtoolbox_info"><div><span></span></div></div>
							<div id="div_canvas_front" style="margin-top: 155px;">
								<canvas id="mainCanvas_front" width="260" height="350" class="shirt_canvas"></canvas>
							</div>
							<div id="div_canvas_back" style="margin-top: 155px;">
								<canvas id="mainCanvas_back" width="260" height="350" class="shirt_canvas"></canvas>
							</div>
                            <!-- <div class="btn-group twosides" data-toggle="buttons">
                                <div class="btn active">
                                    <input type="radio" name="form_shirt_side" value="front" autocomplete="off" checked />
                                    <div class="sidename"><i class="fa fa-bookmark-o"></i> Front</div>
                                </div>
                                <div class="btn">
                                    <input type="radio" name="form_shirt_side" value="back" autocomplete="off" />
                                    <div class="sidename"><i class="fa fa-bookmark"></i> Back</div>
                                </div>
                            </div> -->
							<div class="div_reviewbtn">
								<button type="button" class="btn btn-default" data-toggle="modal" data-target="#reviewModal"><i class="fa fa-eye"></i> Preview</button>
                                <div class="dropup">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownDownload" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-save"></i> Download
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownDownload">
                                        <li><a href="#" id="btnDownloadDesign">Design Only</a></li>
                                        <li><a href="#" id="btnDownloadShirt">Design & Shirt</a></li>
                                    </ul>
                                </div>
							</div>
						</div>
															</div>	
										                    <!-- right column -->
															<div class="col-md-2">
																<div class="rightLayout" id="rightLayoutContainer">
																	<div class="texttoolbox">
																	</div>
																	<div class="message">
																	</div>
																</div>
															</div>	
														</div>
													
												

											</div>
											<!--end::Body-->
											</div>
											<!--end::Engage widget 10-->
										</div>
										<!--end::Col-->
									<!-- </div> -->
						
								
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						<div id="kt_app_footer" class="app-footer">
							<!--begin::Footer container-->
							<div class="app-container container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
								<!--begin::Copyright-->
								<div class="text-gray-900 order-2 order-md-1">
									<span class="text-muted fw-semibold me-1">2024&copy;</span>
									<a href="" target="_blank" class="text-gray-800 text-hover-primary">UPSI Custom Jersey</a>
								</div>
								<!--end::Copyright-->
								<!--begin::Menu-->
								
								</ul>
								<!--end::Menu-->
							</div>
							<!--end::Footer container-->
						</div>
						<!--end::Footer-->
					</div>


					<!-- Album Modal -->
					<div id="albumModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Album</h4>
						  </div>
						  <div class="modal-body">
			                <a href="#" class="album-item"><div style="background-image: url(<?=base_url()?>assets-editor/images/album/image1.png)"><img bgsrc="<?=base_url()?>assets-editor/images/album/image1.png" src="<?=base_url()?>assets-editor/images/blank.png" /></div></a>
			                <a href="#" class="album-item"><div style="background-image: url(<?=base_url()?>assets-editor/images/album/image2.png)"><img bgsrc="<?=base_url()?>assets-editor/images/album/image2.png" src="<?=base_url()?>assets-editor/images/blank.png" /></div></a>
						  </div>
						</div>
					  </div>
					</div>

					<div id="reviewModal" class="modal fade" role="dialog">
					  <div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">&nbsp;</h4>
						  </div>
						  <div class="modal-body">
							<div class="shirt"><img src="" /></div>
							<div class="shirtdesign"><img src="" /></div>
						  </div>
						</div>
					  </div>
					</div>


