<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Toolbar-->
	<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
		<!--begin::Toolbar container-->
		<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
				<!--begin::Title-->
				<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Template</h1>
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
					<li class="breadcrumb-item text-muted">Template</li>
					<!--end::Item-->
				</ul>
				<!--end::Breadcrumb-->
			</div>
			<!--end::Page title-->
			<!--begin::Actions-->
			<div class="d-flex align-items-center gap-2 gap-lg-3">
				<!--begin::Secondary button-->
				<!-- <a href="#" class="btn btn-sm fw-bold btn-secondary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">Manage Bids</a> -->
				<!--end::Secondary button-->
				<!--begin::Primary button-->
				<!-- <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Add New Kit</a> -->
				<a href="#" class="btn btn-sm fw-bold btn-primary btn-add-new-template">Add New Template</a>
				<!--end::Primary button-->
			</div>
			<!--end::Actions-->
		</div>
		<!--end::Toolbar container-->
		
	</div>
	<!--end::Toolbar-->
	<!--begin::Content-->
	<div id="kt_app_content" class="app-content flex-column-fluid">
		<!--begin::Content container-->
		<!--begin::Form-->

		<div id="kt_app_content_container" class="app-container container-xxl">
			<!--begin::Row-->
			<? if($template){ ?>
			<div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
				<!--begin::Col-->
				<? foreach($template as $key){ ?>
				<?
				$cover_img = get_any_table_row(array('temp_key' => $key['temp_key'], 'is_submit' => '1'), 'cover_image');
				?>
				<div class="col-sm-6 col-xxl-3">
					<!--begin::Card widget 14-->
					<div class="card card-flush h-xl-100">
						<!--begin::Body-->
						<div class="card-body text-center pb-5">
							<!--begin::Overlay-->
							<a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="<?=base_url($cover_img['path'])?>/<?=$cover_img['filename']?>">
								<!--begin::Image-->
								<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded mb-7" style="height: 266px;background-image:url('<?=base_url($cover_img['path'])?>/<?=$cover_img['filename']?>')"></div>
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
									<span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-4 d-block"><?=$key['name']?></span>
									<span class="text-gray-500 mt-1 fw-bold fs-6">Create Date: <?=dmy($key['create_dt'])?></span>
								</div>
								<!--end::Title-->
								<!--begin::Total-->
								<!-- <span class="text-gray-600 text-end fw-bold fs-6">$17,035</span> -->
								<!--end::Total-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Body-->
						<!--begin::Footer-->
						<div class="card-footer d-flex flex-stack pt-0">
							<!--begin::Link-->
							<?/*<a class="btn btn-sm btn-danger flex-shrink-0 delete-kit" href="#" data-init="<?=$key['id']?>">Delete</a>*/?>
							<!--end::Link-->
							<!--begin::Link-->
							<a class="btn btn-sm btn-info flex-shrink-0 me-2">Download Template</a>
							<!--end::Link-->
							<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions 
                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-100px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <?/*<a href="<?= base_url('editdetails/editFor/'.$key['id'])?>" class="menu-link px-3">Edit</a> */?>
                                </div>
                                <div class="menu-item px-3">
                                	<a href="#" class="menu-link px-3 delete-template">Delete</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
						</div>
						<!--end::Footer-->
					</div>
					<!--end::Card widget 14-->
				</div>
				<? } ?>
				<!--end::Col-->
			</div>
			<? } ?>
			<!--end::Row-->
		</div>
		<!--end::Content container-->
	</div>
	<!--end::Content-->
</div>


			
	

