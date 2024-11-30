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
										<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Reminder</h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										<!--  -->
										<!--end::Breadcrumb-->
									</div>
									<!--end::Page title-->
									<!--begin::Actions-->
									
									<!--end::Actions-->
								</div>
								<!--end::Toolbar container-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
									<!--begin::Navbar-->
									
									<!--end::Navbar-->
									<!--begin::Basic info-->
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">Reminder Details</h3>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_profile_details" class="collapse show">
											<!--begin::Form-->
											<form id="kt_account_profile_details_form" class="form">
												<!--begin::Card body-->
												<div class="card-body border-top p-9">
													<!--begin::Input group-->
								
													<!--end::Input group-->
													<!--begin::Input group-->
													
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label required fw-semibold fs-6">Description</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="company" class="form-control form-control-lg form-control-solid" placeholder="Description" value="" />
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6">Due Date</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<input type="text" name="website" class="form-control form-control-lg form-control-solid" placeholder="Date" value="" />
														</div>
														<!--end::Col-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="row mb-6">
														<!--begin::Label-->
														<label class="col-lg-4 col-form-label fw-semibold fs-6">
															<span class="required">Remind Type (SMS/Email)</span>
															
														</label>
														<!--end::Label-->
														<!--begin::Col-->
														<div class="col-lg-8 fv-row">
															<select name="country" aria-label="Select a search_workshop" data-control="select2" data-placeholder="Select a remind type..." class="form-select form-select-solid form-select-lg fw-semibold">
																<option value="">Select a Workshop...</option>
																<option data-kt-flag="flags/afghanistan.svg" value="AF">SMS</option>
																<option data-kt-flag="flags/aland-islands.svg" value="AX">Email</option>
															</select>
														</div>
														<!--end::Col-->
													</div>
												</div>
												<!--end::Card body-->
												<!--begin::Actions-->
												<div class="card-footer d-flex justify-content-end py-6 px-9">
													<!-- <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button> -->
													<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Remind Me</button>
												</div>
												<!--end::Actions-->
											</form>
											<!--end::Form-->
										</div>
										<!--end::Content-->
									</div>
									<div class="card mb-5 mb-xl-10">
										<!--begin::Card header-->
										<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
											<!--begin::Card title-->
											<div class="card-title m-0">
												<h3 class="fw-bold m-0">List Of Reminder</h3>
											</div>
											<!--end::Card title-->
										</div>
										<!--begin::Card header-->
										<!--begin::Content-->
										<div id="kt_account_settings_profile_details" class="collapse show">
											<!--begin::Form-->
											<form id="kt_account_profile_details_form" class="form">
												<!--begin::Card body-->
												<div class="card-body border-top p-9">

											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_userss">
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
														<th class="w-10px pe-2">
															No
														</th>
														<th class="min-w-125px">Description</th>
														<th class="min-w-125px">Due Date</th>
														<th class="text-end min-w-100px">Status</th>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													<tr>
														<td>
															1.
														</td>
														<td>
															<!--begin:: Avatar -->
															
															<!--end::Avatar-->
															<!--begin::User details-->
															<div class="d-flex flex-column">
																<a href="apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Need to go workshop before 5PM</a>
															</div>
															<!--begin::User details-->
														</td>
														<td>5 Dec 2024 </td>
														<td class="text-end">
															<span class="badge badge-light-success badge-lg">On Going</span>
														</td>
													</tr>
							
												</tbody>
											</table>
											<!--end::Table-->
												</div>
												<!--end::Card body-->
							
											</form>
											<!--end::Form-->
										</div>
										<!--end::Content-->
									</div>
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						
					</div>