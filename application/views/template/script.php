<!--end::Modals-->
		<!--begin::Javascript-->
		<script>var base_url = "<?=base_url()?>";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="<?=base_url()?>assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?=base_url()?>assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="<?=base_url()?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
		<script src="<?=base_url()?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="<?=base_url()?>assets/js/widgets.bundle.js"></script>
		<script src="<?=base_url()?>assets/js/custom/widgets.js"></script>
		
		<script src="<?=base_url()?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="<?=base_url()?>assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="<?=base_url()?>assets/js/custom/utilities/modals/new-target.js"></script>
		<script src="<?=base_url()?>assets/js/custom/utilities/modals/users-search.js"></script>


		<script src="<?=base_url()?>assets/js/custom/pages/app/add-appt.js"></script>

		<? if(isset($user_chat)){ ?>
		<script src="<?=base_url()?>assets/js/custom/apps/chat/chat.js"></script>
		<? }?>


		<!--end::Custom Javascript-->
		<!--end::Javascript-->


