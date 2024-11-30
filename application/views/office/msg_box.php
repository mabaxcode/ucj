<div class="d-flex flex-column flex-column-fluid">
	<!--begin::Toolbar-->
	<div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
		<!--begin::Toolbar container-->
		<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
			<!--begin::Page title-->
			<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
				<!--begin::Title-->
				<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Customer Support</h1>
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
					<li class="breadcrumb-item text-muted">Customer Support</li>
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

			<!--begin::Layout-->
			<div class="d-flex flex-column flex-lg-row">
				<!--begin::Sidebar-->
				<div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
					<!--begin::Contacts-->
					<div class="card card-flush">
						
						<!--begin::Card body-->
						<div class="card-body pt-5" id="kt_chat_contacts_body">
							<!--begin::List-->
							<div class="scroll-y me-n5 pe-5 h-200px h-lg-auto" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_toolbar, #kt_app_toolbar, #kt_footer, #kt_app_footer, #kt_chat_contacts_header" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px">
								<!--begin::User-->
								<? foreach($users as $userchat){ ?>
								<?
								$total_unread = count_any_table(array('chat_id' => $userchat['chat_id'], 'user_type' => '1', 'read_flag' => '0'), 'chat');
								?>
								<div class="d-flex flex-stack py-4">
									<!--begin::Details-->
									<div class="d-flex align-items-center">
										<!--begin::Avatar-->
										<!-- <div class="symbol symbol-45px symbol-circle">
											<span class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">M</span>
										</div> -->
										<!--end::Avatar-->
										<!--begin::Details-->
										<div class="ms-5">
											<a href="<?=base_url('office/msgBox/'.$userchat['chat_id'])?>" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2" data-init="<?=$userchat['chat_id']?>"><?= ucfirst(get_user_detail($userchat['user_id'], 'name'))?></a>
											<div class="fw-semibold text-muted"><?=get_user_detail($userchat['user_id'], 'email')?></div>
										</div>
										<!--end::Details-->
									</div>
									<!--end::Details-->
									<!--begin::Lat seen-->
									<div class="d-flex flex-column align-items-end ms-2">
										<!-- <span class="text-muted fs-7 mb-1">2 weeks</span> -->
										<? if($total_unread <> '0'){ ?>
										<span class="badge badge-sm badge-circle badge-light-danger"><?=$total_unread?></span>
										<? } ?>
									</div>
									<!--end::Lat seen-->
								</div>
								<!--end::User-->
								<!--begin::Separator-->
								<div class="separator separator-dashed d-none"></div>
								<? } ?>
							</div>
							<!--end::List-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Contacts-->
				</div>
				<!--end::Sidebar-->
				<!--begin::Content-->
					
			
				<div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
					
					<!--begin::Messenger-->
					<div class="card" id="kt_chat_messenger">
						<!--begin::Card header-->
						<div class="card-header" id="kt_chat_messenger_header">
							<!--begin::Title-->
							<div class="card-title">
								<!--begin::User-->
								<div class="d-flex justify-content-center flex-column me-3">
									<a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1"><?=ucfirst($user_box['name'])?></a>
									<!--begin::Info-->
									<div class="mb-0 lh-1">
										<span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
										<span class="fs-7 fw-semibold text-muted"><?=$online?></span>
									</div>
									<!--end::Info-->
								</div>
								<!--end::User-->
							</div>
							<!--end::Title-->
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body" id="kt_chat_messenger_body">
							<!--begin::Messages-->
							<div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px">

								<?
								# user msg 
								$userMsg = get_any_table_array(array('chat_id' => $chat_id), 'chat', 'created_at', 'asc');

								foreach($userMsg as $key){
								if ($key['user_type'] == '1') {
								?>

								<div class="d-flex justify-content-start mb-10">
									<!--begin::Wrapper-->
									<div class="d-flex flex-column align-items-start">
										<!--begin::User-->
										<div class="d-flex align-items-center mb-2">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<img alt="Pic" src="<?=base_url()?>assets/media/avatars/300-25.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-3">
												<a href="<?=base_url('office/msgBox/'.$userchat['chat_id'])?>" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1"><?=ucfirst($user_box['name'])?></a>
												<span class="text-muted fs-7 mb-1">2 mins</span>
											</div>
											<!--end::Details-->
										</div>
										<!--end::User-->
										<!--begin::Text-->
										<div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start" data-kt-element="message-text"><?=$key['msg']?></div>
										<!--end::Text-->
									</div>
									<!--end::Wrapper-->
								</div>
								<? } // end if ?>


								<? $adminMsg = get_any_table_row(array('chat_id' => $chat_id, 'parent_id' => $key['id'], 'user_type' => '2'), 'chat'); ?>
								<? if($adminMsg){ ?>

								<div class="d-flex justify-content-end mb-10">
									<!--begin::Wrapper-->
									<div class="d-flex flex-column align-items-end">
										<!--begin::User-->
										<div class="d-flex align-items-center mb-2">
											<!--begin::Details-->
											<div class="me-3">
												<span class="text-muted fs-7 mb-1">5 mins</span>
												<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
											</div>
											<!--end::Details-->
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<img alt="Pic" src="<?=base_url()?>assets/media/avatars/300-1.jpg" />
											</div>
											<!--end::Avatar-->
										</div>
										<!--end::User-->
										<!--begin::Text-->
										<div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end" data-kt-element="message-text"><?=$adminMsg['msg']?></div>
										<!--end::Text-->
									</div>
									<!--end::Wrapper-->
								</div>

								<? } // end admin msg ?>

								<? } // end for ?>




								<!--begin::Message(template for out)-->
								<div class="d-flex justify-content-end mb-10 d-none" data-kt-element="template-out">
									<!--begin::Wrapper-->
									<div class="d-flex flex-column align-items-end">
										<!--begin::User-->
										<div class="d-flex align-items-center mb-2">
											<!--begin::Details-->
											<div class="me-3">
												<span class="text-muted fs-7 mb-1">Just now</span>
												<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
											</div>
											<!--end::Details-->
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<img alt="Pic" src="<?=base_url()?>assets/media/avatars/300-1.jpg" />
											</div>
											<!--end::Avatar-->
										</div>
										<!--end::User-->
										<!--begin::Text-->
										<div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end" data-kt-element="message-text"></div>
										<!--end::Text-->
									</div>
									<!--end::Wrapper-->
								</div>
								<!--end::Message(template for out)-->
								<!--begin::Message(template for in)-->
								<?/*
								<div class="d-flex justify-content-start mb-10 d-none" data-kt-element="template-in">
									<!--begin::Wrapper-->
									<div class="d-flex flex-column align-items-start">
										<!--begin::User-->
										<div class="d-flex align-items-center mb-2">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<img alt="Pic" src="<?=base_url()?>assets/media/avatars/300-25.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-3">
												<a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">My Msg Box</a>
												<span class="text-muted fs-7 mb-1">Just now</span>
											</div>
											<!--end::Details-->
										</div>
										<!--end::User-->
										<!--begin::Text-->
										<div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start">Right before vacation season we have the next Big Deal for you.</div>
										<!--end::Text-->
									</div>
									<!--end::Wrapper-->
								</div>
								*/?>
								<!--end::Message(template for in)-->
							</div>
							<!--end::Messages-->
						</div>
						<!--end::Card body-->
						<!--begin::Card footer-->
						<input type="hidden" id="x-chat-idd" value="<?=$chat_id?>">
						<div class="card-footer pt-4" id="kt_chat_messenger_footer">
							<!--begin::Input-->
							<textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" placeholder="Type a message"></textarea>
							<!--end::Input-->
						</div>
						<!--end::Card footer-->
					</div>
					<!--end::Messenger-->

				</div>

				<!--end::Content-->
			</div>
			<!--end::Layout-->
			<!--begin::Modals-->
			<!--begin::Modal - View Users-->
			<div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header pb-0 border-0 justify-content-end">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
								<i class="ki-duotone ki-cross fs-1">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</div>
							<!--end::Close-->
						</div>
						<!--begin::Modal header-->
						<!--begin::Modal body-->
						<div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
							<!--begin::Heading-->
							<div class="text-center mb-13">
								<!--begin::Title-->
								<h1 class="mb-3">Browse Users</h1>
								<!--end::Title-->
								<!--begin::Description-->
								<div class="text-muted fw-semibold fs-5">If you need more info, please check out our 
								<a href="#" class="link-primary fw-bold">Users Directory</a>.</div>
								<!--end::Description-->
							</div>
							<!--end::Heading-->
							<!--begin::Users-->
							<div class="mb-15">
								<!--begin::List-->
								<div class="mh-375px scroll-y me-n7 pe-7">
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<img alt="Pic" src="<?=base_url()?>assets/media/avatars/300-6.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Emma Smith 
												<span class="badge badge-light fs-8 fw-semibold ms-2">Art Director</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">smith@kpmg.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$23,000</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<span class="symbol-label bg-light-danger text-danger fw-semibold">M</span>
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Melody Macy 
												<span class="badge badge-light fs-8 fw-semibold ms-2">Marketing Analytic</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">melody@altbox.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$50,500</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<img alt="Pic" src="<?=base_url()?>assets/media/avatars/300-1.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Max Smith 
												<span class="badge badge-light fs-8 fw-semibold ms-2">Software Enginer</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">max@kt.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$75,900</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<img alt="Pic" src="<?=base_url()?>assets/media/avatars/300-5.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Sean Bean 
												<span class="badge badge-light fs-8 fw-semibold ms-2">Web Developer</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">sean@dellito.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$10,500</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<img alt="Pic" src="<?=base_url()?>assets/media/avatars/300-25.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Brian Cox 
												<span class="badge badge-light fs-8 fw-semibold ms-2">UI/UX Designer</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">brian@exchange.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$20,000</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<span class="symbol-label bg-light-warning text-warning fw-semibold">C</span>
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Mikaela Collins 
												<span class="badge badge-light fs-8 fw-semibold ms-2">Head Of Marketing</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">mik@pex.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$9,300</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<img alt="Pic" src="<?=base_url()?>assets/media/avatars/300-9.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Francis Mitcham 
												<span class="badge badge-light fs-8 fw-semibold ms-2">Software Arcitect</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">f.mit@kpmg.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$15,000</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<span class="symbol-label bg-light-danger text-danger fw-semibold">O</span>
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Olivia Wild 
												<span class="badge badge-light fs-8 fw-semibold ms-2">System Admin</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">olivia@corpmail.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$23,000</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<span class="symbol-label bg-light-primary text-primary fw-semibold">N</span>
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Neil Owen 
												<span class="badge badge-light fs-8 fw-semibold ms-2">Account Manager</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">owen.neil@gmail.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$45,800</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<img alt="Pic" src="<?=base_url()?>assets/media/avatars/300-23.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Dan Wilson 
												<span class="badge badge-light fs-8 fw-semibold ms-2">Web Desinger</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">dam@consilting.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$90,500</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<span class="symbol-label bg-light-danger text-danger fw-semibold">E</span>
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Emma Bold 
												<span class="badge badge-light fs-8 fw-semibold ms-2">Corporate Finance</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">emma@intenso.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$5,000</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<img alt="Pic" src="<?=base_url()?>assets/media/avatars/300-12.jpg" />
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Ana Crown 
												<span class="badge badge-light fs-8 fw-semibold ms-2">Customer Relationship</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">ana.cf@limtel.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$70,000</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
									<!--begin::User-->
									<div class="d-flex flex-stack py-5">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle">
												<span class="symbol-label bg-light-info text-info fw-semibold">A</span>
											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-6">
												<!--begin::Name-->
												<a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">Robert Doe 
												<span class="badge badge-light fs-8 fw-semibold ms-2">Marketing Executive</span></a>
												<!--end::Name-->
												<!--begin::Email-->
												<div class="fw-semibold text-muted">robert@benko.com</div>
												<!--end::Email-->
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->
										<!--begin::Stats-->
										<div class="d-flex">
											<!--begin::Sales-->
											<div class="text-end">
												<div class="fs-5 fw-bold text-gray-900">$45,500</div>
												<div class="fs-7 text-muted">Sales</div>
											</div>
											<!--end::Sales-->
										</div>
										<!--end::Stats-->
									</div>
									<!--end::User-->
								</div>
								<!--end::List-->
							</div>
							<!--end::Users-->
							<!--begin::Notice-->
							<div class="d-flex justify-content-between">
								<!--begin::Label-->
								<div class="fw-semibold">
									<label class="fs-6">Adding Users by Team Members</label>
									<div class="fs-7 text-muted">If you need more info, please check budget planning</div>
								</div>
								<!--end::Label-->
								<!--begin::Switch-->
								<label class="form-check form-switch form-check-custom form-check-solid">
									<input class="form-check-input" type="checkbox" value="" checked="checked" />
									<span class="form-check-label fw-semibold text-muted">Allowed</span>
								</label>
								<!--end::Switch-->
							</div>
							<!--end::Notice-->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - View Users-->
			
		</div>
		<!--end::Content container-->
	</div>
	<!--end::Content-->
</div>