<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Comment Details</h1>
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
											<li class="breadcrumb-item text-muted">Comment</li>
											<!--end::Item-->
										</ul>
										<!--end::Breadcrumb-->
									</div>
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Inbox App - View & Reply -->
									<div class="d-flex flex-column flex-lg-row">
										<!--begin::Sidebar-->
										<div class="d-none d-lg-flex flex-column flex-lg-row-auto w-100 w-lg-450px" data-kt-drawer="true" data-kt-drawer-name="inbox-aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_inbox_aside_toggle">
											<!--begin::Sticky aside-->
											<div class="card card-flush mb-0" data-kt-sticky="true" data-kt-sticky-name="inbox-aside-sticky" data-kt-sticky-offset="{default: false, xl: '100px'}" data-kt-sticky-width="{lg: '275px'}" data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
												<!--begin::Aside content-->
												<div class="card-body">
														
													<!-- Kit image -->
													<!--begin::Overlay-->
													<a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="<?=base_url($kit['path'])?>/<?=$kit['filename']?>">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7" style="height: 266px;background-image:url('<?=base_url($kit['path'])?>/<?=$kit['filename']?>')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="ki-duotone ki-eye fs-3x text-white">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Overlay-->
													<!--begin::Info-->
													<div class="d-flex align-items-end flex-stack mb-1">
														<!--begin::Title-->
														<div class="text-start">
															<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block"><?=$kit['name']?></span>
															
														</div>
														<!--end::Title-->
														<!--begin::Total-->
														<!-- <span class="text-gray-600 text-end fw-bold fs-6">$17,035</span> -->
														<!--end::Total-->
													</div>
													<!--end::Info-->
												</div>
												<!--end::Aside content-->
											</div>
											<!--end::Sticky aside-->
										</div>
										<!--end::Sidebar-->
										<!--begin::Content-->
										<div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
											<!--begin::Card-->
											<div class="card">
												
												<div class="card-body">
													<!--begin::Title-->
													<div class="d-flex flex-wrap gap-2 justify-content-between mb-8">
														<div class="d-flex align-items-center flex-wrap gap-2">
															<!--begin::Heading-->
															<h2 class="fw-semibold me-3 my-1">Kit Design. Thank you for reaching with us!</h2>
															<!--begin::Heading-->
															<!--begin::Badges-->
															<span class="badge badge-light-primary my-1 me-2">Comments</span>
															<!-- <span class="badge badge-light-danger my-1">important</span> -->
															<!--end::Badges-->
														</div>
														
													</div>
													<!--end::Title-->
											
													<div class="separator my-6"></div>
													<? if($comments){ ?>
													<? foreach ($comments as $key) { ?>
													<!--begin::Message accordion-->
													<div data-kt-inbox-message="message_wrapper">
														<!--begin::Message header-->
														<div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer" data-kt-inbox-message="header">
															<!--begin::Author-->
															<div class="d-flex align-items-center">
																<!--begin::Avatar-->
																<?/*
																<div class="symbol symbol-50 me-4">
																	<span class="symbol-label" style="background-image:url(assets/media/avatars/300-1.jpg);"></span>
																</div>
																*/?>
																<!--end::Avatar-->
																<div class="pe-5">
																	<!--begin::Author details-->
																	<div class="d-flex align-items-center flex-wrap gap-1">
																		<a href="#" class="fw-bold text-gray-900 text-hover-primary"><?=ucfirst(get_user_detail($key['user_id'], 'name'))?></a>
																		<?/*
																		<i class="ki-duotone ki-abstract-8 fs-7 text-success mx-3">
																			<span class="path1"></span>
																			<span class="path2"></span>
																		</i>
																		<span class="text-muted fw-bold">2 days ago</span>
																		*/?>
																	</div>
																	<!--end::Author details-->
																	<!--begin::Preview message-->
																	<div class="text-muted fw-semibold mw-450px" data-kt-inbox-message="preview"><?=$key['comment']?></div>
																	<!--end::Preview message-->
																</div>
															</div>
															<!--end::Author-->
															<!--begin::Actions-->
															<div class="d-flex align-items-center flex-wrap gap-2">
																<!--begin::Date-->
																<span class="fw-semibold text-muted text-end me-3"><?=convert_date($key['create_dt'])?></span>
																<!--end::Date-->
																<?/*
																<? if($key['user_id'] <> $this->session->userdata('user_id')){ ?>
																<div class="d-flex">
																	<!--begin::Reply-->
																	<a href="#" class="btn btn-sm btn-icon btn-clear btn-active-light-primary me-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Reply">
																		<i class="ki-duotone ki-message-edit fs-2 m-0">
																			<span class="path1"></span>
																			<span class="path2"></span>
																		</i>
																	</a>
																	<!--end::Reply-->
																</div>
																<? } ?>
																*/?>
															</div>
															<!--end::Actions-->
														</div>
														<!--end::Message header-->
													</div>
													<!--end::Message accordion-->
													<div class="separator my-6"></div>
													<? } ?>
													<? } ?>

													<!--begin::Form-->
													<form id="kt_inbox_reply_form" class="rounded border mt-10">
														<!--begin::Body-->
														<div class="d-block">
															<!--begin::Subject-->
															<div class="border-bottom">
																<!-- <input class="form-control border-0 px-8 min-h-45px" name="compose_subject" placeholder="Subject" /> -->
																<textarea name="comment" id="comment_val_id" class="form-control border-0 px-8 min-h-45px" placeholder="Type your comment here..." rows="5"></textarea>
															</div>
															<!--end::Subject-->
															<!--begin::Message-->
															<!-- <div id="kt_inbox_form_editor" class="border-0 h-250px px-3"></div> -->
															<!--end::Message-->
														</div>
														<!--end::Body-->
														<!--begin::Footer-->
														<div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
															<!--begin::Actions-->
															<div class="d-flex align-items-center me-3">
																<!--begin::Send-->
																<div class="btn-group me-4">
																	<!--begin::Submit-->
																	<span class="btn btn-primary fs-bold px-6 create-new-comment" data-init="<?=$kit['id']?>" data-kt-inbox-form="send">
																		<span class="indicator-label">Create New Comment</span>
																		<span class="indicator-progress">Please wait... 
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																	</span>
																	<!--end::Submit-->
																</div>
																<!--end::Send-->
															
															</div>
															<!--end::Actions-->
															<!--begin::Toolbar-->
														
															<!--end::Toolbar-->
														</div>
														<!--end::Footer-->
													</form>
													<!--end::Form-->
												</div>
											</div>
											<!--end::Card-->
										</div>
										<!--end::Content-->
									</div>
									<!--end::Inbox App - View & Reply -->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>