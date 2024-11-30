<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Account Overview</h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">
												<a href="#" class="text-muted text-hover-primary">Home</a>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-500 w-5px h-2px"></span>
											</li>
											<!--end::Item-->
											<!--begin::Item-->
											<li class="breadcrumb-item text-muted">Account</li>
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
									<!--begin::Navbar-->
									<div class="card mb-5 mb-xl-10">
										<div class="card-body pt-9 pb-0">
											<!--begin::Details-->
											<div class="d-flex flex-wrap flex-sm-nowrap">
	
												<!--begin::Info-->
												<div class="flex-grow-1">
													<!--begin::Title-->
													<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
														<!--begin::User-->
														<div class="d-flex flex-column">
															<!--begin::Name-->
															<div class="d-flex align-items-center mb-2">
																<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1"><?=strtoupper($user['name'])?></a>
																<a href="#">
																	<i class="ki-duotone ki-verify fs-1 text-primary">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</a>
															</div>
															<!--end::Name-->
															<!--begin::Info-->
															<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
																<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
																<i class="ki-duotone ki-profile-circle fs-4 me-1">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>User</a>
																
																<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
																<i class="ki-duotone ki-sms fs-4">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i><?=$user['email']?></a>
															</div>
															<!--end::Info-->
														</div>
														<!--end::User-->
														<!--begin::Actions-->
														
														<!--end::Actions-->
													</div>
													<!--end::Title-->
													<!--begin::Stats-->
													
													<!--end::Stats-->
												</div>
												<!--end::Info-->
											</div>
											<!--end::Details-->
											<!--begin::Navs-->
											<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
												<!--begin::Nav item-->
												<li class="nav-item mt-2">
													<a class="nav-link text-active-primary ms-0 me-10 py-5" href="<?=base_url('office/myProfile')?>">Overview</a>
												</li>
												<li class="nav-item mt-2">
													<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="<?=base_url('office/setting')?>">Setting</a>
												</li>

												<!--end::Nav item-->
												<!--begin::Nav item-->
												
											</ul>
											<!--begin::Navs-->
										</div>
									</div>
									<!--end::Navbar-->
									<!--begin::details View-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Profile Details</h3>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_profile_details" class="collapse show">
											<!--begin::Form-->
											<form id="kt_account_profile_details_form_setting" class="form" enctype="multipart/form-data">
												<!--begin::Card body-->
												<div class="card-body border-top p-9">
									
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6">
															<span class="required">Full Name</span>
															<span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
																<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span>
														</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="tel" name="name" class="form-control form-control-lg" placeholder="Name" value="<?=$user['name']?>" />
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6">
															<span class="required">Contact Phone</span>
															<span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
																<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
																	<span class="path1"></span>
																	<span class="path2"></span>
																	<span class="path3"></span>
																</i>
															</span>
														</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="tel" name="phone_no" class="form-control form-control-lg" placeholder="Phone number" value="<?=$user['phone_no']?>" />
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
												</div>
												<!--end::Card body-->
												<!--begin::Actions-->
												<div class="card-footer d-flex justify-content-end py-6 px-9">
													<a href="<?=base_url('office/myProfile')?>" class="btn btn-light btn-active-light-primary me-2">Discard</a>
													<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Content-->


									</div>
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Sign-in Method</h3>
											</div>
										</div>
										<!--end::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_signin_method" class="collapse show">
											<!--begin::Card body-->
											<div class="card-body border-top p-9">
												<!--begin::Email Address-->
												<div class="d-flex flex-wrap align-items-center">
													<!--begin::Label-->
													<div id="kt_signin_email">
														<div class="fs-6 fw-bold mb-1">Email Address</div>
														<div class="fw-semibold text-gray-600"><?=$user['email']?></div>
													</div>
													<!--end::Label-->
													<!--begin::Edit-->
													<div id="kt_signin_email_edit" class="flex-row-fluid d-none">
														<!--begin::Form-->
														<form id="kt_signin_change_email" class="form" novalidate="novalidate">
															<div class="row mb-6">
																<div class="col-lg-6 mb-4 mb-lg-0">
																	<div class="fv-row mb-0">
																		<label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New Email Address</label>
																		<input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="Email Address" name="email" value="<?=$user['email']?>" />
																	</div>
																</div>
																<?/*
																<div class="col-lg-6">
																	<div class="fv-row mb-0">
																		<label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
																		<input type="password" class="form-control form-control-lg form-control-solid" name="confirmemailpassword" id="confirmemailpassword" />
																	</div>
																</div>
																*/?>
															</div>
															<div class="d-flex">
																<button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Update Email</button>
																<button id="kt_signin_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
															</div>
														</form>
														<!--end::Form-->
													</div>
													<!--end::Edit-->
													<!--begin::Action-->
													<div id="kt_signin_email_button" class="ms-auto">
														<button class="btn btn-light btn-active-light-primary">Change Email</button>
													</div>
													<!--end::Action-->
												</div>
												<!--end::Email Address-->
												<!--begin::Separator-->
												<div class="separator separator-dashed my-6"></div>
												<!--end::Separator-->
												<!--begin::Password-->
												<div class="d-flex flex-wrap align-items-center mb-10">
													<!--begin::Label-->
													<div id="kt_signin_password">
														<div class="fs-6 fw-bold mb-1">Password</div>
														<div class="fw-semibold text-gray-600">************</div>
													</div>
													<!--end::Label-->
													<!--begin::Edit-->
													<div id="kt_signin_password_edit" class="flex-row-fluid d-none">
														<!--begin::Form-->
														<form id="kt_signin_change_password" class="form" novalidate="novalidate">
															<div class="row mb-1">
																<div class="col-lg-4">
																	<div class="fv-row mb-0">
																		<label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current Password</label>
																		<input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" />
																	</div>
																</div>
																<div class="col-lg-4">
																	<div class="fv-row mb-0">
																		<label for="newpassword" class="form-label fs-6 fw-bold mb-3">New Password</label>
																		<input type="password" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" />
																	</div>
																</div>
																<div class="col-lg-4">
																	<div class="fv-row mb-0">
																		<label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New Password</label>
																		<input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" />
																	</div>
																</div>
															</div>
															<div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
															<div class="d-flex">
																<button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update Password</button>
																<button id="kt_password_cancel" type="button" class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
															</div>
														</form>
														<!--end::Form-->
													</div>
													<!--end::Edit-->
													<!--begin::Action-->
													<div id="kt_signin_password_button" class="ms-auto">
														<button class="btn btn-light btn-active-light-primary">Reset Password</button>
													</div>
													<!--end::Action-->
												</div>
												<!--end::Password-->
												<!--begin::Notice-->
												
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Content-->
									</div>
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>