<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Toolbar-->
							<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
								<!--begin::Toolbar container-->
								<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
									<!--begin::Page title-->
									<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
										<!--begin::Title-->
										<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Order Listing</h1>
										<!--end::Title-->
										<!--begin::Breadcrumb-->
										
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
									<!--begin::Card-->
									<div class="card">
										<!--begin::Card header-->
										<div class="card-header border-0 pt-6">
											<!--begin::Card title-->
											<div class="card-title">
												<!--begin::Search-->
												<div class="d-flex align-items-center position-relative my-1">
													<i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
													<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Order..." />
												</div>
												<!--end::Search-->
											</div>
											<!--begin::Card title-->
											<!--begin::Card toolbar-->
											<?/*
											<div class="card-toolbar">
												<!--begin::Toolbar-->
												<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
													<!--end::Export-->
													<!--begin::Add user-->
													<button type="button" class="btn btn-primary add-new-order">
													<i class="ki-duotone ki-plus fs-2"></i>Add New Order</button>
													<!--end::Add user-->
												</div>
												<!--end::Toolbar-->
											</div>
											*/?>
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body py-4">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_search_com_order">
												<thead>
													<tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
														<th class="w-10px pe-2">
															No
														</th>
														<th class="min-w-125px">Design Ordered</th>
														<th class="min-w-125px">Order Date</th>
														<th class="min-w-125px">Status</th>
														<th class="min-w-125px">Remark</th>
													</tr>
												</thead>
												<tbody class="text-gray-600 fw-semibold">
													<? if($orders){ ?>
													<?
													$no = 1;
													foreach ($orders as $key) { 
													?>
													<tr>
														<td>
															<?=$no++?>
														</td>
														<td>
															<a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="<?=base_url()?>/uploads/order/<?=$key['filename']?>"><img src="<?=base_url()?>/uploads/order/<?=$key['filename']?>" class="w-50px ms-n1" alt="" data-bs-toggle="tooltip" data-bs-placement="right" title="View Jersey"></a>
														</td>
														<td>
															<?=dmy($key['create_dt'])?>
														</td>
														<td><span class="badge badge-success badge"><?=$key['status']?></span></td>
														<td>
															<?
															if ($key['status'] == 'ORDER') {
																echo "<b>Order Submit</b>";
															}
															if ($key['status'] == 'CONFIRM') {
																echo "<b>Order Confirmed</b>";
															}
															if ($key['status'] == 'REJECT') {
																echo "<font color='red'><b>Order Rejected</b></font>";
															}
															if ($key['status'] == 'PRINT') {
																echo "<b>Your Order In Process Of Printing</b>";
															}
															?>
														</td>
													</tr>
													<? } ?>
													<? } ?>
												</tbody>
											</table>
											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>